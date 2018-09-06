<?php
if(isset($_GET['stt'])){
    $stt=$_GET['stt'];
    include 'Database.php';
    $sql="delete from web where stt='$stt'";
    $connect->query($sql);
    header("location: list.php");
}
?>

