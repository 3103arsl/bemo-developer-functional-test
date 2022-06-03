<?php

namespace App\Repositories;

use App\Models\Card;
use Illuminate\Database\Eloquent\Model;


class CardRepository extends BaseRepository {

    const CARD_RELATION = 'cards';
    public function __construct() {
        $this->model = new Card();
    }

    public function getAll(){
        return $this->model::get();
    }

}
