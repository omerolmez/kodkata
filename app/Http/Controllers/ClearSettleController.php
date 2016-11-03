<?php

namespace App\Http\Controllers;

use App\Http\Traits\ClearSettleTrait;
use App\Http\Libraries\ApiAccess;

class ClearSettleController extends Controller {
    
    use ClearSettleTrait;
    
    /**
     * #
     *
     * @var array
     */
    public function __construct() {}
    
    /**
    * App home method.
    *
    * @return Output
    */
    public function home() {
        
        #if (!session('token')) {
            $apiAccess = ApiAccess::getInstance();
            echo $apiAccess->getToken();
            exit;
        #}
        
        return view('clearsettle.home');
    }
    
    public function transactionReport() {
        if (\Request::isMethod('post')) {
            $transactionReport = $this->transactionReportPost();
        }
        
        return view('clearsettle.transaction_report', compact('transactionReport'));
    }
    
}