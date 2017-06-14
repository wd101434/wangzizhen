<?php
$a=mysqli_connect('localhost','root','101434');
mysqli_select_db($a,"name");
mysqli_query($a,"set names 'utf8'");

session_start();
$b=$_SESSION["id"];


$sql1="SELECT *FROM uert.article LEFT JOIN uert.name ON uert.article.id=uert.name.id LIMIT 0,6";
$query1=mysqli_query($a, $sql1);
if($query1 && mysqli_num_rows($query1)) {
    while ($row1 = mysqli_fetch_assoc($query1)) {
        $date[] = $row1;


    }
}


$sql1="select *from uert.name WHERE id=$b";
$query1=mysqli_query($a,$sql1);
if($query1&&mysqli_num_rows($query1)){
   while ($row1=mysqli_fetch_assoc($query1)) {
       $date1[]=$row1;

   }



}
else{
    echo "数据不存在";

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
    <script type="text/javascript" src="../../js/lunbo.js"></script>
</head>
<body>
<nav id="top"><a class=""><img src="../../images/log.jpg" style="height: 40px;width: 80px"></a> <a
        class="btn btn-default btn-danger " href="#"><i class="icon-edit"></i>写文章</a>
    <?php
    if (empty($date1)) {
        echo "当前没有文章";
    } else {
    foreach ($date1 as $value1) {
    ?>
    <div class="user" style="float: right">
        <div>
            <img src="../../../php/uesr/<?php echo $value1['img1'] ?>" class="img-circle" style="width: 48px;height: 48px;margin-left: 6px" >
        </div>
        <ul class="user_2">
            <li><a style="margin: 20px 21px; " href="home.php"><i class="icon-user"></i>我的主页</a></li>
            <li><a><i class="icon-bookmark-empty"></i>收藏</a></li>
            <li><a href="index.php"><i class="icon-share"></i>退出</a></li>
        </ul>
    </div>
        <?php
    }
    }

    ?>

    <div class="nav" id="container">
        <ul>
            <li class="icon-music text-danger">&nbsp;&nbsp;主页</li>
            <li class="icon-bookmark-empty">&nbsp;&nbsp;收藏</li>
            <li class="icon-bell">&nbsp;&nbsp;消息</li>
            <li class="input1"><input type="text"></li>

        </ul>



    </div>

</nav>
<div id="home">
    <div id="father">
        <div id="list" style="left: -940px;">
            <img src="../../images/8.jpg">
            <img src="../../images/5.jpg">
            <img src="../../images/6.jpg">
            <img src="../../images/7.jpg">
            <img src="../../images/8.jpg">
            <img src="../../images/5.jpg"></div>
        <ul id="round">
            <li class="on" index="1"></li>
            <li index="2"></li>
            <li index="3"></li>
            <li index="4"></li>
        </ul>
        <p id="left"><</p>
        <p id="right">></p></div>
    <div id="class1"><a class="btn btn-default btn-primary" href="../../../php/article_search/class_xueshu.php">学术</a>
        <a class="btn btn-default btn-info">娱乐</a>
        <a class="btn btn-default btn-warning">科技</a>
        <a class="btn btn-default btn-success">自然</a>
    </div>
    <div id="cetiao">
        <ul>
            <li><img src="../../images/banner-s-1-b8ff9ec59f72ea88ecc8c42956f41f78.png"></li>
            <li><img src="../../images/banner-s-2-0ca33954547a07153f9cccd5eddbad42.png"></li>
            <li><img src="../../images/banner-s-3-7123fd94750759acf7eca05b871e9d17.png"></li>
            <li><img src="../../images/banner-s-4-b70da70d679593510ac93a172dfbaeaa.png"></li>
            <li><img src="../../images/banner-s-5-2e1d9a955935a69fecc6e8ab2a8d3dcc.png"></li>
        </ul>
    </div>
    <div id="article">
        <ul class="cha">

            <?php
            include_once 'article_show_jiequ.php';
            if (empty($date)) {
                echo "当前没有文章";
            } else {
                foreach ($date as $value) {
                    ?>
                    <li class="neirong" style="height: 210px">
                        <hr>
                        <div style="width: 70%">

                            <div style="height: 50px;margin-left: -10px;">
                                <a><img src="../../../php/uesr/<?php echo $value['img1'] ?>" class="img-circle"></a>
                                <div style="width: 70%;position: absolute;top: 30px;left: 44px">
                                    <span><?php echo $value['author'] ?></span>
                                    <span style="    display: inline-block;
    padding-left: 3px;
    color: #969696;"><?php echo $value['datelin'] ?></span>
                                </div>
                            </div>
                            <a style="    margin: -7px 0 4px;
    display: inherit;
    font-size: 18px;
    font-weight: 700;
    line-height: 1.5;
color: #0f0f0f" href="../blog/blog_show.php?id=<?php echo $value['idd'] ?>"><?php echo $value['Title'] ?></a>
                            <div class="content" style="line-height: 20px">
                            <p style="    display: block;
    -webkit-margin-before: 1em;
    -webkit-margin-after: 1em;
    -webkit-margin-start: 0px;
    -webkit-margin-end: 0px;"><?php echo MooCutstr($value['content'],'180','...') ?></p>
                            </div>
                            <div style="position: absolute;bottom: 10px;">
                                <a class="fenlei"><?php echo $value['class'] ?></a>
                                <a class="icon-eye-open" style=" text-decoration:none;margin-right: 10px;margin-left: 10px;
                                   color: #b4b4b4;">23x</a>
                                <a class="icon-heart" style=" text-decoration:none;    margin-right: 10px;
                                   color: #b4b4b4;"></a>
                            </div>
                            <a><img src="../../../php/article/<?php echo $value['img'] ?>" class="img-thumbnail"></a>

                        </div>
                    </li>
                    <?php
                }
            }

            ?>
        </ul>
        <button class="btn" id="btn_show" style="position: fixed;bottom: 25px;right: 80px;">返回</button>
    </div>
</div>

<script type="text/javascript" src="../../js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../../../bootstrap/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script>

    //监听窗口的鼠标滚轮事件
    var index = 2;
    $(window).scroll(function () {

        if ($(window).scrollTop() == $(document).height() - $(window).height()) {
            //避免多次滚轮触发事件造成图片的多次追加，加上此判断

            //发送ajax请求获取数据
            index++;

            $.ajax({

                type: "POST",
                url: "load.php",
                data: {n: index},
                success: function (date) {

                    //追加后端返回的数据

                    $('.cha:last').append(date);


                }
            });


        }

    });
</script>
<script type="text/javascript" src="../../js/return_top.js"></script>
</body>
</html>