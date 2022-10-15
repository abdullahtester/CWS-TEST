<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->text('address')->nullable();
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('resume')->nullable();
            $table->string('applicant_photo')->nullable();
            $table->bigInteger('added_by')->default(0)->unsigned();
            $table->dateTimeTz('added_at')->useCurrent();
            $table->bigInteger('updated_by')->default(0)->unsigned();
            $table->dateTimeTz('updated_at')->useCurrentOnUpdate()->nullable();
            $table->softDeletesTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applicants');
    }
}
