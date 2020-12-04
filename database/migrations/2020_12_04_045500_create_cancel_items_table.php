<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCancelItemsTable extends Migration
{
    public function up()
    {
        Schema::create('cancel_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained()->onDelete('cascade');
            $table->foreignId('session_id')->constrained()->onDelete('cascade');
            $table->double('count');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cancel_items');
    }
}
