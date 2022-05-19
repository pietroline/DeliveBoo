<?php

namespace App\Mail;

use App\Lead;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $lead;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Lead $_lead)
    {
        $this->lead = $_lead;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.sendEmail')
                    ->with([
                        "leadName" => $this->lead->name,
                        "leadPhone" => $this->lead->phone,
                        "leadAddress" => $this->lead->address,
                        "leadOrderInfo" => $this->lead->orderInfo,
                    ]);
    }
}
