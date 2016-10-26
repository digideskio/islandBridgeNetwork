<?php

/**
 * Model use to manage the rate
 * @added on the 25/10/2016
 * @author Yann Robin
 * @copyright Yann Robin
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $table = 'rate';

    public function getId() {
        return $this->id;
    }

    public function getPrefix() {
        return $this->prefix;
    }

    public function getRate() {
        return $this->rate;
    }

    /**
     * Get the cost depending to the prefix of the phone number
     * @added on the 25/10/2016
     * @author Yann Robin
     * @param string $phoneNumber phone number to target
     * @return double $rate
     */
    public static function getCostForAPrefix($phoneNumber){
        $listPrefix = self::all();
        $arrayPrefix = array();
        $currentPrefix = '';
        $rate = 0;
        foreach ($listPrefix as $prefix){
            if(substr($phoneNumber, 0, strlen($prefix->getPrefix())) == $prefix->getPrefix()){

                if(strlen($currentPrefix) < strlen($prefix->getPrefix())){
                    $currentPrefix = $prefix->getPrefix();
                    $rate =  $prefix->getRate();
                }

            }
        }

        return $rate;
    }
}
