<?php
// Mit require laden wir den Inhalt einer anderen Datei komplett in unser aktuelles Skript.
require('../functions/functions.php');

// isset() ist eine Helferfunktion die überprüft, ob dem Parameter ein Wert zugewiesen wurde.
if (isset($_GET["deleteid"])) {
    klasseUndLehrerloeschen($_GET["deleteid"]);
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

    // foreach() iteriert über ein Array und gibt uns die Möglichkeit die Variablen die wir in der Schleife
    // nutzen wollen anzugeben.
    // Die Ausgabe der Datenbank ist die folgende:
    // Array ( [0] => Array ( [LNR] => 1 [Lvorname] => Lukas [Lname] => Fruntke [ID_Kla] => 12 [KlBez] => c [KlRaum] => 014 ) )
    //

    // das macht es nötig, in zwei foreach Schleifen über die Daten zu iterieren.
    foreach ($data as $zeilennr => $daten) {
        echo '<tr>';
        foreach ($daten as $eintrag => $wert) {
            echo '<td>' . $wert . '</td>';
        }
        // Wir übergeben die Lehrernummber als GET Parameter       Das HTML Element i ist für uns nicht relevant, es fügt hier Icons ein.
        echo '<td><a href="./modify.php?id=' . $daten['LNR'] . '">ver&auml;ndern</a> 
                                 <a href="./index.php?deleteid=' . $daten['LNR'] . '" style="color: #000000">l&ouml;schen</a></td>';
        echo '</tr>';

    }


    ?>
    </tbody>
</table>

</body>
</html>
