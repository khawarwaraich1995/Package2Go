<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\VehicleWorkingHours;

class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vehicles()
    {
        $data = Vehicle::orderBy('id', 'desc')->get();
        return view('admin.modules.vehicles.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.modules.vehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $update_id = $request->id;
        $data = $request->except('_token');

        if (isset($update_id) && !empty($update_id) && $update_id != 0) {
            $vehicle = Vehicle::where('id', $update_id)->first();
            $vehicle->update($data);
            notify()->success('Vehicle updated successfully!');
            return redirect()->route('admin:vehicles');
        } else {
            $vehicle = Vehicle::create($data);
            $last_id = $vehicle->id;
            if (isset($last_id) && !empty($last_id)) {
                VehicleWorkingHours::create(['vehicle_id' => $last_id]);
                notify()->success('Vehicle added successfully!');
                return redirect()->route('admin:vehicles');
            } else {
                notify()->error('Something Went wrong!');
                return back();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function timing($id)
    {
        $timing = VehicleWorkingHours::where('vehicle_id', $id)->first();
        return view('admin.modules.vehicles.timing', compact('id', 'timing'));
    }

    public function timing_update(Request $request){

        $data = $request->except('_token');
        VehicleWorkingHours::where('vehicle_id', $data['vehicle_id'])->update($data);
        notify()->success('Timing updated successfully!');
        return redirect()->route('admin:vehicles');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Vehicle::find($id);
        return view('admin.modules.vehicles.create', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    public function change_status(Request $request)
    {
        $status = false;
        $message = "Error in Changing Status";
        $id = $request->id;
        $status = $request->status;
        if (isset($id) && !empty($id)) {
            if ($status == 0) {
                $status = 1;
            } else {
                $status = 0;
            }
            $change = Vehicle::where('id', $id)->update(['status' => $status]);
            $status = true;
            $message = "Status Changed";
        }
        return response()->json(['status' => $status, 'message' => $message]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->delete();
        notify()->success('Vehicle Deleted!');
        return back();
    }
}
