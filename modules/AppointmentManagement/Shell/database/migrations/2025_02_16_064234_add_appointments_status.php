<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class AddAppointmentsStatus
 * 
 * This migration adds a status column to the appointments table.
 * 
 * to refresh the database run the following command:
 * php artisan migrate:refresh --path=modules/AppointmentManagement/Shell/database/migrations
 */
return new class extends Migration
{
    public function up()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->integer('status')->default('0');
        });
    }

    public function down()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
