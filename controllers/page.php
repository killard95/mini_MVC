<?php

class page extends Controller {

    public function article($num){
        // connection bdd
        include_once('db_info.php');
        // initialisation de la connection et test 
        try {
            $dbco = new PDO("mysql:host=$host;dbname=$db", $user, $pw);
            $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "connecté à la BDD<pre>";
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
        // requete SELECT by ID
        $result = $dbco->query("SELECT * FROM articles WHERE `id`=$num ")->fetchAll(PDO::FETCH_ASSOC);
        var_dump($result);
        //$result["article"] = $result ;
        // envoi resultat dans template
        $this->set($result[0]);
        $this->render('article');

    }

}