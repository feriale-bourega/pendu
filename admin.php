<?php
//Code de pendu.php
 
//Démarrer une session pour faire appel au variables de session et sauver les infos nécessaires pour le fonctionnement du jeu
    session_start();
     
    //Créer des variables de session
    $_SESSION['motAffiche'] = array();
    $_SESSION['lettresJouees'] = array();
    $_SESSION['mot'] = "";
    $_SESSION['nbTentatives'] = 0;
    $_SESSION['longueurMot'] = 0;
    $_SESSION['nbLettresTrouvees'] = 0;
 
    //Enregistrer le mot à découvrir dans une variable session
    $_SESSION['mot'] = !empty($_POST['mot']) ? $_POST['mot'] : NULL;
    //$_SESSION['mot'] = $_GET['mot'];
 
    //Sauvegarder la longueur du mot
    $_SESSION['longueurMot'] = strlen($_SESSION['mot']);
     
    //Remplir les tableaux (initialisation)
    for($i = 1 ; $i <= $_SESSION['longueurMot'] ; $i++)
    {
        //Mettre des - dans le mot a afficher
        $_SESSION['motAffiche'][] = "-";
    }
     
    //Initialiser tout le tableau lettreJouees à FAUX
    for($i = 1 ; $i <= 26 ; $i++)
    {
        $_SESSION['lettresJouees'][] = true;
    }
     
    //Le Jeu...
    echo "  <!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01//EN\" \"http://www.w3.org/TR/html4/strict.dtd\">
            <HTML>
                <HEAD>
                    <TITLE>Le jeu du pendu - Tentative ", $_SESSION['nbTentatives'], "</TITLE>
                </HEAD>
                <BODY width=\"100%\">
                    <DIV align=\"center\" style=\"margin-top: 10%\">
                        <FONT size=\"6\">
                            <IMG src=\"Le-Pendu", $_SESSION['nbTentatives'], ".png\">
                            <BR>";
                             
                            //Affiche le mot avec des - ou les lettres trouvees
                            foreach($_SESSION['motAffiche'] as $rang => $element)
                            {
                                //Afficher le mot a afficher avec ou sans les - ou les lettres trouvees
                                echo $element;
                            }
                         
                        //Aller à la ligne
                        echo "<BR> ";
                         
                        //Tant que i < 26 (avec initialisation de i à 0 et incrementation a 1) faire...
                        for($i = 0 ; $i < 26 ; $i++)
                            {
                              //Afficher la lettre actuelle sans son lien
                                echo " <A href=\"admin.php?lettre=$i\">", chr(65 + $i), "</A> ";
                            }
                        echo "<BR>
                        </FONT>
                        <A href=\"formulairedupendu.html\">Nouvelle Partie...</A>
                    </DIV>
                <BODY>
            </HTML>";
     
?>
