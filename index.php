<?php 

    // inclusion du head
    include 'core/parts/head.php' ;
    
    //Inclusion du fichier settings.php
    require 'core/settings.php';

?>
<body>
    <div class="container-fluid">   

        <header class="row">

            <?php include 'core/parts/menu.php' ; ?> 

        </header>
        
        <!-- Contenu de la page -->

        <!-- Entête -->
        <section class="row head-title">
            <div class="col-12 text-center head-title-overlay py-4">
                <h1 >Restaurant du Moulin</h1>
                <a class="btn  btn-menu" href="card.php" role="button">Notre menu</a>
            </div>
        </section>
            
        <!-- Section Notre restaurant -->
        <section class="row py-4">
            <div class="col-12 px-0">
                <h2 class="text-center raleway-regular">Notre restaurant</h2>
                <div class="d-flex justify-content-center separateur py-3">
                    <img src="images/couteau.png" alt="">
                    <img src="images/fourchette.png" alt="">
                </div>

                <div class="row ">
                    <p class="offset-1 col-10 py-4 offset-md-1 col-md-6 josefin-light">Nous sommes très heureux de pouvoir enfin vous acceuillir de nouveau,
                        dans le respect des règles de déconfinement pour la plus grande sécurité de tous. <br>
                        Dans l’onglet «Proposition», nous vous invitons à découvrir nos différentes offres du moment. <br>
                        <br>
                        Très cordialement,<br>
                        Émilie & Thierry <br>
                        <br>
                        (N’oubliez-pas de vous munir d’un masque pour vos déplacements dans le restaurant)
                    </p>

                    <div class="offset-1 col-10 offset-md-0 col-md-4 pt-md-4">
                        <div class="row">
                            <img class="col-12 mb-3" src="images/plat.jpg" alt="">
                            <img class="col-6" src="images/goujonnettes.jpg" alt="">
                            <img class="col-6" src="images/dessert.jpg" alt="">
                        </div>
                    </div>
                </div>

            </div>
        </section>   

        <!-- Section groupe -->
        <section class="row" id="group">

            <div class="offset-1 col-10">
                <div class="d-flex justify-content-center separateur py-3">
                    <img src="images/cuillieres.png" alt="">
                    <img src="images/cuillieres.png" alt="">
                </div>

                <h3 class=" raleway-regular">Groupe</h3>
                <p class="josefin-light py-3">Pour vos repas en groupe, 2 salles sont à votre disposition : <br>
                    - le petit salon (18 personnes maximum) <br>
                    
                    - la grande salle (40 personnes maximum) 
                </p>

                <div class="row">
                    <img class="col-8 offset-2 col-md-4 offset-md-2 mb-3" src="images/salon1.jpg" alt="">
                    <img class="col-8 offset-2 col-md-4 offset-md-0" src="images/salon2.jpg" alt="">
                </div>

                <p class="josefin-light py-3">Salon privé pour repas de famille et repas d'affaires</p>

            </div>
        </section>

        <!-- Section horaires -->
        <!-- <section class="row timetable py-5">
            <div class="col-12">
                <h2>Horaires</h2>
                <img src="images/fourchette-transp.png" alt="">
            </div>

            <div class="row">
                <div class="col-10 offset-1 bg-light">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque commodi recusandae, neque sint beatae sed, nemo dignissimos necessitatibus est facilis corporis veniam accusamus suscipit obcaecati modi ducimus omnis deserunt. Fuga.
                    </p>
                </div>
            </div>

        </section> -->

        <!-- Section map -->
        <section class="row map-section  mb-5">
            <div class=" col-12 map-title-overlay">
                <div class="row py-5">
                    <h3 class=" col-10  offset-1 col-lg-8  offset-lg-2 px-0 raleway-regular">Restaurant du Moulin - Galuzot - 71230 SAINT VALLIER</h3>
                    <div class="map-divcol-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3 embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2739.102317697275!2d4.330658115254497!3d46.6444940791326!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f3b63da207371f%3A0xee456584f4096890!2srestaurant%20Du%20Moulin!5e0!3m2!1sfr!2sfr!4v1595927567737!5m2!1sfr!2sfr"  frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>

                </div>

            </div>
        </section>

        <!-- Section déco -->
        <div class="row deco-bar">

            <div class="deco deco2 col-lg-3 col-md-4 col-6"></div>
            <div class="deco deco1 col-lg-3 col-md-4 col-6"></div>
            <div class="deco deco3 col-lg-3 col-md-4 col-12 d-md-inline-block d-none"></div>
            <div class="deco deco4 col-lg-3 col-md-9 col-12 d-lg-inline-block d-none"></div>
            
        </div>
            
<?php include 'core/parts/footer.php' ; ?>