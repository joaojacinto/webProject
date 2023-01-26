<?php
require "/xampp/htdocs/webProject/Controller/connect.php";

$primeiro_nome = $_REQUEST['primeiro'];
$apelido = $_REQUEST['apelido'];
$email = $_REQUEST['email'];
$assunto = $_REQUEST['assunto'];


$sql = "INSERT INTO contacto (primeiro_nome, apelido, email, assunto) VALUES ('$primeiro_nome', '$apelido', '$email', '$assunto')";

mysqli_query($conn, $sql);




function function_alert($message) { 
    echo "<script>alert('$message');</script>";
}
  
  
// Function call
function_alert("O seu pedido de contacto foi submetido.");


if(isset($_POST['email'])){
    function_alert("O seu pedido de contacto foi submetido.");
    header('Location: /webProject/View/contacto.php', urlencode($Message));
    die();
} else {
    function_alert('Devera preencher todos os campos!');
}

?>