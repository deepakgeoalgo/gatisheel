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
            $table->string('issue_date');
            $table->text('issue_description')->nullable();
            $table->string('current_status')->nullable();
            $table->string('ownership')->nullable();
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
        Schema::dropIfExists('create_issues');
    }
}
