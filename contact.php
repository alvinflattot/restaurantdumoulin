<?php 

    // inclusion du head
    include 'core/parts/head.php' ;
    
    //Inclusion du fichier settings.php
    require 'core/settings.php';

try{

    //appel des variable
    if (
        isset($_POST['firstname']) &&
        isset($_POST['lastname']) &&
        isset($_POST['adress']) &&
        isset($_POST['zipcode']) &&
        isset($_POST['city']) &&
        isset($_POST['phone']) &&
        isset($_POST['mail']) 
    ) {

        //Bloc des vérifs
        if (!preg_match('/^.{2,50}$/i',$_POST['firstname'])) {
            $errors[] = 'Prénom invalide';
        }

        if (!preg_match('/^.{2,50}$/i',$_POST['lastname'])) {
            $errors[] = 'Nom invalide';
        }

        if (!preg_match("/^([0-9a-z'àâéèêôùûçÀÂÉÈÔÙÛÇ\s-]{1,50})$/i",$_POST['adress'])) {
            $errors[] = 'Adresse invalide';
        }

        if (!preg_match('/^[1-9][0-9]{4}$/',$_POST['zipcode'])) {
            $errors[] = 'Code postal invalide';
        }

        if (!preg_match('/^.{2,60}$/i',$_POST['city'])) {
            $errors[] = 'Ville invalide';
        }

        if (!preg_match('/^([0-9]{2}[ -.]?){4}[0-9]{2}$/',$_POST['phone'])) {
            $errors[] = 'Le numéro de téléphone est invalide';
        }

        if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Email invalide';
        }

        if (!preg_match('/^.{5,1000}$/',$_POST['message'])) {
            $errors[] = 'Le message doit contenir 5 à 1000 caractères';
        }

        //si pas d'erreurs
        if (!isset($errors)) {
            //message de succès
            $success = 'Votre mail a été envoyé avec succès !';
            
            //Envoie de l'email

            // Destinataire du mail
            $mail = 'petillot.emilie@gmail.com';

            //sujet du mail
            $sujet = 'Formulaire de contact';

            // Contenu en version textuelle
            $message_txt =  "
                Nom : " . $_POST['firstname'] . "    
                Prénom : " . $_POST['lastname'] . " 
                Adresse : "  . $_POST['adress'] . " 
                Code postal : " . $_POST['zipcode'] . " 
                Ville : " . $_POST['city'] . " 
                Téléphone : " . $_POST['phone'] . " 
                Email : " . $_POST['mail'] . " 
                Message : " .$_POST['message'] . "
            ";

            // Contenu en version HTML
            $message_html = "   
                <html> 
                    <head></head>
                    <body>
                        <p>
                            Nom : " . htmlspecialchars($_POST['firstname']) . " <br>    
                            Prénom : " . htmlspecialchars($_POST['lastname']) . " <br> 
                            Adresse : "  . htmlspecialchars($_POST['adress']) . " <br> 
                            Code postal : " . htmlspecialchars($_POST['zipcode']) . " <br> 
                            Ville : " . htmlspecialchars($_POST['city']) . " <br> 
                            Téléphone : " . htmlspecialchars($_POST['phone']) . " <br> 
                            Email : " . htmlspecialchars($_POST['mail']) . " <br> 
                            Message : " . htmlspecialchars($_POST['message']) . "
                        </p>
                    </body>
                </html>
            ";
            
            $crlf = "\r\n";
            $boundary = "-----=".md5(rand());

            // expediteur
            $header = "From: \"http://www.restaurantdumoulin.fr\"<noreply@exemple.com>".$crlf;
            // Email en réponse
            $header.= "Reply-to: ".$_POST['firstname']." ".$_POST['lastname']." <".$_POST['mail'].">".$crlf;

            $header.= "MIME-Version: 1.0".$crlf;
            $header.= "Content-Type: multipart/alternative;".$crlf." boundary=\"$boundary\"".$crlf;

            $message = $crlf."--".$boundary.$crlf;
            $message.= "Content-Type: text/plain; charset=\"UTF-8\"".$crlf;
            $message.= "Content-Transfer-Encoding: 8bit".$crlf;
            $message.= $crlf.$message_txt.$crlf;
            $message.= $crlf."--".$boundary.$crlf;
            $message.= "Content-Type: text/html; charset=\"UTF-8\"".$crlf;
            $message.= "Content-Transfer-Encoding: 8bit".$crlf;
            $message.= $crlf.$message_html.$crlf;
            $message.= $crlf."--".$boundary."--".$crlf;
            $message.= $crlf."--".$boundary."--".$crlf;

            mail($mail,$sujet,$message,$header);
            
        }
    }

}
catch (Exception $e) {
    die('Problème PHP : ' . $e->getMessage());
}

?>

<body>
    <div class="container-fluid"> 

        <header class="row">

            <?php include 'core/parts/menu.php' ; ?> 

        </header>

        <!-- Entête -->
        <section class="row head-title">
            <div class="col-12  text-center head-title-overlay py-4">
                <h1>Contact</h1>
            </div>
        </section>

        <?php
        if (isset($success)) {
            echo '
                <div class ="row">
                    <div class="my-5 py-5 offset-md-3 col-md-6">
                        <p class="alert alert-success    my-5 text-center"> ' . $success. ' </p>
                    </div>
                </div>
            ';
        }else{
        ?>
    
        <!-- formulaire de contact  -->
        <form class="  py-5" action="" method="POST">

            <?php
                if (isset($errors)) {
                    foreach($errors as $error){
                        echo '<p class="alert alert-danger offset-md-3 col-md-6"> ' . $error. ' </p>';
                    }
                }
            ?>
            <legend class="col-12 offset-md-3 col-md-3 px-0" >Contactez-nous :</legend>

            <div class="form-row">


                <div class="form-group col-12 offset-md-3 col-md-3 ">
                    <label for="firstname">Prénom*</label>
                    <input type="text" name="firstname" id="firstname" class="form-control" required > 
                </div>

                <div class="form-group col-12 col-md-3">
                    <label for="lastname">Nom*</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" required >
                </div>

            </div>

            <div class="form-row">
                <div class="form-group col-12 offset-md-3 col-md-6">
                    <label for="adress">Adresse</label>
                    <input type="text" name="adress" id="adress" class="form-control" placeholder="" >
                </div>
            </div>

            <div class="form-row">

                <div class="form-group col-12 offset-md-3 col-md-2">
                    <label for="zipcode">Code postal</label>
                    <input type="text" name="zipcode" id="zipcode" class="form-control" placeholder="" >
                </div>

                <div class="form-group col-12 col-md-4">
                    <label for="city">Ville</label>
                    <input type="text" name="city" id="city" class="form-control" placeholder="" >
                </div>

            </div>

            <div class="form-row">

                <div class="form-group col-12 offset-md-3 col-md-2">
                    <label for="phone">Téléphone</label>
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="" >
                </div>

                <div class="form-group col-12 col-md-4">
                    <label for="mail">Mail*</label>
                    <input type="text" name="mail" id="mail" class="form-control" required >
                </div>

            </div>

            <div class="form-row">
                <div class="form-group col-12 offset-md-3 col-md-6">
                    <label for="message">Message*</label>
                    <textarea class="form-control" name="message" id="message" rows="3" aria-describedby="messageHelp" required></textarea>
                    <small id="messageHelp" class="form-text text-muted">Le message doit contenir 5 à 1000 caractères.</small> <br>
                    <small>Les champs marqué d'un * sont obligatoires.</small>
                </div>
            </div>

            <button class=" col-12 offset-md-4 col-md-4 btn btn-primary btn-red mt-3" type="submit">Envoyer</button>

        </form> 
        <?php
        } //fin du else
        ?>       
<?php include 'core/parts/footer.php' ; ?>