<?php
/**
 * @since       v0.1.0
 * @package     Dev-PHP
 * @author      Andre Board <dre.board@gmail.com>
 * @version     v1.0
 * @access      public
 * @see         https://github.com/dreboard
 */

namespace App\Repositories;


use Exception;
use Illuminate\Support\Facades\DB;

class CoinYearRepository
{

    private const START_YEAR = 1793;


    /**
     * Get list of same coin by year
     * @param int $year
     * @return array
     * @throws \Exception
     */
    public function coinSameByYear(int $type_id, int $year)
    {
        if (!in_array($year, range(self::START_YEAR, date('Y')), true)) {
            $year = self::START_YEAR;
        }
        $coins = [];
        $coins['list'] = DB::select('call CoinsGetSameYearByID(?,?)',array($type_id, $year));
        $coins['currentYear'] = $year;
        $coins['nextYear'] = $year +1;
        $coins['prevYear'] = $year -1;
        return $coins;
    }

    /**
     * Get list of coins by year
     * @param int $year
     * @return array
     * @throws \Exception
     */
    public function coinAllByYear(int $year)
    {
        if (!in_array($year, range(self::START_YEAR, date('Y')), true)) {
            $year = self::START_YEAR;
        }
        $coinYears = [];
        $coinYears['list'] = DB::select('call CoinGetAllFromYear(?)',array($year));
        $coinYears['currentYear'] = $year;
        $coinYears['nextYear'] = $year +1;
        $coinYears['prevYear'] = $year -1;
        return $coinYears;
    }
}
