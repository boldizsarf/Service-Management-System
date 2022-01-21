<?php

if (isset($dbinspection[0]["id"])) {
    $dbmsguser = $dbc->get("SELECT * FROM users WHERE id=?", [$dbinspection[0]["uid"]]);
    $msguser = $dbmsguser[0];
    $roles = simplexml_load_file('db/roles.db');
    foreach ($roles->role as $role) {
        if ($role["id"] == $msguser["role"]) {
            $roletexthu = $role->hu;
            $roletexten = $role->gb;
            $roleicon = $role->icon;
            $rolecolor = $role->color;
        }
    }

    $data["Inspection"]["Id"] = $dbinspection[0]["id"];

    if (empty($dbinspection[0]["warehouse"])) {
        $data["Inspection"]["Warehouse"] = "Nincs";
    } else {
        $data["Inspection"]["Warehouse"] = $dbinspection[0]["warehouse"];
    }

    $data["Inspection"]["Inspector"]["Uid"] = $dbmsguser[0]["id"];
    $data["Inspection"]["Inspector"]["Name"] = $dbmsguser[0]["lastname"] . " " . $dbmsguser[0]["firstname"];
    $data["Inspection"]["Inspector"]["Role"]["TextHU"] = strval($roletexthu);
    $data["Inspection"]["Inspector"]["Role"]["TextEN"] = strval($roletexten);
    $data["Inspection"]["Inspector"]["Role"]["Icon"] = strval($roleicon);
    $data["Inspection"]["Inspector"]["Role"]["Color"] = strval($rolecolor);

    $data["Inspection"]["Text"] = $dbinspection[0]["text"];
    $data["Inspection"]["Date"] = $dbinspection[0]["date"];

    switch ($dbpcase[0]["branch"]) {
        case "warranty":
            $data["Inspection"]["Branch"]["TextHU"] = "Garanciális ügyintézés";
            $data["Inspection"]["Branch"]["TextEN"] = "Warranty";
            $data["Inspection"]["Branch"]["Icon"] = "fas fa-check";
            $data["Inspection"]["Branch"]["Color"] = "text-success";
            break;
        case "nff":
            $data["Inspection"]["Branch"]["TextHU"] = "Hiba nem található";
            $data["Inspection"]["Branch"]["TextEN"] = "No fault found";
            $data["Inspection"]["Branch"]["Icon"] = "fas fa-times";
            $data["Inspection"]["Branch"]["Color"] = "text-warning";
            break;
        case "rejected":
            $data["Inspection"]["Branch"]["TextHU"] = "Garancia elutasítva";
            $data["Inspection"]["Branch"]["TextEN"] = "Warranty rejected";
            $data["Inspection"]["Branch"]["Icon"] = "fas fa-gavel";
            $data["Inspection"]["Branch"]["Color"] = "text-danger";
            break;
        case "doa":
            $data["Inspection"]["Branch"]["TextHU"] = "Jóváírásra kerül";
            $data["Inspection"]["Branch"]["TextEN"] = "DOA";
            $data["Inspection"]["Branch"]["Icon"] = "fas fa-history";
            $data["Inspection"]["Branch"]["Color"] = "text-success";
            break;
    }
}