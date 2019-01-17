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
    echo "<title>", $page_categorie,"</title>";
    ?>
    <script type="text/javascript" src="./static/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="./static/js/popper.min.js"></script>
    <script type="text/javascript" src="./static/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./static/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="./static/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="./static/js/categorie.js"></script>
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
            <h2>
            <?php
                echo  $page_categorie;
            ?>
            </h2>
            <h5>écoles</h5>
            <table id="dtBasicExample" class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Categorie</th>
                    <?php
                        if(($page_categorie == "universitaire")
                        ||($page_categorie == "formation-professionnelle"))
                            echo "<th scope=\"col\">Domaine</th>";
                    ?>
                    <th scope="col">Commune</th>
                    <th scope="col">Wilaya</th>
                    <th scope="col">adresse</th>
                    <th scope="col">téléphones</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $table = DB::getSchoolByType($page_categorie);
                    // print_r($table);
                    foreach ($table as $row){
                        echo "<tr>\n".
                            "            <th scope=\"row\">{$row[0]}</th>\n".
                            "            <td >{$row[1]}</td>\n" .
                            "            <td class=\"htt-td\">{$row[2]}</td>\n";
                        if(($page_categorie == "universitaire")
                            ||($page_categorie == "formation-professionnelle"))
                            echo "<td class=\"htt-td\">{$row[3]}</td>\n";

                        echo"            <td class=\"htt-td\">{$row[5]}</td>\n".
                            "            <td class=\"perc-td\">{$row[4]}</td>\n" .
                            "            <td class=\"ttc-td\">{$row[6]}</td>\n".
                            "            <td class=\"ttc-td\">{$row[7]}</td>\n".
                            "        </tr>";
                    }
                ?>
                </tbody>
            </table>        
        </div>
    </div>
    <?php
    require_once("footer.php");
    ?>
</div>
</body>
</html>
