<?php

namespace App\Repositories;

use App\Models\Card;


class CardRepository extends BaseRepository {

    const COLUMN_RELATION       = 'column';
    public function __construct(Card $card) {
    }

}
