<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Http\Request;
use App\Mail\ProposalMail;
use Illuminate\Support\Facades\Mail;
use PDF;


class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        return view('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proposal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function show(Proposal $proposal)
    {
        $logo1Url = public_path('img/agile.jpg'); // Replace with the actual path to the image
        $logo2Url = public_path('img/text_logo.jpg'); // Replace with the actual path to the image
        $imagePath = public_path($proposal->signatureData);
        $data = [
            'proposal' => $proposal,
            'logo1Url' => $logo1Url,
            'logo2Url' => $logo2Url,
            'imagePath' => $imagePath,
        ];
        return view('proposal.pdf', compact('proposal', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function edit(Proposal $proposal)
    {
        return view('proposal.edit', ['proposal' => $proposal]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proposal $proposal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proposal = Proposal::findOrFail($id);

        // Delete the signature image file if it exists
        if ($proposal->signatureData) {
            $imagePath = public_path($proposal->signatureData);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $proposal->delete();
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }
    public function generatePdf(Proposal $proposal)
    {
        $logo1Url = public_path('img/agile.jpg');
        $logo2Url = public_path('img/text_logo.jpg');
        $imagePath = public_path($proposal->signatureData);

        $data = [
            'proposal' => $proposal,
            'logo1Url' => $logo1Url,
            'logo2Url' => $logo2Url,
            'imagePath' => $imagePath,
        ];

        $pdf = PDF::loadView('livewire.proposal-pdf', compact('data', 'proposal'));
        return $pdf->download('proposal_' . $proposal->id . '.pdf');
    }

    public function sendProposalEmail(Proposal $proposal)
    {
        // Get the $data array with logos and other data
        $logo1Url = public_path('img/agile.jpg');
        $logo2Url = public_path('img/text_logo.jpg');
        $imagePath = public_path($proposal->signatureData);
        $data = [
            'proposal' => $proposal,
            'logo1Url' => $logo1Url,
            'logo2Url' => $logo2Url,
            'imagePath' => $imagePath,
        ];

        // Generate the PDF content using the livewire.proposal-pdf view
        $pdf = PDF::loadView('livewire.proposal-pdf', compact('data', 'proposal'));
        $pdfContent = $pdf->output();

        // Send the email with the PDF attached
        Mail::to($proposal->send_proposal_to)->send(new ProposalMail($proposal, $data, $pdfContent));

        return redirect()->back()->with('message', 'Proposal email sent successfully.');
    }
}
