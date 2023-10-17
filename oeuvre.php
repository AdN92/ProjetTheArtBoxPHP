<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <?php include('header.php'); ?>
    </header>

        <?php include('oeuvres.php'); ?>


    <main>              

        <article id="detail-oeuvre">

        <?php 
        // vérifie si l'ID de l'oeuvre est présente 
        if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
            // convertit l'ID en entier pour la sécurité
            $id =(int)$_GET['id'];

            //fonction pour trouver une oeuvre par son ID
            function findOeuvreById($id, $oeuvres){
                foreach($oeuvres as $oeuvre){
                    if ($oeuvre['id'] == $id){
                        return $oeuvre;
                    }
                }
                return null;
            }    
            
            //recherche de l'oeuvre par son identifiant dans le tableau des oeuvres
            $foundOeuvre = findOeuvreById($id, $oeuvres);

            if($foundOeuvre) :
   
        ?>
            
                <!-- Affichage détails de l'oeuvre -->
        <div id="img-oeuvre">
            <img src="<?php echo $foundOeuvre['image']; ?>" alt="<?php echo $foundOeuvre['alt']; ?>">

        <div id="contenu-oeuvre">
            <h1><?php echo $foundOeuvre['title']; ?></h1>

            <p class="description"><?php echo $foundOeuvre['artiste']; ?></p>

            <p class="description-complete"><?php echo $foundOeuvre['description']; ?></p>             
            
        </div>
        <?php
            else :
                echo 'Oeuvre non trouvée.';
            endif;
        } else {
            echo 'ID de l\oeuvre invalide ou manquant.';
        }
        ?>
    </article>
</main>   
    
    <footer>
        <?php include('footer.php'); ?> 
    </footer>
    
</body>
</html>