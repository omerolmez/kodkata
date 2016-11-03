<?php

namespace App\Http\Traits;

use App\Http\Libraries\ApiAccess;
use Illuminate\Support\Facades\Validator;

trait ClearSettleTrait {
    
    public function validateReportPost() {
        $rules = [
            'fromDate' => 'required|date',
            'toDate' => 'required|date',
        ];
        
        $validator = Validator::make(\Input::all(), $rules);
        
        if ($validator->fails()) {
            return $validator;
        }
        
        return false;
    }
    
    public function transactionReportPost() {
        
        if (!$validator = $this->validateReportPost()) {
            $apiAccess = ApiAccess::getInstance();
        
            $params = [
                'form_params' => 
                    [
                        'fromDate' => \Input::get('fromDate'),
                        'toDate' => \Input::get('toDate'),
                        #'merchant' => (int) \Input::get('merchant'),
                        #'acquirer' => (int) \Input::get('acquirer')
                    ],
                'headers' => ['Authorization' => session('token')]
            ];

            $r = $apiAccess->request('post', 'transaction', $params);
            return json_decode($r->getBody(), 1);
        } else {
            return \Redirect::to('transaction_report')
                ->withErrors($validator);
        }
        
        
    }
}
