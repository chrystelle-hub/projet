<?php
session_start();

require_once('bdd_connect.php');

if (isset($_POST['btn'])) {

    //déclarer les variables

    $login = $_POST['login'];
    $pwd = $_POST['password'];

    // la requête
    $req = "SELECT identifiant, mot_de_passe FROM user WHERE identifiant = '".$login."'";

    //exécuter la requête
    $res = $GLOBALS['bdd']->query($req);

    if(!$GLOBALS['bdd']){

        if($res->nums_row){
            $ligne_resultat = $res->fetch_assoc();

            if(password_verify($pwd, $ligne_resultat['mot_de_passe'])){

                $_SESSION['login'] = $login;
                $_SESSION['password'] = $pwd;

                header('location: index.php');

            } else {
                echo "identifiant ou mot de passe incorrects ou inexistants.";
            }
        } else {
            echo "identifiant ou mot de passe incorrects ou inexistants.";
        }
    }
}

mysqli_close($GLOBALS['bdd']);
require_once('header_html.php');

?>
<form method = "POST" action ="">
    <input type = "login" name = "login" placeholder = "identifiant" required><br>
    <input type = "password" name = "password" placeholder = "Mot de passe" required><br>
    <input type = "submit" name = "btn" value = "Se connecter">
</form>

<?php
require_once('footer_html.php');
?>