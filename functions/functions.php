<?php


$host = "localhost";

// Bei XAMPP ist der Nutzer root derjenige mit den höchsten Rechten, er ist standardmäßig ohne Passwort.
$user = "root";

$password = "";

$database = "schule_rutesheim";

$db = mysqli_connect($host, $user, $password, $database);

if (mysqli_connect_errno()) {
    echo "Problem bei der Verbindung zur Datenbank" . mysqli_connect_error();
    exit();
}


function sucheAlleDaten()
{
    $abfrage = "SELECT lehrer.LNR, lehrer.Lvorname, lehrer.Lname, klasse.ID_Kla, klasse.KlBez, klasse.KlRaum FROM lehrer INNER JOIN klasse ON lehrer.LNR=klasse.KlLehrer ORDER BY lehrer.LNR ASC";

    $antwort = mysqli_query($GLOBALS["db"], $abfrage);

    $ergebnis = mysqli_fetch_all($antwort, MYSQLI_ASSOC);

    return $ergebnis;

}

function sucheLehrer($id)
{
    $abfrage = "SELECT `Lname` FROM `lehrer` WHERE `LNR` = ?";

    $statement = mysqli_prepare($GLOBALS["db"], $abfrage);

    mysqli_stmt_bind_param($statement, 'i', $id);


    mysqli_stmt_execute($statement);

    $name = mysqli_fetch_all(mysqli_stmt_get_result($statement), MYSQLI_ASSOC);


    mysqli_stmt_close($statement);

    return $name[0]["Lname"];
}

function neuerLehrer($nachname, $vorname, $klassenraum, $klassenbezeichner, $klassenid)
{

    $abfrage = "INSERT INTO `lehrer` (`Lname`, `Lvorname`) VALUES (?, ?);";

    $statement = mysqli_prepare($GLOBALS["db"], $abfrage);

    mysqli_stmt_bind_param($statement, 'ss', $nachname, $vorname);

    mysqli_stmt_execute($statement);

    mysqli_stmt_close($statement);

    neueKlasse($klassenraum, $klassenbezeichner, $klassenid);

}

function neueKlasse($klassenraum, $klassenbezeichner, $klassenid)
{


    $abfrage = "INSERT INTO `klasse` (`ID_Kla`, `KlBez`, `KlLehrer`, `KlRaum`) VALUES (?, ?, ?, ?);";

    $statement = mysqli_prepare($GLOBALS["db"], $abfrage);

    $lehrerid = mysqli_insert_id($GLOBALS["db"]);

    mysqli_stmt_bind_param($statement, 'isis', $klassenid, $klassenbezeichner, $lehrerid, $klassenraum);

    mysqli_stmt_execute($statement);

    mysqli_stmt_close($statement);
}

function klasseUndLehrerloeschen($lehrerid)
{
    $abfrage = "DELETE FROM `klasse` WHERE `klasse`.`KlLehrer` = ?;";

    $statement = mysqli_prepare($GLOBALS["db"], $abfrage);

    mysqli_stmt_bind_param($statement, 'i', $lehrerid);

    mysqli_stmt_execute($statement);

    mysqli_stmt_close($statement);

    lehrerloeschen($lehrerid);
}

function lehrerloeschen($lehrerid)
{
    $abfrage = "DELETE FROM `lehrer` WHERE `lehrer`.`LNR` = ?;";

    $statement = mysqli_prepare($GLOBALS["db"], $abfrage);

    mysqli_stmt_bind_param($statement, 'i', $lehrerid);

    mysqli_stmt_execute($statement);

    mysqli_stmt_close($statement);
}

function LehrerNachNameanpassen($id, $newname)
{

    $abfrage = "UPDATE `lehrer` SET Lname=? WHERE LNR = ?";

    $statement = mysqli_prepare($GLOBALS["db"], $abfrage);

    mysqli_stmt_bind_param($statement, 'si', $newname, $id);

    mysqli_stmt_execute($statement);

    mysqli_stmt_close($statement);

}


$easteregg = false;
$time = 5 * 60 * 1000;
function x($value)
{
    switch ($value) {
        case"style":
            if ($GLOBALS["easteregg"]) {
                $stylesheets = ["flatly", "darkly", "paper", "cosmo", "superhero"];
                return '<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/' . $stylesheets[array_rand($stylesheets, 1)] . '/bootstrap.min.css" rel="stylesheet">';
            } else {
                return '<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/flatly/bootstrap.min.css" rel="stylesheet">';
            }
            break;
        case"script":
            if ($GLOBALS["easteregg"]) {
                return '<script type="text/javascript">setTimeout(function(){window.location.reload(1);}, $GLOBALS["time"]);</script>';
            } else {
                return '';
            }
            break;
        case"animation":
            if ($GLOBALS["easteregg"]) {
                return "animated jello";
            } else {
                return "";
            }
            break;
    }
}
