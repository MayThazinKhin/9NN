<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLedgersTable extends Migration
{
    public function up()
    {
        Schema::create('ledgers', function (Blueprint $table) {
            $table->id();
            $table->double('value');
            $table->dateTime('date');
            $table->foreignId('account_id')->constrained()->onDelete('cascade');
            $table->nullableMorphs('ledgerable');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('ledgers');
    }
}
