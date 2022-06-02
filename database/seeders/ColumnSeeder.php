<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ColumnSeeder extends Seeder
{
    private $data;

    public function __construct() {
        $this->getData();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->deleteAll();
        foreach ($this->data as $key => $column) {
           $lastInsertedID =  DB::table('columns')->insertGetId($column);
            DB::table('cards')->insert(
                [
                    ['column_id' => $lastInsertedID, 'title' => 'Card '.$key++, 'description' => Str::random(10)],
                    ['column_id' => $lastInsertedID, 'title' => 'Card '.$key++, 'description' => Str::random(10)],
                    ['column_id' => $lastInsertedID, 'title' => 'Card '.$key++, 'description' => Str::random(10)],
                    ['column_id' => $lastInsertedID, 'title' => 'Card '.$key++, 'description' => Str::random(10)]
                ]
            );
        }
    }

    private function deleteAll() {
        DB::table('columns')->delete();
    }

    private function getData() {
        $timeStamp = \Carbon\Carbon::now();
        $this->data = [
            [
                'title' => 'Todo',
                'created_at' =>  $timeStamp,
                'updated_at' => $timeStamp,
            ],
            [
                'title' => 'Doing',
                'created_at' => $timeStamp,
                'updated_at' => $timeStamp,
            ],
            [
                'title' => 'Dev Done',
                'created_at' =>  $timeStamp,
                'updated_at' => $timeStamp,
            ],
            [
                'title' => 'Done',
                'created_at' =>  $timeStamp,
                'updated_at' => $timeStamp,
            ]
        ];
    }
}
