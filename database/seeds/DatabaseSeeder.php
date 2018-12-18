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
		DB::table('products')->insert([
					['name' => 'Shower Gel','price' => 4.85],
					['name' => 'Tooth Paste','price' => 3.15],
					['name' => 'Juice','price' => 1.05]
		]);
		
		DB::table('auths')->insert([
					['token' => 'xM2kC8wM7sY5eE7kV3pD4sL4xQ2kX5aN6rV1yR0yO2pD4mQ4iS'],
					['token' => 'iDbRRVBM7pVYR6ZaCzt0tTn17hIMrjP4']
		]);
    }
}
