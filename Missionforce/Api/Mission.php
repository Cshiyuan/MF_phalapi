<?php
/**
 * Created by PhpStorm.
 * User: Shyuan
 * Date: 2016/10/12
 * Time: 23:34
 */
class Api_Mission extends PhalApi_Api
{

    public function getMissionByUID()
    {
        $rs = array('code' => 0, 'msg' => '', 'info' => array());  //初始化$rs
        $domain = new Domain_Mission();
        $result = $domain->getMissionByUID($this->UID); //交由domain注册并返回注册信息

//        $rs['code'] = $result['code'];
//        $rs['msg']  = $result['msg'];
//        $rs['info'] = $result['info'];
        $rs['info'] = $result;
        return $rs;

    }


    public function getRules()
    {
        return array(
            'getMissionByUID' => array(
                'UID' => array('name' => 'UID', 'type' => 'int', 'min' => 1, 'require' => true),
                 // 'username' => array('name' => 'username'),
            ),
        );
    }
}