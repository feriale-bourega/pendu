<?php
//Code de admin.php
 
//Démarrer une session pour faire appel au variables de session et sauver les infos nécessaires pour le fonctionnement du jeu
    session_start();
     
    //Créer des variables de session
     $_SESSION['motAffiche'] = array();
     $_SESSION['lettresJouees'] = array();
     $_SESSION['mot'] = "";
     $_SESSION['nbTentatives'] = 0;
     $_SESSION['longueurMot'] = 0;
     $_SESSION['nbLettresTrouvees'] = 0;
     
    // SI il y a $_POST['mot'] ALORS
        // $_SESSION['mot'] = $_POST['mot']
      if (isset($_POST['mot'])){
          $_SESSION['mot'] = $_POST['mot'];
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
        $_SESSION['lettresJouees'][] = false;
        
    } 
    header('Location: index.php');
   }
 ?>
    
<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01//EN\" \"http://www.w3.org/TR/html4/strict.dtd\">
            <HTML>
                <HEAD>
                    <TITLE>Le jeu du pendu - Tentative ", $_SESSION['nbTentatives'], "</TITLE>
                </HEAD>
                <BODY >
                    <DIV >
                        
                            <IMG src='Pendu0.png'>
                            <BR>
                             <?php
                            // Affiche le mot avec des - ou les lettres trouvees 
                            //var_dump($_SESSION);
                    
                           // if(!empty($_SESSION['motAffiche'])){
                             // echo  $_SESSION['motAffiche'] = $rang; }
                            
                              $rang = !empty($_POST['motAffiche']) ? $_POST['motAffiche'] : '';
                            //foreach($_SESSION['motAffiche'] as $rang => $element)
                            if (is_array($rang) || is_object($rang)) {
                            
                            foreach($rang as $element)
                            {
                               // Afficher le mot a afficher avec ou sans les - ou les lettres trouvees
                               echo $element;

                           } 
                        }
                        
                          // $stuff = array(1,2,3);
                       //foreach ($stuff as $value) {
                  //echo $value,;
                   //}

                             
                        // Tant que i < 26 (avec initialisation de i à 0 et incrementation a 1) faire... 
                           
                        for($i = 0 ; $i < 26 ; $i++){
                            
                              //Afficher la lettre actuelle sans son lien
                            
                                echo " <a href=\"index.php?lettre=$i\">", chr(65 + $i), "</a> ";
                            }
                            ?>
                           <BR>
                        
                        <A href=formulairedupendu.html>Nouvelle Partie...</A>
                    </DIV>
                </BODY>
            </HTML>
                            
  
   