<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->text('work_to_be_performed');
            $table->text('customer');
            $table->string('customer_name')->nullable();
            $table->boolean('showcustomer')->default(false);
            $table->string('construction_of')->nullable();
            $table->boolean('showconstruction')->default(false);
            $table->string('send_proposal_to')->nullable();
            $table->text('overseas_conditions')->nullable();
            $table->boolean('showoverseas')->default(false);
            $table->text('base')->nullable();
            $table->boolean('showbase')->default(false);
            $table->text('court_preparation')->nullable();
            $table->boolean('showcourt')->default(false);
            $table->text('surfacing')->nullable();
            $table->boolean('showsurfacing')->default(false);
            $table->text('fence')->nullable();
            $table->boolean('showfence')->default(false);
            $table->text('lights')->nullable();
            $table->boolean('showlights')->default(false);
            $table->text('court_accessories')->nullable();
            $table->boolean('showcourtaccessories')->default(false);
            $table->text('fee')->nullable();
            $table->boolean('showfee')->default(false);
            $table->text('provisions')->nullable();
            $table->boolean('showprovisions')->default(false);
            $table->text('conditions')->nullable();
            $table->boolean('showconditions')->default(false);
            $table->text('guarantee')->nullable();
            $table->boolean('showguarantee')->default(false);
            $table->text('credit')->nullable();
            $table->boolean('showcredit')->default(false);
            $table->string('signatureData')->nullable();
            $table->boolean('showsignature')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proposals');
    }
}
