<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shipment;
use Ladumor\OneSignal\OneSignal;
use App\Models\CustomerToken;
use App\Models\DriverLocation;
use App\Models\BroadcastedShipments;
use App\Models\Notification;
use App\Models\UserToken;
use DB;
use Config;
use DataTables;

class ShipmentController extends Controller
{
    function index(){

        return view('admin.modules.shipments.list');

    }

    function getShipments(Request $request){

        if ($request->ajax()) {
            $data = Shipment::select('id','tracking_no','customer_id', 'status', 'total_amount','payment_method','payment_status', 'shipment_date_time')
            ->with('customer')
            ->orderBy('id', 'desc')
            ->get();
           // dd($data);
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('status', function(Shipment $shipment){
                $select = '<select class="form-control form-control-sm shipment_status" rel="'.$shipment->id.'"><option '. ($shipment->status == "Pending" ? 'selected' : '' ) .'>Pending</option><option '. ($shipment->status == "Processing" ? 'selected' : '' ) .'>Processing</option><option '. ($shipment->status == "Driver Accepted" ? 'selected' : '' ) .'>Driver Accepted</option><option '. ($shipment->status == "Driver Picked Up" ? 'selected' : '' ) .'>Driver Picked Up</option><option '. ($shipment->status == "Completed" ? 'selected' : '' ) .'>Completed</option><option '. ($shipment->status == "Cancelled" ? 'selected' : '' ) .'>Cancelled</option></select>';
                    return $select;
                })
                ->addColumn('customer', function(Shipment $shipment){
                    return $shipment->customer->name;
                })
                ->addColumn('customer_email', function(Shipment $shipment){
                    return $shipment->customer->email;
                })
                ->rawColumns(['status'])
                ->make(true);
        }

    }

    function shipmentDetail($tracking_no){

        $shipment = Shipment::where('tracking_no', $tracking_no)
                    ->with(['customer', 'vehicle','pickup_location', 'drop_location', 'shipment_charges', 'shipment_items'])
                    ->first();
        return view('admin.modules.shipments.detail', compact('shipment'));
    }


    function change_status(Request $request){

        if ($request->ajax()) {
            $allowedStatus = ['processing', 'cancelled', 'pending'];

            if(!in_array(strtolower($request->status),$allowedStatus))
            {
               return response()->json(['status' => false, 'message'=> 'This action can be done by Driver!'], 200);
            }

            $shipment = Shipment::where('id', $request->id)->with('pickup_location')->first();
            if($request->status == 'Pending' && $shipment->status == 'Processing' || $shipment->status == 'Cancelled'){
                return response()->json(['status' => false, 'message'=> 'This status cannot be undone!'], 200);
            }
            $shipment->status = $request->status;


            if($request->status == 'Cancelled'){
                $shipment->cancelled_reason = $request->cancel_reason;
                $shipment->cancelled_by = auth()->user()->roles->pluck('name')[0];
            }

            $shipment->save();
            if($request->status == 'Processing')
            {
                //Broadcast order to all nearest drivers
                $this->broadcastOrder($shipment, $shipment->vehicle_id);
            }
            $tokenArray = array();
            $device_tokens = CustomerToken::where('customer_id', $shipment->customer_id)->get('token')->toArray();
            if($device_tokens){
                foreach($device_tokens as $token)
                {
                    $tokenArray[] = $token['token'];
                }
                $fields['include_player_ids'] = $tokenArray;
                $notificationMsg = $this->notifyMessage($shipment->status, $shipment);
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
            return response()->json(['status' => true, 'message'=> 'Status has been changed and notified to Customer!'], 200);
        }

    }

    function notifyMessage($status, $shipment){

        $message = '';
        if($status == 'Processing')
        {
            $message = __('Your shipment with Tracking# '.$shipment->tracking_no.' has been accepted. You will be notified on shipment dispatch!');
        }
        elseif($status == 'Cancelled'){
            $message = __('Your shipment with Tracking# '.$shipment->tracking_no.' has been cancelled. For reason check Shipment detaIls!');
        }

        return $message;
    }


    function broadcastOrder($shipment, $vehicle_id){
        $pickup_location = $shipment->pickup_location->coordinates;
        $pickup_location = json_decode($pickup_location);
        $business_settings = $this->business_settings();
        $distance_unit = $business_settings->distance_unit;
        if($distance_unit != "Miles"){
            $radius = $business_settings->provider_search_radius;
        }else{
            $radius = $business_settings->provider_search_radius * 1.60934;
        }

        $nearestDrivers = DriverLocation::select(DB::raw("id,driver_id, ( 3959 * acos( cos( radians('$pickup_location->lat') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('$pickup_location->lng') ) + sin( radians('$pickup_location->lat') ) * sin( radians( lat ) ) ) ) AS distance"))->havingRaw('distance < '.$radius.'')->orderBy('distance', 'desc')->groupBy('driver_id')
        ->with('driver')->get();
        foreach($nearestDrivers as $key => $value) {
            if($value->driver->vehicle_id == $vehicle_id && $value->driver->online_status == 1)
            {
                $broadcastOrder = new BroadcastedShipments();
                $broadcastOrder->shipment_id =  $shipment->id;
                $broadcastOrder->driver_id = $value->driver_id;
                $broadcastOrder->distance =$value->distance;
                $broadcastOrder->save();

                $tokenArray = array();
                $device_tokens = UserToken::where('user_id', $value->driver_id)->get('token')->toArray();
                if($device_tokens){
                    foreach($device_tokens as $token)
                    {
                        $tokenArray[] = $token['token'];
                    }
                    $fields['include_player_ids'] = $tokenArray;
                    $notificationMsg = "You have new shipment broadcasted near you. Check you broadcast orders to Accept/Reject";
                    try{
                        Config::set('one-signal.app_id', '73367176-11a6-4542-a375-e1405e637690');
                        OneSignal::sendPush($fields, $notificationMsg);
                        //Save Notification log
                        // $notification = array();
                        // $notification['customer_id'] = $shipment->customer_id;
                        // $notification['message'] = $notificationMsg;
                        // Notification::create($notification);
                    }catch(Exception $e){
                        dd($e->getMessage());
                    }

                }

            }
        }
    }
}
