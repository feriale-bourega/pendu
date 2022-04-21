<?php
//Code de pendu1.php
     
//Démarrer une session pour faire appel au variables de session et sauver les infos nécessaires pour le fonctionnement du jeu
    session_start();
     //avec ISSET
//Si la variable $_GET['lettre'] existe et n'est pas vide, alors $positionLettre = $_GET['lettre']  sinon elle vaut NULL 
$positionLettre = !empty($_POST['lettre']) ? $_POST['lettre'] : NULL;
    //Récuperer la position de la lettre envoyé par pendu.php ou pendu1.php
   // $positionLettre = $_GET['lettre'];
     
    //Si la lettre n'a pas déjà été jouée
    if(!isset($_SESSION['lettresJouees'][$positionLettre]))
    {
        //Mettre la valeur de la position de la lettre correspondante a VRAI
        $_SESSION['lettresJouees'][$positionLettre] = true;
         
        //Recherche de la lettre dans le mot
        //Initialiser le nombre de la lettre actuelle trouve dans le mot
        $nbLettres = 0;
         
        //On compte le nb de fois que la lettre jouée se trouve dans le mot
        for($i = 0 ; $i < $_SESSION['longueurMot'] ; $i++)
        {
            //Si la lettre dans le mot à trouver correspond a la lettre selectionnee par l'utilisateur alors...
            if($_SESSION['mot'][$i] == chr(65 + $positionLettre))
            {
                //Mettre cette lettre dans le mot a afficher
                $_SESSION['motAffiche'][$i] = chr(65 + $positionLettre);
                 
                //Incrementer le nombre de lettres trouvees en général à 1
                $_SESSION['nbLettresTrouvees']++;
                 
                //Incrémenter le nombre de la lettre actuelle trouve dans le mot a 1
                $nbLettres++;
            }
        }
         
        //Si la lettre n'a pas été trouvée dans le mot ERREUR !!
        if($nbLettres == 0)
        {
            //Incrementer le nombre de tentatives a 1
            $_SESSION['nbTentatives']++;
             
            //Si le nombre de tentatives > 5 alors...
            if($_SESSION['nbTentatives'] > 5)
            {
                //Afficher un message disant que l'utilisateur a perdu
                echo "<DIV align=\"center\"><FONT size=\"6\">AAAAAAAAARGH!!! T&rsquo;as PERDU!!! Recommence un nouveau mot!</FONT></DIV>";
                 
                //On dévoile le mot
                for($i = 0 ; $i < $_SESSION['longueurMot'] ; $i++)
                {
                    //Insérer dans le mot a afficher les lettres du mot sauvegarde
                    $_SESSION['motAffiche'][$i] = $_SESSION['mot'][$i];
                }
            }
        }
        else
        {
            //Gestion de la fin du jeu
            if($_SESSION['nbLettresTrouvees'] == $_SESSION['longueurMot'])
            {
                    //Afficher un message disant que l'utilisateur a gagne
                    echo "<DIV align=\"center\"><FONT size=\"6\">YEAH!!! T&rsquo;as GAGNE!!! Tu peux recommencer une autre partie!</FONT></DIV>";
            }
        }
    }
     
     
    echo "  <!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01//EN\" \"http://www.w3.org/TR/html4/strict.dtd\">
            <HTML>
                <HEAD>
                    <TITLE>Le jeu du pendu - Tentative ", $_SESSION['nbTentatives'], "</TITLE>
                </HEAD>
                <BODY width=\"100%\">
                    <DIV align=\"center\" style=\"margin-top: 10%\">";
                         
                        echo "<FONT size=\"6\">
                            <IMG src=\"Le-Pendu", $_SESSION['nbTentatives'], ".png\">
                            <BR>";
                             
                            //Affiche le mot avec des - ou les lettres trouvees
                            
                            $motaffiche = isset($_SESSION['motaffiche']) ? $_SESSION['motaffiche'] : NULL;
                            //if (isset($_SESSION['motaffiche'])) {
                              //  $username = $_SESSION['motaffiche'];
                           // }
                           if(isset($_SESSION['motaffiche'])){ foreach($_SESSION['motaffiche'] as $rang => $element) 
                           // foreach($_SESSION['motAffiche'] as $rang => $element)
                            {
                                //Afficher le mot a afficher avec ou sans les - ou les lettres trouvees
                                echo $element;
                            }  }
                         
                        //Aller à la ligne
                        echo "<BR> ";
                        if  (!isset( $size ) || !isset( $color ))  {
                        //Si le nombre de tentatives <= 5 et que le nombre de lettre trouvees en general < a la longueur du mot sauvegarde alors
                        if(!isset($_SESSION['nbTentatives']) <= 5 && !isset ($_SESSION['nbLettresTrouvees']) < !isset($_SESSION['longueurMot']))
                        {
                            //Tant que i < 26 (avec initialisation de i à 0 et incrementation a 1) faire...
                            for($i = 0 ; $i < 26 ; $i++)
                            {
                                //Si la lettre a ete trouve dans le mot sauvegarde alors...
                                if($_SESSION['lettresJouees'][$i])
                                {
                                    //Afficher la lettre actuelle sans son lien
                                    echo chr(65 + $i), " ";
                                }
                                else
                                {
                                    //Afficher la lettre actuelle avec son lien
                                    echo " <A href=\"index.php?lettre=$i\">", chr(65 + $i), "</A> ";
                                }
                            }
                        }
                        else
                        {
                            //Tant que i < 26 (avec initialisation de i à 0 et incrementation a 1) faire...
                            for($i = 0 ; $i < 26 ; $i++)
                            {
                                //Afficher la lettre actuelle sans son lien
                                echo chr(65 + $i), " ";
                            }
                        }
                        echo "<BR>
                        </FONT>
                        <A href=\"formulairedupendu.html\">Nouvelle Partie...</A>
                    </DIV>
                </BODY>
            </HTML>";}
?>