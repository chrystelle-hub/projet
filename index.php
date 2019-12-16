<?php require_once("bdd_connect.php");

session_start();
/*insérer des messages dans la base de données*/

if (isset($_POST['btn'])){

    //déclarer les variables

    $form_valide = TRUE;
    $form_pseudo = $_POST['pseudo'];
    $form_texte = $_POST['texte'];

    // assainir les données

    $form_pseudo = trim(strip_tags($_POST['pseudo']));
    $form_message = trim(strip_tags($_POST['texte']));

    // vérifications

    if(empty($form_pseudo)){
        $form_valide = FALSE;
        echo 'pseudo vide';
    }

    if(empty($form_texte)){
        $form_valide = FALSE;
        echo 'message vide';
    }

    if($form_valide){

        //requête
        $req = "INSERT INTO messages(pseudo, txt, date_post) VALUES('".$form_pseudo."', '".$form_texte."', NOW())";

        //exécuter requête
        $GLOBALS['bdd']->query($req);

        if(!empty($GLOBALS['bdd']->error)){

            echo $GLOBALS['bdd']->error;
        } else {
            echo 'message créé';
        }
    }


}

/*selectionner les messages*/

$req_select = "SELECT pseudo, txt, date_post FROM messages ORDER BY date_post";
$res_select = $GLOBALS['bdd']->query($req_select);

require_once("header_html.php");

while($row = $res_select->fetch_assoc()){

?>
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
                        <button class="upvote"><span class="icon icon-arrow-up2"></span></button>
						<button class="downvote"><span class="icon icon-arrow-down2"></span></button>
                    </footer>
                </article>
                </main>
                
<?php 
}
?>
        <div class = "message">
            <form method = "POST" action ="">
                <input type = "login" name = "pseudo" placeholder = "Pseudo" required><br>
                <textarea id = "textarea" name = "texte" placeholder = "Votre message"></textarea><br>
                <input type = "submit" name = "btn" value = "Envoyer">
            </form>
        </div>

<script>

$(".upvote, .downvote").click(function(){
	
	let id_article = $(this).parent().parent().data("id");

	let action = $(this).attr("class");

	$(".upvote").on('click', function(){
            $(this).addClass("upvoteSelected")
        });
		
	$(".downvote").on('click', function(){
            $(this).addClass("downvoteSelected")
        });


	$.ajax({
		url : "api.php",
        type : "POST",
        data : {

			target: id_article,
			action: action
		},

        dataType : "text",

        success : function(data){
            alert(data);
        }
	});
});

</script>

<?php
require_once("footer_html.php");
?>          