<?php

function estabelerConexao(){
     // Deviam estar num ficheiro de configuração
    $host = "localhost";
    $databaseName = "web_project";
    $username = "root";
    $password = "";

    $dsn = "mysql:host=$host;dbname=$databaseName";
    
    try {
        $dbConnect = new PDO("mysql:$dsn;charset=utf8mb4",$username, $password);
        echo "Connection Successful";
        $sql = "SELECT * FROM photos";
        $fotos = $dbConnect->query($sql);
        foreach($fotos AS $foto){
            echo $foto["photo_id"];
        }
    }
    catch (\PDOException $e) {
        echo $e->getMessage();
    }

    return $dbConnect;
}

?>