<?php

if (empty($param[2])) {
    header("Location: /quicktrack/form/");
    return;
}

if (substr($param[2], 0, 2) == "CB") {
    require 'pages/quicktrack/tidadmin.php';
    return;
}

switch ($param[2]) {
    default:
        require 'pages/quicktrack/form.php';
        break;
    case 'duplitec':
        require 'newpcasemodules/newpduplicase.php';
        break;
}