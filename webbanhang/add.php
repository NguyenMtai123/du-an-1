<?php
    include "connect.php";

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $image = $_FILES['hinhanh']['name'];//chỉ lấy tên hình ảnh
        $image_tmp_name = $_FILES['hinhanh']['tmp_name'];//lấy đường dẫn ảnh
        $price = $_POST['price'];
        $warranty = $_POST['warranty'];
        $sql = "INSERT INTO sanpham (name,image,price,warranty) VALUE('$name','$image','$price','$warranty')";
        mysqli_query($conn,$sql);
        move_uploaded_file($image_tmp_name ,'img/'.$image);
    }
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        header('location: product.php');
    }
?>

<form action="add.php" method="post" enctype="multipart/form-data">
    <br><br>
    <label> Name: </label>
    <input type="text" name="name" id="ten" placeholder="Tên sản phẩm"><br><br>
    <label> Image: </label>
    <input type="file" name="hinhanh" id="hinhanh"><br><br>
    <label> Price: </label>
    <input type="text" name="price" id="gia" placeholder="Giá sản phẩm"><br><br>
    <label> Warranty: </label>
    <input type="text" name="warranty" id="baohanh" placeholder="Thời gian bảo hành">
    <br><br>
    <button type="submit" name="submit">Send</button>
</form>
