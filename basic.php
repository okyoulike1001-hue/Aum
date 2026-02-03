<?php
// ติดต่อฐานข้อมูล
$db = mysqli_connect("localhost","root","","register");
// คำสั่ง SQL เพื่อข้อมูล
if( isset($_POST['save']) ) {
$fullname = $_POST['fullname'];
$date2 = $_POST['date2'];
$email = $_POST['email'];
$passwords = $_POST['passwords'];
$address = $_POST['address'];

$sql = "INSERT INTO `accounts` (`id`, `fullname`, `date2`, `email`, `passwords`, `address`) 
VALUES (NULL, '$fullname', '$date2', '$email', '$passwords', '$address');";

// รันการทำงาน
$qr = mysqli_query($db,$sql);
// หลังจากทำงานเสร็จ
if($qr) {
header("location:basic.php");
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิก</title>
</head>
<body>
    <form action="" method="post">
            <h1>register</h1>
            <hr>
            ชื่อ <input type="text" name="fullname" required> <br>
            วัน/เดือน/ปีเกิด <input type="date" name="date2" required> <br>
            Email <input type="email" name="email" required> <br>
            รหัสผ่าน <input type="password" name="passwords" required> <br>
            ที่อยู่ <textarea name="address" cols="30" rows="10" required ></textarea>

            <input type="submit" name="save" value="สมัครสมาชิก">
    </form>



    <!-- แสดงขข้อมูล -->
    <table border="1" style="width: 100%;">
        <tr>
            <td>id</td>
            <td>ชื่อ - สกุล</td>
            <td>วัน/เดือน/ปี เกิด</td>
            <td>อีเมลล์</td>
            <td>รหัสผ่าน</td>
            <td>ที่อยู่</td>
            <td>จัดการ</td>
        </tr>

        <?php
        $sql ="SELECT * FROM `accounts`";
        $qr = mysqli_query($db,$sql);
        while($row = mysqli_fetch_assoc($qr)){
        ?>  
        
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['fullname']; ?></td>
            <td><?php echo $row['date2']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['passwords']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td></td>
        </tr>

        <?php } ?>
    </table>
</body>
</html>