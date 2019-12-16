<html>

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="icomoon/icomoon.css">
        <script src = "js/jquery-3.4.1.min.js"></script>
    </head>

    <body>

        <header>
            <h1>Chat en ligne</h1>
            <?php if(isset($_SESSION["login"]) && isset($_SESSION["password"])) {
                echo '<h2>Bienvenue '.$_SESSION["login"].'!</h2>';
                }
            ?>
            <nav class="menu">
                    <ul>
                        <li><a href="index.php"><span class="icon icon-home"></span> Accueil</a></li>
                        <li><a href="login_chat.php"><span class="icon icon-user"></span> Connexion</a></li>
                        <li><a href="compte_chat.php"><span class="icon icon-user-plus"></span> Inscription</a></li>
                        <?php if(isset($_SESSION["login"]) && isset($_SESSION["password"])) {?>
                        <li><a href="deconnexion.php"><span class="icon icon-exit"></span> Déconnexion</a></li>
                        <li><a href="profil.php"><span class="icon icon-user-check"></span> profil</a></li>
                        <?php 
                            }
                        ?>
                    </ul> 
                </nav>
            
        </header>
        <div class="clearboth"></div>