<?php
/**
 * Token Auth
 */
require_once "vendor/autoload1.php";
use \Firebase\JWT\JWT;
//解码密钥
$key = "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDP";

/**
 * 功能：生成Token信息串
 * @param $client_id
 * @param $iat iat(issued at): 在什么时候签发的(UNIX时间)，是否使用是可选的；
 * @param $exp exp(expires): 什么时候过期，这里是一个Unix时间戳，是否使用是可选的；
 * @return string
 */
function jwt_encode($Payload){

    $Token = JWT::encode($Payload, $GLOBALS["key"]);

    return $Token;
}

/**
 * 功能：解码JWT，并获取相关信息
 * @param $Token
 * @return mixed
 */
function jwt_decode($Token){

    $decoded = JWT::decode($Token, $GLOBALS["key"], array('HS256'));

    /**
     * 把stdClass Object转array的方法
     */
    $jwt_array =  json_decode( json_encode($decoded),true);
//    print_r($jwt_array);
    return $jwt_array['client_id'];
}

?>