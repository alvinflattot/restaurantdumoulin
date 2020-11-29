// fonction qui charge la page a afficher en fonction du type de plat a afficher
function loadMeal (mealType){
    
    $.ajax({
        method:"POST",
        url:"core/cards/meal-view-test.php",
        dataType:'json',
        data:{
            type:mealType
        },
        timeout: 5000,    
        success:function(data)
        {

            let page = $('<div"></div>'); // création de la div qui contiendra les infos de la page

            let pageTitle = $('<h2></h2>'); //création de la balise du titre de la page
            pageTitle.text(data.title); // écriture du titre

            let pageContent = $('<p></p>'); // création du paragraphe qui contiendra le contenu de la page
            pageContent.text(data.content); //écriture du contenu

            let modifBtn = $('<i class=" modif-btn add-btn fas fa-plus"></i>');
            
            //placement du des éléments
            page.append(pageTitle);
            page.append(pageContent);
            // page.append(modifBtn);

            //écriture de la page
            $('.card-view').html(page);

            $('.modif-btn').click(function(){

                loadMealModif('entree');
            
            });
            
        },
        error: function(){

            let page = $('<div></div>'); // création de la div qui contiendra les infos de la page

            page.text('Une erreur s\'est produit');

            //écriture de la page
            $('.card-view').children().html(page);
        },
    });

};

function loadMealModif(mealType) {

    $.ajax({
        method:"POST",
        url:"core/cards/meal-view-test.php",
        dataType:'json',
        data:{
            type:mealType
        },
        timeout: 5000,    
        success:function(data)
        {

            let form = $(`
                <form action="#" method="POST" class="row">
                    <div class="form-group  col-10 offset-1 p-0">
                        <input type="text" name="page-title" id="page-title" class="form-control" placeholder="titre de la page" required value="`+data.title+`"> 
                    </div>
                    <div class="form-group col-10 offset-1 p-0">
                        <textarea class="form-control " name="message" id="message" rows="13"  placeholder="contenu de la page" required ">`+data.content+`</textarea>
                    </div>
                    <button class="btn btn-primary btn-red col-8 offset-2 " type="submit">Valider</button>
                </form> 
            `); // création du formulaire de modification du contenu de la page

            console.log(data);
            
            //écriture de la page
            $('.card-view').html(form);
            event.preventDefault();
            
        },
        error: function(){

            let page = $('<div></div>'); // création de la div qui contiendra les infos de la page

            page.text('Une erreur s\'est produit');

            //écriture de la page
            $('.card-view').children().html(page);
        },

    });
}

function loadPage(mealType) {

    // $('.card-view').load('meal-view.php');
    $.get('meal-view.php',{type: mealType}, function(data){

        // Affiche dans la console le code source récupéré (c'est un exemple d'utilisation, on fait ce qu'on veux de "data")
        $('.card-view').html( data );
        console.log(data);

    });

}

function loadModifPage(mealType) {
    $.get('update-page.php',{type: mealType}, function(data){

        // Affiche dans la console le code source récupéré (c'est un exemple d'utilisation, on fait ce qu'on veux de "data")
        $('.card-view').html( data );
        

    });
}

//Lorsque l'on clique sur un bouton de navigation des plats
$('.cards-nav ul li').click(function(){

    let mealType = $(this).data('type'); //récupère le type de plats dans la data du bouton

    loadPage(mealType); //lance la fonction loadMeal

});

$('#test').click(function(){

    loadPage(''); //lance la fonction loadPage

})

$('.card-view').on('click','.modif-btn', function() {

    let mealType = $(this).data('type'); //récupère le type de plats dans la data de la croix

    loadModifPage(mealType); //lance la fonction loadPageModifif

    

});



