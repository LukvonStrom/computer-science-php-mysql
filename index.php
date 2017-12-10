<?php
    $easteregg = false;
    require('./functions.php');


    if(isset($_GET["deleteid"])){
        klasseUndLehrerlöschen($_GET["deleteid"]);
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- meine coolen CSS Dateien die die Seite richtig hübsch machen reinladen. -->

    <?php echo x("style"); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" integrity="sha256-j+P6EZJVrbXgwSR5Mx+eCS6FvP9Wq27MBRC/ogVriY0=" crossorigin="anonymous" />

    <link href="./app.css" rel="stylesheet">
</head>
<body>
<!-- Das hier ist die obere Navigationsbar auch an sich erstmal nicht für uns relevant. -->
<nav class="<?php echo x("animation"); ?> navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
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
        <div class="<?php echo  x("animation"); ?> col-md-10 col-md-offset-1" >
            <div class="panel panel-primary">
                <!-- Titel des Panels -->
                <div class="panel-heading"><center>Dateninhalt</center></div>
                <div class="panel-body" style="align: center">
                    <!-- Textinhalt des Panels. -->
                    <table class="table table-bordered table-striped table-hover table-responsive">
                        <thead>
                        <tr>
                            <th>Lehrer Nummer</th>
                            <th>Lehrer Vorname</th>
                            <th>Lehrer Nachname</th>
                            <th>Klassen ID</th>
                            <th>Klassen Bezeichner</th>
                            <th>Klassenraum</th>
                            <th>bearbeiten</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            $data = sucheAlleDaten();

                            foreach($data as $zeilennr => $daten) {
                                echo '<tr>';
                                foreach ($daten as $eintrag => $wert) {

                                    echo '<td>' . $wert . '</td>';
                                }
                                echo '<td><a href="./modify.php?id='.$daten['LNR'].'"><i class="fa fa-pencil fa-fw" style="color: #000000" aria-hidden="true"></i></a> <a href="./index.php?deleteid='.$daten['LNR'].'" style="color: #000000"><i class="fa fa-trash-o fa-fw" aria-hidden="true"></i></a></td>';
                                echo '</tr>';

                            }


                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo  x("script"); ?>
<!-- JavaScripts importieren, auch für uns vollkommen egal.-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>
