<?php
$servername = "localhost";
$databaseName = "web_project";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $databaseName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br>";


//Records Created
// $sql = "INSERT INTO photos (id, photo_name, photo_file_name)
// VALUES (DEFAULT, 'imagem1', '/View/imgs/imagem1.jpg');";

// $sql .= "INSERT INTO photos (id, photo_name, photo_file_name)
// VALUES (DEFAULT, 'imagem2', '/View/imgs/imagem2.jpg');";

// $sql .= "INSERT INTO photos (id, photo_name, photo_file_name)
// VALUES (DEFAULT, 'imagem3', '/View/imgs/imagem3.jpg')";



// if ($conn->multi_query($sql) === TRUE) {
//   echo "New records created successfully<br>";
  
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }

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
        // Free result set
        mysqli_free_result($result);
    } else {
        echo "No records found";
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
$conn->close();


function getPhotos(){

}

?>