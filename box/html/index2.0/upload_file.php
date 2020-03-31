<?php
// 允许上传的图片后缀
header("Content-type: text/html; charset=utf-8");
$file = $_FILES["file"];
$id=$_POST["id"];
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "school";
 
// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 
 
$sql = "SELECT * FROM class where id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// 输出数据
while($row = $result->fetch_assoc()) {
    $usename=$row["id"].$row["name"];

    $name = iconv('utf-8','gb2312',$usename.".jpg");
    if($_FILES["file"]["size"] > 2048000){
        echo "错误：".$file["error"];
        echo "如果错误和班长说";
    }else{
       
    
        //保存上传的文件
        if(file_exists("upload".$file["name"])){
            echo $file["name"]."文件已经存在";
        }else{
            //如果目录不存在则将该文件上传
            if(move_uploaded_file($file['tmp_name'],"upload/".$name)){
    //            move_uploaded_file($file['tmp_name'],"upload/".$file["name"]);
                header("location:logn.html");
    
                
            }
    }
    } 





}
} else {
header("location:nonono.html");
}

$conn->close();






?>