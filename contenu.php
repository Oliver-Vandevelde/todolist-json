<?php
    // require ('formulaire.php');
    try {
        // On essayes de récupérer le contenu existant
        $s_fileData = file_get_contents('todo.json');

        if( !$s_fileData || strlen($s_fileData) == 0 ) {
            // On crée le tableau JSON
            $tableau_pour_json = array();
        } else {
            // On récupère le JSON dans un tableau PHP
            $tableau_pour_json = json_decode($s_fileData, true);
        }
    }
    catch( Exception $e ) {
        echo "Erreur : ".$e->getMessage();
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire-JSon</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="./assets/css/todo.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Proza+Libre" rel="stylesheet">
</head>
<body>
<nav class="search container-fluid">
    <input class="form-control col-sm-6 col-md-5 col-lg-4 col-xl-3" name="recherche" type="text" placeholder="Dites-moi tout">
</nav>
    <section class="todo container-fluid mx-auto ">
        <form class="archiver" method="POST" action="">
            <h1>Todolist d'Oliver</h1>
            <h2>A faire :</h2>
            <section class="a_faire" id="faire">
                <?php
                    foreach ($tableau_pour_json as $key){
                        echo "<p draggable=true classe='textFaire'><input class='checkbox' name='checkbox[]' id='checkbox' type='checkbox' value='".$key['todo']."' onclick='check()'/> ".$key['todo']."</p>";
                    }
                ?>
            </section>
            <p class="supprimez" id="button"><button name="delete" type="submit" class="btn btn-outline-success">Fini ? Archive le(s) !</button></p>
            <!-- style="display:none"-->
            <h2>Archive :</h2>
            <section class="fait">
            <?php
                // foreach ($tableau_pour_json as $key){
                //     echo "<p draggable=true classe='textFaire'><input class='checkbox' name='checkbox[]' id='checkbox' type='checkbox' value='".$key['fait']."' onclick='check()'/> ".$key['fait']."</p>";
                // }
            ?>
                <p class="supprimez" id="delete"><button name="supp" type="submit" class="btn btn-outline-success">Supprimer de l'archive ?</button></p>
            </section>
        </form>
        <form class="add" method="POST" action="formulaire.php">
            <label class="textAdd">Ajouter une tache : </label>
            <input class="form-control" type="text-area" name="todo" cols="20" rows="1" required>
            <input type="submit" class="btn btn-outline-success" value="Ajouter">
        </form>
    </section>
    <script src="./assets/js/todolist.js"></script>
</body>
</html>

<?php
    // $test = file_get_contents("todo.json");
    // $json_data =json_decode($test,true);
    // foreach ($json_data as $key){
    //     echo $key['test']," ";
    // }
?>