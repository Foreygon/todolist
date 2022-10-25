<?php
require_once  "./view/_head.php";
// require_once "./outils/_erreur-saisie-todo.php";


$dsn = 'mysql:host=localhost;dbname=todolist';
$user = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    // echo "Connexion réussi";
} catch (PDOException $e) {
    echo "connexion échouée : " . $e->getMessage();
}


$errors = ['todo' => ''];
$todo = ['tache' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $todo = filter_var($_POST['todo'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // $stmt = $pdo->prepare("INSERT INTO todo VALUES (DEFAULT, $todo)");
    // preciser la colone :tache
    $stmt = $pdo->prepare("INSERT INTO todo VALUES (DEFAULT, :tache)");




    if (!$todo) {
        $errors['todo'] = '<p class="color_red"><strong>Votre saisie contient aucun caractere</strong></p>';
    } elseif (strlen($todo) <= 5) {
        $errors['todo'] = '<p class="color_red"><strong>Votre saisie est trop courte</strong></p>';
    } elseif (!$errors['todo']) {
        // solution add bindValue
        $stmt->bindValue(':tache', $todo);
        $stmt->execute();
    }
    $list = $pdo->prepare("SELECT tache FROM todo");
    $list->execute();

    $resulte = $list->fetchAll();
}


?>
<title>TodoList</title>

</head>

<body>
    <?php
    require_once "./view/_header.php";
    ?>
    <main class="contain">
        <div class="contain-form">
            <h2 class="h2-form">Ma Todo</h2>
            <form class="form" action="/" method="POST">
                <label for="todo" hidden>tu doit faire?</label>

                <input class="input-form" type="text" name="todo" id="todo" placeholder="Tu dois faire?">
                <button class="btn-form" type="submit">Ajouter</button>
            </form>
            <div class="errors dpf-jc">
                <?php
                echo $errors['todo'];
                ?>
            </div>

            <div class="">
                <?php
                    foreach ($resulte as $value) {
                        echo "<div class='contenaire-list dpf-jc'>";

                            echo "<div class='value-list'>";

                                echo $value['tache'];
                                
                            echo "</div>";

                            echo "<div>";

                                echo "<button class='btn-del'>Supprimé</button>";

                            echo "</div>";

                            echo "<div>";

                                echo "<button class='btn-end'>Terminer</button>";

                            echo "</div>";

                        echo "</div>";
                    }

                    ?>
            </div>
            
        </div>
    </main>
    <?php
    require_once  "./view/_footer.php";
    ?>