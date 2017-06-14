<?php
/**
 * Created by PhpStorm.
 * User: 王子真
 * Date: 2017/5/12
 * Time: 18:57
 */
$uptypes=array(
    'image/jpg',
    'image/jpeg',
    'image/png',
    'image/pjpeg',
    'image/gif',
    'image/bmp',
    'image/x-png'
);

$max_file_size=2000000;     //上传文件大小限制, 单位BYTE
$destination_folder="uploadimg/"; //上传文件路径


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!is_uploaded_file($_FILES["upfile"]["tmp_name"])) //是否存在文件
    {
        echo "图片不存在!";
        exit;
    }

    $file = $_FILES["upfile"];
    if ($max_file_size < $file["size"]) //检查文件大小
    {
        echo "文件太大!";
        exit;
    }

    if (!in_array($file["type"], $uptypes)) //检查文件类型
    {
        echo "文件类型不符!" . $file["type"];
        exit;
    }

    if (!file_exists($destination_folder)) {
        mkdir($destination_folder);
    }

    $filename = $file["tmp_name"];
    $image_size = getimagesize($filename);
    $pinfo = pathinfo($file["name"]);
    $name = pathinfo($file["name"], PATHINFO_BASENAME);
    $ftype = $pinfo['extension'];
    $destination = $destination_folder . time() . "." . $ftype; //时间名字

    if (file_exists($destination)) {
        echo "同名文件已经存在了";
        exit;
    }

    if (!move_uploaded_file($filename, $destination)) {
        echo "移动文件出错";
        exit;
    }




if(isset($_POST["button"]) && $_POST["button"] == "提交"){

    $title=$_POST['title'];
    $content=$_POST['content'];
    $author=$_POST['author'];
    $article_class=$_POST['article_class'];
    $img=$destination;
    $time=date("Y-m-d H:i:s");

    session_start();
    $b=$_SESSION["id"];

    if(!(isset($_POST['title'])&&(!empty($_POST["title"])))){
     echo "<script>alert('标题不能为空'); history.go(-1);</script>";
  }
  else{
      $a=mysqli_connect('localhost','root','101434');   //连接数据库
      mysqli_select_db($a,"name"); //选择数据库
      mysqli_query($a,"set names 'utf8'"); //设定字符集
      $sql_insert="insert into uert.article (Title,content,author,datelin,id,img,class) values('$title','$content','$author','$time','$b','$img','$article_class')";
      $res_insert=mysqli_query($a,$sql_insert);

      if($res_insert){
          echo "<script>alert('提交成功'); </script>";
          echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../../web/WEB-INF/home/home.php">';
      }
      else{
          echo '失败le';


      }
  }
}

else {
    echo "链接失败";
}}

