<?php
require_once('vendor/facebook/webdriver/lib/__init__.php');
// This would be the url of the host running the server-standalone.jar
$host = 'http://127.0.0.1:4444/wd/hub'; // this is the default
$capabilities = array(WebDriverCapabilityType::BROWSER_NAME => 'firefox');
$driver = RemoteWebDriver::create($host, $capabilities);
echo 'hello!';

// reboot reboot.htm
// dangerous!


$driver->get('https://173.8.212.165:8443/reboot.htm');
echo 'got here!';
$link = $driver->findElement(
  WebDriverBy::name('yes')
);
$link->click();
?>
