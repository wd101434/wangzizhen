<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf8">
    <title></title>
    <link href="../../../bootstrap/bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet">
    <link href="../../style/main.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../../../editor/dist/css/wangEditor.min.css">
</head>
<body>
<header class="bloghead" style="background-image: url(../../images/66.jpg)">
    <div class="blogleft">
        <div class="blogcenter">
            <a class="blogtouxiang" ><img src="../../images/me.jpg" class="img" style="width: 80px"></a>
            <h1 class="name">Mr Wang</h1>
            <hr class="homehr">
            <p class="jianjie">简介 我才不要当程序猿</p>
            <hr class="homehr" style="width: 50%">
            <p class="welcome">welcome to my world</p>
        </div>
        <div>
            <div class="blogfoot">
                <ul class="blogreturn">
                    <li><a href="../home/home.php" id="bloga">返回</a></li>
                </ul>
            </div>

        </div>
    </div>
</header>



<div style="width: 70%;position: fixed;right: 0;">
    <form enctype="multipart/form-data" id="article_add_from" name="article_add_from" method="post" action="../../../php/article/article.add.php" class="form-inline" style="height: 1000px">
        <div class="form-group">
            <input type="text" name="title" class="form-control" id="exampleInputEmail3" placeholder="标题">
        </div>
        <div class="form-group">
            <input type="text" name="author" class="form-control" id="exampleInputPassword3" placeholder="author">
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
        <textarea id="textarea1" name="content" style="height: 92%" name="button" ></textarea>

    </form>

</div>

<script type="text/javascript" src="../../../editor/dist/js/lib/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="../../../editor/dist/js/wangEditor.min.js"></script>
<script type="text/javascript">
    var editor = new wangEditor('textarea1');
    editor.create();
</script>
</body>
</html>