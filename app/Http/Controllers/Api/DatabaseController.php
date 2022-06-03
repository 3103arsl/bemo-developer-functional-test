<?php

namespace App\Http\Controllers\Api;


use Spatie\DbDumper\Databases\MySql;

class DatabaseController extends ApiController
{
    public function export() {
        return MySql::create()
            ->setDbName(env('DB_DATABASE'))
            ->setUserName(env('DB_USERNAME'))
            ->setPassword(env('DB_PASSWORD'))
            ->dumpToFile(time().'.sql');
    }
}
