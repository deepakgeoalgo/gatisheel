<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstallationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('year');
            $table->string('village_name');
            $table->string('model_type');
            $table->text('installtion_address')->nullable();
            $table->string('installtion_machine_number')->nullable();
            $table->string('installtion_phone')->nullable();
            $table->string('installtion_date');
            $table->string('image')->nullable();
            $table->string('invoice_value')->nullable();
            $table->boolean('status')->default(1);
            $table->bigInteger('created_by')->default(0);
            $table->bigInteger('updated_by')->default(0); 
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('installations');
    }
}
