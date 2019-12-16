<?php require_once("bdd_connect.php");
require_once("header_html.php");

if (isset($_POST['btn'])){

}
?>

            <main>
                <article>
                    <header>

                    </header>
                    <main>

                    </main>
                    <footer>

                    </footer>
                </article>
           
            <form method = "POST" action ="">
                <input type = "login" name = "pseudo" placeholder = "Pseudo" required><br>
                <textarea id = "textarea" name = "message" placeholder = "Votre message"></textarea><br>
                <input type = "submit" name = "btn" value = "Envoyer">
            </form>
            </main>
<?php
require_once("footer_html.php");
?>          