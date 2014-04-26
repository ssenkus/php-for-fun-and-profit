<?php

require('Services_JSON-1.0.3/JSON.php');
require('classes/GM_API.class.php');


$params = array(
    'ip' => $_SERVER['REMOTE_ADDR'],
    'agent' => substr($_SERVER['HTTP_USER_AGENT'], 0, 160)
);
        
// todo: get class cleaned up        
$gm = new GM_API($params);
$gm->getEmailAddress();

?>
