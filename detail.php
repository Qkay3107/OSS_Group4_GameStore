<?php
    
    

    $mat_hang_id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "Gamers_Alliance";
    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT mat_hang.mat_hang_id, mat_hang.mo_ta,mat_hang.ten_mat_hang, mat_hang.don_gia, the_loai.ten_the_loai, dev_team.dev_name, mat_hang.anh
    FROM mat_hang
    JOIN dev_team ON mat_hang.dev_team_id = dev_team.dev_id
    JOIN the_loai ON mat_hang.the_loai = the_loai.the_loai_id  WHERE mat_hang_id = $mat_hang_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
         
        

        echo "<div style='display: flex; width:800px; margin-bottom: 10px; margin-left:50px; margin-top:50px;
       background-color: #FFCCCC   ; border-radius:10px '>";
        echo "<div style='width: 50%; '>";
        echo "<img  src='game_img/{$row['anh']}' style=' border-radius: 10px;' width='300px'  >";
        echo "</div>";
        echo "<div style='width: 50%; '>";
        echo "<div style='text-align: center;'>" . $row['ten_mat_hang'] . "</div><br>";
        echo "<div  >Mô tả: " . $row['mo_ta'] . "</div><br>";
        echo "<div>Thể loại: " . $row['ten_the_loai'] . "</div><br>";
        echo "<div>Nhà phát triển: " . $row['dev_name'] . "</div><br>";
        echo "<div>Giá: " . $row['don_gia'] . "VNĐ</div>";
        echo "</div>";
        echo "</div>";
       

    }

    $conn->close();
?>

<a style="margin-left: 50px;" href="catalog.php">Quay lại danh mục sản phẩm</a>

