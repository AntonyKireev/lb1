<?php
require_once __DIR__ . "/DB.php";
$db = new DB();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Antony</title>
</head>
<body style="display: flex; flex-direction: row-reverse">

<div class="forms">
    <form action="" method="post">
        <select name="league">
            <?php
            $db->showLeague();
            ?>
        </select>
        <input type="submit" value="Submit"><br>
    </form>
    <br>
    <form action="" method="post">
        <label>Choose the time interval:</label>
        <input type="datetime-local" name="start">
        <input type="datetime-local" name="stop">
        <input type="submit" value="Submit"><br>
    </form>
    <br>
    <form action="" method="post">
        <select name="player">
            <?php
            $db->showPlayers();
            ?>
        </select>
        <input type="submit" value="Submit"><br>
    </form>
</div>

<div class="content" style="display: block; margin-right: 200px; padding: 20px">
    <?php
    if (isset($_POST["league"])) {
        $db->findLeague($_POST["league"]);
    } elseif (isset($_POST["start"])) {
        $db->findGames($_POST["start"], $_POST["stop"]);
    } elseif (isset($_POST["player"])) {
        $db->findPlayer($_POST["player"]);
    }
    ?>
</div>
</body>
</html>
