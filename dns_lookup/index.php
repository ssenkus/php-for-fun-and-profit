<?php
$domain = "graphicproducts.com";
$dns_result = dns_get_record($domain);
$dns_out = print_r($dns_result, true);

$mx_arr = array();
$mx_result = getmxrr($domain, $mx_arr);
$mx_out = print_r($mx_arr, true);
echo <<<OUT

<pre>
<h1>dns_get_record()</h1>
{$dns_out}
<hr />
<h1>getmxrr()</h1>
{$mx_out}
</pre>

OUT;

?>
