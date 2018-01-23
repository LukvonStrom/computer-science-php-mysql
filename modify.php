<?php
require('./functions/functions.php');
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
<head>
    <!-- Die Tags brauchen wir, damit die Seite hübsch aussieht. Einfach ignorieren :) -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="expires" content="0">
    <title>INFO-Testseite</title>

    <!-- Schriftarten importieren -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet'
          type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- meine coolen CSS Dateien die die Seite richtig hübsch machen reinladen. -->

    <?php echo x("style"); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css"
          integrity="sha256-j+P6EZJVrbXgwSR5Mx+eCS6FvP9Wq27MBRC/ogVriY0=" crossorigin="anonymous"/>

    <link href="./app.css" rel="stylesheet">
</head>
<body>
<!-- Das hier ist die obere Navigationsbar auch an sich erstmal nicht für uns relevant. -->
<nav class="<?php echo x("animation"); ?> navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Titel der Navigationsleiste -->
            <a class="navbar-brand" href="#">
                Informatik Testseite
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Linke Seite der Navigationsleiste. -->
            <ul class="nav navbar-nav">
                <li><a href="./index.php">Auflistung</a></li>
                <li><a href="./new.php">Lehrer eintragen</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container" style="margin-top: 15em">
    <div class="row">
        <div class="<?php echo x("animation"); ?> col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <!-- Titel des Panels -->
                <div class="panel-heading">
                    <center>Lehrer modifizieren</center>
                </div>
                <div class="panel-body" style="align: center">
                    <!-- Textinhalt des Panels. -->
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

                </div>
            </div>
        </div>
    </div>
</div>

<?php echo x("script"); ?>
<!-- JavaScripts importieren, auch für uns vollkommen egal.-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>