<?php
include("db.php");

// Inicializar las variables
$username = '';
$logoutLink = '';
$loginButton = '';

// Verificar si el usuario está logueado
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $logoutLink = '<a href="logout.php">Desconectarse</a>';
    $loginButton = ''; // No mostrar el botón de login si el usuario está logueado
} else {
    $loginButton = '<a href="IndexNuevoLogin.php" class="btn">Log in</a>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cumplimiento de normas oficiales Mexicanas y SENASICA</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <!-- navbar sections starts  -->
    <header class="header">
        <div class="logo">
            <img src="WhatsApp Image 2023-11-12 at 1.00.33 PM.jpeg" alt="logo-bookmark" >
            <a href="#Seguridad"></a>   
            <label></label>     
        </div>

        <nav class="navbar">
            <ul class="menu-horizontal">
                <li>
                    <a>Seguridad</a>
                    <ul class="menu-vertical">
                    <?php if (isset($_SESSION['username'])): ?>
                        <li><a href="pages/NOM-001-STPS-2008.php">NOM-001-STPS-2008</a></li>
                        <li><a href="pages/NOM-002-STPS-2010.php">NOM-002-STPS-2010</a></li>
                        <li><a href="pages/NOM-004-STPS-1999.php">NOM-004-STPS-1999</a></li>
                        <li><a href="pages/NOM-006-STPS-2014.php">NOM-006-STPS-2014</a></li>
                        <li><a href="pages/NOM-020-STPS-2011.php">NOM-020-STPS-2011</a></li>
                        <li><a href="pages/NOM-029-STPS-2011.php">NOM-029-STPS-2011</a></li>
                        <li><a href="pages/NOM-034-STPS-2016.php">NOM-034-STPS-2016</a></li>
                    <?php endif; ?>
                    </ul>
                </li>
                <li>
                    <a>Salud</a>
                    <ul class="menu-vertical">
                        <?php if (isset($_SESSION['username'])): ?>
                        <li><a href="pages/NOM-011-STPS-2001.php">NOM-011-STPS-2001</a></li>
                        <li><a href="pages/NOM-015-STPS-2001.php">NOM-015-STPS-2001</a></li>
                        <li><a href="pages/NOM-024-STPS-2001.php">NOM-024-STPS-2001</a></li>
                        <li><a href="pages/NOM-025-STPS-2008.php">NOM-025-STPS-2008</a></li>
                        <li><a href="pages/NOM-035-STPS-2018.php">NOM-035-STPS-2018</a></li>
                        <li><a href="pages/NOM-036-STPS-2018.php">NOM-036-STPS-2018</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
                <li>
                    <a>Organizacion</a>
                    <ul class="menu-vertical">
                        <?php if (isset($_SESSION['username'])): ?>
                        <li><a href="pages/NOM-017-STPS-2008.php">NOM-017-STPS-2008</a></li>
                        <li><a href="pages/NOM-019-STPS-2011.php">NOM-019-STPS-2011</a></li>
                        <li><a href="pages/NOM-026-STPS-2008.php">NOM-026-STPS-2008</a></li>
                        <li><a href="pages/NOM-030-STPS-2009.php">NOM-030-STPS-2009</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
                <li>
                    <a>Normas Especificas</a>
                    <ul class="menu-vertical">
                        <?php if (isset($_SESSION['username'])): ?>
                        <li><a href="pages/NOM-003-STPS-1999.php">NOM-003-STPS-1999</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
                <li>
                    <a>Alimentos</a>
                    <ul class="menu-vertical">
                        <?php if (isset($_SESSION['username'])): ?>
                        <li><a href="pages/NOM-213-SSA1-2002.php">NOM-213-SSA1-2002</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
                    <?php echo $username; ?>
                    <?php echo $logoutLink; ?>
                    <?php echo $loginButton; ?>
                <div class="dark-mode-btn" onclick="toggleDarkMode()">
                    <i class="fas fa-moon"></i>
                </div>
            </ul>            

        </nav>
                
        <div class="fas fa-bars" id="menu-btn"></div>
    </header>
        
    <!-- navbar sections starts  -->

   
    <!-- home section stars  -->

    <section class="home" id="home">
        <div class="content">
            <h1>Verificacion de cumplimiento de normas oficiales Mexicanas y SENASICA</h1>
            <p>Estamos buscando ayudar a las empresas e instituciones a conocer, descubrir y poseer en forma de documento las normas con las que cumplen.
            </p>
            
        </div>
        <div class="video1">        
        <iframe width="1000" height="600" src="https://www.youtube.com/embed/u_Zu0e50MU4?si=8__kAehrrMCRtYbc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>

    </section>

    <!-- home section ends -->

    <!-- features sectin starts  -->

    <section class="features" id="features">
        <div class="heading">
            <h1>¿Por que verificar el cumplimiento de normas?</h1>
            <p>La verificación del cumplimiento de las Normas Oficiales Mexicanas y SENASICA es esencial
                para garantizar la seguridad y calidad de productos y servicios en México. Este proyecto
                proporcionará a las empresas y organizaciones una herramienta eficaz para evaluar su
                cumplimiento con estas normativas, lo que contribuirá a la mejora de la calidad y seguridad de
                sus productos y servicios.</p>
        </div>




    <!-- footer section starts  -->

   <section class="footer" id="footer">
       <div class="credit">Por un futuro mejor
           <a href="https://www.youtube.com/channel/UCK5YMqyy_fjAtwgu9hjxXJg" target="_blank"><span>SVCNOM</span> | all rights reserved</a>
       </div>
   </section>

    <!-- footer section ends -->
    <script src="js/main.js"></script>

    <script>
        
        function toggleDarkMode() {
        document.body.classList.toggle('dark-mode');
    }
    </script>

      

</script>
</body>

</html>

</body>

</html>

</body>

</html>