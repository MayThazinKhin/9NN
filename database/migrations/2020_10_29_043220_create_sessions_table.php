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
            $table->double('credit')->default(0.0);
            $table->boolean('is_tax')->default(false);
            $table->foreignId('table_id')->constrained()->onDelete('cascade');
            $table->foreignId('marker_id')->constrained()->onDelete('cascade');
            $table->foreignId('admin_id')->nullable()->constrained()->onDelete('cascade');
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
