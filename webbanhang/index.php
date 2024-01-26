<?php
session_start();
if (!isset($_SESSION['mySession'])) {
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
</head>

<body>
    <h1>Trang chủ <a href="logout.php">
    <button type="submit" name="logout"> Đăng xuất </button></a></h1>
    <h4>Một số sản phẩm: <a href="product.php" target="_self"> Xem Sản phẩm </a> </h4>
    <form action="" method="post">
    <input type="text" name="noidung" id="noidung">
    <button type="submit" name="submit">Tìm kiếm</button>
    </form>
    <?php
        if(isset($_POST['submit'])){
            if(!empty($_POST['noidung']))
               $noidung = $_POST['noidung'];
            else echo "Bạn chưa điền thông tin";
        }else{
            $noidung = false;
        }
    ?>

    <?php
        if(!empty($noidung)){
        include_once "connect.php";
        $sql = "SELECT * FROM sanpham WHERE name LIKE '%$noidung%' ";
        $result = mysqli_query($conn,$sql);
        $cnt = 0;
        while($row = mysqli_fetch_array($result)){?>
        <h5><?php echo $row['name'];?></h5>
        <?php
        $cnt++;}
        if($cnt == 0) echo "Không tìm thấy sản phẩm";
    }
    ?>
</body>

</html>
