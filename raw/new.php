<?php
require('../functions/functions.php');

if (isset($_POST["name"]) && isset($_POST["vorname"]) && isset($_POST["klassenraum"]) && isset($_POST["klassenbezeichner"]) && isset($_POST["klassenid"])) {
    neuerLehrer($_POST["name"], $_POST["vorname"], $_POST["klassenraum"], $_POST["klassenbezeichner"], $_POST["klassenid"]);
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

<form class="form-horizontal" method="post" action="./new.php">

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Vorname</label>
        <div class="col-md-4">
            <input id="vorname" name="vorname" type="text" placeholder="Lukas"
                   class="form-control input-md" required="">

        </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="name">Nachname</label>
        <div class="col-md-4">
            <input id="name" name="name" type="text" placeholder="Fruntke"
                   class="form-control input-md" required="">

        </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="name">Klassenstufe</label>
        <div class="col-md-4">
            <select id="klassenid" name="klassenid" class="form-control">
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
            </select>

        </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="name">Klassenbezeichner</label>
        <div class="col-md-4">
            <input id="klassenbezeichner" name="klassenbezeichner" type="text" placeholder="g"
                   class="form-control input-md" required="">

        </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="name">Klassenraum</label>
        <div class="col-md-4">
            <label class="radio-inline" for="klassenraum-0">
                <input type="radio" name="klassenraum" id="klassenraum-0" value="010"
                       checked="checked">
                010
            </label>
            <label class="radio-inline" for="klassenraum-1">
                <input type="radio" name="klassenraum" id="klassenraum-1" value="011">
                011
            </label>
            <label class="radio-inline" for="klassenraum-2">
                <input type="radio" name="klassenraum" id="klassenraum-2" value="012">
                012
            </label>
            <label class="radio-inline" for="klassenraum-3">
                <input type="radio" name="klassenraum" id="klassenraum-3" value="013">
                013
            </label>
            <label class="radio-inline" for="klassenraum-4">
                <input type="radio" name="klassenraum" id="klassenraum-4" value="014">
                014
            </label>
        </div>
    </div>

    <!-- Button -->
    <div class="form-group">
        <div class="col-md-4 col-md-offset-5">
            <button type="submit" class="btn btn-primary">Absenden</button>
        </div>
    </div>

</form>
</div
</body>
</html>
