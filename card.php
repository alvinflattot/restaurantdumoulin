<?php 
    
    // Inclusion physique des fichiers de classe nécessaires
    require 'core/DTO/Meal.php';
    require 'core/DAO/MealManager.php';

    // Importation des classes nécessaires dans l'espace de nom actuel
    use App\DTO\Page;
    use App\DAO\PageManager;

    // Inclusion du fichier settings.php
    require 'core/settings.php';

    
    
    // inclusion du head
    include 'core/parts/head.php' ;
?>

<body>
    <div class="container-fluid"> 

        <header class="row">

            <?php include 'core/parts/menu.php' ; ?> 

        </header>

        <!-- Entête -->
        <section class="row head-title">
            <div class="col-12  text-center head-title-overlay py-4">
                <h1>Menu</h1>
            </div>
        </section>

        <!-- Section menu  -->
        <section class="row  py-4 py-md-5 text-center  ">

            <div  class="col-12">
            
                <!-- barre de navigation de la carte du restaurant -->
                <nav class="row cards-nav mb-4  ">

                    
                    <ul class="d-flex justify-content-center list-group col-10 offset-1  list-group-horizontal-md p-0">
                        <li class="mb-2  list-group-item" id="menu-du-jour" data-type="menu-du-jour">Menu du jour</li>
                        <li class="mb-2  list-group-item" id="entree" data-type="entree">Entrées</li>
                        <li class="mb-2  list-group-item" id="plat" data-type="plat">Plats</li>
                        <li class="mb-2  list-group-item" id="dessert" data-type="dessert">Desserts</li>
                        <li class="mb-2  list-group-item" id="petit-chef" data-type="petit-chef"> Petit chef</li>
                        <li class="mb-2  list-group-item" id="emporter" data-type="emporter">À emporter</li>
                    </ul>


                </nav>

                <!-- affichage de la carte  -->
                <div class="row ">

                    <div class="col-10 offset-1 col-md-8 offset-md-2 border  rounded card-view  py-3">
                       

                        

                    </div>
                
                </div>

            </div>
                    
        </section>
        <button id="test">test</button>
        

<?php include 'core/parts/footer.php' ; ?>