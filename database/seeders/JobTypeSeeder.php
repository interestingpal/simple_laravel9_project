<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobTypeSeeder extends Seeder
{
    public static $table_name  = "job_types";
    public static $seedData = [
                    [
                        'name' => "Full time",
                        'description' => ' ',
                    ],
                    [
                        'name' => "Contract",
                        'description' => ' ',
                    ]
                    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(self::$table_name)->insert(self::$seedData);
    }
}
