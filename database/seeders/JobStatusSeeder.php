<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JobStatusSeeder extends Seeder
{

    public static $table_name  = "job_statuses";
    public static $seedData = [
                    [
                        'name' => "Active",
                        'description' => 'Active status',
                    ],
                    [
                        'name' => "Expired",
                        'description' => 'Active status',
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
