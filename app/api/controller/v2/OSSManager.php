<?php
// +----------------------------------------------------------------------
// | ThinkNuan-x [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2017-2018 http://www.nuan-x.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: tcyfree <1946644259@qq.com>
// +----------------------------------------------------------------------

namespace app\api\controller\v2;

use app\api\validate\OSSFilename;

class OSSManager extends \app\api\controller\v1\OSSManager
{
    protected $beforeActionList = [
      'checkPrimaryScope' => ['only' => 'OSSTransCodingMp3']
    ];

    /**
     * 音频转码
     *
     * @return array
     */
    public function OSSTransCodingMp3()
    {
        (new OSSFilename())->goCheck();
        $filename = input('get.filename');
        $filename = config('oss.user_dir').$filename;
        $url = submitJobAndWaitJobCompleteAudio($filename);
        $process_time = sys_processTime();

        return [
            'msg' => 'OK!',
            'info' => $url,
            'process_time' => $process_time
        ];
    }
}