<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('code');
            $table->double('value')->default(0.0);
            $table->boolean('is_archived')->default(false);
            $table->boolean('is_categorized')->default(false);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
