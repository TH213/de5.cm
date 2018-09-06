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
                <table width="800" border="1">
                    <tr>
                        <td width="400"><a href="list.php">Danh Sách</a></td>
                        <td width="400"><a href="them.php">Thêm</a></td>
                    </tr>
                </table>
            </div>
            <div id="main">    
                <form action="" method="post" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td>ULR</td>
                            <td><input type="text" name="url" size="30"</td>
                        </tr>
                        <tr>
                            <td>Ảnh đại diện</td>
                            <td><input type="file" name="anh" size="35"</td>
                        </tr>
                        <tr>
                            <td>Mô tả</td>
                            <td><input type="text" name="mota" size="30"</td>
                        </tr>
                        <tr>
                            <td>Thể loại</td>
                            <td><input type="text" name="theloai" size="30"</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="them" value="Thêm" size="30"/></td>
                        </tr>
                    </table>

                </form>
                <?php
                if (isset($_POST['them'])) {
                    include 'Database.php';
                    $url = $_POST['url'];
                    $anh = $_FILES['anh']['name'];
                    $mota = $_POST['mota'];
                    $theloai = $_POST['theloai'];
                    move_uploaded_file($_FILES['anh']['tmp_name'], "images/" . $anh);
                    $sql = "insert into web(url,anh,mota,theloai) values('$url','$anh','$mota','$theloai')";
                    $result = $connect->query($sql);
                    if ($result) {
                        echo "Thêm thành công";
                    } else {

                        echo"Thêm thất bại";
                    }
                }
                ?>


            </div>
           
        </div>
    </body>
</html>




