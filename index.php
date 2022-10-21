
<?php
require_once  "_head.php";
?>

<title>TodoList</title>

</head>
<body>
    <?php
    require_once "_header.php";
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
            $errors = [
                'text'=> ''
            ];
            if ($_SERVER['REQUEST_METHOD']==='POST'){
                $todo = filter_var($_POST['text'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                if (!$todo){
                    echo $errors['text'] = '<p class="color_red"><strong>Votre saisie contient aucun caractere</strong></p>';
                } elseif (strlen($todo) <= 5){
                    echo $errors['text'] = '<p class="color_red"><strong>Votre saisie est trop courte</strong></p>';
                }
            }
            ?>
            </div>
        </div>
    </main>
<?php
require_once  "_footer.php";
?>