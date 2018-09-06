<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Liên kết WEB</title>
        <link href="css.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
        <div id="wrap">
            <div id="top">
                <p>&nbsp;</p>
                <p>Liên Kết Web</p>
            </div>
            <div id="menu">
                <table width="200" border="1">
                    <tr>
                        <td><a href="list.php">Danh Sách</a></td>
                        <td><a href="them.php">Thêm</a></td>
                    </tr>
                </table>
            </div>
            <div id="main">    
                <?php
                if(isset($_GET['stt'])){
                    $stt=$_GET['stt'];
                    include 'Database.php';
                 $sql2="select * from web where stt='$stt'";
                $result=$connect->query($sql2);
                $row= mysqli_fetch_assoc($result);
                if (isset($_POST['capnhat'])) {
                    $url = $_POST['url'];
                    $anh = $_FILES['anh']['name'];
                    $mota = $_POST['mota'];
                    $theloai = $_POST['theloai'];
                    move_uploaded_file($_FILES['anh']['tmp_name'], "images/" . $anh);
                    $sql = "UPDATE web  SET url='$url',anh='$anh',mota='$mota',theloai='$theloai' where stt='$stt'";
                    $connect->query($sql);
                    header("location: list.php");
                }
                }
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td>ULR</td>
                            <td><input type="text" name="url" size="30" value="<?php echo $row['url'] ;?>"/></td>
                        </tr>
                        <tr>
                            <td>Ảnh đại diện</td>
                            <td><input type="file" name="anh" size="30" value="<?php echo $row['anh'] ;?>"/></td>
                        </tr>
                        <tr>
                            <td>Mô tả</td>
                            <td><input type="text" name="mota" size="30"value="<?php echo $row['mota']; ?>"/></td>
                        </tr>
                        <tr>
                            <td>Thể loại</td>
                            <td><input type="text" name="theloai" size="30"value="<?php echo $row['theloai']; ?>"/></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="capnhat" value="them_trang_web" size="30"/></td>
                        </tr>
                    </table>
                </form>
            </div>
          <div id="bot">Đoàn Thùy Trang AT12E</div>
        </div>
    </body>
</html>





