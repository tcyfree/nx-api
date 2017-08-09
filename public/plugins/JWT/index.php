<?php

include "vendor/autoload.php";
use \Firebase\JWT\JWT;

$key = "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDP";
$token = array(
    "client_id" => '7',
    "nickname" => '好好地'
);

/**
 * IMPORTANT:
 * You must specify supported algorithms for your application. See
 * https://tools.ietf.org/html/draft-ietf-jose-json-web-algorithms-40
 * for a list of spec-compliant algorithms.
 */
$jwt = JWT::encode($token, $key);
var_dump($jwt);
echo '<br />';
echo '<br />';

//$jwt = $jwt.'123';

# Step 1:解码JWT，并获取User ID，这个时候不对Token签名进行检查
//payload = JWT.decode(request.authorization, nil, false)

    # Step 2: 检查该用户是否存在于数据库
//    @current_user = User.find(payload['user_id'])

    # Step 3: 检查Token签名是否正确.
//    JWT.decode(request.authorization, current_user.api_secret)

    # Step 4: 检查 "iat" 和"exp" 以确保这个Token是在2秒内创建的.
//    now = Time.now.to_i
//    if payload['iat'] > now || payload['exp'] < now
      # 如果过期则返回401

$decoded = JWT::decode($jwt, $key, array('HS256'));
//print_r($decoded);
var_dump($decoded);
echo '<br />';
echo '<br />';
/**
 * 把stdClass Object转array的方法
 */
$object =  json_decode( json_encode($decoded),true);
var_dump($object);
echo $object['client_id'];
echo '<br />';
echo '<br />';
/*
 NOTE: This will now be an object instead of an associative array. To get
 an associative array, you will need to cast it as such:
*/

$decoded_array = (array) $decoded;

/**
 * You can add a leeway to account for when there is a clock skew times between
 * the signing and verifying servers. It is recommended that this leeway should
 * not be bigger than a few minutes.
 *
 * Source: http://self-issued.info/docs/draft-ietf-oauth-json-web-token.html#nbfDef
 */
JWT::$leeway = 60; // $leeway in seconds
$decoded = JWT::decode($jwt, $key, array('HS256'));
print_r($decoded);
?>