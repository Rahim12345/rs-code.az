<?php

namespace App\Listeners;

use App\Events\FreeSeoAuditEvent;
use App\Mail\FreeSeoAuditEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class FreeSeoAuditEmailNotofication
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  FreeSeoAuditEvent  $event
     * @return void
     */
    public function handle(FreeSeoAuditEvent $event)
    {
        $title                  = $event->free_seo_event->email.' tərəfindən yeni Pulsuz SEO Audit təklifi.';
        $text                   = '
            <table>
                <tr>
                    <td>Sayt-url:</td>
                    <td>'.$event->free_seo_event->url.'</td>
                </tr>
                <tr>
                    <td>E-mail:</td>
                    <td>'.$event->free_seo_event->email.'</td>
                </tr>
                <tr>
                    <td>Telefon:</td>
                    <td>'.$event->free_seo_event->tel.'</td>
                </tr>
            </table>
            ';

        $details = [
            'title' => $title,
            'body'  => $text
        ];

        Mail::to('adpuuniversitet@gmail.com')->send(new FreeSeoAuditEmail($details));
    }
}
