<?php $a = mysqli_connect('localhost', 'root', '101434');
mysqli_select_db($a, "name");
mysqli_query($a, "set names 'utf8'");


$id=$_GET['id'];
$sql1="SELECT *FROM uert.article LEFT JOIN uert.name ON uert.article.id=uert.name.id";
$query1=mysqli_query($a, $sql1);
if($query1 && mysqli_num_rows($query1)) {
    while ($row1 = mysqli_fetch_assoc($query1)) {
        $date[] = $row1;


    }
}

$sql2="select *from uert.article WHERE idd=$id";
$query2=mysqli_query($a,$sql2);
if($query2&&mysqli_num_rows($query2)){
    $row2=mysqli_fetch_assoc($query2);


}
else{
    echo "该文章不存在";

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="../../../bootstrap/bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet">
    <link href="../../../bootstrap/Font-Awesome-3.2.1/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../style/index.css" rel="stylesheet">
    <link href="../../style/lunbo.css" rel="stylesheet">

</head>
<body>
<nav id="top">
    <a class=""><img src="../../images/log.jpg" style="height: 40px;width: 80px"></a>
    <a class="btn btn-default btn-danger " href="../login/register.html" style="margin: 10px" >注册</a>
    <a class="btn btn-danger" style="margin: 10px" href="../login/login.html">登陆</a>

    <div class="nav" id="container">

        <ul>
            <li class="icon-music text-danger">&nbsp;&nbsp;主页</li>
            <li class="icon-bookmark-empty">&nbsp;&nbsp;收藏</li>
            <li class="icon-bell">&nbsp;&nbsp;消息</li>
            <li class="input1">
                <form style="position: relative;">
                    <input type="text">

                    <a class="search_btn"><i class="icon-search"></i></a>

                </form>
            </li>
        </ul>




    </div>

</nav>
<div id="blog_show" style="width: 700px;margin-left: auto;margin-right: auto;margin-top: 57px">

    <div id="article">
        <ul class="cha">


                    <li class="neirong" style="height: 210px">
                       <h1><?php echo $row2['Title'] ?></h1>
                        <div class="author">
                            <p></p>
                            <time><?php echo $row2['datelin'] ?></time>
                        </div>
                        <p><?php echo $row2['content'] ?></p>
                    </li>

        </ul>

    </div>
</div>

<script type="text/javascript" src="../../js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../../../bootstrap/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

</body>
</html>