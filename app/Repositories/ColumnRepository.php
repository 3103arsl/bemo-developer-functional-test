<?php

namespace App\Repositories;

use App\Models\Column;

class ColumnRepository extends BaseRepository {

    const CARD_RELATION = 'cards';
    public function __construct() {
        $this->model = new Column();
    }

    public function getAll(){
        return $this->model::paginate(10);
    }

}
