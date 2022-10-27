<?php
                    foreach ($resulte as $value) {

                        echo "<div class='contenaire-list dpf-jc'>";

                            echo "<div class='value-list'>";

                                echo "<p>";

                                    echo $value['tache'];

                                echo "</p>";
                                
                            echo "</div>";

                            echo "<div>";

                                echo "<form class='suppr' action='/' method='GET'>";

                                    echo "<button class='btn-del'>";

                                        echo '<a href="../tools/_delete.php?id=';
                                        echo $value['id'];
                                        echo '">Supprimé</a>';

                                    echo "</button>";

                                echo "</form>";

                            echo "</div>";

                            echo "<div>";

                                echo "<form class='end' action='/' method='GET'>";

                                echo "<button class='btn-end'>";

                                echo '<a href="../tools/_edit.php?id=';
                                echo $value['id'];
                                echo '">Terminé</a>';

                            echo "</button>";

                                echo "</form>";

                            echo "</div>";

                        echo "</div>";
                    }

                    ?>
                    