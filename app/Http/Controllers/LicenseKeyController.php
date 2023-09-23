<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\LicenseKey;
use Carbon\Carbon;
class LicenseKeyController extends Controller
{

    public function listLicenseKeys()
    {
        $licenseKeys = LicenseKey::all();
        return view('ListLicense', compact('licenseKeys'));
    }

    public function main(){
        return view("main");
    }
    
    public function showKey(){
        return view("main");

    }
    public function checker(){
        return view("LicChecker");
    }

    public function suspended(){
        return view('main');
    }
    
    public function checkLicenseKey($licenseKey)
    {
        $license = LicenseKey::where('key', $licenseKey)->first();

        if ($license) {
            $now = Carbon::now();
            if ($license->expiration_date && $now > $license->expiration_date) {
                // License has expired, set it as inactive
                $license->update(['is_active' => false,'status' => 'inactive' ]);
                return 'License key is inactive because it has expired.';
            } else {
                return 'License key is active.';
            }
        } else {
            return 'License key not found.';
        }
    }

    public function suspendLicenseKey(Request $request)
    {
        $licenseKey = $request->input('licenseKey');
        $license = LicenseKey::where('key', $licenseKey)->first();

        if ($license) {
            $license->update(['is_active' => false, 'status' => 'suspended']);
            return 'License key has been suspended.';
        } else {
            return 'License key not found.';
        }
    }

    public function generateLicenseKey(Request $request)
    {
       
        try {
            $request->validate(
                [
                'tier' => 'required',
                'expiry'=>'required',
                'monthly_limit' => 'required',
            ])
            ;
            
            // Generate a unique license key
            $key = Str::random(16); // You can use a more secure method for key generation
    
            // Insert the license key into the database
            LicenseKey::create([
                'key' => $key,
                'tier' => $request->input('tier'),
                'expiry_date' =>$request->input('expiry'),
                'monthly_limit' => $request->input('monthly_limit'),
            ]);
    
           
            return redirect()->back()->with('success', 'Your Key has been generated.'.$key);
        } catch (\Exception $e) {
            
            return redirect()->back()->with('error', 'An error occurred while generating the license key.');
        }
    }
    
}
