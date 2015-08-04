<?php require 'method.php'; ?>

<a href='./formulaire.php'>Ajouter une note</a>

<table>
  <thead>
    <tr>
      <th>Nom</th>
      <th>Prenom</th>
      <?php foreach (getAllMatiere() as $matiere) { ?>
        <th><?php echo utf8_encode($matiere["sujet"]); ?></th>
      <?php } ?>
    </tr>
  </thead>
    <tbody>
    <?php foreach (getStudentsWithDetails() as $student) { ?>
      <tr>
        <td><?php echo $student["nom"]; ?></td>
        <td><?php echo $student["prenom"]; ?></td>
        <?php foreach ($student["notes"] as $note) {
          foreach($note  as $matiere => $valeur){ ?>
            <td><?php echo $valeur; ?></td>
          <?php }          
        } ?>
      </tr>      
    <?php } ?>
    </tbody>
</table>