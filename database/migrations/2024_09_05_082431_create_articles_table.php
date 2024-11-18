<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('articles')) {
            Schema::create('articles', function (Blueprint $table) {
                $table->id('ArticleID');
                $table->string('Title');
                $table->text('Content');
                $table->string('Image')->nullable();
                $table->dateTime('DateTimeOfPublication')->nullable();
                $table->string('CategoryArticle', 100)->nullable();
                $table->string('Tags')->nullable();
                $table->unsignedBigInteger('AuthorID')->nullable();
                $table->foreign('AuthorID')->references('id')->on('admins')->onDelete('set null');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
