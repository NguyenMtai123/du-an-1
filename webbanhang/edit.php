<?php
    include "connect.php";
    $this_id = $_GET['this_id'];
    $sql = "SELECT * FROM sanpham WHERE id='$this_id'" ;//"".$this_id
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);
    //Khi nhấn nút Edit
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $warranty = $_POST['warranty'];
        $image = $_FILES['hinh']['name'];//lấy tên ha
        $image_tmp_name = $_FILES['hinh']['tmp_name'];
        //lấy đường dẫn ảnh
        //câu lệnh update
        if(empty($image)){
            $image = $row['image'];
        }
        $sql = "UPDATE sanpham SET id='$id',name='$name', image='$image', price='$price', warranty='$warranty' WHERE id='$this_id'";
        mysqli_query($conn,$sql);
        move_uploaded_file($image_tmp_name, 'img/'.$image);
        header('location: product.php');
    }

?>

    <h1> Sản Phẩm: <?php echo $row['name'];?> </h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label> ID: </label>
        <input type="text" name="id" id="id" value="<?php echo $row['id'];?>" placeholder="Mã id"><br><br>
        <label> Name: </label>
        <input type="text" name="name" id="name" value="<?php echo $row['name'];?>" placeholder="Tên sản phẩm"><br><br>
        <label> Image: </label>
        <span><img src="img/<?php echo $row['image'];?>" alt="" width="30px" height="40px"></span>
        <input type="file" name="hinh" id="hinh"><br><br>
        <label> Price: </label>
        <input type="text" name="price" id="price" value="<?php echo $row['price'];?>" placeholder="Giá sản phẩm"><br><br>
        <label> Warranty: </label>
        <input type="text" name="warranty" id="warranty" value="<?php echo $row['warranty'];?>" placeholder="Thời gian bảo hành"><br><br>
        <button type="submit" name="submit">Edit</button>
    </form>
