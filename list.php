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
$sql = "SELECT ID,ADDRESS,NAME from tin_xahoi";
$result =$connect->query($sql);
if ($result->num_rows >0) {
    //load dữ liệu lên website
    while ($row = $result->fetch_row()) {
        echo "id:" . $row["id"] . "-address:" . $row["address"] . ""
            . "-name:" . $row["name"] . "<br>";
    }
}else{
    echo "0 results";
}
$connect->close();
?>
