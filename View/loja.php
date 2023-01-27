<?php
    error_reporting(0);
    $msg = "";
    
    if (isset($_POST['upload'])) {
        include '/xampp/htdocs/webProject/Model/db_connect.php';
    
        $filename = $_FILES["fileToUpload"]["name"];
        $tempname = $_FILES["fileToUpload"]["tmp_name"];
        $nomeEncomenda = $_REQUEST['nomeEncomenda'];
        $tamanho = $_REQUEST['tamanho'];
        $folder = "./encomendasImagens/" . $nomeEncomenda. " - " .$tamanho . " - " . $filename;
    
        $sql = "INSERT INTO encomendas (nome_encomenda, file_name) VALUES ('$nomeEncomenda','$tamanho', '$filename')";
        
        mysqli_query($conn, $sql);
    
        if (move_uploaded_file($tempname, $folder)) {
            echo "<h3>  Image uploaded successfully!</h3>";
        } else {
            echo "<h3>  Failed to upload image!</h3>";
        }
    }
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
                    <li><a href="index.php"><i class="fas fa-home"></i>Home</a></li>
                    <li><a href="loja.php"><i class="fas fa-user"></i>Loja</a></li>
                    <li><a href="galeria.php"><i class="fas fa-address-card"></i>Galeria</a></li>
                    <li><a href="contacto.php"><i class="fas fa-project-diagram"></i>Contacto</a></li>
                </ul> 
                <div class="social_media">
                    <a href="https://www.facebook.com/pinceladasAJ" target=_blank class="fa fa-facebook"></a>
                    <a href="https://www.instagram.com/pinceladas.aj/" target=_blank class="fa fa-instagram"></a>
                    <a href="https://www.pinterest.pt/alinejacinto134/" target=_blank class="fa fa-pinterest"></a>
            </div>
            </div>
            <div class="main_content">
                <h1 class="header">LOJA</h1>  
                <form class="formLoja" action="" method="post" enctype="multipart/form-data">
                    Selecione a imagem para upload:
                    <br><br><input type="file" id="fileToUpload" name="fileToUpload">
                    <br><br>Atribua um nome para a sua encomenda: <input type="text" id="nomeEncomenda" name="nomeEncomenda">
                    <br><br>Escolha um tamanho: 
                    <select id="types" name="tamanho">
                        <option value="a4">A4</option>
                        <option value="a3">A3</option>
                        <option value="a2">A2</option>
                    </select>
                    <br><br><button type="submit" value="Upload Image" id="uploadbtn" name="upload">Submeter Encomenda</button>
                </form>
                <?php
                    $query = " select * from encomendas ";
                    $result = mysqli_query($conn, $query);
             
                    while ($data = mysqli_fetch_assoc($result)) {
                ?>
                    <img src="./encomendasImagens/<?php echo $data['file_name']; ?>">
                <?php
                    }
                ?>
            </div>
        </div> 
    
</body>
</html>