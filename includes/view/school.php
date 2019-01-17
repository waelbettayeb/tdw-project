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
        $table = DB::getSchoolNameById($_GET['id']);
        echo "<title>", $table[0][0],"</title>";
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
    ?>
    <div class="row" id="sidebar-content-container">

        <?php
        require_once("sidebar.php");
        ?>

        <div class="container col-md-auto" id="content">
            <h2>
            <?php
                echo DB::getSchoolNameById($_GET['id'])[0][0];
            ?>
            </h2>
            <?php
            require("school_carousel.php");
            ?>
            <nav class="nav">
            <?php
                $table = DB::getTypesFormationBySchoolId($_GET['id']);
                foreach ($table as $row){
                    echo "<a class=\"nav-link\" href=\"about\">{$row[1]}</a>";
            }
            ?>

</nav>
            <h5>Formations</h5>
            <table id="dtBasicExample" class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">type</th>
                    <th scope="col">volume horaire</th>
                    <th scope="col">ht</th>
                    <th scope="col">ttc</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $table = DB::getFormationsBySchoolId($_GET['id']);
                    foreach ($table as $row){
                        echo "<tr>\n".
                            "            <th scope=\"row\">{$row[0]}</th>\n".
                            "            <td school_id=\"{$row[0]}\">
                            {$row[1]}
                            " .
                            "            <td class=\"htt-td\">{$row[2]}</td>\n";
                       
                        $ttc = $row[4]*(1+ $row[5]/100);
                        echo"            <td class=\"htt-td\">{$row[3]}</td>\n".
                            "            <td class=\"perc-td\">{$row[4]}</td>\n" .
                            "            <td class=\"perc-td\">{$ttc}</td>\n" .
                            "        </tr>";
                    }
                ?>
                </tbody>
            </table> 
            
            <h5 id="commentaire">Commentaires</h5>

            <div class=" border border-primary rounded p-4" >
            <?php
            if((!empty($_SESSION))&&(DB::getAccount($_SESSION['user'])[0][3]))
            echo'<div class="input-group mb-3">
                <textarea id="comment-content"class="form-control" aria-label="With textarea"></textarea>
                <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="comment-btn" data-schoolId="'.$_GET['id'].'">Commenter</button>
             </div>';
            ?>
            </div>
            <?php
                $table = DB::getComment($_GET['id']);
                foreach ($table as $row){

                echo '<div class="row border border-primary rounded p-3 mb-3" ><div class="media mb-2" id="'.$row[0].'">';
                echo '<div class="media-body">';
                echo '<h5 class="mt-0">'. $row[3];
                if($row[4] == 1)
                    echo '<span class="badge badge-secondary">regular</span>';
                else if ($row[4] == 2)
                    echo '<span class="badge badge-primary">Admin</span>';
                else
                    echo '<span class="badge badge-danger">Super</span>';
                echo '</h5>';
                echo '<h6 class="card-subtitle mt-0text-muted">'. $row[2].'</h6>';
                echo $row[1];    
                echo '</div></div></div>';
                }
            ?>   
                

            </div>
            </br>
            <?php
                $table = DB::getSchoolNameById($_GET['id']);
                $address = $table[0][2]." ".$table[0][3]." ".$table[0][4];
                echo "Adresse : ". $address;
            ?>    
    <div class="row" >
   
                <iframe id="gmap_canvas"
                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                    <?php
                       
                        $address = $table[0][2]." ".$table[0][3]." ";
                        $query = str_replace("+", "%20", urlencode($address));;
                        echo "src=\"".
                            "https://maps.google.com/maps?q=".
                            $query .
                            "&t=k&z=13&ie=UTF8&iwloc=&output=embed\"";
                ?>
                >
                </iframe>
    </div>
    
        </div>
    </div>
    <?php
    require_once("footer.php");
    ?>
</div>
</body>
</html>
