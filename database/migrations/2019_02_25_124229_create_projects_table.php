<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('client_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('author_supervisor_name')->nullable();
            $table->timestamp('init_info_deadline_at')->nullable();
            $table->timestamp('issue_deadline_at')->nullable();
            $table->timestamp('expertise_deadline_at')->nullable();
            $table->timestamp('init_info_got_at')->nullable();
            $table->timestamp('issued_at')->nullable();
            $table->timestamp('expertise_passed_at')->nullable();
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
