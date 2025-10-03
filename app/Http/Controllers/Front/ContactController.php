<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PHPMailer\PHPMailer\PHPMailer;
use Validator;
use App\Mail\Email;


class ContactController extends Controller
{
    public function index()
    {
        return view('front.contact');
    }

    public function mail(Request $request)
    {
        $this->validate($request,[
            'sirket' => 'required|max:100',
            'name' => 'required|max:50',
            'elaqe_nomresi' => 'required|max:100',
            'email2' => 'required|max:50',
            'message' => 'required|max:10000',
        ],[],[
            'sirket' => __('contact.sirket'),
            'name' => __('contact.yourname'),
            'elaqe_nomresi' => __('contact.elaqe_nomresi'),
            'email2' => __('contact.email'),
            'message' => __('contact.yourmessage'),
        ]);

        $contact = Contact::create([
            'sirket' => $request->sirket,
            'name' => $request->name,
            'elaqe_nomresi' => $request->elaqe_nomresi,
            'email' => $request->email2,
            'message' => $request->message,
            'ip' => $request->ip()
        ]);

        $title = $contact->name . ' tərəfindən yeni elektron müraciət daxil oldu.';
        $text = '
            <table>
                <tr>
                    <td>Şirkət:</td>
                    <td>' . $contact->sirket . '</td>
                </tr>
                <tr>
                    <td>Ad,Soyad:</td>
                    <td>' . $contact->name . '</td>
                </tr>
                <tr>
                    <td>Əlaqə nömrəsi:</td>
                    <td>' . $contact->elaqe_nomresi . '</td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>' . $contact->email . '</td>
                </tr>
                <tr>
                    <td>Mesaj:</td>
                    <td>' . $contact->message . '</td>
                </tr>
            </table>
            ';

        $details = [
            'title' => $title,
            'body' => $text
        ];

        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->CharSet = "utf-8";
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Host = "in-v3.mailjet.com";
        $mail->Port = 587;
        $mail->Username = config('system.MAIL_USERNAME');
        $mail->Password = config('system.MAIL_PASSWORD');
        $mail->setFrom(config('system.MAIL_FROM_ADDRESS'), "noreply");
        $mail->Subject = $title;
        $mail->IsHTML(true);
        $mail->Body = view('emails.contact-mail', compact('details'))->render();
        $mail->addAddress(config('system.MAIL_TO_ADDRESS'), 'RS CODE');
        $mail->send();

        return response()->json([
            'message'=>__('contact.success_msg')
        ], 200);
    }
}
