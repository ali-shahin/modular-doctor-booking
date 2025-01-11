<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlotsTable extends Migration
{
    public function up()
    {
        Schema::create('slots', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->dateTime('time');
            $table->uuid('doctor_id');
            $table->string('doctor_name');
            $table->boolean('is_reserved')->default(false);
            $table->decimal('cost', 8, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('slots');
    }
}
