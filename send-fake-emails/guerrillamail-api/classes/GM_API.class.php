<?php

/*
 * 
 * API info:
 * https://www.guerrillamail.com/GuerrillaMailAPI.html
 * 
 * 
 */

// the class rewrite of the function below
class GM_API {

    private $params = array();
    private $host = 'www.guerrillamail.com';
    private $endpoint = 'http://api.guerrillamail.com/ajax.php';

    public function __construct($params) {

        $this->params = $params;
    }

    public function echoParams() {
        foreach ($this->params as $key => $value) {
            echo $key . ' ' . $value . '<br />';
        }
    }

    private function checkCookie() {

        if (isset($_COOKIE['SUBSCR'])) {
            $toks = explode(':', $_REQUEST['SUBSCR']);
            $hash = array_shift($toks);
            $email_addr = array_shift($toks);
            $email_timestamp = array_shift($toks);
            $this->params['SUBSCR'] = $_COOKIE['SUBSCR'];
        }
        // just for testing
        else {
            //    echo 'no cookie';
        }
    }

    public function setCookie() {

// open a site with cookies
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://api.guerrillamail.com/ajax.php?f=get_email_address&ip=127.0.0.1&agent=Mozilla_foo_bar');
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; rv:11.0) Gecko/20100101 Firefox/11.0');
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $content = curl_exec($ch);

// get cookies
        $cookies = array();
        preg_match_all('/Set-Cookie:(?<cookie>\s{0,}.*)$/im', $content, $cookies);
        echo '<pre>';
        print_r($cookies['cookie']); // show harvested cookies
        echo '</pre>';

// basic parsing of cookie strings (just an example)
        $cookieParts = array();
        preg_match_all('/Set-Cookie:\s{0,}(?P<name>[^=]*)=(?P<value>[^;]*).*?expires=(?P<expires>[^;]*).*?path=(?P<path>[^;]*).*?domain=(?P<domain>[^\s;]*).*?$/im', $content, $cookieParts);
        echo '<pre>';
        print_r($cookieParts);
        echo '</pre>';
    }

    public function getEmailAddress() {
        $function = 'get_email_address';
        $req = 'f=' . $function;
        $this->checkCookie();


        foreach ($this->params as $key => $val) {
            if (is_array($val)) {
                foreach ($val as $ak => $av) {
                    $req .= '&' . $key . '%5B%5D=' . urlencode($av);
                }
            } else {
                $req .= '&' . $key . '=' . urlencode($val);
            }
        }
        $endpoint = 'http://api.guerrillamail.com/ajax.php';
        // Get cURL resource
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'http://api.guerrillamail.com/ajax.php?f=get_email_address&ip=127.0.0.1&agent=Mozilla_foo_bar',
            CURLOPT_USERAGENT => $this->params['agent']
        ));
// Send the request & save response to $resp
        $resp = curl_exec($curl);
// Close request to clear up some resources
        curl_close($curl);
        echo $resp;
    }

}

?>
