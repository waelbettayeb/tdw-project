<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

    <link type="text/css" rel="stylesheet" href="./static/css/style.css" id="#main-style" />
    <?php
    echo "<title>edit</title>";
    ?>
    <script type="text/javascript" src="./static/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="./static/js/popper.min.js"></script>
    <script type="text/javascript" src="./static/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./static/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="./static/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="./static/js/categorie.js"></script>
    <script type="text/javascript" src="./static/js/auth.js"></script>

</head>

<body>
<div class="container-fluid">
    <?php
    require_once("title.php");

    require_once("carousel.php");
    ?>
    <div class="row" id="sidebar-content-container">

        <?php
        require_once("sidebar.php");
        ?>

        <div class="container col-md-auto" id="content">
          
            <?php
                $page_categorie = "maternelle";
                require("./includes/view/categorie_item.php");
                $page_categorie = "primaire";
                require("./includes/view/categorie_item.php");
                $page_categorie = "moyen";
                require("./includes/view/categorie_item.php");
                $page_categorie = "secondaire";
                require("./includes/view/categorie_item.php");
                $page_categorie = "formation-professionnelle";
                require("./includes/view/categorie_item.php");
                $page_categorie = "universitaire";
                require("./includes/view/categorie_item.php");
            ?>
        </div>
    </div>
    <?php
    require_once("footer.php");
    ?>
</div>
</body>
</html>
