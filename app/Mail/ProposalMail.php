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

    public function __construct($proposal, $data)
    {
        $this->proposal = $proposal;
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject('New Proposal')
            ->view('proposal.pdf') // Use your email template view
            ->with([
                'proposal' => $this->proposal,
                'data' => $this->data,
            ]);
    }
}
