<?php
$a=mysqli_connect('localhost','root','101434');
mysqli_select_db($a,"name");
mysqli_query($a,"set names 'utf8'");

$id=$_GET['id'];
$sql = "select *from uert.article WHERE idd=$id";
$query=mysqli_query($a,$sql);
if($query&&mysqli_num_rows($query)){
    while ($row=mysqli_fetch_assoc($query)){
        $date[]=$row;

    }

}
else{
    echo "该文章不存在";

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf8">
    <title></title>
    <link href="../../bootstrap/bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet">
    <link href="../../web/style/main.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../../editor/dist/css/wangEditor.min.css">
</head>
<body>
<header class="bloghead" style="background-image: url(../../web/images/background-cover.jpg)">
    <div class="blogleft">
        <div class="blogcenter">
            <a class="blogtouxiang" ><img src="../../web/images/me.jpg" class="img"></a>
            <h1 class="name">Mr Wang</h1>
            <hr class="homehr">
            <p class="jianjie">简介 我才不要当程序猿</p>
            <hr class="homehr" style="width: 50%">
            <p class="welcome">welcome to my world</p>
        </div>
        <div>
            <div class="blogfoot">
                <ul class="blogreturn">
                    <li><a href="../../web/WEB-INF/blog/blog.php" id="bloga">返回</a></li>
                </ul>
            </div>

        </div>
    </div>
</header>



<div style="width: 70%;position: fixed;right: 0;">
    <form enctype="multipart/form-data" id="article_add_from" name="article_add_from" method="post" action="article.add.php" class="form-inline" style="height: 1000px">
        <?php

        if (empty($date)){
            echo "当前没有文章";
        }
        else {
        foreach ($date as $value) {

        ?>
        <div class="form-group">
            <input type="text" name="title" class="form-control" id="exampleInputEmail3" value="<?php echo $value['Title']?>">
        </div>
        <div class="form-group">
            <input type="text" name="author" class="form-control" id="exampleInputPassword3" value="<?php echo $value['author']?>">
        </div>
        <div class="form-group">
            <input type=file id=browsefile style="visibility:hidden;display: none;" name="upfile" onchange=filepath.value=this.value>
            <input type=textfield id=filepath name="img_src" placeholder="请选择图片" class="form-control">

            <input type=button id=filebutton value="选择图片" onclick="browsefile.click()" class="btn btn-default">
        </div>
        <select class="form-control" name="article_class">
            <option>学术</option>
            <option>娱乐</option>
            <option>科技</option>
            <option>自然</option>
        </select>
        <button type="submit" class="btn btn-default" name="button" id="tijiao" value="提交">提交</button>
        <textarea id="textarea1" name="content" style="height: 92%" name="button" ><?php echo $value['content']?></textarea>
            <?php
        }
        }

        ?>
    </form>

</div>

<script type="text/javascript" src="../../editor/dist/js/lib/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="../../editor/dist/js/wangEditor.min.js"></script>
<script type="text/javascript">
    var editor = new wangEditor('textarea1');
    editor.create();
</script>
</body>
</html>