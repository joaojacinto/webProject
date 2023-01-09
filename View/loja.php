<?php
    include "C:\xampp\htdocs\GitHub\webProject\Model\db_connect.php";

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="index.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja</title>
</head>
<body>

    <div class="wrapper">
        <div class="sidebar">
            <h2>Pinceladas</h2>
            <ul>
                <li><a href="index.html"><i class="fas fa-home"></i>Home</a></li>
                <li><a href="loja.php"><i class="fas fa-user"></i>Loja</a></li>
                <li><a href="#"><i class="fas fa-address-card"></i>Galeria</a></li>
                <li><a href="#"><i class="fas fa-project-diagram"></i>Contacto</a></li>
            </ul> 
            <div class="social_media">
              <a href="#"><i class="fab fa-facebook-f"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
          </div>
        </div>
        <div class="main_content">
            <div class="header">Pinceladas</div>  
            <div class="info">
            <?php
                // Create a query
                $query = 'SELECT id,name,filename
                    FROM images
                    ORDER BY name';

                // Execute the query
                $result = mysqli_query($connect, $query);

                // If there is no result, display an error message
                if (!$result)
                {
                    echo 'Error Message: ' . mysqli_error($connect) . '<br>';
                    exit;
                }

                // Display the number of recirds found
                echo '<p>The query found ' . mysqli_num_rows($result) . ' rows:</p>';

                // Loop through the records found
                while ($record = mysqli_fetch_assoc($result))
                {

                    // Output the record using if statements and echo
                    echo '<hr>';

                    echo '<h2>'.$record['name'].'</h2>';

                    echo '<img src="'.$record['filename'].'" width="300">';

                }

            ?>
            <div></div>
            <div></div>
            <div></div>
          </div>
        </div>
    </div>
    
</body>
</html>