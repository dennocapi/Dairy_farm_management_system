<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMilkRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('milk_records', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cow_id');
            $table->string('cow_name');
            $table->date('day');
            $table->float('morning');
            $table->float('afternoon');
            $table->float('evening');
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
        Schema::dropIfExists('milk_records');
    }
}
