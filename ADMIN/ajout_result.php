<?php
include '../CONTROLEUR/database_connexion.php';
if (isset($_POST['id_resultat'])) {//Modification d'un resultat existant deja
    $req = $db->prepare('UPDATE resultat SET titre_resultat = :titre_rslt, description_resultat = :descrslt, id_publication = :idpub WHERE id_resultat = :idrslt');

    $req->execute(array(
        'idrslt' => $_POST['id_resultat'],
        'titre_rslt' => $_POST['titre_resultat'],
        'descrslt' => $_POST['description_resultat'],
        'idpub' => $_POST['id_publication']
    ));
    if (isset($_FILES['img_rslt'])) {
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['img_rslt']['size'] <= 1000000) {
            // printf("Votre photo a un volume moins de 1 Mo\n");
            // printf("Votre photo a été téléchargée avec succès\n");
            #Testons si l'extension est autorisee
            $infosfichier = pathinfo($_FILES['img_rslt']['name']);
            $extension_upload = $infosfichier['extension'];
            $extensions_autorisees = array('jpg');
            if (in_array($extension_upload, $extensions_autorisees)) {
                // On peut valider le fichier et le stocker definitivement
                $_FILES['img_rslt']['name'] = $_POST['id_resultat'] . '.jpg';
                move_uploaded_file($_FILES['img_rslt']['tmp_name'], '../MODELE/resultat/' . $_POST['id_publication'] . '/' .
                    basename($_FILES['img_rslt']['name']));
            }//endif in_array()
        }//endif $_FILES[][size]
    }//endif  isset($_FILES[])
    header('Location:../ADMIN/modifier.php?modrslt=1');
} else if (isset($_POST['titre_resultat']) AND isset($_POST['description_resultat']) AND isset($_FILES['img_rslt']) AND $_FILES['img_rslt']['error'] == 0 AND isset($_POST['id_publication'])) {
    $requete = 'SELECT MAX(id_resultat) AS last_id_rslt FROM resultat';
    $reponse = $db->query($requete);
    while ($donnees = $reponse->fetch()) {
        $id_new_rslt = $donnees['last_id_rslt'] + 1;
    }
    $reponse->closeCursor();
    #Préparation de la requête(SQL Injection)
    $requete = $db->prepare('INSERT INTO resultat(id_resultat, titre_resultat, description_resultat, id_publication) VALUES(:id_rslt, :titre, :description, :id_pub)');
    $requete->execute(array('id_rslt' => $id_new_rslt, 'titre' => $_POST['titre_resultat'], 'description' => $_POST['description_resultat'], 'id_pub' => $_POST['id_publication']));

    // Testons si le fichier n'est pas trop gros
    if ($_FILES['img_rslt']['size'] <= 1000000) {
        // printf("Votre photo a un volume moins de 1 Mo\n");
        // printf("Votre photo a été téléchargée avec succès\n");
        #Testons si l'extension est autorisee
        $infosfichier = pathinfo($_FILES['img_rslt']['name']);
        $extension_upload = $infosfichier['extension'];
        $extensions_autorisees = array('jpg');
        if (in_array($extension_upload, $extensions_autorisees)) {
            // On peut valider le fichier et le stocker definitivement
            $_FILES['img_rslt']['name'] = $id_new_rslt . '.jpg';
            move_uploaded_file($_FILES['img_rslt']['tmp_name'], '../MODELE/resultat/' . $_POST['id_publication'] . '/' .
                basename($_FILES['img_rslt']['name']));

            /*
                Creation d'un dossier qui contiendra les resultats associes a cette nouvelle pub
            */
            header("Location:ajouter.php?ajrslt=1");
        }//Fin if in_array

    }//Fin if size

}//Fin if isset
else {
    header("Location:ajouter.php?ajrslt=0");
}
?>