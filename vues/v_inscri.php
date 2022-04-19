<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/tab.css">
</head>
<header>

</header>

<table class="container">
    <thead>
        <tr>
            <th><h1>Nom</h1></th>
            <th><h1>Prénom</h1></th>
            <th><h1>Date</h1></th>
            <th><h1>Nombre de place</h1></th>
            <th><h1>Nom Prof</h1></th>
            <th><h1>Prénom Prof</h1></th>
            <th><h1>Instruments</h1></th>
            <th><h1> PDF </h1></th>
            
        </tr>
    </thead>
    <tbody>
  <?php 

  $i=0;
    foreach ($lesInscri as $inscri) {?>
      <tr class="item_row">
            <td> <?php echo $inscri[0]; ?></td>
            <td> <?php echo $inscri[1]; ?></td>
            <td> <?php echo $inscri[2]; ?></td>
            <td> <?php echo $inscri[3]; ?></td>
            <td> <?php echo $inscri[4]; ?></td>
            <td> <?php echo $inscri[5]; ?></td>
            <td> <?php echo $inscri[6]; ?></td>
            
            <td><a href="index.php?action=inscripdf&numInscri=<?php echo $i ?>"> pdf </a></td>
      </tr>
    <?php $i++; 
 }?>
        </tr>
    </tbody>
</table>