<?php
if(isset($_POST["submit"]) && $_POST["submit"] == "登陆")
{
    $user = $_POST["username"];
    $psw = $_POST["password"];

    if($user == "" || $psw == "")
    {
        echo "<script>alert('请输入用户名或密码！'); history.go(-1);</script>";
    }
    else
    {
        $a=mysqli_connect("localhost","root","101434");
        mysqli_select_db($a,"name");
        mysqli_query($a,"set names 'gbk'");
        $sql = "select username,password from uert.name where username = '$_POST[username]' and password = '$_POST[password]'";
        $result = mysqli_query($a,$sql);
        $num = mysqli_num_rows($result);
        if($num)
        {   session_start();
            $_SESSION['id']=$user;
            echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../../web/WEB-INF/home/index2.php">';
        }
        else
        {
            echo "<script>alert('用户名或密码不正确！');history.go(-1);</script>";
        }
    }
}
else
{
    echo "<script>alert('提交未成功！'); history.go(-1);</script>";
}



