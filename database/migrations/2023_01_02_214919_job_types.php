<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public static $table_name  = "job_types";

    public function up()
    {
        Schema::create(self::$table_name, function(Blueprint $table){
            $table->id()->autoIncrement();
            $table->string("name")->unique();
            $table->string('description')->nullable();
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
        Schema::dropIfExists(self::$table_name);
    }
};
