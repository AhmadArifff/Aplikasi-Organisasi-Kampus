<?php
function userlogin()
{
    $db = \Config\Database::connect();
    return $db->table('tb_user')->where('u_id', session('u_id'))->get()->getRow();
}
function countdata($table)
{
    $db = \Config\Database::connect();
    return $db->table($table)->countAllResults();
}
