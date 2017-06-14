<?php
$a=mysqli_connect('localhost','root','101434');
mysqli_select_db($a,"name");
mysqli_query($a,"set names 'utf8'");
$n=intval($_POST["n"]);
$first=($n-1)*3;

$sql1="SELECT *FROM uert.article LEFT JOIN uert.name ON uert.article.id=uert.name.id LIMIT $first,3";
$query1=mysqli_query($a, $sql1);
if($query1 && mysqli_num_rows($query1)) {
    while ($row1 = mysqli_fetch_assoc($query1)) {
        $date[] = $row1;


    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>测试</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="../../js/jquery-3.2.1.min.js"></script>

</head>
<body>
<div id="sample">
    <?php
    include_once 'article_show_jiequ.php';
    if (empty($date)){
        return false;
    }
    else {
        foreach ($date as $value) {
            ?>
            <ul>
                <li class="neirong" style="height: 210px">
                    <hr>
                <div style="width: 70%">
                    <div style="height: 50px;margin-left: -10px;">
                        <a><img src="../../../php/uesr/<?php echo $value['img1'] ?>"  class="img-circle"></a>
                        <div style="width: 70%;position: absolute;top: 30px;left: 44px">
                            <span><?php echo $value['author']?></span>
                            <span style="    display: inline-block;
    padding-left: 3px;
    color: #969696;"><?php echo $value['datelin']?></span>
                        </div>
                    </div>
                    <a style="    margin: -7px 0 4px;
    display: inherit;
    font-size: 18px;
    font-weight: 700;
    line-height: 1.5;
color: #0f0f0f"><?php echo $value['Title']?></a>
                    <p style="    display: block;
    -webkit-margin-before: 1em;
    -webkit-margin-after: 1em;
    -webkit-margin-start: 0px;
    -webkit-margin-end: 0px;"><?php echo MooCutstr($value['content'],'180','...')?></p>
                    <div style="position: absolute;bottom: 10px;">
                        <a class="fenlei" >诗文</a>
                        <a class="icon-eye-open" style=" text-decoration:none;margin-right: 10px;margin-left: 10px;
                                   color: #b4b4b4;">23x</a>
                        <a class="icon-heart" style=" text-decoration:none;    margin-right: 10px;
                                   color: #b4b4b4;" ></a>
                    </div>
                    <a><img src="../../../php/article/<?php echo $value['img'] ?>" class="img-thumbnail"></a>
                </div>
                </li>
            </ul>
            <?php
        }
    }

    ?>
</div>