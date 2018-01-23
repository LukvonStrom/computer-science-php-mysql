<?php
require('../functions/functions.php');
if (!isset($_GET["id"])) {
    exit("Keine ID");
}
$id = $_GET["id"];

if (isset($_POST["name"])) {
    LehrerNachNameanpassen($_GET["id"], $_POST["name"]);
    header("Location: ./index.php");
    die();
}


?>
<!DOCTYPE html>
<html lang="de">
<head></head>
<body>
<!-- Das hier ist die obere Navigationsbar auch an sich erstmal nicht für uns relevant. -->
<nav>
    <a href="./index.php">Auflistung</a> |
    <a href="./new.php">Lehrer eintragen</a>
</nav>
<br>
<!-- Ein normales HTML Form, dessen action Attribut auf die entsprechende Id geändert wird -->
<form class="form-horizontal" method="post" action="./modify.php?id=<?php echo $id; ?>">
    <!-- Text input Feld, nutzt es als Vorlage um die Seite hier zu erweitern-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="name">Nachname</label>
        <div class="col-md-4">
            <input id="name" name="name" type="text" class="form-control input-md" required=""
                   value="<?php echo sucheLehrer($id); ?>">
            <!-- Als voreingetragenen Wert setzen wir den Wert aus der Datenbank ein -->

        </div>
    </div>

    <!-- Button -->
    <div class="form-group">
        <div class="col-md-4 col-md-offset-5">
            <button type="submit" class="btn btn-primary">Absenden</button>
        </div>
    </div>

</form>
</body>
</html>