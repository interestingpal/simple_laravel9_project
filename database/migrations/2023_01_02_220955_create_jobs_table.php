<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\Emirates;

return new class extends Migration
{

    public static $table_name  = "jobs";
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::$table_name, function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('company');
            $table->string('emirates')->default(Emirates::DUBAI->value);
            $table->longText('address');
            $table->unsignedBigInteger('job_type_id');
            $table->unsignedBigInteger('job_status_id');
            $table->longText('description');
            $table->date('expiration_date');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;
            $table->foreign('job_type_id')->references('id')->on('job_types')->onDelete('cascade');;
            $table->foreign('job_status_id')->references('id')->on('job_statuses')->onDelete('cascade');;

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
