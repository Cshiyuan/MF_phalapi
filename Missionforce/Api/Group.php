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
    public function createGroupByUID()
    {
        $rs = array('code' => 0, 'msg' => '', 'info' => array());  //初始化$rs
        $domain = new Domain_Group();
        $result = $domain->createGroup($this->UID,$this->groupName,$this->groupDescription); //交由domain注册并返回注册信息
        $rs['code'] =200;
        $rs['msg']='创建成功';
        $rs['info'] = $result;
        return $rs;

    }

    /**
     * 查询Group
     * @desc 用GID来查询Group
     */
    public function getGroupByGID()
    {
        $rs = array('code' => 0, 'msg' => '', 'info' => array());  //初始化$rs
        $domain = new Domain_Group();
        $result = $domain->getGroupByGID($this->GID); //交由domain注册并返回注册信息

//        $rs['code'] = $result['code'];
//        $rs['msg']  = $result['msg'];
//        $rs['info'] = $result['info']
////没有找到相应的Mission
        if ($result == null) {
            $rs['code'] = 400;
            $rs['msg'] = 'Group';
        }else {
            $rs['code'] = 200;
            $rs['msg'] = '查询成功';
            $rs['info'] = $result;
        }
        return $rs;
    }

    /**
     * 查询Group
     * @desc 用UID来查询用户下的Group
     */
    public function getGroupByUID()
    {
        $rs = array('code' => 0, 'msg' => '', 'info' => array());  //初始化$rs
        $domain = new Domain_Group();
        $result = $domain->getGroupByUID($this->UID); //交由domain注册并返回注册信息

        if ($result == null) {
            $rs['code'] = 400;
            $rs['msg'] = 'Group';
        }else {
            $rs['code'] = 200;
            $rs['msg'] = '查询成功';
            $rs['info'] = $result;
        }
        return $rs;
    }

    /**
     * 向小组添加成员
     * @desc 向小组添加成员，通过UID和GID
     */
    public function addUserToGroup()
    {
        $rs = array('code' => 0, 'msg' => '', 'info' => array());  //初始化$rs
        $domain = new Domain_Group();
        $result = $domain->addUserToGroup($this->UID, $this->GID); //交由domain注册并返回注册信息

        if ($result == null) {
            $rs['code'] = 400;
            $rs['msg'] = 'Group';
        }else {
            $rs['code'] = 200;
            $rs['msg'] = '添加成功';
            $rs['info'] = $result;
        }
        return $rs;
    }

    /**
     * 向小组成员布置任务
     * @desc 给用户名为UID的用户布置任务
     */
    public function addAssignMissionToUser()
    {
        $rs = array('code' => 0, 'msg' => '', 'info' => array());  //初始化$rs
        $domain = new Domain_Group();
        $result = $domain->addAssignMissionToUser($this->UID, $this->GID,
                                                  $this->mission_name, $this->mission_time,
                                                  $this->mission_deadline, $this->mission_description);

        if ($result == null) {
            $rs['code'] = 400;
            $rs['msg'] = 'Group';
        }else {
            $rs['code'] = 200;
            $rs['msg'] = '添加成功';
            $rs['info'] = $result;
        }
        return $rs;
    }


    public function getRules()
    {
        return array(
            'createGroupByUID' => array(
                'UID' => array('name' => 'UID', 'type' => 'int', 'min' => 1, 'require' => true),
                'groupName' => array('name' => 'groupName', 'require' => true),
                'groupDescription' => array('name' => 'groupDescription', 'require' => true),
                // 'username' => array('name' => 'username')
            ),
            'getGroupByGID' => array(
                'GID' => array('name' => 'GID', 'type' => 'int', 'min' => 1, 'require' => true),
            ),
            'getGroupByUID' => array(
                'UID' => array('name' => 'UID', 'type' => 'int', 'min' => 1, 'require' => true),
            ),
            'addUserToGroup' => array(
                'UID' => array('name' => 'UID', 'type' => 'int', 'min' => 1, 'require' => true),
                'GID' => array('name' => 'GID', 'type' => 'int', 'min' => 1, 'require' => true),
            ),
            'addAssignMissionToUser' => array(
                'UID' => array('name' => 'UID', 'type' => 'int', 'min' => 1, 'require' => true),
                'GID' => array('name' => 'GID', 'type' => 'int', 'min' => 1, 'require' => true),
                'mission_name' => array('name' => 'mission_name', 'require' => true),
                'mission_time' => array('name' => 'mission_time', 'type' => 'int', 'min' => 0, 'require' => true),
                'mission_deadline' => array('name' => 'mission_deadline', 'type' => 'date', 'require' => true),
                'mission_description' => array('name' => 'mission_description', 'require' => true),
            )

        );
    }


}