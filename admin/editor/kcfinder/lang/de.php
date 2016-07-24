<?php

/** German localization file for KCFinder
  * author: Tim Wahrendorff <wahrendorff@users.sourceforge.net>
  */

$lang = array(

    '_locale' => "de_DE.UTF-8",  // UNIX localization code
    '_charset' => "utf-8",       // Browser charset

    // Date time formats. See http://www.php.net/manual/en/function.strftime.php
    '_dateTimeFull' => "%A, %e.%B.%Y %I:%M %p",
    '_dateTimeMid' => "%a %e %b %Y %I:%M %p",
    '_dateTimeSmall' => "%d/%m/%Y %I:%M %p",

	"You don't have permissions to upload files." =>
    "Du hast keine Berechtigung Dateien hoch zu laden.",

    "You don't have permissions to browse server." =>
    "Fehlende Berechtigung.",

    "Cannot move uploaded file to target folder." =>
    "Kann hochgeladene Datei nicht in den Zielordner verschieben.",

    "Unknown error." =>
    "Unbekannter Fehler.",

    "The uploaded file exceeds {size} bytes." =>
    "Die hochgeladene Datei 眉berschreitet die erlaubte Dateigr枚脽e von {size} bytes.",

    "The uploaded file was only partially uploaded." =>
    "Die Datei wurde nur teilweise hochgeladen.",

    "No file was uploaded." =>
    "Keine Datei hochgeladen.",

    "Missing a temporary folder." =>
    "Tempor盲rer Ordner fehlt.",

    "Failed to write file." =>
    "Fehler beim schreiben der Datei.",

    "Denied file extension." =>
    "Die Dateiendung ist nicht erlaubt.",

    "Unknown image format/encoding." =>
    "Unbekanntes Bildformat/encoding.",

    "The image is too big and/or cannot be resized." =>
    "Das Bild ist zu gro脽 und/oder kann nicht verkleinert werden.",

    "Cannot create {dir} folder." =>
    "Ordner {dir} kann nicht angelegt werden.",

    "Cannot write to upload folder." =>
    "Kann nicht in den upload Ordner schreiben.",

    "Cannot read .htaccess" =>
    "Kann .htaccess Datei nicht lesen",

    "Incorrect .htaccess file. Cannot rewrite it!" =>
    "Falsche .htaccess Datei. Die Datei kann nicht geschrieben werden",

    "Cannot read upload folder." =>
    "Upload Ordner kann nicht gelesen werden.",

    "Cannot access or create thumbnails folder." =>
    "Kann thumbnails Ordner nicht erstellen oder darauf zugreifen.",

    "Cannot access or write to upload folder." =>
    "Kann nicht auf den upload Ordner zugreifen oder darin schreiben.",

    "Please enter new folder name." =>
    "Bitte einen neuen Ordnernamen angeben.",

    "Unallowable characters in folder name." =>
    "Der Ordnername enth盲lt unerlaubte Zeichen.",

    "Folder name shouldn't begins with '.'" =>
    "Ordnernamen sollten nicht mit '.' beginnen.",

    "Please enter new file name." =>
    "Bitte gib einen neuen Dateinamen an.",

    "Unallowable characters in file name." =>
    "Der Dateiname enth盲lt unerlaubte Zeichen",

    "File name shouldn't begins with '.'" =>
    "Dateinamen sollten nicht mit '.' beginnen.",

    "Are you sure you want to delete this file?" =>
    "Willst Du die Datei wirklich l枚schen?",

    "Are you sure you want to delete this folder and all its content?" =>
    "Willst Du wirklich diesen Ordner und seinen gesamten Inhalt l枚schen?",

    "Inexistant or inaccessible folder." =>
    "Ordnertyp existiert nicht.",

    "Undefined MIME types." =>
    "Unbekannte MIME Typen.",

    "Fileinfo PECL extension is missing." =>
    "PECL extension f眉r Dateiinformationen fehlt",

    "Opening fileinfo database failed." =>
    "脰ffnen der Dateiinfo Datenbank fehlgeschlagen.",

    "You can't upload such files." =>
    "Du kannst solche Dateien nicht hochladen.",

    "The file '{file}' does not exist." =>
    "Die Datei '{file}' existiert nicht.",

    "Cannot read '{file}'." =>
    "Kann Datei '{file}' nicht lesen.",

    "Cannot copy '{file}'." =>
    "Kann Datei '{file}' nicht kopieren.",

    "Cannot move '{file}'." =>
    "Kann Datei '{file}' nicht verschieben.",

    "Cannot delete '{file}'." =>
    "Kann Datei '{file}' nicht l枚schen.",

    "Click to remove from the Clipboard" =>
    "Zum entfernen aus der Zwischenablage, hier klicken.",

    "This file is already added to the Clipboard." =>
    "Diese Datei wurde bereits der Zwischenablage hinzugef眉gt.",

    "Copy files here" =>
    "Kopiere Dateien hier hin.",

    "Move files here" =>
    "Verschiebe Dateien hier hin.",

    "Delete files" =>
    "L枚sche Dateien.",

    "Clear the Clipboard" =>
    "Zwischenablage leeren",

    "Are you sure you want to delete all files in the Clipboard?" =>
    "Willst Du wirklich alle Dateien in der Zwischenablage l枚schen?",

    "Copy {count} files" =>
    "Kopiere {count} Dateien",

    "Move {count} files" =>
    "Verschiebe {count} Dateien",

    "Add to Clipboard" =>
    "Der Zwischenablage hinzuf眉gen",

    "New folder name:" => "Neuer Ordnername:",
    "New file name:" => "Neuer Dateiname:",

    "Upload" => "Hochladen",
    "Refresh" => "Aktualisieren",
    "Settings" => "Einstellungen",
    "Maximize" => "Maximieren",
    "About" => "脺ber",
    "files" => "Dateien",
    "View:" => "Ansicht:",
    "Show:" => "Zeige:",
    "Order by:" => "Ordnen nach:",
    "Thumbnails" => "Miniaturansicht",
    "List" => "Liste",
    "Name" => "Name",
    "Size" => "Gr枚脽e",
    "Date" => "Datum",
    "Descending" => "Absteigend",
    "Uploading file..." => "Lade Datei hoch...",
    "Loading image..." => "Lade Bild...",
    "Loading folders..." => "Lade Ordner...",
    "Loading files..." => "Lade Dateien...",
    "New Subfolder..." => "Neuer Unterordner...",
    "Rename..." => "Umbenennen...",
    "Delete" => "L枚schen",
    "OK" => "OK",
    "Cancel" => "Abbruch",
    "Select" => "Ausw盲hlen",
    "Select Thumbnail" => "W盲hle Miniaturansicht",
    "View" => "Ansicht",
    "Download" => "Download",
    'Clipboard' => "Zwischenablage",

    // VERSION 2 NEW LABELS

    "Cannot rename the folder." =>
    "Der Ordner kann nicht umbenannt werden.",

    "Non-existing directory type." =>
    "Der Ordner Typ existiert nicht.",

    "Cannot delete the folder." =>
    "Der Ordner kann nicht gel枚scht werden.",

    "The files in the Clipboard are not readable." =>
    "Die Dateien in der Zwischenablage k枚nnen nicht gelesen werden.",

    "{count} files in the Clipboard are not readable. Do you want to copy the rest?" =>
    "{count} Dateien in der Zwischenablage sind nicht lesbar. M枚chtest Du die 脺brigen trotzdem kopieren?",

    "The files in the Clipboard are not movable." =>
    "Die Dateien in der Zwischenablage k枚nnen nicht verschoben werden.",

    "{count} files in the Clipboard are not movable. Do you want to move the rest?" =>
    "{count} Dateien in der Zwischenablage sind nicht verschiebbar. M枚chtest Du die 脺brigen trotzdem verschieben?",

    "The files in the Clipboard are not removable." =>
    "Die Dateien in der Zwischenablage k枚nnen nicht gel枚scht werden.",

    "{count} files in the Clipboard are not removable. Do you want to delete the rest?" =>
    "{count} Dateien in der Zwischenablage k枚nnen nicht gel枚scht werden. M枚chtest Du die 脺brigen trotzdem l枚schen?",

    "The selected files are not removable." =>
    "Die ausgew盲hlten Dateien k枚nnen nicht gel枚scht werden.",

    "{count} selected files are not removable. Do you want to delete the rest?" =>
    "{count} der ausgew盲hlten Dateien k枚nnen nicht gel枚scht werden. M枚chtest Du die 脺brigen trotzdem l枚schen?",

    "Are you sure you want to delete all selected files?" =>
    "M枚chtest Du wirklich alle ausgew盲hlten Dateien l枚schen?",

    "Failed to delete {count} files/folders." =>
    "Konnte {count} Dateien/Ordner nicht l枚schen.",

    "A file or folder with that name already exists." =>
    "Eine Datei oder ein Ordner mit dem Namen existiert bereits.",

    "selected files" => "ausgew盲hlte Dateien",
    "Type" => "Typ",
    "Select Thumbnails" => "W盲hle Miniaturansicht",
    "Download files" => "Dateien herunterladen",
);

?>
