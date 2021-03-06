<?php
/**
 * Created by IntelliJ IDEA.
 * User: thorb
 * Date: 20.04.2017
 * Time: 15:51
 */


// returns boolean
function check_date_format($date, $format = "dmY", $sep = ".")
{
    // Positionen werden bestimmt in dem das Format druchsucht wird
    $pos1 = strpos($format, 'd');
    $pos2 = strpos($format, 'm');
    $pos3 = strpos($format, 'Y');

    // Anhand der Trennung, wird der Datumsstring in 3 Teile geteilt
    $check = explode($sep, $date);

    // Übergabe im Format: mdY
    if (checkdate($check[$pos2], $check[$pos1], $check[$pos3]))
    {
        return true;
        echo "Es ist alles korrekt mit dem Datum";
    }
    else
    {
        return false;
        echo "Es ist alles korrekt mit dem Datum";
    }

}

// returns Boolean
// ist das Datum gültig, also höchstens gleich dem heutigen Tag?
function check_date_time($date, $format = "dmY", $sep = ".")
{
    // Positionen werden bestimmt in dem das Format druchsucht wird
    $pos1 = strpos($format, 'd');
    $pos2 = strpos($format, 'm');
    $pos3 = strpos($format, 'Y');

    // Anhand der Trennung, wird der Datumsstring in 3 Teile geteilt
    $check = explode($sep, $date);

    /*echo "<prev>\n";
    print_r($check);
    echo "</prev>\n";*/

    $jahr = (int) $check[$pos3];
    $monat = (int) $check[$pos2];
    $tag = (int) $check[$pos1];

    /*echo "Die Positionen: $pos1 $pos2 $pos3<br>\n";
    echo "Das Datum lautet: $tag $monat $jahr<br>\n";*/

    // Achtung: europäische Weltzeit
    date_default_timezone_set("Europe/Berlin");
    $aktuellesJahr = (int) date("Y");
    $aktuellerMonat = (int) date("m");
    $aktuellerTag = (int) date("d");

    /*echo "Das Systemdatum: $aktuellerTag $aktuellerMonat $aktuellesJahr<br>\n";
    echo "Das ausgelesene aktuelle Datum: $tag $monat $jahr<br>";*/

    if ($jahr > 1900 && $jahr <= $aktuellesJahr)
    {
        // echo "Jahr Bedingung erfüllt<br>";
        if ($monat <= $aktuellerMonat OR ($monat > $aktuellerMonat AND $jahr < $aktuellesJahr))
        {
            // echo "Monatsbedingung erfüllt<br>";
            if ($tag <= $aktuellerTag OR ($tag > $aktuellerTag AND ($monat < $aktuellerMonat OR $jahr < $aktuellesJahr)))
            {
                // echo "Tagesbedingung erfüllt<br>";
                // Falls das Datum valide ist
                return true;
            }
        }
    }
    else
    {
        // echo "Das Datum ist falsch validiert in der Funktion check_date_time<br>";
        // Falls das Datum größer ist als das heutige Datum
        return false;
    }
}

function check_dates_difference($erstesDate, $zweitesDate, $format = "dmY", $sep = ".")
{
    // Positionen werden bestimmt in dem das Format druchsucht wird
    $pos1 = strpos($format, 'd');
    $pos2 = strpos($format, 'm');
    $pos3 = strpos($format, 'Y');

    // Anhand der Trennung, wird der Datumsstring in 3 Teile geteilt
    $check1 = explode($sep, $erstesDate);
    $check2 = explode($sep, $zweitesDate);

    /*echo "<prev>\n";
    print_r($check);
    echo "</prev>\n";*/

    $jahr1 =   (int) $check1[$pos3];
    $monat1 =  (int) $check1[$pos2];
    $tag1 =    (int) $check1[$pos1];

    /*echo "Die Positionen: $pos1 $pos2 $pos3<br>\n";
    echo "Das Datum lautet: $tag1 $monat1 $jahr1<br>\n";*/

    // Achtung: europäische Weltzeit
    $jahr2 =    (int) $check2[$pos3];
    $monat2 =   (int) $check2[$pos2];
    $tag2 =     (int) $check2[$pos1];

    /*echo "Das Systemdatum: $tag2 $monat2 $jahr2<br>\n";
    echo "Das ausgelesene aktuelle Datum: $tag1 $monat1 $jahr1<br>";*/

    if ($jahr1 > 1900 && $jahr1 <= $jahr2)
    {
        // echo "Jahr Bedingung erfüllt<br>";
        if ($monat1 <= $monat2 OR ($monat1 > $monat2 AND $jahr1 < $jahr2))
        {
            // echo "Monatsbedingung erfüllt<br>";
            if ($tag1 <= $tag2 OR ($tag1 > $tag2 AND ($monat1 < $monat2 OR $jahr1 < $jahr2)))
            {
                // echo "Tagesbedingung erfüllt<br>";
                // Falls das Datum valide ist
                return true;
            }
        }
    }
    else
    {
        // echo "Das Datum ist falsch validiert in der Funktion check_date_time<br>";
        // Falls das Datum größer ist als das heutige Datum
        return false;
    }
}