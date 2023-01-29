<?php
    include 'connect.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Pinceladas</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body, h1,h2,h3,h4,h5,h6 {
            font-family: "Montserrat", sans-serif;
        }
        .w3-row-padding img {
            margin-bottom: 12px;
        }
        /* Set the width of the sidebar to 120px */
        .w3-sidebar {
            width: 120px;background: #222;
        }
        /* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
        #main {
            margin-left: 120px;
        }
        /* Remove margins from "page content" on small screens */
        @media only screen and (max-width: 600px) {
            #main {
                margin-left: 0;
            }
        }

        .gallery {
            display: flex;
            flex-wrap: wrap;
        }

        .gallery img {
            width: 500px;
            height: 500px;
            object-fit: cover;
            margin: 10px;
            flex: 25%;
            max-width: 47%;
            padding: 0 4px;
        }

        .gallerycontent{
            width: 100%;
            margin-left: 200px;
            text-align: left;
            padding: 0 4px;
        }
    </style>
</head>
    <body class="w3-black">
    <!-- Icon Bar (Sidebar - hidden on small screens) -->
    <nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
    <!-- Avatar image in top left corner -->
    <img src="https://iili.io/H0bVAzJ.webp" style="width:100%">
    <a href="#home" class="w3-bar-item w3-button w3-padding-large w3-black">
        <i class="fa fa-home w3-xxlarge"></i>
        <p>HOME</p>
    </a>
    <a href="#about" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
        <i class="fa fa-user w3-xxlarge"></i>
        <p>ABOUT</p>
    </a>
    <a href="#gallery" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
        <i class="fa fa-eye w3-xxlarge"></i>
        <p>GALLERY / ENCOMENDAS</p>
    </a>
    <a href="#contact" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
        <i class="fa fa-envelope w3-xxlarge"></i>
        <p>CONTACT</p>
    </a>
    </nav>

    <!-- Page Content -->
    <div class="w3-padding-large" id="main">
    <!-- Header/Home -->
    <header class="w3-container w3-padding-32 w3-center w3-black" id="home">
        <h1 class="w3-jumbo"><span class="w3-hide-small">I'm</span> Aline Jacinto.</h1>
        <p>Pinceladas e rabiscos... Dar asas à Imaginação!</p>
        <img src="https://iili.io/H0bVAzJ.webp" alt="aline" class="w3-image" width="500px" height="500px">
    </header>

    <!-- GALLERY Section -->
    <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
        <h2 class="w3-text-light-grey">About</h2>
        <hr style="width:200px" class="w3-opacity">
        <p>
            Sou artista por dom e não por formação, desde que me conheço que adoro desenhar. pintar, esculpir.<br>
            Nunca tive oportunidade de estudar belas artes mas finalmente decidi que a vida é curta demais para esperar que um dia se tenha tempo para fazer o que se gosta.<br><br>
            Assim aqui estou. Quem sabe... tenha futuro!
        </p>
        </div>
    <!-- End GALLERY Section -->
    </div>

    
    <!-- Portfolio Section -->
    <div class="w3-padding-64 w3-content" id="gallery">
        <h2 class="w3-text-light-grey">MY GALLERY</h2>
        <hr style="width:1300px" class="w3-opacity">
        <div class="gallerycontent">
        <div class="gallery">
            <?php
                $sql = "SELECT * FROM photos";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    echo '<img src='.$row['photo_file_name'].' />';
                }
            ?>
            </div>
        </div>

    <h3 class="w3-padding-16 w3-text-light-grey">Encomendas
        <hr style="width:600px" class="w3-opacity">
    </h3>
    
    <div class="w3-row-padding" style="margin:0 -16px; text-align:center;">
      <div class="w3-half w3-margin-bottom">
        <ul class="w3-ul w3-white w3-center w3-opacity w3-hover-opacity-off">
          <li class="w3-dark-grey w3-xlarge w3-padding-32">ENCOMENDA</li>
          <li class="w3-padding-16">Arte Digital</li>
          <li class="w3-padding-16">Retratos a Carvão</li>
          <li class="w3-padding-16">Tinta Acrílica</li>
          <li class="w3-padding-16">Tamanhos A2, A3 e A4</li>
          <!-- <li class="w3-padding-16">
            <h2>80,00 Eur</h2>
          </li> -->
          <li class="w3-light-grey w3-padding-24">
            <form action="encomenda.php" target="_blank" method="POST">
                <button class="w3-button w3-white w3-padding-large w3-hover-black">Encomendar</button>
            </form>    
        </li>
        </ul>
      </div>
    <!-- End Grid/Pricing tables -->
    </div>
    </div>


    <!-- End of Portfolio Section -->

    <!-- Contact Section -->
    <div class="w3-padding-64 w3-content w3-text-grey" id="contact">
        <h2 class="w3-text-light-grey">Contact Me</h2>
        <hr style="width:200px" class="w3-opacity">

        <div class="w3-section">
        <p><i class="fa fa-map-marker fa-fw w3-text-white w3-xxlarge w3-margin-right"></i> Vila Chã de Ourique, Santarém</p>
        <p><i class="fa fa-phone fa-fw w3-text-white w3-xxlarge w3-margin-right"></i> WhatsApp: 938568337</p>
        <p><i class="fa fa-envelope fa-fw w3-text-white w3-xxlarge w3-margin-right"> </i> Email: avcmcsolla@gmail.com</p>
        </div><br>
        <p>Em caso de dúvidas ou esclarecimentos, por favor entrar em contacto:</p>

        <form action="contacto.php" target="_blank" method="POST">
            <p><input class="w3-input w3-padding-16" type="text" placeholder="Name" required name="Nome"></p>
            <p><input class="w3-input w3-padding-16" type="text" placeholder="Email" required name="Email"></p>
            <p><input class="w3-input w3-padding-16" type="text" placeholder="Subject" required name="Tema"></p>
            <p><input class="w3-input w3-padding-16" type="text" placeholder="Message" required name="Assunto"></p>
            <p>
                <button class="w3-button w3-light-grey w3-padding-large" type="submit">
                    <i class="fa fa-paper-plane"></i> ENVIAR MENSAGEM
                </button>
            </p>
        </form>
    <!-- End Contact Section -->
    </div>
    
    <!-- Footer -->
    <footer class="w3-content w3-padding-64 w3-text-grey w3-xlarge">
        <a href="https://www.facebook.com/pinceladasAJ" target=_blank class="fa fa-facebook-official w3-hover-opacity"></a>
        <a href="https://www.instagram.com/pinceladas.aj/" target=_blank class="fa fa-instagram w3-hover-opacity"></a>
        <a href="https://www.pinterest.pt/alinejacinto134/" target=_blank class="fa fa-pinterest-p w3-hover-opacity"></a>
        <p class="w3-medium">Powered by Joao Jacinto</a></p>
    <!-- End footer -->
    </footer>

    <!-- END PAGE CONTENT -->
    </div>

    </body>
</html>
