<?php

namespace App\Http\Controllers\Api\Driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BroadcastedShipments;
use App\Models\Shipment;
use App\Models\Notification;
use App\Models\CustomerToken;
use OneSignal;
use Validator;
use Config;


/**
 * @group Driver Authentication
 *
 * API endpoints for managing drivers authentication
 */


class ShipmentController extends Controller
{

    /**
     * Get Broadcasted shipments Endpoint
     *
     * This endpoint allows you to fetch all shipments created near driver.
     *
     * @response {
     *      "status": true,
     *      "message": "Address is created successfully!",
     *  }
     *
     * @response 401 {
     *       "message": "Unauthenticated."
     *   }
     */
    function getBroadcastedOrders(Request $request){

        $driver_id = $request->user()->id;

        $shipments = BroadcastedShipments::where('driver_id', $driver_id)->get();
        if(!$shipments){
            return response()->json(['status' => false, 'message' => 'No broadcasted shipments found!']);
        }
        $shipments_data = array();
        foreach($shipments as $shipment){

            $shipment->shipment = Shipment::with('customer', 'pickup_location')->where('id', $shipment->shipment_id)->first();

        }
        return response()->json(['status' => true, 'message' => 'Broadcasted shipments found!', 'data' => $shipments]);
    }


    /**
     * Get Driver shipments Endpoint
     *
     * This endpoint allows you to fetch all shipments created near driver.
     *
     * @response {
     *      "status": true,
     *      "message": "Address is created successfully!",
     *  }
     *
     * @response 401 {
     *       "message": "Unauthenticated."
     *   }
     */
    function getAssignedShipments(Request $request){

        $driver_id = $request->user()->id;
            $shipments = Shipment::where(['driver_id' => $driver_id])->orderBy('id', 'desc')
        ->with(['customer', 'vehicle','pickup_location', 'drop_location', 'shipment_charges'])->get();

        if(!$shipments){
            return response()->json(['status' => false, 'message' => 'No assigned shipments found!']);
        }
        return response()->json(['status' => true, 'message' =>  'Shipments found!', 'data' => $shipments]);
    }

    /**
     * Accept or Reject shipments Endpoint
     *
     * This endpoint to accept or reject a broadcasted shipment.
     *
     * @bodyParam   shipment_id integer required ID of shipment.
     * @bodyParam   status string required The status of the shipment by driver.
     *
     * @response {
     *      "status": true,
     *      "message": "Address is created successfully!",
     *  }
     *
     * @response 401 {
     *       "message": "Unauthenticated."
     *   }
     */
    function changeOrderStatus(Request $request){

        $messages = array(
            'shipment_id.required' => __('Shipment ID field is required.'),
            'shipment_id.exists' => __('Shipment no found in broadcasted orders.'),
            'status.required' => __('Status field is required.'),
            'status.in' => __('Status can be accepted or rejected.')

        );
        $validator = Validator::make($request->all(), [
            'shipment_id' => 'required|exists:broadcasted_shipments,shipment_id',
            'status' => 'required|in:accepted,rejected'
        ], $messages);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }
        $driver_id = $request->user()->id;
        $shipments = BroadcastedShipments::where(['driver_id' => $driver_id, 'shipment_id' => $request->shipment_id])->first();
        $getShipment = Shipment::find($request->shipment_id);
        if(!$shipments || !empty($getShipment->driver_id)){
            return response()->json(['status' => false, 'message' => 'Shipment is already accepted!']);
        }

        $status = $request->status;
        if($status == 'accepted'){
            $getShipment->driver_id = $driver_id;
            $getShipment->status = "Driver Accepted";
            $getShipment->save();
            //Delete Broadcasted list after driver assigned
            BroadcastedShipments::where(['shipment_id' => $request->shipment_id])->delete();
            $tokenArray = array();
            $device_tokens = CustomerToken::where('customer_id', $getShipment->customer_id)->get('token')->toArray();
            if($device_tokens){
                foreach($device_tokens as $token)
                {
                    $tokenArray[] = $token['token'];
                }
                $fields['include_player_ids'] = $tokenArray;
                $notificationMsg = __('Your shipment with Tracking# '.$getShipment->tracking_no.' has been accepted by driver. You will be notified on shipment dispatch!');
                try{
                    Config::set('one-signal.app_id', '1271f28e-4e4d-4370-aed0-d7f16f930f0e');
                    OneSignal::sendPush($fields, $notificationMsg);
                    //Save Notification log
                    $notification = array();
                    $notification['customer_id'] = $getShipment->customer_id;
                    $notification['message'] = $notificationMsg;
                    Notification::create($notification);
                }catch(Exception $e){
                    dd($e->getMessage());
                }

            }
        }else{
            BroadcastedShipments::where(['driver_id' => $driver_id, 'shipment_id' => $request->shipment_id])->delete();
        }

        return response()->json(['status' => true, 'message' => 'Status has been successfully updated!']);
    }


    /**
     * Pickup or Deliver shipments Endpoint
     *
     * This endpoint to accept or reject a broadcasted shipment.
     *
     * @bodyParam   shipment_id integer required ID of shipment.
     * @bodyParam   status string required The status of the shipment by driver (picked_up, completed).
     *
     * @response {
     *      "status": true,
     *      "message": "Address is created successfully!",
     *  }
     *
     * @response 401 {
     *       "message": "Unauthenticated."
     *   }
     */

    function changeStatus(Request $request){

        $messages = array(
            'shipment_id.required' => __('Shipment ID field is required.'),
            'status.required' => __('Status field is required.')
        );
        $validator = Validator::make($request->all(), [
            'shipment_id' => 'required',
            'status' => 'required'
        ], $messages);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }

        $shipment = Shipment::find($request->shipment_id);
        if($shipment){
            if($request->status == 'picked_up'){
                $shipment->status = "Driver Picked Up";
                $notificationMsg = __('Your shipment with Tracking# '.$shipment->tracking_no.' has been picked up by driver.');
            }else{
                $shipment->status = "Completed";
                $notificationMsg = __('Your shipment with Tracking# '.$shipment->tracking_no.' has been delivered by driver.');
            }
            $shipment->save();
            $tokenArray = array();
            $device_tokens = CustomerToken::where('customer_id', $shipment->customer_id)->get('token')->toArray();
            if($device_tokens){
                foreach($device_tokens as $token)
                {
                    $tokenArray[] = $token['token'];
                }
                $fields['include_player_ids'] = $tokenArray;

                try{
                    Config::set('one-signal.app_id', '1271f28e-4e4d-4370-aed0-d7f16f930f0e');
                    OneSignal::sendPush($fields, $notificationMsg);
                    //Save Notification log
                    $notification = array();
                    $notification['customer_id'] = $shipment->customer_id;
                    $notification['message'] = $notificationMsg;
                    Notification::create($notification);
                }catch(Exception $e){
                    dd($e->getMessage());
                }

            }
            return response()->json(['status' => true, 'message' => 'Status has been successfully updated!']);
        }

    }
}

