<?php

namespace app\lib;
class Util {

    /**
     * API 输出格式
     *
     * @param array $data
     * @param string $msg
     * @param int $errorCode
     * @return array
     */
    public static function show($data = [],$msg = 'ok', $errorCode = 0) {
        $result = [
            'data' => $data,
            'msg' => $msg,
            'errorCode' => $errorCode,
        ];

        return $result;
    }
}