<html lang="fr">
    <head>
        <title>ExosAjax</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    </head>
    <body>
        <button id="btn1">Afficher la page</button>
        <button id="btn2">Afficher la liste des produits Jarditou</button>
        <div id="div1"></div>
        <div id="div2"></div>
    </body>
</html>           
<?php

 $(document).ready(function () {
    $('#btn1').click(function () {
        $('#div1').load('load.html');
    });
    $('#btn2').click(function () {
        $('#div2').load('.allProductAjax.php');
    });    

?>
<div class="container">
    <a href="productForm.php" title="Lien vers ajout d'un produit" target="blank">Ajouter un produit</a>
    <table>
        <thead>
        <th>Photo</th>
        <th>Id</th>
        <th>Catégorie</th>
        <th>Référence</th>
        <th>Libellé</th>
        <th>Couleur</th>
        <th>Description</th>
        <th>Prix</th>
        <th>Stock</th>
        <th>Ajout</th>
        <th>Modif</th>
        <th>Bloqué</th>
        </thead>
        <tbody>
            <?php
            foreach ($allProduct as $element)
            {
                ?>
                <tr>
                    <td>
                        <img src="../../assets/img/<?= $element->pro_id . '.' . $element->pro_photo ?>" alt="Photo d'illustration" title="Photo de <?= $element->pro_libelle ?>">
                    </td>
                    <td><?= $element->pro_id ?></td>
                    <td><?= $element->pro_cat_id ?></td>
                    <td><?= $element->pro_ref ?></td>
                    <td><?= $element->pro_libelle ?></td>
                    <td><?= $element->pro_couleur ?></td>
                    <td><?= $element->pro_description ?></td>
                    <td><?= $element->pro_prix ?></td>
                    <td><?= $element->pro_stock ?></td>
                    <td><?= $element->pro_d_ajout ?></td>
                    <td><?= $element->pro_d_modif ?></td>
                    <td><?= $element->pro_bloque == 1 ? 'Oui' : 'Non' ?></td>
                  
                    </td>
                </tr>
                
            }
        </tbody>
    </table>    
   
</div>     

<!-- Exo 2 -->
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>ExosAjax</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    </head>
    <body>
        <button id="btn1">Afficher la page</button>
        <button id="btn2">Afficher la liste de produits jarditou</button>
        <button id="btn3">Afficher la liste des régions</button>
        <select id="select1"></select>
        <div id="div1"></div>
    
    </body>
</html>    
<?php
foreach ($listRegionResult as $row) {
    ?>
<option value="<?= $row->reg_id ?>"><?= $row->reg_v_nom ?></option>
<?php
}

    $(document).ready(function () {
    $("#btn3").click(function () {
        $("#select1").load("option1.php");
    });
});     
?> 
<!-- Exo 3 -->
<div>
            <form action="#" method="GET">
                <label for="search">Recherche :</label>
                <input type="text" name="search" id="search" placeholder="Recherche" />
                <input type="button" name="submit" id="submit" value="Rechercher" />
            </form>
        </div>
        <div id="result">

        </div>    

        <?php $('#submit').click(function () {
        $.getJSON('http://api.themoviedb.org/3/search/movie?api_key=f33cd318f5135dba306176c13104506a&query=' + $('#search').val(), function (data) {
            var items = [];
            $.each(data.results, function(key, val) {
                items.push(key + ' : ' + val.title + '<br />');
            });
            $('#result').html(items.join());
        });    
        ?>