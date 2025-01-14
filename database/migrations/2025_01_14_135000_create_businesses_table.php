<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessesTable extends Migration
{
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->string('business_name');
            $table->string('physical_location');
            $table->string('email')->unique();
            $table->string('telephone_number');
            $table->string('tin')->nullable(); // Tax Identification Number
            $table->string('vrn')->nullable(); // VAT Registration Number
            $table->string('po_box')->nullable();
            $table->text('footer_description')->nullable();
            $table->string('period')->nullable();
            $table->string('logo')->nullable(); // Path to the logo file
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('businesses');
    }
}
