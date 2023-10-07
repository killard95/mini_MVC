<?php

class tuto extends Controller {

    public function index(){
        // should be a mySQL query for example
        $dico['tuto'] = ['nom'=>'POTTER','prenom'=>'Harry'];
        $this->set($dico);
        $this->render('accueil');
    }

    public function original(){
        $dico['michel'] = ['jose'=>'LOVE','bob'=>'Pedro'];
        $dico2["rocco"] = "ouille" ;
        $this->set($dico);
        $this->set($dico2);
        $this->render('origin');
    }

}