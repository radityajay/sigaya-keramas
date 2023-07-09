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
        Schema::table('cagar_budayas', function (Blueprint $table) {
            $table->string('opened')->nullable();
            $table->string('closed')->nullable();
            $table->longText('additional_info')->nullable();
            $table->longText('address')->nullable();
            $table->string('color')->nullable();
            $table->string('ticket')->nullable();
            $table->longText('info_ticket')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('email')->nullable();
            $table->string('contact_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
