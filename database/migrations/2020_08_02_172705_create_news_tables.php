<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNews extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->boolean('schedule', 1)->default(0);
            $table->text('title');
            $table->text('sub_title')->nullable();
            $table->text('slug')->nullable();
            $table->string('img', 255)->nullable();
            $table->text('detail');
            $table->text('embed')->nullable();
            $table->string('author', 50);
            $table->boolean('slide', 1)->default(0);
            $table->boolean('breaking', 1)->default(0);
            $table->boolean('futured', 1)->default(0);
            $table->bigInteger('hit')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('news');
    }

}
