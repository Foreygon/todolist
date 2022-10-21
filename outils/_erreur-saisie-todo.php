<?php 
            $errors = [
                'text'=> ''
            ];
            if ($_SERVER['REQUEST_METHOD']==='POST'){
                $todo = filter_var($_POST['text'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                if (!$todo){
                    $errors['text'] = '<p class="color_red"><strong>Votre saisie contient aucun caractere</strong></p>';
                } elseif (strlen($todo) <= 5){
                    $errors['text'] = '<p class="color_red"><strong>Votre saisie est trop courte</strong></p>';
                }
            }
            ?>