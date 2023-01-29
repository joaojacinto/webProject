<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="encomendas_css.css">
    <title>Encomenda</title>
</head>
<body>
<div class="container">
  <div class="title">
      <h2>Encomenda</h2>
  </div>
<div class="d-flex">
  <form action="" method="POST" enctype="multipart/form-data">
    <label>
      <span class="fname">Primeiro e Último nome <span class="required">*: </span></span>
      <input type="text" name="nome">
    </label>
    <label>
      <span>Morada completa <span class="required">*: </span></span>
      <input type="text" name="morada" placeholder="Morada com nº de porta, etc" required>
    </label>
    <label>
      <span>Localidade <span class="required">*: </span></span>
      <input type="text" name="localidade"> 
    </label>
    <label>
      <span>Código Postal <span class="required">*: </span></span>
      <input type="text" name="cp"> 
    </label>
    <label>
      <span>Contacto <span class="required">*: </span></span>
      <input type="tel" name="contacto"> 
    </label>
    <label>
      <span>Email <span class="required">*: </span></span>
      <input type="email" name="email"> 
    </label>

    <label for="ficheiro">Selecionar Imagem:
        <input type="file" id="ficheiro" name="ficheiro" multiple><br><br>
    </label>

    <label>Selecionar Tamanho:
        <select id="tamanho" name="tamanho">
            <option value="a2">A2 - 65,00 Eur</option>
            <option value="a3">A3 - 40,00 Eur</option>
            <option value="a4">A4 - 25,00 Eur</option>
        </select>
    </label>
    <button class="button button1" name="upload">ENCOMENDAR</button>
  </form>

  <?php
    include 'connect.php';
    use PHPMailer\PHPMailer\PHPMailer;

    if (isset($_POST['upload'])) {
        $filename = $_FILES["ficheiro"]["name"];
        $tempname = $_FILES["ficheiro"]["tmp_name"];
        $nome = $_REQUEST['nome'];
        $morada = $_REQUEST['morada'];
        $localidade = $_REQUEST['localidade'];
        $cp = $_REQUEST['cp'];
        $contacto = $_REQUEST['contacto'];
        $email = $_REQUEST['email'];
        $tamanho = $_REQUEST['tamanho'];
        $folder = "./encomendasImagens/" . $nome . " - " . $tamanho . " - " . $filename;
    
        $sql = "INSERT INTO encomendas (nome, morada, localidade, cp, contacto, email, ficheiro, tamanho) VALUES ('$nome','$morada', '$localidade', '$cp', '$contacto', '$email', '$filename', '$tamanho')";
        
        mysqli_query($conn, $sql);
        sendmail();
    
        if (move_uploaded_file($tempname, $folder)) {
            echo "<h3>  Encomenda inserida!</h3>";
        } else {
            echo "<h3>  Failed to upload image!</h3>";
        }

    
        function sendmail(){
            $name = $nome;  // Name of your website or yours
            $to = $email;  // mail of reciever
            $subject = "Tutorial or any subject";
            $body = "Send Mail Using PHPMailer - MS The Tech Guy";
            $from = "odinekhead@gmail.com";  // you mail
            $password = "bongox1.";  // your mail password
    
            // Ignore from here
    
            require_once "PHPMailer/PHPMailer.php";
            require_once "PHPMailer/SMTP.php";
            require_once "PHPMailer/Exception.php";
            $mail = new PHPMailer(true);
    
            // To Here
    
            //SMTP Settings
            $mail->isSMTP();
            // $mail->SMTPDebug = 3;  Keep It commented this is used for debugging                          
            $mail->Host = "smtp.gmail.com"; // smtp address of your email
            $mail->SMTPAuth = true;
            $mail->Username = $from;
            $mail->Password = $password;
            $mail->Port = 587;  // port
            $mail->SMTPSecure = "tls";  // tls or ssl
            $mail->smtpConnect([
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
                ]
            ]);
    
            //Email Settings
            $mail->isHTML(true);
            $mail->setFrom($from, $name);
            $mail->addAddress($to); // enter email address whom you want to send
            $mail->Subject = ("$subject");
            $mail->Body = $body;
            if ($mail->send()) {
                echo "Email is sent!";
            } else {
                echo "Something is wrong: <br><br>" . $mail->ErrorInfo;
            }
        }
    
    
            // sendmail();  // call this function when you want to
    
            if (isset($_GET['upload'])) {
                sendmail();
            }

    }

    ?>
 </div>
</div>
</body>
</html>