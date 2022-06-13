<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('area_id')->unsigned();
            $table->string('address');
            $table->tinyInteger('bottles_sent');
            $table->tinyInteger('bottles_received');
            $table->tinyInteger('amount');
            $table->enum('paid', [1, 0])->default(0);
            $table->string('rider_name')->nullable();
            $table->text('notes')->nullable();
            $table->enum('is_monthly', [1, 0])->default(0);
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
        Schema::dropIfExists('entries');
    }
}
