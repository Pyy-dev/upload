<?php
// 允许上传的图片后缀
header("Content-type: text/html; charset=utf-8");
$file = $_FILES["file"];
if($_FILES["file"]["size"] > 2048000){
    echo "错误：".$file["error"];
    echo "如果错误和班长说";
}else{
    $name = iconv('utf-8','gb2312',"upload/".$_POST["usename"].".jpg");

    //保存上传的文件
    if(file_exists("upload".$file["name"])){
        echo $file["name"]."文件已经存在";
    }else{
        //如果目录不存在则将该文件上传
        if(move_uploaded_file($file['tmp_name'],$name)){
//            move_uploaded_file($file['tmp_name'],"upload/".$file["name"]);
            header("location:logn.html");

            
        }
}
}
?>