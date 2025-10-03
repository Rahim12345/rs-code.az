<?php

namespace App\Http\Controllers;

use App\Events\FreeSeoAuditEvent;
use App\Http\Requests\FreeSeoAuditRequest;
use App\Models\FreeSeoAudit;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class FreeSeoAuditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FreeSeoAuditRequest $request
     * @return JsonResponse
     * @throws Exception
     */
    public function store(FreeSeoAuditRequest $request)
    {
        $free_seo_event = FreeSeoAudit::create([
            'url'=>$request->url,
            'email'=>$request->email3,
            'tel'=>$request->tel
        ]);

        $title                  = $free_seo_event->email.' tərəfindən yeni Pulsuz SEO Audit təklifi.';
        $text                   = '
            <table>
                <tr>
                    <td>Sayt-url:</td>
                    <td>'.$free_seo_event->url.'</td>
                </tr>
                <tr>
                    <td>E-mail:</td>
                    <td>'.$free_seo_event->email.'</td>
                </tr>
                <tr>
                    <td>Telefon:</td>
                    <td>'.$free_seo_event->tel.'</td>
                </tr>
            </table>
            ';

        $details = [
            'title' => $title,
            'body'  => $text
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FreeSeoAudit  $freeSeoAudit
     * @return \Illuminate\Http\Response
     */
    public function show(FreeSeoAudit $freeSeoAudit)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FreeSeoAudit  $freeSeoAudit
     * @return \Illuminate\Http\Response
     */
    public function edit(FreeSeoAudit $freeSeoAudit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Models\FreeSeoAudit  $freeSeoAudit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FreeSeoAudit $freeSeoAudit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FreeSeoAudit  $freeSeoAudit
     * @return \Illuminate\Http\Response
     */
    public function destroy(FreeSeoAudit $freeSeoAudit)
    {
        //
    }
}
