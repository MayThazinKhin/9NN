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
            $table->date('date');
            $table->text('remark')->nullable();
            $table->unsignedBigInteger('cash_id')->nullable();
            $table->unsignedBigInteger('type_id')->nullable();
            $table->boolean('is_confirmed')->default(true);
            $table->foreignId('account_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('cash_id')->references('id')->on('accounts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('type_id')->references('id')->on('accounts')->onDelete('cascade')->onUpdate('cascade');
            $table->nullableMorphs('ledgerable');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('ledgers');
    }
}
