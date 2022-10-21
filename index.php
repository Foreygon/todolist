
<?php
require_once  "./view/_head.php";
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
                <label for="text" hidden>tu doit faire?</label>
                <input class="input-form" type="text" name="text" id="text" placeholder="Je dois faire?">
                <button class="btn" type="submit">Ajouter</button>
            </form>
            <div class="errors dpf-jc">
            <?php 
            require_once "./outils/_erreur-saisie-todo.php";
            ?>
            </div>
        </div>
    </main>
<?php
require_once  "./view/_footer.php";
?>