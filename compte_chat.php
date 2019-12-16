<?php require_once('bdd_connect.php');

if(isset($_POST['btn'])){

    //déclarer les variables
    $login = $_POST['login'];
    $password = $_POST['password'];
    $password_repeat = $_POST['repeat_password'];
    $mail = $_POST['mail'];
    $valide = TRUE;

    //assainir
    $login = trim(strip_tags($login));

    //encrypter le mot de passe 
    $password = password_hash($password, PASSWORD_DEFAULT);

    //vérifications
    if(empty($login)){
        $valide = FALSE;
        echo 'le champ identifiant est vide';
    }

    if(empty($password)){
        $valide = FALSE;
        echo 'le champ mot de passe est vide';
    }

    if(!password_verify($password_repeat, $password)){
        $valide = FALSE;
        echo 'Erreur dans le mot de passe';
    }

    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
		$valide = FALSE;
		echo "Erreur dans l'adresse mail";
    }
    
    if($valide){

        //requête pour vérifier que l'identifiant n'existe pas
        $req = "SELECT identifiant FROM user WHERE identifiant = '".$login."'";

        //exécute la requête
        $res = $GLOBALS['bdd']->query($req);

        if($res->num_rows){
            $valide = FALSE;
            echo 'identifiant déjà utilisé';
        }

        //ajout dans la base de données
        if($valide){

            //requête
            $req_ajout = "INSERT INTO user(identifiant, mot_de_passe, mail) VALUES('".$login."', '".$password."', '".$mail."')";

            //exécute la requête
            $res_ajout = $GLOBALS['bdd']->query($req_ajout);

            if(!empty($GLOBALS['bdd']->error)){
                echo $GLOBALS['bdd']->error;

            } else {
                echo 'compte créé';
            }
        }
    }
}
?>
<?php require_once('header_html.php');?>
<form method = "POST" action = "">
    <label for = "login" >Identifiant :</label><br> 
    <input type = "login" name = "login" placeholder = "identifiant" required><br>
    <label for = "mail" >Adresse mail :</label><br>
    <input type = "mail" name = "mail" placeholder = "exemple@exemple.com" required><br>
    <label for = "password" >Mot de passe :</label><br>
    <input type = "password" name = "password" placeholder = "mot de passe" pattern = "(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required><br>
    <label for = "password" >Répéter le mot de passe :</label><br>
    <input type = "password" name = "repeat_password" placeholder = "répéter le mot de passe" required><br>
    <input type = "submit" name = "btn" value = "Envoyer">
</form>
<?php require_once('footer_html.php');?>