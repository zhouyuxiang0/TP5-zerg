<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/10/6
 * Time: 上午 12:17
 */

namespace app\api\validate;


use think\Exception;
use think\Request;
use think\Validate;

class BaseValidate extends Validate
{
    public function goCheck(){
        //获取http传入的参数
        //参数校验
        $request = Request::instance();
        $params = $request->param();
        $result = $this->check($params);
        if (!$result){
            $error = $this->error;
            throw new Exception($error);
        }else{
            return true;
        }
    }
}