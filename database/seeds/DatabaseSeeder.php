<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(AboutSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(NotificationSeeder::class);
    }
}
