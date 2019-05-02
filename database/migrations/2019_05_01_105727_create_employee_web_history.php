<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeWebHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_web_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->ipAddress('ip_address');
            $table->longText('url');
            $table->date('date');
            $table->dateTime('created_at');

            // Add foreign key to map to employees table
            $table->foreign('ip_address')->references('ip_address')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_web_history', function (Blueprint $table) {
            // drop foreign key before dropping table
            $table->dropForeign('employees_ip_address_foreign');
        });
    }
}
