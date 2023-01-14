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
} else {
echo "Connected successfully<br>";}


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
// $conn->close();


function getPhotos(){

}

?>