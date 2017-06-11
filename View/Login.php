<?php
/**
 * Created by PhpStorm.
 * User: JOACHIM
 * Date: 11/06/2017
 * Time: 00:30
 */
?>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>EverNoteLike-Login</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="JoachimR">

    <link rel="stylesheet" href="View/Styles/styles.css?v=1.0">
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <![endif]-->
</head>

<body>
<div id="auth">
    <form method="post" onsubmit="javascript:document.location='http://' + $('login') + ':' + $('pass') + '@mydomain.tld';">
        <h1>EverNoteLike</h1>
        <input type="text" name="login" id="login" /></br>
        <input type="password" name="pass" id="pass" /></br>
        <input type="submit" value="ok"/>
    </form>
    <a href="View/CreateUser.php">Créer un compte</a>
</div>
<script src="js/scripts.js"></script>
</body>
</html>
