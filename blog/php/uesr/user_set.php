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

$imgpreview=1;      //是否生成预览图(1为生成,其他为不生成);
$imgpreviewsize=1/2;    //缩略图比例

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


//    echo " <font color=red>已经成功上传</font><br>文件名:  <font color=blue>".$destination_folder.$fname."</font><br>";
//    echo " 宽度:".$image_size[0];
//    echo " 长度:".$image_size[1];
//    echo "<br> 大小:".$file["size"]." bytes";
//    if ($imgpreview == 1) {
////        echo "<br>图片预览:<br>";
//        echo "<img src=\"" . $destination . "\"  width=" . ($image_size[0] * $imgpreviewsize) . " height=" . ($image_size[1] * $imgpreviewsize);
////       echo " alt=\"图片预览:\r文件名:".$destination."\r上传时间:\">";
//
//    }

    if(isset($_POST["button"]) && $_POST["button"] == "提交"){

        $nickname=$_POST['nickname'];
        $qianming=$_POST['qianming'];
        session_start();
        $b=$_SESSION["id"];
        $img=$destination;


        if(!(isset($_POST['nickname'])&&(!empty($_POST["nickname"])))){
            echo "<script>alert('姓名不能为空'); 
           </script>";
        }
        else{
            $a=mysqli_connect('localhost','root','101434');   //连接数据库
            mysqli_select_db($a,"name"); //选择数据库
            mysqli_query($a,"set names 'utf8'"); //设定字符集
            $sql_insert="UPDATE uert.name SET nickname='$nickname',qianming='$qianming',img1='$img' WHERE id='$b'";
            $res_insert=mysqli_query($a,$sql_insert);

            if($res_insert){

                echo "<script>alert('提交成功'); history.go(-1);</script>";

            }
            else{
                echo "$nickname,$qianming,$img,$b";
                echo '失败le';


            }
        }
    }

    else {
        echo "链接失败";
    }}

//
//  echo $sql_insert;