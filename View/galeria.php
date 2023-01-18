<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="index.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria</title>
</head>
<body>

    <div class="wrapper">
        <div class="sidebar">
            <h2>Pinceladas</h2>
            <ul>
                <li><a href="index.php"><i class="fas fa-home"></i>Home</a></li>
                <li><a href="loja.php"><i class="fas fa-user"></i>Loja</a></li>
                <li><a href="galeria.php"><i class="fas fa-address-card"></i>Galeria</a></li>
                <li><a href="#"><i class="fas fa-project-diagram"></i>Contacto</a></li>
            </ul> 
            <div class="social_media">
                <a href="https://www.facebook.com/pinceladasAJ" target=_blank class="fa fa-facebook"></a>
                <a href="https://www.instagram.com/pinceladas.aj/" target=_blank class="fa fa-instagram"></a>
                <a href="https://www.pinterest.pt/alinejacinto134/" target=_blank class="fa fa-pinterest"></a>
          </div>
        </div>
        <div class="main_content">
            <div class="header">Pinturas a carvao</div>  
            <div class="info">
            <?php
                include '/xampp/htdocs/webProject/Controller/connect.php';
                $sql = "SELECT * FROM photos";
                if ($result = mysqli_query($conn, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        echo '<table border="1px">';
                        echo "<tr>";
                        echo "<th>Product Name</th>";
                        echo "<th>Price (INR)</th>";
                        echo "<th>Category</th>";
                        echo "<th>Image</th>";
                        echo "</tr>";
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['photo_name'] . "</td>";
                            echo "<td>" . "<img src=".$row['photo_file_name'].' width=500px height="500px">' . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                        mysqli_free_result($result);
                    } else {
                        echo "No records found";
                    }
                } else {
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                }
            ?>
          </div>
        </div>
    </div>
    
</body>
</html>