<?php
/**
 * Created by PhpStorm.
 * User: Shyuan
 * Date: 2016/10/13
 * Time: 14:40
 */
class Api_Group extends PhalApi_Api
{
    /**
     * 创建Group
     * @desc 用于创建Group
     */
    public function createGroup()
    {
        $rs = array('code' => 0, 'msg' => '', 'info' => array());  //初始化$rs
        $domain = new Domain_Group();
        $result = $domain->createGroup($this->UID,$this->groupName,$this->groupDescription); //交由domain注册并返回注册信息

//        $rs['code'] = $result['code'];
//        $rs['msg']  = $result['msg'];
//        $rs['info'] = $result['info']
//
        $rs['code'] =200;
        $rs['msg']='创建成功';
        $rs['info'] = $result;
        return $rs;

    }


    public function getRules()
    {
        return array(
            'createGroup' => array(
                'UID' => array('name' => 'UID', 'type' => 'int', 'min' => 1, 'require' => true),
                'groupName' => array('name' => 'groupName', 'require' => true),
                'groupDescription' => array('name' => 'groupDescription', 'require' => true),
                // 'username' => array('name' => 'username')
            ),

        );
    }


}