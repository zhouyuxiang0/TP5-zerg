<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/10/5
 * Time: 下午 5:57
 */

namespace app\api\controller\v1;


use app\api\model\Banner as BannerModel;
use app\api\validate\IDMustBePostiveInt;
use app\lib\exception\BannerMissException;

class Banner
{
    /**
     * 获取指定id的banner信息
     * @url /banner/:id
     * @http GET
     * @id banner的id号
     */
    public function getBanner($id)
    {
        /*$validate = new Validate([
            'name'=>'require|max:10',
            'email'=>'email'
        ]);*/
        (new IDMustBePostiveInt())->goCheck();
//        $banner = BannerModel::getBannerByID($id);
        $banner = BannerModel::get($id);
        if (!$banner){
            throw new BannerMissException();
        }
        return $banner;
    }
}