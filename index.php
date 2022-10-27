<?php
require_once  "./view/_head.php";
// require_once "./tools/_delete.php";
require_once "./tools/_dbconection.php";





$errors = ['todo' => ''];
$todo = ['tache' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $todo = filter_var($_POST['todo'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $stmt = $pdo->prepare("INSERT INTO todo VALUES (DEFAULT, :tache, 0)");


    if (!$todo) {
        $errors['todo'] = '<p class="color_red"><strong>Votre saisie contient aucun caractere</strong></p>';
    } elseif (strlen($todo) <= 5) {
        $errors['todo'] = '<p class="color_red"><strong>Votre saisie est trop courte</strong></p>';
    } elseif (!$errors['todo']) {
        // solution add bindValue
        $stmt->bindValue(':tache', $todo);
        $stmt->execute();
    }

}
    $list = $pdo->prepare("SELECT * FROM todo");
    $list->execute();

    $resulte = $list->fetchAll(); 


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
                    require_once "./view/_contain-list.php"

                ?>
            </div>
            
        </div>
    </main>
    <?php
    require_once  "./view/_footer.php";
    ?>