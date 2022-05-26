<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_admin')->default(0);
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->bigInteger('anual_income')->nullable();
            $table->string('occupation')->nullable();
            $table->string('family_type')->nullable();
            $table->boolean('is_manglik')->nullable(); 
            $table->bigInteger('partner_anual_income_range_from')->nullable();
            $table->bigInteger('partner_anual_income_range_to')->nullable();
            $table->string('partner_occupation')->nullable();
            $table->string('partner_family_type')->nullable();
            $table->boolean('is_partner_manglik')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
