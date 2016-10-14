<?php
/**
 * Created by PhpStorm.
 * User: Shyuan
 * Date: 2016/10/13
 * Time: 14:41
 */
class Domain_Group
{
    public function createGroup($UID,$GROUPNAME,$GROUPDESCRIPTION)
    {
        $model = new Model_Group();
        $rs = $model->createGroup($UID,$GROUPNAME,$GROUPDESCRIPTION);
        return $rs;
    }

}