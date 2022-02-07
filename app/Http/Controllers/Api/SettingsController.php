<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BusinessSetting;

/**
 * @group Settings
 *
 * API endpoints for fetching settings.
 */

class SettingsController extends Controller
{
    /**
     * Project Settings Endpoint
     *
     * This endpoint allows you to get default settings of the project.
     * 
     * @response {
     *       "status": true,
     *       "message": "Driver location has been updated!!"
     *   }
     * 
     * @response 401 {
     *        "message": "Unauthenticated."
     *  }
     */
    function settings(Request $request){

        $settings = BusinessSetting::select('name', 'email', 'phone', 'address', 'currency', 'about_us', 'privacy_policy', 'terms_and_conditions')->where('id', 1)->first();
        if($settings)
        {
            return response()->json(['status' => true, 'message' => 'Settings fetched!', 'data' => $settings]);
        }

    }
}
