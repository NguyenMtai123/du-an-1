<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>

<body>
    <h1 style="text-align: center;">Đăng nhập</h1>
    <form style="text-align: center;" action="login.php" method="post">
        <br><br>
        <label>Username</label>
        <input type="text" name="username" id="username" placeholder="Tên đăng nhập"><br><br>
        <label>Password</label>
        <input type="text" name="password" id="password" placeholder="Mật khẩu"><br><br>
        <button type="submit" name="login">Login</button>
        <button type="submit" name="signin"><a   href="signin.php" style="text-decoration: none; color :black">Sign in</a></button>
        <br><br>
    </form>
</body>

</html>
<?php
include "connect.php";
session_start();
if(isset($_SESSION['mySession'])){
    header('location: index.php');

}//tự động đăng nhập
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM thanhvien WHERE username = '$username' AND password ='$password'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $_SESSION['mySession'] = $username;
        header("location:index.php");
    } else {
        echo "<br>";
        echo "Tài khoản hoặc khẩu sai!";
    }
}
?>
