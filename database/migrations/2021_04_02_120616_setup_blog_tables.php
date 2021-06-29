<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SetupBlogTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('blog_posts', function(Blueprint $table) {
            
            $table->id();
            $table->string('title');
            $table->string('slug')->index();
           
            $table->text('content');
            $table->text('summary');

            $table->integer('type_id')->nullable()->index();

            $table->timestamp('publish_start')->nullable()->index();
            $table->timestamp('publish_end')->nullable()->index();
            $table->integer('publishable')->index();

            $table->timestamps();
        });

        Schema::create('blog_tags', function(Blueprint $table) {
            $table->id();
            $table->string('tag');
            $table->string('slug')->index();
            $table->timestamps();
        });

        Schema::create('blog_post_tags', function(Blueprint $table) {
            $table->id();
            $table->integer('post_id')->index();
            $table->integer('tag_id')->index();
            $table->timestamps();
        });

        Schema::create('blog_authors', function(Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->index();
            $table->text('bio')->nullable();
            $table->timestamps();
        });

        Schema::create('blog_post_authors', function(Blueprint $table) {
            $table->id();
            $table->integer('post_id')->index();
            $table->integer('author_id')->index();
            $table->integer('sort')->default(0)->index();
            $table->timestamps();
        });

        Schema::create('blog_types', function(Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('slug')->index();
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
        //
        Schema::drop('blog_posts');
        Schema::drop('blog_tags');
        Schema::drop('blog_types');
        Schema::drop('blog_authors');
        Schema::drop('blog_post_tags');
        Schema::drop('blog_post_authors');



    }
}
