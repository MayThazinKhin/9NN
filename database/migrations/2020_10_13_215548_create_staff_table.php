<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use Database\Seeders\StaffSeeder;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->char('name',200);
            $table->char('password',200);
            $table->double('fee')->default(0.0);
            $table->double('fee_paid')->default(0.0);
            $table->double('marker_fee')->default(0.0);
            $table->foreignId('role_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
        Artisan::call('db:seed', [
            '--class' =>StaffSeeder::class
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff');
    }
}
