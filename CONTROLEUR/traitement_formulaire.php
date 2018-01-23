<?php
if (isset($_POST['nom_publicitaire']) AND isset($_POST['email_publicitaire']) AND isset($_POST['msg_publicitaire'])) {
    include 'database_connexion.php';

    $req = 'SELECT MAX(id_publicitaire) AS last_id FROM publicitaire';
    $rep = $db->query($req);
    while ($data = $rep->fetch())
        $this_id = $data['last_id'] + 1;
    $rep->closeCursor();

    #Préparation de la requête(SQL Injection)
    $requete = $db->prepare('INSERT INTO publicitaire(id_publicitaire, nom_publicitaire, email_publicitaire, tel_publicitaire, website_publicitaire, msg_publicitaire, date_publicitaire) VALUES(:id, :nom, :email, :tel, :website, :msg, NOW())');
    $requete->execute(array(
        'id' => $this_id,
        'nom' => $_POST['nom_publicitaire'],
        'email' => $_POST['email_publicitaire'],
        'tel' => $_POST['tel_publicitaire'],
        'website' => $_POST['website_publicitaire'],
        'msg' => $_POST['msg_publicitaire']
    ));
    header('Location:http://127.0.0.1:8080/my_projects/tarfihcom/publicite_formulaire.php?success=1');
} else {
    header('Location:http://127.0.0.1:8080/my_projects/tarfihcom/publicite_formulaire.php?success=0');
}
?>