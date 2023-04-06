<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeBlogAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_blog_areas', function (Blueprint $table) {
            $table->id();
            $table->text('headline_one');
            $table->longText('short_description');
            $table->text('headline_two');
            $table->longText('long_description');
            $table->string('blog_front_photo');
            $table->string('blog_display_photo');
            $table->string('blog_photo');
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
        Schema::dropIfExists('home_blog_areas');
    }
}
