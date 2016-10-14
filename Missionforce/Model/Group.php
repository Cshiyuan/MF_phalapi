<?php
/**
 * Created by PhpStorm.
 * User: Shyuan
 * Date: 2016/10/13
 * Time: 14:41
 */
class Model_Group
{
    public function createGroup($UID,$GROUPNAME,$GROUPDESCRIPTION)
    {
//        $sql = 'select * from tbl_user where id = :id';
//        $params = array(':id' => $this->id);                 //替换:id为请求参数的id
//        DI()->notorm->user->queryAll($sql, $params);
////        select * from mf_mission left join mf_group on mf_mission.GID=mf_group.GID where mf_mission.UID = 2
//        //return DI()->notorm->user->select('UID,username,email')->where('UID = ?', $userId)->fetch();
//        // $data = DI()->notorm->mission->select('*')->where('UID', $UID)->fetchAll();  //根据UID查询到相应的Misson
//        $sql = 'select * from mf_mission left join mf_group on mf_mission.GID=mf_group.GID where mf_mission.UID = :id';
//        $params = array(':id' => $UID);
//        $data = DI()->notorm->mission->queryAll($sql, $params);  //根据UID查询到相应的Misson
//        return $data;
        $group = DI()->notorm->group;
        $data = array('group_leader' => $UID,'group_name'=>$GROUPNAME,'group_description'=>$GROUPDESCRIPTION);
        $group->insert($data);
        $id = $group->insert_id(); //必须是同一个实例，方能获取到新插入的行ID，且表必须设置了自增
        return $id;
    }
}