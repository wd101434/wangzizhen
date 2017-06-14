<?php
/**
 * Created by PhpStorm.
 * User: 王子真
 * Date: 2017/5/12
 * Time: 19:04
 */
//连
require_once('config.php');
//选
$con = mysqli_connect(HOST, USERNAME, PASSWORD);
mysqli_select_db($con, "name");
//字符集
mysqli_connect($con,"set names 'gbk'");