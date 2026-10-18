<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        foreach (glob(__DIR__.'/*Seeder.php') as $file) {
            $class = 'Database\\Seeders\\'.basename($file, '.php');

            if ($class !== self::class) {
                $this->call($class);
            }
        }
    }
}
