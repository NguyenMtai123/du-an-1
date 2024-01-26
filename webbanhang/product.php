<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
</head>
<body>
        <br><h1>Danh sách sản phẩm</h1><br>
        <button><a href="add.php" target="_self">Add Product</a></button><br><br>
    <thead>
        <tr>
            <th>ID---</th>
            <th>-----Tên-----</th>
            <th>Hình ảnh</th>
            <th>---Giá---</th>
            <th>---Bảo hành-----</th>
        </tr>
    </thead>
    <tbody>
        <?php
            include "connect.php";
            $sql = "SELECT * FROM sanpham";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($result)){
        ?>
            <tr>
                <br>
                <td> <?php echo $row['id'];?> </td>
                <td> <?php echo $row['name'];?> </td>
                <td><img width="30" height="40" src="img/<?php echo $row['image']; ?>" alt=""></td>
                <td> <?php echo $row['price'];?> </td>
                <td><?php echo $row['warranty'];?></td>
                <button><a href="edit.php?this_id=
                <?php echo $row['id'];?>">Edit</a></button>
                <button><a href="delete.php?this_id=
                <?php echo $row['id'];?>">Delete</a></button>
                <br><br>
            </tr>
        <?php } ?>
    </tbody>
</body>
</html>
