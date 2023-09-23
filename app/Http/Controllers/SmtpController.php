<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SmtpSetting;

class SmtpController extends Controller
{
    public function listSmtp()
    {
        $smtpSettings = SmtpSetting::firstOrFail() ;
        return view('smtp',compact('smtpSettings'));
    }

    public function update(Request $request)
    {
        // Validate and update SMTP settings in the database
        $smtpSettings = SmtpSetting::firstOrFail(); // Assuming there's only one set of SMTP settings
        $smtpSettings->update($request->all());

        return redirect()->route('smtp')->with('success', 'SMTP settings updated successfully');
    }
}
