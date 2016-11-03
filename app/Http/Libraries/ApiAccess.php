<?php

namespace App\Http\Libraries;

use \GuzzleHttp\Client as Guzzle;

class ApiAccess 
{
    private function  __construct() {
        ApiAccess::$client = new Guzzle();
    }

    private function  __clone() {}
    
    private static $_instance = null;
    
    private static $client;
    
    private $count = 0;

    /**
     * Api address
     *
     * @var string
     */
    private static $apiUrl = 'https://testreportingapi.clearsettle.com/';
    
    /**
     * API methods.
     *
     * @var array
     */
    private static $addresses = [
        'login' => 'api/v3/merchant/user/login',
        'transaction' => '/api/v3/transactions/report'
    ];
    
    public static $userPass = [
        'email' => 'demo@bumin.com.tr', 
        'password' => 'cjaiU8CV'
    ];

    public static function getInstance() 
    {
        if (!is_object(self::$_instance)) {
            self::$_instance = new ApiAccess();
        }
            
        return self::$_instance;
    }
    
    /**
     * API methods.
     *
     * @var array
     */
    public function getApiAddress($method) {
        if (isset(self::$addresses[$method])) {
            return self::$apiUrl . self::$addresses[$method];
        }
    }
    
    /**
    * App home method.
    *
    * @return Output
    */
    public function getToken() 
    {
        $r = $this->request('post', 'login', ['form_params' => self::$userPass]);
        
        dd($r);
        $response = json_decode($r->getBody(), 1);
        
        if (isset($response['status']) && $response['status'] == 'APPROVED') {
            session(['token' => $response['token']]);
        } else {
            abort(403, 'Unauthorized!');
        }
        
        return $response['token'];
    }
    
    /**
    * App home method.
    *
    * @return Output
    */
    public function request($method, $address, $params) 
    {
        $apiAddress = $this->getApiAddress($address);
        
        try {
            $r = self::$client->$method($apiAddress, $params);
        } finally {
            echo $this->getToken();
            exit;
            $params['headers'] = ['Authorization' => $this->getToken()];
            return self::request($method, $address, $params);
            
            #$this->recreateToken($method, $address, $params);
        }
        
        return $r; 
    }
    
    public function recreateToken($method, $address, $params) {
        
    }
}