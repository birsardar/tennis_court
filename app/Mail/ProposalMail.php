<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProposalMail extends Mailable
{
    use SerializesModels;

    public $proposal;
    public $data;
    public $pdfContent;

    public function __construct($proposal, $data, $pdfContent)
    {
        $this->proposal = $proposal;
        $this->data = $data;
        $this->pdfContent = $pdfContent;
    }

    public function build()
    {
        return $this->subject('New Proposal')
            ->view('emails.proposal') // Use your email template view
            ->attachData($this->pdfContent, 'proposal.pdf', [
                'mime' => 'application/pdf',
            ])
            ->with([
                'proposal' => $this->proposal,
                'data' => $this->data,
            ]);
    }
}
