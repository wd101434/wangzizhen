<?php
$a=mysqli_connect('localhost','root','101434');
mysqli_select_db($a,"name");
mysqli_query($a,"set names 'utf8'");

$search="SELECT *FROM  uert.article LEFT JOIN uert.name ON uert.article.id=uert.name.id  WHERE class='学术'";
$query=mysqli_query($a,$search);
if($query&&mysqli_num_rows($query)){
    while ($row = mysqli_fetch_assoc($query)) {
        $date[] = $row;


    }


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
    <link href="../../bootstrap/bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet">
    <link href="../../bootstrap/Font-Awesome-3.2.1/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../web/style/index.css" rel="stylesheet">
    <link href="../../web/style/lunbo.css" rel="stylesheet">



</head>
<body>
<nav id="top">
    <a class=""><img src="../../web/images/log.jpg" style="height: 40px;width: 80px"></a>
    <a class="btn btn-default btn-danger " href="../../web/WEB-INF/login/register.html" style="margin: 10px" >注册</a>
    <a class="btn btn-danger" style="margin: 10px" href="../../web/WEB-INF/login/login.html">登陆</a>

    <div class="nav" id="container">

        <ul>
            <li class="icon-music ">&nbsp;&nbsp;主页</li>
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
<div style="width: 700px;margin-right: auto;margin-left: auto;margin-top: 55px">
    <div id="article">
        <ul class="cha">

            <?php
            include_once '../../web/WEB-INF/home/article_show_jiequ.php';
            if (empty($date)) {
                echo "当前没有文章";
            } else {
                foreach ($date as $value) {
                    ?>
                    <li class="neirong" style="height: 210px">
                        <hr>
                        <div style="width: 70%">

                            <div style="height: 50px;margin-left: -10px;">
                                <a><img src="../uesr/<?php echo $value['img1'] ?>" class="img-circle"></a>
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
color: #0f0f0f" href="../../web/WEB-INF/blog/blog_show.php?id=<?php echo $value['idd'] ?>"><?php echo $value['Title'] ?></a>
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
                            <a><img src="../article/<?php echo $value['img'] ?>" class="img-thumbnail"></a>

                        </div>
                    </li>
                    <?php
                }
            }

            ?>
        </ul>

    </div>
</div>


<script type="text/javascript" src="../../web/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../../bootstrap/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

</body>
</html>