<?php
/**
 * Created by PhpStorm.
 * User: 王子真
 * Date: 2017/5/12
 * Time: 18:57
 */


    $a = mysqli_connect('localhost', 'root', '101434');
    mysqli_select_db($a, "name");
    mysqli_query($a, "set names 'gdk'");
    $id=$_GET['id'];
    $sql = "delete from uert.article WHERE idd=$id";

    if (mysqli_query($a, $sql)) {

        echo "<script>alert('删除成功');</script>";
        echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0; URL=../../web/WEB-INF/home/home.php\">";
    } else {

        echo "<script>alert('删除失败');</script>";
    }


