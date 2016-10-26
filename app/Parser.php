<?php

/**
 * Class use to manage the csv parse
 * @added on the 25/10/2016
 * @author Yann Robin
 * @copyright Yann Robin
 */

namespace App;

class Parser
{

    /**
     * check the phone number and apply some rules
     * @added on the 25/10/2016
     * @author Yann Robin
     * @return string phone_number
     */
    public static function checkPhoneNumber($phone_number){
        if(strlen($phone_number) == 7){
            return $phone_number.'3531';
        }

        if(substr($phone_number, 0, 1 ) === '0' and substr($phone_number, 0, 2 ) != '00'){
            return preg_replace('/^0/', '353', $phone_number);
        }

        if(substr( $phone_number, 0, 2 ) === '00'){
            return preg_replace('/^00/', '', $phone_number);
        }

        if(strlen($phone_number) <= 9 and substr( $phone_number, 0, 1 ) != '0'){
            return '353'.$phone_number;
        }

        return $phone_number;
    }

    /**
     * parse a csv file and insert data in database
     * @added on the 25/10/2016
     * @author Yann Robin
     * @return string phone_number
     */
    public static function parseCsvFile($csvName){
        $firstLine = true;
        $handle = fopen($csvName, "r");

        $arrayCodes = array();

        while (($data = fgetcsv($handle,1000, ",")) !== FALSE) {
            if(!$firstLine){
                $value = explode(",", $data[0]);
                $cust_id = $value[0];
                $call_from = $value[1];
                $call_to = $value[2];
                $call_start = $value[3];
                $call_duration = $value[4];

                $call_from = self::checkPhoneNumber($call_from);
                $call_to = self::checkPhoneNumber($call_to);

                DB::insert("INSERT INTO cdrs ('cust_id', 'call_from', 'call_to', 'call_start', 'call_duration' ) values ($cust_id,'$call_from','$call_to','$call_start',$call_duration)");

                echo 'All the data have been inserted in the database.';
            }
            else{
                $firstLine = false;
            }

        }
    }
}
