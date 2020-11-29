<?php

// Inclusion physique des fichiers de classe nécessaires
require 'core/DAO/PageManager.php';
require 'core/DTO/Page.php';

// Importation des classes nécessaires dans l'espace de nom actuel
use App\DTO\Page;
use App\DAO\PageManager;

//Inclusion du fichier settings.php
require 'core/settings.php';

try{

    //instanciation du manager des pages
    $pageManager = new PageManager( getDb() );

    $pageToUpdate = $pageManager->findPage($_GET['type']);

    dump($pageToUpdate);


    //appel des variables du formulaire de modification
    if (
        isset($_POST['page-title']) &&
        isset($_POST['page-content'])
    ) {
       //bloc des vérif
       if (!preg_match('/^.{3,100}$/',$_POST['page-title'])) {
           $errors[] = 'Le titre doit contenir entre 3 et 100 caractères !';
       }

       if (mb_strlen($_POST['page-content']) > 2000 || mb_strlen($_POST['page-content']) < 3 ) {
            $errors[]='Le contenu doit contenir entre 3 et 2 000 caractères !';
        }

        if (!isset($errors)) {

            $pageToUpdate->setTitle($_POST['page-title']);
            $pageToUpdate->setContent($_POST['page-content']);

            dump($pageToUpdate);

            $status = $pageManager->update($pageToUpdate);

            dump($status);

            //$status contient true si la mise a jour de la page a fonctionné sinon false
            if ($status) {
                $success = 'Page modifié avec succès';
            }else{
                $errors[]= 'Problème avec la base de données, veuillez ré-essayer plus tard';
            }
        }

    }



}catch(Exeption $e){
    die('Problème PHP ; ' . $e->getMessage() );
}

include 'core/parts/head.php'
?>

<body>

    <?php

    if (isset($success)) {
        echo '<p class="alert alert-success col-12 text-center"> ' . $success . ' </p>';
    }else{

    ?>
        <form action="" method="POST" >

            <?php
            if (isset($errors)) {
                foreach($errors as $error){
                    echo '<p class="alert alert-danger"> ' . $error . ' </p>';
                }
            }
            ?>

            <div class="form-group  col-10 offset-1 p-0">
                <input type="text" name="page-title" id="page-title" class="form-control" placeholder="titre de la page"  value="<?php echo($pageToUpdate->getTitle()) ?>"> 
            </div>
            <div class="form-group col-10 offset-1 p-0">
                <textarea class="form-control " name="page-content" id="page-content" rows="13"  placeholder="contenu de la page"  ><?php echo($pageToUpdate->getContent()) ?></textarea>
            </div>
            <div class="col-10 offset-1">
                <button class="btn btn-primary btn-red col-10 offset-1 m-0"  type="submit">Valider</button>
            </div>
        </form> 
    <?php
    }
    ?>

<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/card.js"></script>
</body>
</html>

