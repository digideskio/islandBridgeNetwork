<?php

/**
 * Model use to manage the history calls
 * @added on the 25/10/2016
 * @author Yann Robin
 * @copyright Yann Robin
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Rate;

class HistoryCall extends Model
{
    protected $table = 'cdrs';

    public function getId() {
        return $this->id;
    }

    public function getCustId() {
        return $this->cust_id;
    }

    public function getCallFrom() {
        return $this->call_from;
    }

    public function getCallTo() {
        return $this->call_to;
    }

    public function getCallStart() {
        return $this->call_start;
    }

    public function getCallDuration() {
        return $this->call_duration;
    }

    /**
     * Get the total cost of all the history for a user
     * @added on the 25/10/2016
     * @author Yann Robin
     * @return cost
     */
    public function getTotalCost() {
        $listHistory = self::where('cust_id', '=', $this->getCustId())->get();
        $costUser = 0;
        foreach ($listHistory as $history){
            $costUser = $costUser + $history->getCost();
        }
        return $costUser;
    }


    /**
     * get the cost for an history call
     * @added on the 25/10/2016
     * @author Yann Robin
     * @return cost
     */
    public function getCost() {
        $rate = Rate::getCostForAPrefix($this->getCallTo());
        $minute = ceil($this->getCallDuration()/60);
        $costCall = $rate * $minute;

        return $costCall;
    }

    /**
     * get the daily cost for a customer
     * @added on the 25/10/2016
     * @author Yann Robin
     * @param int $id_cust customer to target
     * @return array date => cost
     */
    public static function getDailyTotalCostForCustomer($id_cust) {
        $listHistory = self::where('cust_id', '=', $id_cust)->get();

        $arrayDate = array();
        foreach ($listHistory as $history){
            $date = date("Y-m-d", strtotime($history->getCallStart()));
            if(isset($arrayDate[$date])){
                $arrayDate[$date] = $arrayDate[$date] + $history->getCost();
            }
            else{
                $arrayDate[$date] = $history->getCost();
            }

        }
        return $arrayDate;
    }

    /**
     * get all the calls history for a date
     * @added on the 25/10/2016
     * @author Yann Robin
     * @param date $date date to target
     * @return array
     */
    public static function getHistoryForADate($date) {
        $listHistory = self::whereBetween('call_start', [$date.' 00:00:00', $date.' 23:59:59'])->get();

        return $listHistory;
    }
}
