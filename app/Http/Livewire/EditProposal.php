<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;

use App\Models\Proposal;
use Livewire\Component;

class EditProposal extends Component
{
    public Proposal $proposal;

    public $work_to_be_performed;
    public $customer;
    public $customer_name;
    public $construction_of;
    public $send_proposal_to;
    public $signatureData = ''; // Initialize the signature data property
    public $showoverseas = false;
    public $showbase = false;
    public $showcourt = false;
    public $showsurfacing = false;
    public $showfence = false;
    public $showlights = false;
    public $showcourtaccessories = false;
    public $showfee = false;
    public $showprovisions = false;
    public $showconditions = false;
    public $showguarantee = false;
    public $showcredit = false;
    public $showsignature = false;

    public $overseas_conditions = [
        'round_trip_airfare' => [
            'title' => 'The Customer is responsible for round trip airfare to _________________',
            'input' => true,
            'input_value' => "",
            'selected' => false,
        ],
        'freight_duty' => [
            'title' => 'The Customer is responsible for freight, duty and tax on all materials from Miami, Florida to the job site, unloaded and secured at site.',
            'input' => false,
            'input_value' => "",
            'selected' => false,
        ],
        'furnish_permits' => [
            'title' => 'The Customer will furnish any necessary permits, room & board, and vehicle transport.',
            'input' => false,
            'input_value' => "",
            'selected' => false,
        ],
        'taxes_due' => [
            'title' => 'The Customer is responsible for any taxes due in _________________ as a result of this work.',
            'input' => true,
            'input_value' => "",
            'selected' => false,
        ],
    ];

    public $base = [
        'area' => [
            'title' => 'Area to be approximately: _____________',
            'input' => true,
            'input_value' => "",
            'selected' => true,
            'checkbox' => false,
        ],
        'provide_cleared_site' => [
            'title' => 'The Customer will provide a cleared site with proper fill.',
            'input' => false,
            'input_value' => "",
            'selected' => false,
        ],
        'grade_sub_base' => [
            'title' => 'The Contractor will grade the sub-base to slope one inch in ten feet for drainage.',
            'input' => false,
            'input_value' => "",
            'selected' => false,
        ],
        'limerock_base' => [
            'title' => 'The Contractor will put in a six inch compacted to four inch limerock base rolled and compressed to grade.',
            'input' => false,
            'input_value' => "",
            'selected' => false,
        ],
        'asphalt_rolled' => [
            'title' => 'The Contractor will install one inch of asphalt rolled to a smooth finish to grade.',
            'input' => false,
            'input_value' => "",
            'selected' => false,
        ],
        'low_spots' => [
            'title' => 'The Contractor will test for low spots and correct those deeper than one sixteenth of an inch.',
            'input' => false,
            'input_value' => "",
            'selected' => false,
        ],
        'finished_asphalt' => [
            'title' => 'The Customer will furnish a finished asphalt area with proper slope and drainage.',
            'input' => false,
            'input_value' => "",
            'selected' => false,
        ],
        'note' => [
            'title' => 'Note: Additional fill required will be on a time and material basis.',
            'input' => false,
            'input_value' => "",
            'selected' => false,
        ],
    ];

    public $court_preparation = [
        'area' => [
            'title' => 'Area to be approximately: 60’ x 120’.',
            'input' => false,
            'input_value' => "",
            'selected' => true,
            'checkbox' => false,
        ],
        'clean_court' => [
            'title' => 'The Contractor will pressure clean court(s) as necessary.',
            'input' => false,
            'input_value' => "",
            'selected' => false,
        ],
        'patch_puddles' => [
            'title' => 'The Contractor will patch puddles within one eighth of an inch.',
            'input' => false,
            'input_value' => "",
            'selected' => false,
        ],
        'patch_cracks' => [
            'title' => 'The Contractor will patch existing cracks with highly flexible APT Qualicaulk.',
            'input' => false,
            'input_value' => "",
            'selected' => false,
        ],
        'patch_root_damaged' => [
            'title' => 'The Contractor will patch root damaged asphalt (inside fence line).',
            'input' => false,
            'input_value' => "",
            'selected' => false,
        ],
        'root_pruning' => [
            'title' => 'The Contractor recommends root pruning to prevent further root damage.',
            'input' => false,
            'input_value' => "",
            'selected' => false,
        ],
    ];

    public $surfacing = [
        'laykold_nusurf' => [
            'title' => '(___) coat(s) LAYKOLD NuSurf.',
            'input' => true,
            'input_value' => "",
            'selected' => true,
            'checkbox' => false,
        ],
        'laykold_colorflex' => [
            'title' => '(___) coat(s) LAYKOLD Colorflex (Customers choice of standard colors).',
            'input' => true,
            'input_value' => "",
            'selected' => true,
            'checkbox' => false,
        ],
        'deco_cushion' => [
            'title' => '(___) coat(s) DECO Cushion, ______ gallons.',
            'input' => true,
            'multiple_inputs' => [
                'coats' => [
                    'title' => 'coats',
                    'value' => ""
                ],
                'gallons' => [
                    'title' => 'gallons',
                    'value' => ""
                ]
            ],
            'input_value' => "",
            'selected' => true,
            'checkbox' => false,
        ],
        'two_tone_surface' => [
            'title' => 'Two-tone surface, inbound and apron, with full individual color through each color coat, is included in the fee below.',
            'input' => false,
            'input_value' => "",
            'selected' => false,
        ],
        'paint_playing_lines' => [
            'title' => 'The Contractor will paint two inch white playing lines to meet U.S.T.A. specifications (three inch base lines).',
            'input' => false,
            'input_value' => "",
            'selected' => false,
        ],
        'line_for_tennis' => [
            'title' => 'The Contractor will line for tennis to meet U.S.T.A. specifications. ',
            'input' => false,
            'input_value' => "",
            'selected' => false,
        ],
        'line_for_basketball' => [
            'title' => 'The Contractor will line for basketball.',
            'input' => false,
            'input_value' => "",
            'selected' => false,
        ],
        'line_for_pickleball' => [
            'title' => 'The Contractor will line for pickleball to meet U.S.A.P.A specifications.',
            'input' => false,
            'input_value' => "",
            'selected' => false,
        ],
        'install_agile' => [
            'title' => "The Contractor will install the AGILE TURF Surface, green as per manufacturer's specifications, including approximately (18) tons of green sand.
            AGILE TURF has a five year manufacturer's warranty.",
            'input' => false,
            'input_value' => "",
            'selected' => false,
        ],
    ];

    public $fence = [
        'install_pipe' => [
            'title' => 'The Contractor will install heavy duty SS 40 galvanized pipe framework with 3 inch O.D. terminal posts, 2-1/2 inch O.D. line posts, 1-5/8 inch O.D. top rail, and 1-5/8 inch O.D. bottom rail.',
            'input' => false,
            'input_value' => "",
            'selected' => false,
        ],
        'high_fence' => [
            'title' => 'The Contractor will install 10’ high fence; zinc coated heavy duty steel wire chain link with a green or black vinyl coating, (nine / eight / _____) gauge, 1 ¾” (OR_______) mesh, for a total of 216 (OR ________) running feet.',
            'input' => true,
            'multiple_inputs' => [
                'gauge' => [
                    'title' => 'gauge',
                    'value' => ""
                ],
                'mesh' => [
                    'title' => 'mesh',
                    'value' => ""
                ],
                'running_feet' => [
                    'title' => 'running feet',
                    'value' => ""
                ]
            ],
            'input_value' => "",
            'selected' => false,
        ],
        'fence_heavy_duty' => [
            'title' => 'All fence to be heavy duty construction.',
            'input' => false,
            'input_value' => "",
            'selected' => false,
        ],
        'fence_stretch_ends' => [
            'title' => 'Fence to stretch both ends  with diagonal corners with (4) 20 ft. returns. ',
            'input' => false,
            'input_value' => "",
            'selected' => false,
        ],
        'permacoat_color' => [
            'title' => 'The AMERISTAR Permacoat Color System, black or green fence framework in lieu of galvanized framework, is included in the fee below.',
            'input' => false,
            'input_value' => "",
            'selected' => false,
        ],
    ];

    public $lights = [
        'install_lights' => [
            'title' => 'The Contractor will furnish and install (number of lights) BLS (number of watts) watt LED fixtures, mounted on (_____) (_______) ft. high aluminum/steel light poles.',
            'input' => true,
            'multiple_inputs' => [
                'mounted_on' => [
                    'title' => 'mounted on',
                    'value' => ""
                ],
                'ft' => [
                    'title' => 'ft.',
                    'value' => ""
                ],
            ],
            'input_value' => "",
            'selected' => false,
        ],
        'install_wiring' => [
            'title' => 'The Contractor will install all necessary wiring.',
            'input' => false,
            'input_value' => "",
            'selected' => false,
        ],
        'outdoor_junction' => [
            'title' => 'The Contractor will install an outdoor junction box.',
            'input' => false,
            'input_value' => "",
            'selected' => false,
        ],
        'feed_to_bottom' => [
            'title' => 'The Customer is responsible for bringing the feed to the bottom of the poles.',
            'input' => false,
            'input_value' => "",
            'selected' => false,
        ],
        'hookup_feed' => [
            'title' => 'The Contractor will hook-up the feed to the fixtures.',
            'input' => false,
            'input_value' => "",
            'selected' => false,
        ],
        'install_anchor_bolts' => [
            'title' => "The Customer will install the Contractor's anchor bolts. ",
            'input' => false,
            'input_value' => "",
            'selected' => false,
        ],
        'furnish_materials' => [
            'title' => 'The Contractor will furnish materials only – Customer is responsible for installation.',
            'input' => false,
            'input_value' => "",
            'selected' => false,
        ],
    ];

    public $court_accessories = [
        'net_posts' => [
            'title' => 'The Contractor will install net posts to exceed U.S.T.A. specifications. Posts are 3 inch O.D. heavy duty galvanized steel, with green or black polyurethane powdercoat finish.',
            'input' => false,
            'input_value' => "",
            'selected' => false,
        ],
        'post_sleeves' => [
            'title' => 'Net post sleeves are set in concrete.',
            'input' => false,
            'input_value' => "",
            'selected' => false,
        ],
        'existing_sleeves' => [
            'title' => 'New net posts are set in existing sleeves.',
            'input' => false,
            'input_value' => "",
            'selected' => false,
        ],
        'paint_net_posts' => [
            'title' => 'The Contractor will paint the existing net posts.',
            'input' => false,
            'input_value' => "",
            'selected' => false,
        ],
        'install_agile_net' => [
            'title' => 'The Contractor will install (___) top quality AGILE tennis net(s) to meet U.S.T.A. specifications.',
            'input' => true,
            'input_value' => "",
            'selected' => false,
        ],
        'center_anchor' => [
            'title' => "The Contractor will install (___) center anchor(s). ",
            'input' => true,
            'input_value' => "",
            'selected' => false,
        ],
        'heavy_duty_straps' => [
            'title' => 'The Contractor will install (___) AGILE heavy-duty center strap(s).',
            'input' => true,
            'input_value' => "",
            'selected' => false,
        ],
    ];

    public $fee = [
        'agree_to_provide' => [
            'title' => 'The Contractor agrees to provide tools, materials, labor, supervision, and insurance to complete the above work for a sum of $__________________.',
            'input' => true,
            'input_value' => "",
            'selected' => false,
        ],
        'prices_in_dollars' => [
            'title' => 'All prices are in U.S. Dollars.',
            'input' => false,
            'input_value' => "",
            'selected' => false,
        ],
        'cost_of_permit' => [
            'title' => 'The Customer is responsible for the cost of permit and permit processing.',
            'input' => false,
            'input_value' => "",
            'selected' => false,
        ],
        'fee_to_review' => [
            'title' => 'The fee is subject to review if not accepted within (____________) days.',
            'input' => true,
            'input_value' => "",
            'selected' => false,
        ],
        'date' => [
            'title' => 'This proposal is dated _________________.',
            'input' => true,
            'input_value' => "",
            'selected' => false,
        ],
    ];

    public $provisions = [
        'first_payment' => [
            'title' => 'The Customer agrees to a first payment of $_________________ for Deposit.',
            'input' => true,
            'input_value' => "",
            'selected' => false,
        ],
        'second_payment' => [
            'title' => 'The Customer agrees to a second payment of $_________________ for Commencement of Works.',
            'input' => true,
            'input_value' => "",
            'selected' => false,
        ],
        'final_payment' => [
            'title' => 'The Customer agrees to a final payment of $_________________ within ten days after completion of above work.      ',
            'input' => true,
            'input_value' => "",
            'selected' => false,
        ],
    ];

    public $conditions = [
        'underground' => [
            'title' => 'The Contractor is not responsible for underground that is not marked.',
            'input' => false,
            'input_value' => "",
            'selected' => false,
        ],
        'furnish_access' => [
            'title' => 'The Customer will furnish access to the site for equipment and materials.',
            'input' => false,
            'input_value' => "",
            'selected' => false,
        ],
        'water_supply' => [
            'title' => 'The Customer agrees to provide a clean water supply and an electrical feed at job site for construction purposes.',
            'input' => false,
            'input_value' => "",
            'selected' => false,
        ],
        'acts_by_anyone' => [
            'title' => 'The Contractor accepts no responsibility for acts by anyone at job site except for those sub-contracted or employed by Agile Courts Construction Company, Inc.',
            'input' => false,
            'input_value' => "",
            'selected' => false,
        ],
    ];

    public $guarantee = [
        'guarantees_work' => [
            'title' => 'The Contractor guarantees all work against defects in workmanship or materials for a period of __________ years. (Contractor cannot guarantee against cracks reflecting through the new surface.)',
            'input' => true,
            'input_value' => "",
            'selected' => false,
        ],
        'no_repairs' => [
            'title' => 'The Contractor accepts no responsibility for repairs done by anyone except Agile Courts Construction Company, Inc.',
            'input' => false,
            'input_value' => "",
            'selected' => false,
        ],
    ];

    public $credit = [
        'right_to_file' => [
            'title' => 'If the Customer does not pay as agreed upon, the Contractor shall have the right to file a lien against the real estate for the amount of the work done. No further work shall be accomplished if installment payments are not made at the time specified. In the event it is necessary to employ the services of an attorney to secure payment, as per the terms of this agreement, then the Customer agrees to pay reasonable attorney fees. Interest of 1-1/2% per month will be charged on accounts past due.',
            'input' => false,
            'input_value' => "",
            'selected' => true,
            'checkbox' => false

        ],
    ];

    protected $rules = [
        'send_proposal_to' => 'required|email',
        'customer_name' => 'required',
        'construction_of' => 'required',
    ];

    public function mount($proposal)
    {
        $this->proposal = $proposal;

        $this->work_to_be_performed = $proposal->work_to_be_performed;
        $this->customer = $proposal->customer;
        $this->customer_name = $proposal->customer_name;
        $this->construction_of = $proposal->construction_of;
        $this->send_proposal_to = $proposal->send_proposal_to;
        $this->setValues($proposal->overseas_conditions, "overseas_conditions");
        $this->setValues($proposal->base, "base");
        $this->setValues($proposal->court_preparation, "court_preparation");
        $this->setValues($proposal->surfacing, "surfacing");
        $this->setValues($proposal->fence, "fence");
        $this->setValues($proposal->lights, "lights");
        $this->setValues($proposal->court_accessories, "court_accessories");
        $this->setValues($proposal->fee, "fee");
        $this->setValues($proposal->provisions, "provisions");
        $this->setValues($proposal->conditions, "conditions");
        $this->setValues($proposal->guarantee, "guarantee");
        $this->setValues($proposal->credit, "credit");
        $this->showoverseas = $proposal->showoverseas;
        $this->showbase = $proposal->showbase;
        $this->showcourt = $proposal->showcourt;
        $this->showsurfacing = $proposal->showsurfacing;
        $this->showfence = $proposal->showfence;
        $this->showlights = $proposal->showlights;
        $this->showcourtaccessories = $proposal->showcourtaccessories;
        $this->showfee = $proposal->showfee;
        $this->showprovisions = $proposal->showprovisions;
        $this->showconditions = $proposal->showconditions;
    }

    public function render()
    {
        return view('livewire.edit-proposal');
    }

    public function submit()
    {
        $this->validate();
        if ($this->proposal->signatureData) {
            unlink(public_path($this->proposal->signatureData));
        }

        // Save the signature image data to a file if needed
        $signatureImage = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $this->signatureData));
        $imagePath = 'images/' . uniqid() . '.png'; // Adjust the path as needed
        file_put_contents(public_path($imagePath), $signatureImage);
        // dd($imagePath);
        // dd($this->showoverseas);
        $this->proposal->update([
            'work_to_be_performed' => $this->work_to_be_performed,
            'customer' => $this->customer,
            'customer_name' => $this->customer_name,
            'construction_of' => $this->construction_of,
            'send_proposal_to' => $this->send_proposal_to,
            'overseas_conditions' => $this->overseas_conditions,
            'showoverseas' => $this->showoverseas,
            'base' => $this->base,
            'showbase' => $this->showbase,
            'court_preparation' => $this->court_preparation,
            'showcourt' => $this->showcourt,
            'surfacing' => $this->surfacing,
            'showsurfacing' => $this->showsurfacing,
            'fence' => $this->fence,
            'showfence' => $this->showfence,
            'lights' => $this->lights,
            'showlights' => $this->showlights,
            'court_accessories' => $this->court_accessories,
            'showcourtaccessories' => $this->showcourtaccessories,
            'fee' => $this->fee,
            'showfee' => $this->showfee,
            'provisions' => $this->provisions,
            'showprovisions' => $this->showprovisions,
            'conditions' => $this->conditions,
            'showconditions' => $this->showconditions,
            'guarantee' => $this->guarantee,
            'credit' => $this->credit,

            'signatureData' => $imagePath, // Store the image path in the database

        ]);

        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Proposal Updated Successfully!', 'title' => 'Success']
        );
    }

    public function setValues($array, $key_name)
    {
        foreach ($array as $key => $value) {
            $this->$key_name[$key]['selected'] = $value['selected'];
            if ($value['input']) {
                $this->$key_name[$key]['input_value'] = $value['input_value'];
            }

            if (isset($value['multiple_inputs']) && count($value['multiple_inputs']) > 0) {
                foreach ($value['multiple_inputs'] as $multi_key => $multi_input) {
                    $this->$key_name[$key]['multiple_inputs'][$multi_key]['value'] = $multi_input['value'];
                }
            }
        }
    }
}
