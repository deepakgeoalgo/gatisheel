<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechniciansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('technicians', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('pan')->nullable();
            $table->string('gstn')->nullable();  
            $table->text('address');
            $table->string('district');
            $table->string('state');
            $table->string('pincode');
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('technicians');
    }
}
