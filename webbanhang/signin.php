<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng kí</title>
</head>
<body>
    <h1 style="text-align: center;">Sign in </h1>
    <form style="text-align: center;" action="signin.php" method="post">
    <label> Username </label>
    <input type="text" name="username" id="username" placeholder="Tên đăng kí"><br><br>
    <label> Password </label>
    <input type="text" name="password" id="password" placeholder="Mật khẩu"><br><br>
    <button type="submit" name="submit"> Sign in </button>
    <button type="submit" name="back"> Back </button>
</form>
</body>
</html>
<?php
include_once"connect.php";
if( isset($_POST['submit'])){
    $id = "";
    $username =$_POST['username'];
    $password =$_POST['password'];
    $level = 2;
    $sql = "INSERT INTO thanhvien (id,username,password,level) VALUES('$id','$username','$password','$level')";
    mysqli_query($conn,$sql);
    header('locaation: login.php');
}
if(isset($_POST['back'])){
    header('location: login.php');
}
?>
