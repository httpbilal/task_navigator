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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->unsignedBigInteger('assignee_id');
            $table->date('due_date');
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('project_id');
            $table->enum('priority', ['high', 'medium', 'low']);
            $table->dateTime('estimated_time');
            $table->dateTime('actual_time');
            $table->timestamps();

            $table->foreign('assignee_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
