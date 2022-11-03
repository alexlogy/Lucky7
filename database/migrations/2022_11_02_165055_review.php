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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            //$table->index('paper_id')->unsigned();
            //$table->foreign('paper_id')->references('id')->on('papers')->onDelete('cascade');
            $table->foreignIdFor(\App\Models\Paper::class);
            $table->foreignIdFor(\App\Models\User::class);
            //$table->index('user_id')->unsigned();
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('paper_rating');
            $table->string('review_status');
            $table->integer('review_rating');
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
        Schema::dropIfExists('reviews');
    }
};
