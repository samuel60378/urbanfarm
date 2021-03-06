<?php
function recupereNom(PDO $bdd, String $mail, String $id){
    $requete = $bdd->prepare("SELECT COUNT(*) FROM messages WHERE id_conv=? AND lu='non'");
    $requete->execute(array($id));
    $nb = $requete->fetch()[0];
    echo "<br>";
    if($nb>0){
        echo "Utilisateur ".recupereInfo($bdd, $mail, 'nom')." ".recupereInfo($bdd, $mail, 'prenom')." (".$nb.")";
    } else {
        echo "Utilisateur ".recupereInfo($bdd, $mail, 'nom')." ".recupereInfo($bdd, $mail, 'prenom');
    }
}

function recupereMsg(PDO $bdd, String $id, String $mail) {
    $requete = $bdd->prepare("SELECT * FROM messages WHERE id_conv=? ORDER BY id");
    $requete->execute(array($id));

    while ($row=$requete->fetch()){
        if ($row["admin"]=="oui"){
            echo "Adnimistrateur : ";
        } else {
            echo "Reponse de ".recupereInfo($bdd, $mail, 'nom')." ".recupereInfo($bdd, $mail, 'prenom')." :";
        }
        echo '<br>';
        echo $row['texte'];
        echo '<br><br>';
        
    }
}

function readMsg(PDO $bdd, String $id) {
    $requete = $bdd->prepare("UPDATE messages SET lu='oui' WHERE id_conv=?");
    $requete->execute(array($id));
}

function addMsg (PDO $bdd, String $id_conv, String $texte, String $date){
    $req = $bdd->prepare("INSERT INTO `messages` (`texte`, `admin`, `id_conv`, `lu`, `date`) 
    VALUES (?, 'oui', ?, 'oui', ?);");
        $req->execute(array($texte, $id_conv, $date));
        
}



