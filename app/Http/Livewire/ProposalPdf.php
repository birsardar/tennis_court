<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Proposal;

class ProposalPdf extends Component
{
    public $proposal;
    public $logo1Url;
    public $logo2Url;

    public function render()
    {
        $logo1Url = public_path('img/aglie_courts_logo.jpg'); // Replace with the actual path to the image
        $logo2Url = public_path('img/text_logo.jpg'); // Replace with the actual path to the image
        $data = [
            'logo1Url' => $logo1Url,
            'logo2Url' => $logo2Url,
        ];

        return view('livewire.proposal-pdf', compact('data'));
    }
}
