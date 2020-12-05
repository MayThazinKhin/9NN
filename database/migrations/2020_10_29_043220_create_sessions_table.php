<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->dateTime('start_time');
            $table->dateTime('end_time')->nullable();
            $table->double('total')->default(0.0);
            $table->double('net_value')->default(0.0);
            $table->double('paid_value')->default(0.0);
            $table->double('credit')->default(0.0);
            $table->double('discount')->default(0.0);
            $table->double('change')->default(0.0);
            $table->double('tax')->default(0.0);
            $table->boolean('is_tax')->default(false);
            $table->boolean('is_done')->default(false);
            $table->foreignId('table_id')->constrained()->onDelete('cascade');
            $table->foreignId('marker_id')->constrained('staff')->onDelete('cascade');
            $table->foreignId('cashier_id')->nullable()->constrained('staff')->onDelete('cascade');
            $table->foreignId('member_id')->nullable()->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('sessions');
    }
}
