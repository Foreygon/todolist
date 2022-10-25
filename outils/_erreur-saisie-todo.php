<?php 

        $dsn = 'mysql:host=localhost;dbname=todolist';
        $user = 'root';
        $password = '';

        try {
            $pdo = new PDO($dsn, $user, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
            echo "Connexion réussi";
        } catch (PDOException $e) {
            echo "connexion échouée : " . $e->getMessage();
        }


            $errors = ['todo'=> ''];
            $todo = ['tache'=>''];

            if ($_SERVER['REQUEST_METHOD']==='POST'){
                $todo = filter_var($_POST['todo'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $stmt = $pdo->prepare("INSERT INTO todo VALUES (DEFAULT, '$todo')");

                if (!$todo){
                    $errors['todo'] = '<p class="color_red"><strong>Votre saisie contient aucun caractere</strong></p>';
                } elseif (strlen($todo) <= 5){
                    $errors['todo'] = '<p class="color_red"><strong>Votre saisie est trop courte</strong></p>';
                }
            }
            // header('Location: http://localhost:3000/');