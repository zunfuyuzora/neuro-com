<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progress', function (Blueprint $table) {
            $table->char('id')->primary();
            $table->char('content_id');
            $table->foreign('content_id')->references('id')->on('contents')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->enum('status', ['fresh', 'ongoing', 'finish', 'failed']);
            $table->dateTime('due_date');
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
        Schema::dropIfExists('progress');
    }
}
