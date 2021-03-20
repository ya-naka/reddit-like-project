<?php
include("header.php");

$sql = "SELECT f.*, c.nom, c.id as categorie_id FROM forum f LEFT JOIN categorie c ON f.categorie_id=c.id";
$forums = $db->query($sql)->fetchAll();
if($forums !== null){
?>

<h2>Tous les forums :<h2>
<?php 
    foreach($forums as $forum){ 
?>
<div>
    <dl>
        <dt>Nom</dt><dd><a href="<?= redirect("/forum?forum_id={$forum["idForum"]}")  ?>"><?= $forum["nomForum"] ?></a></dd>
        <dt>Description</dt><dd><?= $forum["description"] ?></dd>
        <dt>Date de creation</dt><dd><?= $forum["dateCreation"] ?></dd>
        <dt><a href="<?= redirect("/categorie?categorie_id={$forum["categorie_id"]}")  ?>">Categorie</a></dt><dd><?= $forum["nom"] ?></dd>
    </dl>
</div>
<?php
}
}
include("footer.php");
?>