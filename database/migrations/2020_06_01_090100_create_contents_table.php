<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->char('id')->primary();
            $table->char('member_id');
            $table->char('board_id')->nullable();
            $table->char('group_id'); 
            $table->foreign('member_id')->references('id')->on('members')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->foreign('board_id')->references('id')->on('boards')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->foreign('group_id')->references('id')->on('groups')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->text('head');
            $table->text('body');
            $table->enum('type',['magazine','module', 'task']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contents');
    }
}
