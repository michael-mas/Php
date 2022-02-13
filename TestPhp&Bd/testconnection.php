<!DOCTYPE html>
<html>
    <head>
        <title>Notre première instruction : echo</title>
        <meta charset="utf-8" />
    </head>
    <body>
        <h2>Affichage de texte avec PHP</h2>
        
        <p>
            Cette ligne a été écrite entièrement en HTML.<br />
            <?php echo("Celle-ci a été écrite entièrement en PHP."); ?>
        </p>
        <?php
$isEnabled = true;
$isOwner = false;
$isAdmin = true;

if (($isEnabled && $isOwner) || $isAdmin) {
    echo 'Accès à la recette validé ✅';
} else {
    echo 'Accès à la recette interdit ! ❌';
}

print " $isAdmin ";

?>
</br></br>
<?php
$grade = 16;

switch ($grade) // on indique sur quelle variable on travaille
{ 
    case 0: // dans le cas où $grade vaut 0
        echo "Tu es vraiment un gros nul !!!";
    break;
    
    case 5: // dans le cas où $grade vaut 5
        echo "Tu es très mauvais";
    break;
    
    case 7: // dans le cas où $grade vaut 7
        echo "Tu es mauvais";
    break;
    
    case 10: // etc. etc.
        echo "Tu as pile poil la moyenne, c'est un peu juste…";
    break;
    
    case 12:
        echo "Tu es assez bon";
    break;
    
    case 16:
        echo "Tu te débrouilles très bien !";
    break;
    
    case 20:
        echo "Excellent travail, c'est parfait !";
    break;
    
    default:
        echo "Désolé, je n'ai pas de message à afficher pour cette note";
}
?>

</br>

<?php

$mickael = ['Mickaël Andrieu', 'mickael.andrieu@exemple.com', 'S3cr3t', 34];
$mathieu = ['Mathieu Nebra', 'mathieu.nebra@exemple.com', 'devine', 33];
$laurene = ['Laurène Castor', 'laurene.castor@exemple.com', 'P4ssw0rD', 28];

$users = [$mickael, $mathieu, $laurene];

echo $users[1][1]; // "mathieu.nebra@exemple.com"
?>

<hr>

<?php
$lines = 1;

while ($lines <= 10) {
    echo 'Je ne dois pas regarder les mouches voler quand j\'apprends le PHP.<br />';
    $lines++; // $lines = $lines + 1
}
?>

<hr>



<?php
$lines = 0;

while ($lines <= 15)
{
    echo 'Ceci est la ligne n°' . $lines . '<br />';
    $lines++;
}
?>

<!--

Ceci est la ligne n°1
Ceci est la ligne n°2
...
-->

<hr>

<?php

$lines = 3; // nombre d'utilisateurs dans le tableau
$counter = 0;

while ($counter < $lines) {
    echo $users[$counter][0] . ' ' . $users[$counter][1] . '<br />';
    echo $users[$counter][0] . ' ' . $users[$counter][2] . '<br />';
    $counter++; // Ne surtout pas oublier la condition de sortie !
}

//creer une table sur la base de donnée

$db = new mysqli('localhost', 'root', '', 'infosite');

if ($db === FALSE) {
   echo "ERRROR";
}   

$sql = "CREATE TABLE IF NOT EXISTS db (
    ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    NAME VARCHAR(20) NULL
)";

$db->query($sql);

if (mysqli_query($db, $sql)) {
   echo "TABLE CREATED SUCCESSFULLY";
} else {
  echo "TABLE CREATED UNSUCCESSFULLY";
}



?>
    </body>
</html>