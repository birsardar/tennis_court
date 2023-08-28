<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'work_to_be_performed',
        'customer',
        'customer_name',
        'showcustomer',
        'construction_of',
        'showconstruction',
        'send_proposal_to',
        'showsend',
        'overseas_conditions',
        'showoverseas',
        'base',
        'showbase',
        'court_preparation',
        'showcourt',
        'surfacing',
        'showsurfacing',
        'fence',
        'showfence',
        'lights',
        'showlights',
        'court_accessories',
        'showcourtaccessories',
        'fee',
        'showfee',
        'provisions',
        'showprovisions',
        'conditions',
        'showconditions',
        'guarantee',
        'showguarantee',
        'credit',
        'showcredit',
        'signatureData',
        'showsignature',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
