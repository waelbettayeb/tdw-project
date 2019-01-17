<h2><?php echo $page_categorie; ?></h2>
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
                            "            <td school_id=\"{$row[0]}\">
                            
                            {$row[1]}
                            </br>
                            <a href=\"school?id={$row[0]}\" class=\"badge badge-dark\">site</a>
                            <a href=\"school?id={$row[0]}#commentaire\" class=\"badge badge-primary\">Commenter</a>
                            </td>\n" .
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