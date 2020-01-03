<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    private $numberOfMenus = 5;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Menu::class, $this->numberOfMenus)->create();
    }
}
