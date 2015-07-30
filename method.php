<?php
require 'db.php';

function getStudentsWithDetails() {
  $eleves = array();
  foreach(getAllNotesAndMatiersForStudents() as $result) {
    if(array_key_exists($result["id_eleve"] , $eleves)) {      
      $notes = $eleves[$result["id_eleve"]]["notes"];
      $notes[$result["id_matiere"]]  = array($result["sujet"] => $result["note"]);
      $eleves[$result["id_eleve"]]["notes"] = $notes;
    } else {
      $notes[$result["id_matiere"]] = array($result["sujet"] => $result["note"]); 
      $eleves[$result["id_eleve"]]  = array(
                                        "notes" => array() , 
                                        "nom" => utf8_encode($result["nom"]) ,
                                        "prenom" => utf8_encode($result["prenom"]),
                                      );
    }
    unset($notes);
  }
  return $eleves;
}

$eleves = array();
