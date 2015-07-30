<?php
  $DB    = 'base2';
  $HOST  = 'localhost';
  $USER  = 'root';
  $PASS  = '';

  $dsn = "mysql:dbname=$DB;host=$HOST";
  $conn = new PDO ($dsn, $USER, $PASS) or die ("Unable to connect to DB");

  function getAllMatiere() {
    global $conn;
    return $conn->query("SELECT * FROM matiere ORDER BY id_matiere ASC")->fetchAll();
  }

  function getAllStudents() {
    global $conn;
    return $conn->query("SELECT * FROM eleve")->fetchAll();
  }

  function getNotesForStudent($id) {
    global $conn;
    return $conn->query("SELECT * from note where id_eleve=".$id." ORDER BY id_matiere ASC")->fetchAll(); 
  }

  function getAllNotesAndMatiersForStudents() {
    global $conn;
    return $conn->query("SELECT * FROM eleve   AS e 
                                  JOIN note    AS n ON n.id_eleve   = e.id_eleve 
                                  JOIN matiere AS m ON m.id_matiere = n.id_matiere
                                  ORDER BY m.id_matiere ASC;")->fetchAll();
  }