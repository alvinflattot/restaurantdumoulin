<?php 

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
        
        //récupération de la page des entrées
        $page = $pageManager->findPage($_GET['type']);
    
    }catch(Exeption $e){
        die('Problème PHP ; ' . $e->getMessage() );
    }

?>

    <div>

        <h2><?php echo($page->getTitle());?></h2>
        <p><?php echo($page->getContent()); ?></p>
        
        <i data-type="<?php echo($page->getType()) ?>" class="modif-btn add-btn fas fa-plus"></i>

        <p><?php echo($_GET['type']) ?></p>

    </div>
    

