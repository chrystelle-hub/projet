<?php
require_once('bdd_connect.php');

session_start();

require_once('header_html.php');

echo 'Bienvenue '.$_SESSION["login"].'!';

$req = "SELECT txt , pseudo, date_post FROM messages WHERE pseudo = '".$_SESSION["login"]."'";
$res = $GLOBALS['bdd']->query($req);

while($row = $res->fetch_assoc()){

?>
<h2>Les derniers messages</h2>
                <main>
                    <article>
                        <header>
                            <?php echo $row['pseudo'];?>
                        </header>
                        <main>
                            <?php echo $row['txt'];?>
                        </main>
                        <footer>
                            <?php
                            $datetime = DateTime::createFromFormat("Y-m-d H:i:s", $row['date_post']);
                            echo "le ".$datetime->format("d/m/Y à H:i:s");?>
                        </footer>
                    </article>
                    </main>
                    
<?php 
}

require_once('footer_html.php');
?>