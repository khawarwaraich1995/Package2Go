<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomersController extends Controller
{
    function customers(){
        $users = Customer::all();
        return view('admin.modules.users.customers_list', compact('users'));
    }

    public function destroy($id)
    {
        $user = Customer::find($id);
        $user->delete();
        notify()->success('Customer deleted successfully!');
        return back();
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
            $change = Customer::where('id', $id)->update(['status' => $status]);
            $status = true;
            $message = "Status Changed";
        }
        return response()->json(['status' => $status, 'message' => $message]);
    }

}
