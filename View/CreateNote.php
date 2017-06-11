<?php
/**
 * Created by PhpStorm.
 * User: JOACHIM
 * Date: 11/06/2017
 * Time: 01:58
 */
$date = date("d-m-Y");
?>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>EverNoteLike-Login</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="JoachimR">

    <link rel="stylesheet" href="Styles/styles.css?v=1.0">
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <![endif]-->
</head>
<header>
    <h1>EverNoteLike</h1>
</header>
<body>
<div id="mySidenav" class="sidenav">
    <a href="View/Note.php">Accueil</a>
    <a href="View/Profil.php">Profil</a>
</div>
<div id="createNote">
    <form method="post" name="createNote" action="../Controller/NotesController.php">
        <h2>Création d'une note</h2>
        <label>Titre :</label></br>
        <input type="text" name="title" id="title" /></br>

        <label>Date d'ajout :</label></br>
        <input type="text" name="add_date" id="add_date" value="<?php echo $date; ?>" /></br>

        <label>Contenu :</label></br>
        <label>Hastags :</label>
        <input type="text" name="hashtags" id="hastags" /></br>
        <textarea name="content" id="content">Enter text here...</textarea>

        <input type="submit" value="Valider" name="Create"/>
    </form>
</div>
<script src="js/scripts.js"></script>
</body>
</html>

