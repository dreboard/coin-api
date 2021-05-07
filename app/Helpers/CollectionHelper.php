<?php


namespace App\Helpers;


use DateTime;

class CollectionHelper
{




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
