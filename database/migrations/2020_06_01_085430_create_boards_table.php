<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boards', function (Blueprint $table) {
            $table->char('id')->primary();
            $table->char('member_id');
            $table->char('group_id');
            $table->foreign('member_id')->references('id')->on('members')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->foreign('group_id')->references('id')->on('groups')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->string('name');
            $table->string('objective');
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
        Schema::dropIfExists('boards');
    }
}
