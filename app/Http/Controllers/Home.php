<?php

namespace App\Http\Controllers;

use App\HistoryCall;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;


/**
 * Controller to manage the home page
 * @added on the 25/10/2016
 * @author Yann Robin
 * @copyright Yann Robin
 */

class Home extends Controller{

    /**
     * Display the home page wit all the call history
     * @author Yann Robin
     * @added on the 25/10/2016
     * @return view
     */
    public function index(){
        return view('home')->with('listHistory', HistoryCall::groupBy('cust_id')->get());
    }

    /** Get the daily cost for customer and return in a view frag
     * @author Yann Robin
     * @added on the 25/10/2016
     * @return JSON view
     */
    public function dailyRequest(Request $request){
        $id_cust = $request->input('id_cust');

        $listDailyCost = HistoryCall::getDailyTotalCostForCustomer($id_cust);

        ksort($listDailyCost);

        $returnHTML = view('resultDailyCost')->with('listDailyCost' , $listDailyCost)->with('id_cust', $id_cust)->render();

        return response()->json(array('success' => true, 'response'=> $returnHTML));
    }

    /** Get the history for a date and return in a view frag
     * @author Yann Robin
     * @added on the 25/10/2016
     * @return JSON view
     */
    public function dateRequest(Request $request){
        $date = $request->input('date');

        $listDateHistory = HistoryCall::getHistoryForADate($date);

        $returnHTML = view('resultDateHistory')->with('listDateHistory' , $listDateHistory)->with('date', $date)->render();

        return response()->json(array('success' => true, 'response'=> $returnHTML));
    }


}
