<?php
/**
 * Created by PhpStorm.
 * User: Shyuan
 * Date: 2016/10/12
 * Time: 23:35
 */
class Domain_Mission
{
    public function getMissionByUID($UID)
    {
        $model = new Model_Mission();
        $rs = $model->getMissionByUID($UID);
        return $rs;
    }
}