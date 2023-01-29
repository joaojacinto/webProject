<?php
    include 'connect.php';
    $nome = $_REQUEST['Nome'];
    $email = $_REQUEST['Email'];
    $tema = $_REQUEST['Tema'];
    $assunto = $_REQUEST['Assunto'];


    $sql = "INSERT INTO contacto (nome, email, tema, assunto) VALUES ('$nome', '$email', '$tema', '$assunto')";
    mysqli_query($conn, $sql);
    echo '<script>alert("O seu pedido de contacto foi inserido.")</script>';
    
    include 'test.php';
?>