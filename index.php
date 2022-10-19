
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
            <form class="form" action="POST">
                <input class="input-form" type="text"><button class="btn" type="submit">Ajouter</button>
            </form>
        </div>
    </main>
<?php
require_once  "_footer.php";
?>