//envoie de l'email

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
                            Nom : " . $_POST['firstname'] . " <br>    
                            Prénom : " . $_POST['lastname'] . " <br> 
                            Adresse : "  . $_POST['adress'] . " <br> 
                            Code postal : " . $_POST['zipcode'] . " <br> 
                            Ville : " . $_POST['city'] . " <br> 
                            Téléphone : " . $_POST['phone'] . " <br> 
                            Email : " . $_POST['mail'] . " <br> 
                            Message : " .$_POST['message'] . "
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