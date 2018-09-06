
<html>
    <head>
        
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
                    <tr align="center">
                        <td width="400" ><a href="list.php">Danh Sách</a></td>
                        <td width="400"><a href="them.php">Thêm</a></td>
                    </tr>
                </table>
            </div>
            <div id="main">    
                <form action="" method="post" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td><input type="text" name="Nhap" size="50" placeholder="Tìm: thể loại"/></td>
                            <td> <input type="submit" name="Loc" value="Lọc theo thể loại"/></td>
                        </tr>
                    </table>
                    <table width="100%" border="1" style="text-align: center;">
                        <tr>
                            <th>Số thứ tự</th>
                            <th>URL</th>
                            <th>Ảnh đại diện</th>
                            <th>Mô tả</th>
                            <th>Thể loại</th>
                            <th colspan="2">Thao tác</th>
                        </tr>
                        <?php
                        include 'Database.php';
                        if (isset($_POST['Loc'])) {
                            $theloai = $_POST['Nhap'];
                            $sql = "select * from web where theloai='$theloai'";
                        } else {
                            $sql = "select *from web";
                        }//loc tim kiem
                        $result = $connect->query($sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?php echo $row['stt'] ?></td>
                                <td><?php echo $row['url'] ?></td>
                                <td> <img width="100" height="70" src="images/<?php echo $row['anh'] ?>"/></td>
                                <td><?php echo $row['mota'] ?></td>
                                <td><?php echo $row['theloai'] ?></td>
                                
                               <td><a href="edit.php?stt=<?php echo $row['stt'] ?>">Sửa</a></td>
                               <td><a href="delete.php?stt=<?php echo $row['stt'] ?>" onclick="return confirm('Bạn có chắc muốn xóa không?')">Xóa</a></td>

                            </tr>
                            <?php
                        }
                        ?>     
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>




