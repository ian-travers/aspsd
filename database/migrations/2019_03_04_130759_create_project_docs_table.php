<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectDocsTable extends Migration
{
    public function up()
    {
        Schema::create('project_docs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('project_id');
            $table->string('name');
            $table->string('organization')->nullable();
            $table->timestamp('doc_date')->nullable();
            $table->string('signer_name')->nullable();

            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_docs');
    }
}
