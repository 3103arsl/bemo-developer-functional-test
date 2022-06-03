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
                    ['column_id' => $lastInsertedID, 'title' => 'Card '.$key++, 'description' => $this->getDescripton()],
                    ['column_id' => $lastInsertedID, 'title' => 'Card '.$key++, 'description' => $this->getDescripton()],
                    ['column_id' => $lastInsertedID, 'title' => 'Card '.$key++, 'description' => $this->getDescripton()],
                    ['column_id' => $lastInsertedID, 'title' => 'Card '.$key++, 'description' =>$this->getDescripton()]
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

    private function getDescripton() {
        return 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ultricies suscipit neque, at pellentesque nisi fermentum non. Donec tristique maximus enim, vel hendrerit ex tincidunt vel. Mauris viverra ipsum pulvinar sem hendrerit, ut accumsan odio convallis. Proin ligula sapien, vehicula in tortor sed, consequat luctus augue. Cras neque mauris, placerat in elit vitae, aliquet mattis dolor. Mauris rutrum eros imperdiet sapien pulvinar, at viverra ipsum scelerisque. Praesent dictum posuere iaculis. In sapien odio, pellentesque id ante eu, vulputate venenatis enim. In a ipsum eu lorem feugiat efficitur eu at sapien. Aliquam nec commodo nibh. Donec facilisis justo eget sapien euismod, ac commodo nibh consequat.';
    }
}
