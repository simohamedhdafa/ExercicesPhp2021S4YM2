<?php
    // preparer les tables en HTML : enoncé et correction V
    // générer les valeurs aléatoires en fonction du système (bin, dec, ...) v
    // préparer et utiliser csv pour générer des exercices personnalisés (par élève) V
    // tester le code (pas de répétition de nombres ...) V

?>



<?PHP
    // gerer le fichier de données:
    $etudiants = array();
    $f = fopen("elevesYm2.csv", "r");
    while($ligne = fgetcsv($f)){
        array_push($etudiants, array($ligne[0], $ligne[1]));
    }
?>

<?php 
    //echo "<pre>";
    //print_r($etudiants);
    //echo "</pre>";    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_de_base.css">
    <title>Document</title>
</head>
<body>
    <?php for($etudiant=1; $etudiant<count($etudiants); $etudiant++) { ?>
        <?php 
            $val = array();
            do{
                $val = array(random_int(150, 850), random_int(150, 850), random_int(150, 850), random_int(150, 850));
                $repetition = false;

                if(count(array_unique($val))!=4){
                    $repetition = true;
                }
            }while($repetition);

        ?>
        <table>
            <tr>
            <td>
                <h3>Enoncé pour <?php echo $etudiants[$etudiant][0]." ".$etudiants[$etudiant][1] ?></h3>
                <table border=1>
                    <tr><td>Bin</td><td>Oct</td><td>Dec</td><td>Hex</td></tr>
                    <tr><td><?php echo decbin($val[0]) ?></td><td></td><td></td><td></td></tr>
                    <tr><td></td><td><?php echo decoct($val[1]) ?></td><td></td><td></td></tr>
                    <tr><td></td><td></td><td><?php echo $val[2] ?></td><td></td></tr>
                    <tr><td></td><td></td><td></td><td><?php echo dechex($val[3]) ?></td></tr>
                </table>
            </td>
            <td>
                <h3>Corrigé pour <?php echo $etudiants[$etudiant][0]." ".$etudiants[$etudiant][1] ?></h3> 
                <table border=1>
                    <tr><td>Bin</td><td>Oct</td><td>Dec</td><td>Hex</td></tr>
                    <?php for($i=0; $i<=3; $i++){ ?>
                        <tr><td><?php echo decbin($val[$i]) ?></td><td><?php echo decoct($val[$i]) ?></td><td><?php echo $val[$i] ?></td><td><?php echo dechex($val[$i]) ?></td></tr>
                    <?php } ?>
                </table>
            </td>
            </tr>
        </table>
    <?php } ?>
    
</body>
</html>