<?php

/**
 * @description BulkSMS Service To send SMS Message to Mobile Using
 *
 * @author Karim Mostafa <Karim.Mostafa@e7gezly.com>
 *
 * @copyright (c) 2015, E7gezly
 */
require_once('Request.php');

class BulkSMS
{

    /**
     * store BaseURL API to Call
     *
     * @var string
     */
    private $base_url;

    /**
     * store username of API to get Auth
     *
     * @var string
     */
    private $account_id;
    
    /**
     * store username of API to get Auth
     *
     * @var string
     */
    private $username;

    /**
     * store Password of API to get Auth
     *
     * @var string
     */
    private $password;


    /**
     * object from class Request
     *
     * @var Object RequestClass
     */
    private $request;


    /**
     * @description return base url when take obj from class Bsms
     * @author Karim Mostafa <karim.Mostafa@e7gezly.com>
     *
     * @param string $url
     * @param string $account_id
     * @param string $user_name
     * @param string $password
     * @access public
     *
     */
    public function __construct($account_id , $user_name, $password, $url)
    {

        $this->request = new Request($url);
        $this->base_url = $url;
        $this->account_id = $account_id;
        $this->username = $user_name;
        $this->password = $password;
    }


    /**
     * @description return message url
     * @author Karim Mostafa <karim.Mostafa@e7gezly.com>
     *
     * @param $sms_body
     * @param $mobile
     * @param $sender_name
     * @return array
     * @access public
     */
    public function sendSMS($sms_body, $mobile, $sender_name)
    {
        $params = array(
            'account_id' => $this->account_id,
            'user_name' => $this->username,
            'password' => $this->password,
            'text' => $sms_body,
            'recipient' => $mobile,
            'sender' => $sender_name
        );
       return $this->request->SendRequest($params);
    }
}

?>
