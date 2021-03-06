<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Address;
use App\Models\Shipment;
use App\Models\ShipmentCharge;
use App\Models\ShipmentItems;
use App\Models\VehicleWorkingHours;
use Validator;
use Str;

/**
 * @group Shipments
 *
 * API endpoints for managing shipments controls
 */

class ShipmentController extends Controller
{

    /**
     * Get Active Vehicles Endpoint
     *
     * This endpoint allows you to get active vehicles along their charges.
     * To get active vehicles you need access_token generated by this authentication endpoints.
     *
     * @response {
     *   "status": true,
     *   "vehicles": [
     *       {
     *           "id": 1,
     *           "reg_no": "KAI-1534312",
     *           "name": "Nissan",
     *           "image": null,
     *           "fixed_charges": 12,
     *           "over_time_charges": 10,
     *           "over_range_charges_type": "distance_wise",
     *           "over_range_charges": 10,
     *           "working_hours": {
     *               "id": 1,
     *               "vehicle_id": 1,
     *               "sunday": 1,
     *               "sunday_open": "00:00:00",
     *               "sunday_close": "06:25:00",
     *               "monday": 1,
     *               "monday_open": "00:00:00",
     *               "monday_close": "23:59:00",
     *               "tuesday": 0,
     *               "tuesday_open": "00:00:00",
     *               "tuesday_close": "22:00:00",
     *               "wednesday": 0,
     *               "wednesday_open": "00:00:00",
     *               "wednesday_close": "23:59:00",
     *               "thursday": 0,
     *               "thursday_open": "00:00:00",
     *               "thursday_close": "23:59:00",
     *               "friday": 1,
     *               "friday_open": "00:00:00",
     *               "friday_close": "23:59:00",
     *               "saturday": 1,
     *               "saturday_open": "00:00:00",
     *               "saturday_close": "23:59:00"
     *           }
     *       }
     *   ]
     *   }
     *
     * @response 404 {
      *      "status": false,
     *      "vehicles": null,
     *   }
     */
    function get_active_vehicles(Request $request){

        $vehicles = Vehicle::select('id', 'reg_no', 'name', 'image', 'fixed_charges', 'over_time_charges', 'over_range_charges_type', 'over_range_charges')
                        ->where('status', 1)
                        ->orderBy('id', 'desc')
                        ->with('workingHours')
                        ->get();
        if($vehicles){
            return response()->json(['status' => true, 'vehicles' => $vehicles]);
        }else{
            return response()->json(['status' => false, 'vehicles' => null]);
        }

    }

     /**
     * Calculate Delivery Charges Endpoint
     *
     * This endpoint allows you to calculate charges base on vehicle and user addresses.
     * To call authorized endpoints you need access_token generated by authentication endpoints.
     *
     * @bodyParam   vehicle_id integer required The id of the selected vehicle by the client.
     * @bodyParam   pickup_address integer required The id of the pickup address.
     * @bodyParam   drop_address integer required The id of the drop address.
     *
     * @response {
     *       "status": true,
     *       "message": "Charges has been calculated",
     *       "vehicle_charges": {
     *           "fixed_charges": "12.00",
     *           "overtime_charges": 0,
     *           "over_range_charges": 0
     *       },
     *       "delivery_charges": {
     *           "one_day_delivery_charges": "262.30",
     *           "two_days_delivery_charges": "131.15",
     *           "three_days_delivery_charges": "20.00"
     *       }
     *   }
     *
     */

    function get_delivery_charges(Request $request){

        $messages = array(
            'vehicle_id.required' => __('Vehicle ID field is required.'),
            'pickup_address.required' => __('Pickup point field is required.'),
            'drop_address.required' => __('Drop point field is required.'),
            'pickup_address.exists' => __('Pickup Address not found for this user.'),
            'drop_address.exists' => __('Drop Address not found for this user.')
        );

        $validator = Validator::make($request->all(), [
            'vehicle_id' => 'required',
            'pickup_address' => 'required|exists:addresses,id',
            'drop_address' => 'required|exists:addresses,id'
        ], $messages);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }

        $delivery_charges = 0;
        $courier_settings = $this->courier_settings();
        $today = \Carbon\Carbon::now();
        $day = Str::lower(\Carbon\Carbon::parse($today)->format('l'));
        $delivery_charges = array();
        $vehicle_charges = array();

        $vehicle_timing = VehicleWorkingHours::where(['vehicle_id' => $request->vehicle_id, $day => 1])->with('vehicle')->first();
        if($vehicle_timing){
             //Get distance between two address
            $distance = $this->get_distance_between_points($request->pickup_address, $request->drop_address);

            //One Day Delivery Charges
            if($courier_settings->charges_type === 'distance_wise'){
                $delivery_charges['one_day_delivery_charges'] = number_format((float)$distance * $courier_settings->one_day_delivery_charges, 2, '.', '');
            }else{
                $delivery_charges['one_day_delivery_charges'] = number_format((float)$courier_settings->one_day_delivery_charges, 2, '.', '');
            }
            //Two Days Delivery Charges
            if($courier_settings->charges_type_2 === 'distance_wise'){
                $delivery_charges['two_days_delivery_charges'] = number_format((float)$distance * $courier_settings->two_days_delivery_charges, 2, '.', '');
            }else{
                $delivery_charges['two_days_delivery_charges'] = number_format((float)$courier_settings->two_days_delivery_charges, 2, '.', '');
            }
            //Three Days Delivery Charges
            if($courier_settings->charges_type_3 === 'distance_wise'){
                $delivery_charges['three_days_delivery_charges'] = number_format((float)$distance * $courier_settings->three_days_delivery_charges, 2, '.', '');
            }else{
                $delivery_charges['three_days_delivery_charges'] = number_format((float)$courier_settings->three_days_delivery_charges, 2, '.', '');
            }

            $vehicle_charges['fixed_charges'] = number_format((float)$vehicle_timing->vehicle->fixed_charges, 2, '.', '');

            $time_now = $today->format('H:i:s');
            $query_open = $day.'_open';
            $query_close = $day.'_close';
            $open_time = $vehicle_timing->$query_open;
            $close_time = $vehicle_timing->$query_close;

            $vehicle_charges['overtime_charges'] = 0;
            //Vehicle extra charge out of time shift
            if(strtotime($time_now) < strtotime($open_time) || strtotime($time_now) > strtotime($close_time)){
                $vehicle_charges['overtime_charges'] = number_format((float)$distance * $vehicle_timing->vehicle->over_time_charges, 2, '.', '');
            }
            $vehicle_charges['over_range_charges'] = 0;
            //Over range charges after 100 miles
            if($distance > 100){
                if($vehicle_timing->vehicle->over_range_charges_type == 'distance_wise'){
                    $vehicle_charges['over_range_charges'] = number_format((float)$distance * $vehicle_timing->vehicle->over_range_charges, 2, '.', '');
                }else{
                    $vehicle_charges['over_range_charges'] = number_format((float)$vehicle_timing->vehicle->over_range_charges, 2, '.', '');
                }
            }
            $data['status'] = true;
            $data['message'] = 'Charges has been calculated';
            $data['vehicle_charges'] = $vehicle_charges;
            $data['distance'] = $distance ?? 0.00;
            $data['delivery_charges'] = $delivery_charges;

            return response()->json($data, 200);

        }else{
            return response()->json(['status' => false, 'message' => "No Vehicles"]);
        }

    }

    function get_distance_between_points($pickup_address, $drop_address){

        $unit = 'm';
        $distance = 0;

        $from = Address::where('id', $pickup_address)->first();
        $to = Address::where('id', $drop_address)->first();

        $from_coordinates = json_decode($from->coordinates); //1
        $to_coordinates = json_decode($to->coordinates); //2

        $theta = $from_coordinates->lng - $to_coordinates->lng;
        $dist = sin(deg2rad($from_coordinates->lat)) * sin(deg2rad($to_coordinates->lat)) +  cos(deg2rad($from_coordinates->lat)) * cos(deg2rad($to_coordinates->lat)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);

        if ($unit == "K")
        {
            $distance = ($miles * 1.609344);
        }
        else if ($unit == "N")
        {
            $distance = ($miles * 0.8684);
        }
        else
        {
            $distance = $miles;
        }

        return number_format((float)$distance, 2, '.', '');

    }
    /**
     * Create a new Shipment
     *
     * This endpoint allows you to create a new shipment against the logged in user. This endpoint contains Address, Charges and Payment method details.
     * To call authorized endpoints you need access_token generated by authentication endpoints.
     *
     * @bodyParam   vehicle_id integer required The id of the selected vehicle by the client.
     * @bodyParam   pickup_address integer required The id of the pickup address.
     * @bodyParam   drop_address integer required The id of the drop address.
     * @bodyParam   payment_method string required The payment method (cash or card).
     * @bodyParam   charges array required The array of the charges applied on shipment. Example: {"distance": 12,"delivery_charges": 1000,"vehicle_charges": {"fixed_charges": "12.00","overtime_charges": 0,"over_range_charges": 0}}
     * @bodyParam   total_amount integer required The total amount of the shipment including charges.
     *
     * @response {
     *       "status": true,
     *       "message": "Your shipment has been initiated successfully. You will be informed further!",
     *       "tracking_no": SH-HAHY24HS
     *
     *   }
     */
    function place_new_shipment(Request $request){

        $messages = array(
            'vehicle_id.required' => __('Vehicle ID field is required.'),
            'vehicle_id.exists' => __('Vehicle not exists.'),
            'pickup_address.required' => __('Pickup Address field is required.'),
            'pickup_address.exists' => __('Pickup Address not exists.'),
            'drop_address.required' => __('Drop Address field is required.'),
            'drop_address.exists' => __('Drop Address not exists.'),
            'payment_method.required' => __('Payment Method field is required.'),
            'payment_method.in' => __('Payment Method can be cash or card.'),
            'charges.required' => __('Array of charges with distance.')
        );

        $validator = Validator::make($request->all(), [
            'vehicle_id' => 'required|exists:vehicles,id',
            'pickup_address' => 'required|exists:addresses,id',
            'drop_address' => 'required|exists:addresses,id',
            'payment_method' => 'required|in:cash,card',
            'charges' => 'required',
            'total_amount' => 'required',

        ], $messages);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }

        //Store shipment
        $shipment = array();
        $shipment['customer_id'] = $request->user()->id;
        $shipment['tracking_no'] = "SH-".strtoupper(Str::random(7));
        $shipment['vehicle_id'] = $request->vehicle_id;
        $shipment['pickup_address'] = $request->pickup_address;
        $shipment['drop_address'] = $request->drop_address;
        $shipment['total_amount'] = $request->total_amount;
        $shipment['distance'] = $request->charges['distance'];
        $shipment['shipment_date_time'] = \Carbon\Carbon::now();
        $create_shipment = Shipment::create($shipment);

        if($create_shipment->id > 0){

            //Store Delivery and vehicle charges of created shipment
            $charges = array();
            $charges['shipment_id'] = $create_shipment->id;
            $charges['delivery_charges'] = $request->charges['delivery_charges'];
            $charges['vehicle_fixed_charges'] = $request->charges['vehicle_charges']['fixed_charges'];
            $charges['vehicle_overtime_charges'] = $request->charges['vehicle_charges']['overtime_charges'];
            $charges['vehicle_over_range_charges'] = $request->charges['vehicle_charges']['over_range_charges'];
            ShipmentCharge::create($charges);


            //Shipment Items with details
            $items = array();
            if($request->shipment_items)
            {
                foreach($request->shipment_items as $key => $item){
                    $temp = array();
                    $temp['shipment_id'] = $create_shipment->id;
                    $temp['height'] = $item['height'];
                    $temp['width'] = $item['width'];
                    $temp['length'] = $item['length'];
                    $temp['weight'] = $item['weight'];
                    ShipmentItems::create($temp);
                }
            }
            return response()->json(['status' => true, 'message' => "Your shipment has been initiated successfully. You will be informed further!", 'tracking_no' => $create_shipment->tracking_no]);
        }
    }

    /**
     * Customer Shipments
     *
     * This endpoint allows you to get shipments against the logged in user.
     * To call authorized endpoints you need access_token generated by authentication endpoints.
     *
     * @response {
     *       "status": true,
     *       "message": "Data fetched!",
     *       "shipments": [
     *   {
     *       "id": 8,
     *       "tracking_no": "SH-5AXEZAO",
     *       "customer_id": 5,
     *       "vehicle_id": 1,
     *       "pickup_address": 1,
     *       "drop_address": 1,
     *       "distance": 12,
     *       "total_amount": 12.2,
     *      "payment_method": "cash",
     *       "payment_status": 0,
     *       "status": "Pending",
     *       "shipment_date_time": "2022-01-23 17:29:01",
     *       "delivered_date_time": null,
     *       "created_at": "2022-01-22T14:22:30.000000Z",
     *       "updated_at": "2022-01-22T14:22:30.000000Z",
     *       "customer": {
     *           "id": 5,
     *           "name": "John Panda",
     *           "email": "john@example.com",
     *           "email_verified_at": null,
     *           "phone": null,
     *           "country": null,
     *           "city": null,
     *           "address": null,
     *           "gender": null,
     *           "image": null,
     *           "status": 1,
     *           "created_at": "2022-01-15T12:57:05.000000Z",
     *           "updated_at": "2022-01-15T12:57:05.000000Z"
     *       },
     *       "vehicle": {
     *           "id": 1,
     *           "reg_no": "KAI-1534312",
     *           "name": "Nissan",
     *           "image": null,
     *           "fixed_charges": 12,
     *           "over_time_charges": 10,
     *           "over_range_charges_type": "distance_wise",
     *           "over_range_charges": 10,
     *           "status": true,
     *           "created_at": "2022-01-10T15:23:25.000000Z",
     *           "updated_at": "2022-01-16T18:38:52.000000Z"
     *       },
     *       "pickup_location": {
     *          "id": 1,
     *          "customer_id": 5,
     *          "first_name": "John",
     *           "last_name": "Panda",
     *           "company_name": "Google LLC",
     *           "street_address": "Jinnah Avenue near Zero Point",
     *           "street_address2": "Front of Jinnah Park",
     *           "city": "Islamabad",
     *           "zip_code": 64200,
     *           "created_at": "2022-01-15T12:59:05.000000Z",
     *           "updated_at": "2022-01-15T12:59:05.000000Z",
     *           "coordinates": "{\"lat\":\"28.4212\",\"lng\":\"70.2989\"}"
     *       },
     *       "drop_location": {
     *           "id": 1,
     *           "customer_id": 5,
     *           "first_name": "John",
     *           "last_name": "Panda",
     *           "company_name": "Google LLC",
     *           "street_address": "Jinnah Avenue near Zero Point",
     *           "street_address2": "Front of Jinnah Park",
     *           "city": "Islamabad",
     *           "zip_code": 64200,
     *           "created_at": "2022-01-15T12:59:05.000000Z",
     *           "updated_at": "2022-01-15T12:59:05.000000Z",
     *           "coordinates": "{\"lat\":\"28.4212\",\"lng\":\"70.2989\"}"
     *       },
     *       "shipment_charges": {
     *           "id": 3,
     *           "shipment_id": 8,
     *           "delivery_charges": 1000,
     *           "vehicle_fixed_charges": 12,
     *           "vehicle_overtime_charges": 0,
     *           "vehicle_over_range_charges": 0,
     *           "created_at": "2022-01-22T14:22:30.000000Z",
     *           "updated_at": "2022-01-22T14:22:30.000000Z"
     *       }
     *   }
     *
     *   }
     * ]
     */

    function get_shipments(Request $request){

        $shipments = Shipment::where('customer_id', $request->user()->id)->orderBy('id', 'desc')
                            ->with(['customer', 'vehicle','pickup_location', 'drop_location', 'shipment_charges'])
                            ->get();
        if(!$shipments){
            return response()->json(['status' => false, 'message' => 'No shipments found!']);
        }
        return response()->json(['status' => true, 'message' => 'Data fetched!', 'shipments' => $shipments]);
    }

       /**
     * Customer Shipment Detail
     *
     * This endpoint allows you to get shipment detail against the shipment id.
     * To call authorized endpoints you need access_token generated by authentication endpoints.
     *
     * @bodyParam  shipment_id integer required The id of the selected shipment by the client.
     *
     * @response {
     *       "status": true,
     *       "message": "Data fetched!",
     *       "shipment":
     *   {
     *       "id": 8,
     *       "tracking_no": "SH-5AXEZAO",
     *       "customer_id": 5,
     *       "vehicle_id": 1,
     *       "pickup_address": 1,
     *       "drop_address": 1,
     *       "distance": 12,
     *       "total_amount": 12.2,
     *      "payment_method": "cash",
     *       "payment_status": 0,
     *       "status": "Pending",
     *       "shipment_date_time": "2022-01-23 17:29:01",
     *       "delivered_date_time": null,
     *       "created_at": "2022-01-22T14:22:30.000000Z",
     *       "updated_at": "2022-01-22T14:22:30.000000Z",
     *       "customer": {
     *           "id": 5,
     *           "name": "John Panda",
     *           "email": "john@example.com",
     *           "email_verified_at": null,
     *           "phone": null,
     *           "country": null,
     *           "city": null,
     *           "address": null,
     *           "gender": null,
     *           "image": null,
     *           "status": 1,
     *           "created_at": "2022-01-15T12:57:05.000000Z",
     *           "updated_at": "2022-01-15T12:57:05.000000Z"
     *       },
     *       "vehicle": {
     *           "id": 1,
     *           "reg_no": "KAI-1534312",
     *           "name": "Nissan",
     *           "image": null,
     *           "fixed_charges": 12,
     *           "over_time_charges": 10,
     *           "over_range_charges_type": "distance_wise",
     *           "over_range_charges": 10,
     *           "status": true,
     *           "created_at": "2022-01-10T15:23:25.000000Z",
     *           "updated_at": "2022-01-16T18:38:52.000000Z"
     *       },
     *       "pickup_location": {
     *          "id": 1,
     *          "customer_id": 5,
     *          "first_name": "John",
     *           "last_name": "Panda",
     *           "company_name": "Google LLC",
     *           "street_address": "Jinnah Avenue near Zero Point",
     *           "street_address2": "Front of Jinnah Park",
     *           "city": "Islamabad",
     *           "zip_code": 64200,
     *           "created_at": "2022-01-15T12:59:05.000000Z",
     *           "updated_at": "2022-01-15T12:59:05.000000Z",
     *           "coordinates": "{\"lat\":\"28.4212\",\"lng\":\"70.2989\"}"
     *       },
     *       "drop_location": {
     *           "id": 1,
     *           "customer_id": 5,
     *           "first_name": "John",
     *           "last_name": "Panda",
     *           "company_name": "Google LLC",
     *           "street_address": "Jinnah Avenue near Zero Point",
     *           "street_address2": "Front of Jinnah Park",
     *           "city": "Islamabad",
     *           "zip_code": 64200,
     *           "created_at": "2022-01-15T12:59:05.000000Z",
     *           "updated_at": "2022-01-15T12:59:05.000000Z",
     *           "coordinates": "{\"lat\":\"28.4212\",\"lng\":\"70.2989\"}"
     *       },
     *       "shipment_charges": {
     *           "id": 3,
     *           "shipment_id": 8,
     *           "delivery_charges": 1000,
     *           "vehicle_fixed_charges": 12,
     *           "vehicle_overtime_charges": 0,
     *           "vehicle_over_range_charges": 0,
     *           "created_at": "2022-01-22T14:22:30.000000Z",
     *           "updated_at": "2022-01-22T14:22:30.000000Z"
     *       }
     *   }
     *
     *   }
     *
     */

    function get_shipment(Request $request){

        $messages = array(
            'shipment_id.required' => __('Shipment ID field is required.'),
            'shipment_id.exists' => __('Shipment not exists.'),
        );

        $validator = Validator::make($request->all(), [
            'shipment_id' => 'required|exists:shipments,id',

        ], $messages);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }

        $shipment = Shipment::where('id', $request->shipment_id)
        ->with(['customer', 'vehicle','pickup_location', 'drop_location', 'shipment_charges'])
        ->first();
        if(!$shipment){
        return response()->json(['status' => false, 'message' => 'No shipment found!']);
        }
        return response()->json(['status' => true, 'message' => 'Data fetched!', 'shipments' => $shipment]);

    }
}
