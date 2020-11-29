<?php 

    // Inclusion physique des fichiers de classe nécessaires
    require( dirname(__FILE__) . '/../DTO/Page.php');
    require( dirname(__FILE__) . '/../DAO/PageManager.php');

    // Importation des classes nécessaires dans l'espace de nom actuel
    use App\DTO\Page;
    use App\DAO\PageManager;

    // Inclusion du fichier settings.php
    require '../settings.php';

    try{

        //instanciation du manager des plats
        $pageManager = new PageManager( getDb() );

        //récupération des tous les entrées
        $page = $pageManager->findPage($_POST['type']);

    }catch(Exeption $e){
        die('Problème PHP ; ' . $e->getMessage() );
    }

?>

<h3><?php echo htmlspecialchars( $page->getTitle() );?><br></h3>

            
<p>
    <?php echo htmlspecialchars( $page->getContent() );?><br>
</p> 

<div class="mb-3 ">
    <i class=" add-btn fas fa-plus"></i>
</div>








