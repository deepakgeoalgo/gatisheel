<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('create_issues', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('current_status')->default(0);
            $table->unsignedBigInteger('installation_id')->nullable();
            $table->unsignedBigInteger('ownership');
            $table->unsignedBigInteger('assign_to')->nullable();
            $table->string('issue_date');                      
            $table->text('issue_description')->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('deleted')->default(0);
            $table->bigInteger('created_by')->default(0);
            $table->bigInteger('updated_by')->default(0);
            $table->softDeletes();     
            $table->timestamps();
            $table->foreign('current_status')->references('id')->on('statuses')->onDeteted('cascade');
            $table->foreign('assign_to')->references('id')->on('users')->onDeteted('cascade');
            $table->foreign('ownership')->references('id')->on('users')->onDeteted('cascade');
            $table->foreign('installation_id')->references('id')->on('installations')->onDeteted('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('create_issues');
    }
}
