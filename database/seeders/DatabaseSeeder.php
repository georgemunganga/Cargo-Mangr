<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Setting\Database\Seeders\SettingTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            // SettingTableSeeder::class
            NwcReportPermissionSeeder::class,
            RefundPermissionSeeder::class,
        ]);
    }
}
