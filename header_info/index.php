<?php $url = 'http://www.steven-senkus.com'; //'http://192.168.1.1';

$headers_out = print_r(get_headers($url), true);
echo <<<OUT
<pre>
{$headers_out}
</pre>
OUT;
?>