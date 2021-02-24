<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('village_name');
            $table->string('model_type');
            $table->string('responsible_service_person')->nullable();
            $table->string('warranty')->nullable();
            $table->string('refer_new_customer')->nullable();
            $table->string('warranty_renewal')->nullable();
            $table->string('image')->nullable();
            $table->boolean('status')->default(1);
            $table->bigInteger('created_by')->default(0);
            $table->bigInteger('updated_by')->default(0); 
            $table->softDeletes();
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
        Schema::dropIfExists('customers');
    }
}
