<?php
 
$api_url = "http://api.tineye.com/sandbox/search/";
$private_key = "6mm60lsCNIB,FwOWjJqA80QZHh9BMwc-ber4u=t^";
$public_key = "LCkn,2K7osVwkX95K4Oy";
echo '<pre>';
echo var_dump(search_url($api_url, $private_key, $public_key, 'https://media.licdn.com/mpr/mpr/shrink_200_200/p/7/005/043/10b/16f82f8.jpg'));//'https://media.licdn.com/mpr/mpr/shrink_200_200/p/6/005/044/3bf/243501f.jpg'));//"http://tineye.com/images/tineye_logo_big.png"));
echo '</pre>'; 
function search_url($api_url, $private_key, $public_key, $image_url) {
 
    $p = array(
        "offset" => "0",
        "limit" => "100",
        "image_url" => $image_url
    );
 
    $sorted_p = ksort($p);
    $query_p = http_build_query($p);
    $signature_p = strtolower($query_p);
    $action = "GET";
    $date = time();
    $nonce = uniqid();
 
    $string_to_sign = $private_key . $action . $date . $nonce . $api_url . $signature_p;
 
    $signature = hash_hmac("sha1", $string_to_sign, $private_key);
 
    $url = $api_url . "?api_key=" . $public_key . "&";
    $url .= $query_p . "&date=" . $date . "&nonce=" . $nonce . "&api_sig=" . $signature;
 
    return json_decode(file_get_contents($url), true);
}
 
?>

