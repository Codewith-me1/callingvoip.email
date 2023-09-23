<?php

namespace App\Http\Controllers;
use App\Models\SmtpSetting;
use Illuminate\Http\Request;
use App\Models\LicenseKey;  
use PHPMailer\PHPMailer\PHPMailer;
use Carbon\Carbon;
use PHPMailer\PHPMailer\Exception;
class PHPMailerController extends Controller
{
    public function email() {
        return view("email");
}

public function composeEmail(Request $request) {


    require base_path("vendor/autoload.php");
    $mail = new PHPMailer(true);     // Passing `true` enables exceptions

    $licenseKey = $request->input('license_key');

    // Check if the license key exists in the database
    $licenseRecord = LicenseKey::where('key', $licenseKey)->first();

    if (!$licenseRecord) {
        // Redirect or return an error response if the license key is invalid
        return redirect()->route('email')->with('success', 'Invalid license key');
    }
   
    else {  
       try { 
        $now = Carbon::now();
        if($licenseRecord->monthly_limit == 0 && $now > $licenseRecord->expiry_date){
            return back()->with("success", "Limit Has Been Reached or your License Key is Expired");
        }
        else{ 
        $licenseRecord->decrement('monthly_limit', 1);
           
        $smtpSettings = SmtpSetting::firstOrFail() ;
        // Email server settings
             $mail->SMTPDebug = 0;
             $mail->isSMTP();
             $mail->Host = $smtpSettings->host;
             $mail->SMTPAuth = true;
             $mail->Username = $smtpSettings->username;
             $mail->Password = $smtpSettings->password;
             $mail->SMTPSecure = 'tls'; // You can make this configurable too
             $mail->Port = $smtpSettings->port;
           
        $mail->setFrom('info@manojsharma.me', 'Manoj');
        $mail->addAddress($request->emailRecipient);
        $mail->addCC($request->emailCc);
        $mail->addBCC($request->emailBcc);

        $mail->addReplyTo('info@manojsharma.me', 'Man');

            if(isset($_FILES['emailAttachments'])) {
                 for ($i=0; $i < count($_FILES['emailAttachments']['tmp_name']); $i++) {
                  $mail->addAttachment($_FILES['emailAttachments']['tmp_name'][$i], $_FILES['emailAttachments']['name'][$i]);
                }
              }


             $mail->isHTML(true);                // Set email content format to HTML

             $mail->Subject = $request->emailSubject;
             $mail->Body    = $request->emailBody;

        // $mail->AltBody = plain text version of email body;
       

              if( !$mail->send() ) {
              return back()->with("failed", "Email not sent.")->withErrors($mail->ErrorInfo);
                 }
        
               else {   
               return back()->with("success", "Email has been sent.");
                 }
                 
                }}
                catch(Exception $e) {
                    return back()->with('error','Error Sending Mail ');
                  }
            }
               
    


           
    


}}