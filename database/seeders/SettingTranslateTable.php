<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class SettingTranslateTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setting_translations')->insert([
            [
            'setting_id'=>'1',
            'locale'=>'kh',
            'title'=>'អាជ្ញាធរសេវាហិរញ្ញវត្ថុមិនមែនធនាគារ'
            ],
            [
            'setting_id'=>'1',
            'locale'=>'en',
            'title'=>'NON-BANK FINANCIAL SERVICE AUTHORITY'
            ]
        ]);
    }
}
