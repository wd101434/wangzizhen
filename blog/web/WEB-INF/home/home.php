<?php
$a=mysqli_connect('localhost','root','101434');
mysqli_select_db($a,"name");
mysqli_query($a,"set names 'utf8'");

session_start();
$b=$_SESSION["id"];



$sql="select *from uert.article WHERE id=$b";
$query=mysqli_query($a,$sql);
if($query&&mysqli_num_rows($query)){
    while ($row=mysqli_fetch_assoc($query)){
        $date[]=$row;
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

    <link href="../../style/main.css" rel="stylesheet" type="text/css">
    <link href="../../style/boots_copy.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../../js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../../js/main.js"></script>
    <script type="text/javascript" src="../../js/jquery.backstretch.min.js"></script>
    <script type="text/javascript" src="../../js/bkgd_lunbo.js"></script>

</head>
<body class="ho">
<div class="logall">
    <?php
    if (empty($date1)) {
        echo "当前没有文章";
    } else {
    foreach ($date1 as $value1) {
    ?>
    <div class="homecenter">
        <a class="touxiang"><img src="../../../php/uesr/<?php echo $value1['img1'] ?>" class="img"></a>
        <h1 class="name"><a><?php echo $value1['nickname']?></a></h1>
        <hr class="homehr">
        <p class="jianjie"><?php echo $value1['qianming']?></p>
        <hr class="homehr" style="width: 50%">
        <p class="welcome">welcome to my world</p>
    </div>
        <?php
    }
    }

    ?>

    <div class="logfoot">
        <ul class="logbutton_home">
            <li id="homeset"><a href="#">设置</a></li>
            <li class="li1" id="article_home_button"><a href="#">博客</a></li>

            <li><a href="index2.php">主页</a></li>
        </ul>
    </div>


    <div id="shezhicelan">
        <form enctype="multipart/form-data" action="../../../php/uesr/user_set.php" method="post">
        <ul class="shezhiul">

            <li><a>头像</a>
                <ul>
                    <li>
                        <div>
                            <input type=file id=browsefile style="visibility:hidden;display: none;" name="upfile" onchange=filepath.value=this.value>
                            <input type=textfield id=filepath name="img_src"  class="form-control">
                            <input type=button id=filebutton value="选择图片" onclick="browsefile.click()" class="btn btn-default">
                        </div>
                    </li>
                </ul>
            </li>
            <li id="changename"><a>姓名</a>
                <ul>
                    <li>
                        <div>
                        <input type="text" name="nickname" class="form-control" id="exampleInputEmail3" style="border: none;" >
                            <input type="button" class="btn" value="输入姓名" >
                        </div>
                    </li>
                </ul>
            </li>
            <li><a >签名</a>
                <ul>
                    <li>
                        <div>
                        <input type="text" name="qianming" class="form-control" id="exampleInputEmail3" style="border: none;" >
                            <input type="button" class="btn" value="输入签名">
                        </div>
                    </li>
                </ul>
            </li>

            <li><a><input type="submit" value="提交" style="border: none;background: none;font-size: 16px;padding-left: 2px;
    color: white;" name="button"></a></li>

            <li id="celanrerurn"><a>返回</a></li>

        </ul>
        </form>
    </div>


    <div class="articlecelan">

        <div id="article_neirong">
            <?php
            include_once 'article_show_jiequ.php';
               if (empty($date)){
                   echo "当前没有文章";
               }
               else {
                   foreach ($date as $value) {
                       ?>
                       <div style="width: 95%">
                       <ol class="ol">
                           <li>
                               <h2 class="h2style_liulan"><?php echo $value['Title']?></h2>
                               <p class="pp_liulan " ><?php echo MooCutstr($value['content'],'180','...') ?></p>
                               <div>
                                   <time id="time"><?php echo $value['datelin']?></time>
                                   <span></span>
                                   <a href="../blog/blog.php?id=<?php echo $value['idd']?>" class="article_button_border">继续阅读</a>

                                   <hr>
                               </div>
                           </li>
                       </ol>
                       </div>
                       <?php
                   }
                   }

            ?>

        </div>

       <div id="article_foot" >
           <a id="create" href="../blog/article.add.php?id=<?php echo $b?>">创建文章</a>
       </div>

    </div>





</body>
</html>