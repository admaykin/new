<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssueSprint extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues_sprints', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('issue_name')->index();
            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->enum('issue_type', array('simple', 'agile'));
            $table->enum('issue_priority', array('Highest', 'High', 'Low', 'Lowest'));
            $table->timestamp('deadline')->nullable();
            $table->longText('description');
            $table->integer('assignee')->unsigned();
            $table->integer('reporter')->unsigned();
            $table->foreign('assignee')->references('id')->on('users');
            $table->foreign('reporter')->references('id')->on('users');
            $table->timestamp('original_estimate');
            $table->timestamp('remaining_estimate');
            $table->integer('sprint_id')->unsigned();
            $table->foreign('sprint_id')->references('id')->on('sprints')->onDelete('cascade');
            $table->enum('issue_status', array('ToDo', 'inProgress', 'Done'));
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('issues_sprints');
    }

}
