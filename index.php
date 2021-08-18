<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
<?php
$username = "root";//khai bao username
$password = ""; //khai bao password
$server = "localhost"; //khai bao server
$dbname = "tintuc";//khai bao database
// ket noi database tintuc
$connect = new mysqli($server,$username,$password,$dbname);
//neu ket noi bi loi thi xuat bao loi va thoat.
if ($connect->connect_error){
    die("khong ket noi :". $connect->connect_error);
    exit();
}
//khai bao gia tri ban dau , neu không có thì khi chưa submit câu insert sẽ báo lỗi
$id = "";
$addresss = "";
$name = "";

//lấy giá trị post từ form vừa submit
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST["id"])) { $id = $_POST['id'];}
    if(isset($_POST["address"])) { $id = $_POST['address'];}
    if(isset($_POST["name"])) { $id = $_POST['name'];}
    //code xu ly , insert du lieu vao table
    $sql = "INSERT INTO tin_xahoi (id,address,name)
value ('$id','$addresss','$name')";
    if ($connect->query($sql) == true){
        echo " them du lieu thanh cong ";
    } else {
        echo "Error:". $sql ."<br>" . $connect->error;
    }
}
//đóng database
$connect->close();
?>
<form action="" method="post">
    <table>
        <tr>
            <th>ID:</th>
            <td><input type="text" name="id" value=""></td>
        </tr>
        <tr>
            <th>address:</th>
            <td><input type="text" name="address" value=""></td>
        </tr>
        <tr>
            <th>name:</th>
            <td><input type="text" name="name" value=""></td>
        </tr>
    </table>
    <button type="submit">gửi</button>
</form>
</body>
</html>
