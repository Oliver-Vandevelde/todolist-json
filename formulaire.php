<?php
    // $s_fileData = file_get_contents('todo.json');
    // $tableau_pour_json = json_decode($s_fileData, true);

    // if(isset($_POST['todo'])){
    //     $todo = $_POST['todo'];
    //     $array = array (
    //         'todo' => $todo
    //     );
    //     $tableau_pour_json[] = $array;
    //     $data = json_encode($tableau_pour_json);
    //     file_put_contents('todo.json', $data);
    // }
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
        if(isset($_POST['todo'])){
            // On ajoute le nouvel élement
            array_push( $tableau_pour_json, array(
                'todo' => $_POST['todo'],
                'value' => 1,
            ));
            // On réencode en JSON
            $contenu_json = json_encode($tableau_pour_json);
            
            // On stocke tout le JSON
            file_put_contents('todo.json', $contenu_json);
            header("Refresh:0");
            // foreach ($tableau_pour_json as $key){
            //     echo "<p>".$key['todo']."</p>";
            // }
        }
        if(isset($_POST['archiver'])){
            $checkbox = $_POST['checkbox'];
            if(!empty($checkbox)){
                foreach ($tableau_pour_json as $key => $value){
                    $check = $tableau_pour_json[$key]['todo'];
                    if ($checkbox == $check){
                        $tableau_pour_json[$key]['value'] = 0;
                    }
                }
            }
            // On réencode en JSON
            $contenu_json = json_encode($tableau_pour_json);
            // On stocke tout le JSON
            file_put_contents('todo.json', $contenu_json);
        }
        if(isset($_POST['delete'])){
            $checkbox = $_POST['checkbox'];
            if(!empty($checkbox)){
                foreach ($tableau_pour_json as $key => $value){
                    $check = $tableau_pour_json[$key]['todo'];
                    if ($checkbox == $check){
                        unset($tableau_pour_json[$key]);
                    }
                }
            }
            // On réencode en JSON
            $contenu_json = json_encode($tableau_pour_json);
            // On stocke tout le JSON
            file_put_contents('todo.json', $contenu_json);
        }
    }
    
    catch( Exception $e ) {
        echo "Erreur : ".$e->getMessage();
    }
    // header('Location: http://localhost/todolist-json/contenu.php');
?>