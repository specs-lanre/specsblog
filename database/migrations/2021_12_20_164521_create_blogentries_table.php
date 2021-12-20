<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogentriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogentries', function (Blueprint $table) {
            $table->id();
            $table->string('topic');
            $table->string('summary');
            $table->string('content');
            $table->string('author');
            $table->string('imagepath');
            $table->timestamp('created_at')->useCurrent();
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogentries');
    }
}
