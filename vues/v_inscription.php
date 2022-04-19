<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/inscription.css">
    <title>Document</title>
</head>

<body>
    
<div>
<form action="./model/InscriptionDAO.php" method="post" class=""style= "margin-left: 200px;">

<div class="title">Bonjour</div>
        
      <div class="subtitle">Veuillez remplir le formulaire</div>
        <div class="input-container ic1">
            <input type="text" name="nom" id="nom"placeholder="Nom" class="input" required>
        <div class="cut">Nom</div>
    
  </div>
  
  <div class="input-container ic2">
    
    <input type="text" name="prenom" id="prenom"placeholder="Prénom " class="input" required>
    <div class="cut">Prénom</div>
   
    
  </div>
  
  <div class="input-container ic2">
    
    <input type="email" name="mail" id="mail"placeholder=" Email" class="input" required>
    <div class="cut">Email</div>
    
    
    
  </div>
  
  <div class="input-container ic2">
    
    
    <input type="tel" name="tel" id="tel"placeholder="Téléphone " class="input" required>
    <div class="cut">Téléphone</div>
    
    
  </div>
  
  <div class="input-container ic2">
  
    <input type="text" name="adresse" id="adresse"placeholder="Adresse "class="input"  required>
    <div class="cut">Adresse</div>
    
  </div>
  <div class="input-container ic2">
 
    <input type="number" name="cours" id="cours"placeholder="Cours "class="input"  required>
    <div class="cut">Cours</div>
    
  </div>
  

  <div class="">
  <div class="cut cut-short"></div>
    <input type="submit"class="submit" value="Inscription">

    
    
   
  </div>
  </div>
</form>
</body>
</html>