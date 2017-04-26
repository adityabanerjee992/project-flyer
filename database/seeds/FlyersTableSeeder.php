<?php

use Illuminate\Database\Seeder;

class FlyersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Flyer::class, 50)->create();
        $this->command->info('flyers has been created :)');
    }
}
