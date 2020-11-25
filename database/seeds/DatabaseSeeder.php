<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

    /**
     * $table to seed
     * @var array
     */
    protected $table = [
        'users',
        'court_holidays',
    ];

    /**
     * call all seeder class
     * @var [type]
     */
    protected $seeder = [
        'UserTableSeeder',
        'CourtHolidayTableSeeder',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->cleanDatabase();

        foreach($this->seeder as $seedClass)
        {
            $this->call($seedClass);
        }
    }

    /**
     * trucate the database for a new seed
     *
     * @return
     */
    protected function cleanDatabase()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        foreach($this->table as $table)
        {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}