<?php
$a=mysqli_connect('localhost','root','101434');
mysqli_select_db($a,"name");
mysqli_query($a,"set names 'utf8'");
$id=$_GET['id'];
$sql="select *from uert.article WHERE idd=$id";
$query=mysqli_query($a,$sql);
if($query&&mysqli_num_rows($query)){
    $row=mysqli_fetch_assoc($query);


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
    <link href="../../style/main.css" rel="stylesheet" type="text/css">

</head>
<body>

<header class="bloghead" style="background-image: url(../../images/background-cover.jpg)">
    <div class="blogleft">
        <div class="blogcenter">
            <a class="blogtouxiang" ><img src="../../images/me.jpg" class="img" style="width: 70px"></a>
            <p class="name">Mr Wang</p>
            <hr class="homehr">
            <p class="jianjie">简介 我才不要当程序猿</p>
            <hr class="homehr" style="width: 50%">
            <p class="welcome">welcome to my world</p>
        </div>
        <div>
            <div class="blogfoot">
                <ul class="blogreturn">
                    <li><a href="../home/home.php" class="bloga">返回</a></li>
                </ul>
            </div>

        </div>
    </div>
</header>


<div class="celan">
    <div class="blog1">

                <h2 class="h2style"><?php echo $row['Title']?></h2>
                <span>article</span>
                <time><?php echo $row['datelin']?></time>
                <p class="pp">s</p>

                    <article><?php echo $row['content']?></article>


    </div>

    <div  id="del_modif_button">
    <a href="../../../php/article/article.modify.php?id=<?php echo $row["idd"] ?>" class="article_button_border">修改</a>
    <a href="../../../php/article/article.del.php?id=<?php echo $row["idd"] ?>" class="article_button_border">删除</a>
    </div>



</div>




</body>
</html>