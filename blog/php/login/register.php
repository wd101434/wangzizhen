<?php
/**
 * Created by PhpStorm.
 * User: 王子真
 * Date: 2017/5/8
 * Time: 22:05
 */

if(isset($_POST["Submit"]) && $_POST["Submit"] == "注册")
{
    $user = $_POST["username1"];
    $psw = $_POST["password1"];
    $psw_confirm = $_POST["confirm"];
    $nickname=$_POST["nickname"];
    if($user == "" || $psw == "" || $psw_confirm == "")
    {
        echo "<script>alert('请确认信息完整性！'); history.go(-1);</script>";
    }
    else
    {
        if($psw == $psw_confirm)
        {
            $a=mysqli_connect('localhost','root','101434');   //连接数据库
            mysqli_select_db($a,"name"); //选择数据库
            mysqli_query($a,"set names 'gdk'"); //设定字符集
            $sql = "select username,password,nickname from uert.name where username ='$_POST[username1]'and password = '$_POST[password1]'AND nickname='$_POST[nickname]'"; //SQL语句
            $result = mysqli_query($a,$sql);//执行SQL语句
            $num = mysqli_num_rows($result); //统计执行结果影响的行数
            if($num)    //如果已经存在该用户
            {
                echo "<script>alert('用户名已存在');history.go(-1);</script>";
            }
            else    //不存在当前注册用户名称
            {
                $sql_insert = "insert into uert.name (username,password,nickname) values('$_POST[username1]','$_POST[password1]',('$_POST[nickname]'))";
                $res_insert = mysqli_query($a,$sql_insert);

                if($res_insert)
                {
                    echo "<script>alert('注册成功！'); </script>";
                    echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../../web/WEB-INF/home/index.php">';
                }
                else
                {
                    echo "<script>alert('系统繁忙，请稍候！'); history.go(-1);</script>";
                }
            }
        }
        else
        {
            echo "<script>alert('密码不一致！'); history.go(-1);</script>";
        }
    }
}
else
{
    echo "<script>alert('提交未成功！'); history.go(-1);</script>";
}
