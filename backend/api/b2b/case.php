<?php

// -- Ügy alap adatai -- //

// CID
$data["CaseID"] = $dbpcase[0]["id"];

// CAS szám
$data["Dist"] = $dbpcase[0]["distributor"];

// Tracking ID
$data["TrackingID"] = $dbpcase[0]["trackid"];

// Hivatkozási szám
$data["ExternalID"] = $dbpcase[0]["etrackid"];

// CAS szám
$data["CAS"] = $dbpcase[0]["cas"];

// Ügy létrehozásának dátuma
$data["SubmitDate"] = $dbpcase[0]["submitdate"];

// Ügy típusa
$data["HandlingWay"] = $dbpcase[0]["handlingway"];

// Felvételi igény
$data["Courier"] = $dbpcase[0]["courier"];

// Leadás dátuma
$data["SendDate"] = $dbpcase[0]["senddate"];

// Megjegyzés
$data["Note"] = $dbpcase[0]["note"];

// Branch
$data["Branch"] = $dbpcase[0]["branch"];

// CreditingID
$data["CreditingID"] = $dbpcase[0]["creditingid"];

// -- Partner -- //

// Partner UID
$data["Partner"]["ID"] = $dbuser[0]["id"];

// Partner név
$data["Partner"]["Name"] = $dbuser[0]["lastname"];

// Partner üzlet
$data["Partner"]["Store"] = $dbpcase[0]["cname"];

// -- Kapcsolattartó -- //

// Kapcsolattartó neve
$data["Partner"]["Contact"]["Name"] = $dbpcase[0]["cname"];

// Kapcsolattartó email
$data["Partner"]["Contact"]["Email"] = $dbpcase[0]["cemail"];

// Kapcsolattartó telefon
$data["Partner"]["Contact"]["Phone"] = $dbpcase[0]["cphone"];

// Kapcsolattartó cím
$data["Partner"]["Contact"]["Address"] = $dbpcase[0]["caddress"];

// -- Készülék -- //

// Készülék típusa
$data["Device"]["Name"] = $dbpcase[0]["device"];

// Készülék SN
$data["Device"]["SerialNumber"] = $dbpcase[0]["sn"];

// Készülék vásárlás dátuma
$data["Device"]["PurchaseDate"] = $dbpcase[0]["purchasedate"];

// -- Probléma -- //

// Probléma dátuma
$data["Problem"]["Date"] = $dbpcase[0]["problemdate"];

// Probléma leírása
$data["Problem"]["Description"] = $dbpcase[0]["problemdesc"];
