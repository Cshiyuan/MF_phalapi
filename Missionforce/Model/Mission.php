<?php

/**
 * Created by PhpStorm.
 * User: Shyuan
 * Date: 2016/10/12
 * Time: 23:36
 */
class Model_Mission
{
    public function getMissionByUID($UID)
    {
//        $sql = 'select * from tbl_user where id = :id';
//        $params = array(':id' => $this->id);                 //替换:id为请求参数的id
//        DI()->notorm->user->queryAll($sql, $params);
//        select * from mf_mission left join mf_group on mf_mission.GID=mf_group.GID where mf_mission.UID = 2
        //return DI()->notorm->user->select('UID,username,email')->where('UID = ?', $userId)->fetch();
        // $data = DI()->notorm->mission->select('*')->where('UID', $UID)->fetchAll();  //根据UID查询到相应的Misson
        $sql = 'select * from mf_mission left join mf_group on mf_mission.GID=mf_group.GID where mf_mission.UID = :id';
        $params = array(':id' => $UID);
        $data = DI()->notorm->mission->queryAll($sql,$params);  //根据UID查询到相应的Misson
        return $data;
    }

  //  public function
}