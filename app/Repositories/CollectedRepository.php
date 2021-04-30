<?php
/**
 * @since       v0.1.0
 * @package     Dev-PHP
 * @author      Andre Board <dre.board@gmail.com>
 * @version     v1.0
 * @access      public
 * @see         collected.sql
 */

namespace App\Repositories;


use DateTime;
use Illuminate\Support\Facades\DB;

class CollectedRepository
{


    /**
     * @param int $id
     * @return array
     */
    public function collectionGetCoinsByID(int $id, int $user)
    {
        return DB::select('call CollectionGetCoinsByID(?, ?)', [$id, $user]);
    }

    public function getCollectedByType(int $type_id)
    {

    }

    /**
     * @return array[]
     */
    static public function collected()
    {
        return [
            0 => [
                'id' => 1,
                'userID' => 1,
                'coinID' => 1,
                'coinGrade' => 'MS-64',
                'enterDate' => (new DateTime())->format('Y-m-d'),
                'purchasePrice' => '123.56',
                'nickName' => 'The Coin'
            ]

        ];
    }

}
