<?php

error_reporting(-1);
ini_set('display_errors', 'On');

ini_set('session.gc_probability', '0');
ini_set('session.gc_maxlifetime', '31536000');
ini_set('file_uploads', 'On');

session_start();
if ($_SESSION["SYSTEM"] != "allowed") {
    echo "Hiba! Nincs jogod ehhez a fájlhoz!";
    return;
}
require 'dbc.php';

$dbsuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
$suser = $dbsuser[0];

$role = $dbsuser[0]["role"];

if ($role == 0) {
    echo "No permission";
    return;
}

$trackingid = $_POST["trackingid"];

$url = $serverurl . '/api/';
$data = array('username' => $apiuser, 'token' => $apitoken, 'query' => $trackingid);

$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
$case = json_decode($result, true);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" style="width:100%;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="telephone=no" name="format-detection">
    <title><?php echo $case["TrackingID"]; ?></title>
    <!--[if (mso 16)]>
    <style type="text/css">
        a {text-decoration: none;}
    </style>
    <![endif]-->
    <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]-->
    <!--[if gte mso 9]>
    <xml>
        <o:OfficeDocumentSettings>
            <o:AllowPNG></o:AllowPNG>
            <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
    </xml>
    <![endif]-->
    <!--[if !mso]><!-- -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i" rel="stylesheet">
    <!--<![endif]-->
    <style type="text/css">
        #outlook a {
            padding:0;
        }
        .ExternalClass {
            width:100%;
        }
        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
            line-height:100%;
        }
        .es-button {
            mso-style-priority:100!important;
            text-decoration:none!important;
        }
        a[x-apple-data-detectors] {
            color:inherit!important;
            text-decoration:none!important;
            font-size:inherit!important;
            font-family:inherit!important;
            font-weight:inherit!important;
            line-height:inherit!important;
        }
        .es-desk-hidden {
            display:none;
            float:left;
            overflow:hidden;
            width:0;
            max-height:0;
            line-height:0;
            mso-hide:all;
        }
        @media only screen and (max-width:600px) {p, ul li, ol li, a { font-size:16px!important; line-height:150%!important } h1 { font-size:30px!important; text-align:center; line-height:120% } h2 { font-size:26px!important; text-align:center; line-height:120% } h3 { font-size:20px!important; text-align:center; line-height:120% } h1 a { font-size:30px!important } h2 a { font-size:26px!important } h3 a { font-size:20px!important } .es-menu td a { font-size:16px!important } .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a { font-size:16px!important } .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a { font-size:16px!important } .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a { font-size:12px!important } *[class="gmail-fix"] { display:none!important } .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 { text-align:center!important } .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 { text-align:right!important } .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 { text-align:left!important } .es-m-txt-r img, .es-m-txt-c img, .es-m-txt-l img { display:inline!important } .es-button-border { display:block!important } .es-btn-fw { border-width:10px 0px!important; text-align:center!important } .es-adaptive table, .es-btn-fw, .es-btn-fw-brdr, .es-left, .es-right { width:100%!important } .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%!important; max-width:600px!important } .es-adapt-td { display:block!important; width:100%!important } .adapt-img { width:100%!important; height:auto!important } .es-m-p0 { padding:0px!important } .es-m-p0r { padding-right:0px!important } .es-m-p0l { padding-left:0px!important } .es-m-p0t { padding-top:0px!important } .es-m-p0b { padding-bottom:0!important } .es-m-p20b { padding-bottom:20px!important } .es-mobile-hidden, .es-hidden { display:none!important } tr.es-desk-hidden, td.es-desk-hidden, table.es-desk-hidden { width:auto!important; overflow:visible!important; float:none!important; max-height:inherit!important; line-height:inherit!important } tr.es-desk-hidden { display:table-row!important } table.es-desk-hidden { display:table!important } td.es-desk-menu-hidden { display:table-cell!important } .es-menu td { width:1%!important } table.es-table-not-adapt, .esd-block-html table { width:auto!important } table.es-social { display:inline-block!important } table.es-social td { display:inline-block!important } a.es-button, button.es-button { font-size:20px!important; display:block!important; border-width:10px 0px 10px 0px!important } }
    </style>
    <script type="text/javascript">
        window.onload = function printPage() {
            window.print();
        }
    </script>
</head>
<body style="width:100%;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0">
<div class="es-wrapper-color" style="background-color:#FFFFFF">
    <!--[if gte mso 9]>
    <v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
        <v:fill type="tile" color="#f6f6f6"></v:fill>
    </v:background>
    <![endif]-->
    <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top">
        <tr style="border-collapse:collapse">
            <td valign="top" style="padding:0;Margin:0">
                <table class="es-header" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top">
                    <tr style="border-collapse:collapse">
                        <td align="center" style="padding:0;Margin:0">
                            <table class="es-header-body" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:720px">
                                <tr style="border-collapse:collapse">
                                    <td align="left" style="Margin:0;padding-bottom:15px;padding-top:20px;padding-left:20px;padding-right:20px">
                                        <!--[if mso]><table style="width:680px" cellpadding="0"
                                                            cellspacing="0"><tr><td style="width:240px" valign="top"><![endif]-->
                                        <table class="es-left" cellspacing="0" cellpadding="0" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                                            <tr style="border-collapse:collapse">
                                                <td class="es-m-p0r es-m-p20b" valign="top" align="center" style="padding:0;Margin:0;width:240px">
                                                    <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                        <tr style="border-collapse:collapse">
                                                            <td align="center" style="padding:0;Margin:0;font-size:0px"><img class="adapt-img" src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=<?php echo urlencode($serverurl . '/quicktrack/' . $case["TrackingID"]); ?>" alt style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic" width="120"></td>
                                                        </tr>
                                                    </table></td>
                                            </tr>
                                        </table>
                                        <!--[if mso]></td><td style="width:20px"></td><td style="width:420px" valign="top"><![endif]-->
                                        <table cellspacing="0" cellpadding="0" align="right" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                            <tr style="border-collapse:collapse">
                                                <td align="left" style="padding:0;Margin:0;width:420px">
                                                    <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                        <tr style="border-collapse:collapse">
                                                            <?php
                                                            $dist_img_src = "/assets/logo/mydroneservice-color.png";
                                                            $dist_img_size = "width='170'";
                                                            $dist_paddingtop = "30";
                                                            ?>
                                                            <td align="center" style="padding-top:<?php echo $dist_paddingtop; ?>px;Margin:0;font-size:0px"><img class="adapt-img" src="<?php echo $dist_img_src; ?>" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic" <?php echo $dist_img_size; ?>></td>
                                                        </tr>
                                                        <tr style="border-collapse:collapse">
                                                            <td align="center" style="padding:0;Margin:0"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:21px;color:#333333">BEVIZSGÁLÁSI JEGYZŐKÖNYV</p></td>
                                                        </tr>
                                                    </table></td>
                                            </tr>
                                        </table>
                                        <!--[if mso]></td></tr></table><![endif]--></td>
                                </tr>
                            </table></td>
                    </tr>
                </table>
                <table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                    <tr style="border-collapse:collapse">
                        <td align="center" style="padding:0;Margin:0">
                            <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:720px">
                                <tr style="border-collapse:collapse">
                                    <td style="padding:20px;Margin:0;border-radius:0px 0px 10px 10px;background-size:initial;background-attachment:initial;background-origin:initial;background-clip:initial;background-color:#1890FF" align="left" bgcolor="#1890ff">
                                        <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                            <tr style="border-collapse:collapse">
                                                <td align="center" valign="top" style="padding:0;Margin:0;width:680px">
                                                    <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                        <tr style="border-collapse:collapse">
                                                            <td align="center" bgcolor="#ffffff" style="padding:0;Margin:0;padding-top:10px;padding-bottom:10px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:20px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:30px;color:#333333"><strong><?php echo $case["TrackingID"]; ?></strong></p></td>
                                                        </tr>
                                                    </table></td>
                                            </tr>
                                        </table></td>
                                </tr>
                                <tr style="border-collapse:collapse">
                                    <td align="left" style="Margin:0;padding-top:10px;padding-bottom:10px;padding-left:20px;padding-right:20px">
                                        <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                            <tr style="border-collapse:collapse">
                                                <td align="center" valign="top" style="padding:0;Margin:0;width:680px">
                                                    <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                        <tr style="border-collapse:collapse">
                                                            <td align="center" style="padding:0;Margin:0"><h5 style="Margin:0;line-height:120%;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">LEADOTT TERMÉK</h5></td>
                                                        </tr>
                                                    </table></td>
                                            </tr>
                                        </table></td>
                                </tr>
                            </table></td>
                    </tr>
                </table>
                <table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                    <tr style="border-collapse:collapse">
                        <td align="center" style="padding:0;Margin:0">
                            <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:720px">
                                <tr style="border-collapse:collapse">
                                    <td align="left" style="padding:0;Margin:0;padding-left:20px;padding-right:20px;background-position:center center">
                                        <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                            <tr style="border-collapse:collapse">
                                                <td align="center" valign="top" style="padding:0;Margin:0;width:680px">
                                                    <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                        <tr style="border-collapse:collapse">
                                                            <td align="center" style="padding:0;Margin:0;padding-top:5px;padding-bottom:5px">
                                                                <table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                    <tr style="border-collapse:collapse">
                                                                        <td style="padding:0;Margin:0;border-bottom:1px solid #CCCCCC;background:none;height:1px;width:100%;margin:0px"></td>
                                                                    </tr>
                                                                </table></td>
                                                        </tr>
                                                    </table></td>
                                            </tr>
                                        </table></td>
                                </tr>
                                <tr style="border-collapse:collapse">
                                    <td class="esdev-adapt-off" align="left" style="Margin:0;padding-bottom:10px;padding-top:20px;padding-left:20px;padding-right:20px">
                                        <table cellpadding="0" cellspacing="0" class="esdev-mso-table" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:680px">
                                            <tr style="border-collapse:collapse">
                                                <td class="esdev-mso-td" valign="top" style="padding:0;Margin:0">
                                                    <table cellpadding="0" cellspacing="0" class="es-left" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                                                        <tr style="border-collapse:collapse">
                                                            <td align="left" style="padding:0;Margin:0;width:330px">
                                                                <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                    <tr style="border-collapse:collapse">
                                                                        <td align="left" style="padding:0;Margin:0"><h4 style="Margin:0;line-height:120%;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif"><a target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;font-size:14px;text-decoration:none;color:#333333" class="p_name" href="https://viewstripo.email">
                                                                                    <?php
                                                                                    echo $case["Device"]["Name"];
                                                                                    $products = simplexml_load_file('./../db/Products.xml');
                                                                                    foreach ($products->Product as $product) {
                                                                                        if ($case["Dist"] == "duplitec") {
                                                                                            if ($product->forg == "DP") {
                                                                                                if ($product->name == $case["Device"]["Name"]) {
                                                                                                    echo " (SKU " . $product->sku . ")";
                                                                                                }
                                                                                            }
                                                                                        } else if ($case["Dist"] == "magnew") {
                                                                                            if ($product->forg == "MG") {
                                                                                                if ($product->name == $case["Device"]["Name"]) {
                                                                                                    echo " (SKU " . $product->sku . ")";
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                    ?>
                                                                                </a></h4><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:21px;color:#999999"><span class="p_option"><?php echo $case["Device"]["SerialNumber"]; ?></span></p></td>
                                                                    </tr>
                                                                </table></td>
                                                            <td style="padding:0;Margin:0;width:20px"></td>
                                                        </tr>
                                                    </table></td>
                                                <td class="esdev-mso-td" valign="top" style="padding:0;Margin:0">
                                                    <table cellpadding="0" cellspacing="0" class="es-right" align="right" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
                                                        <tr style="border-collapse:collapse">
                                                            <td align="left" style="padding:0;Margin:0;width:330px">
                                                                <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                    <tr style="border-collapse:collapse">
                                                                        <td align="left" style="padding:0;Margin:0">
                                                                            <table style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%" class="cke_show_border" cellspacing="1" cellpadding="1" border="0" role="presentation">
                                                                                <tr style="border-collapse:collapse">
                                                                                    <td style="padding:0;Margin:0;text-align:center;font-size:13px;line-height:13px" width="15%" align="center"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:21px;color:#333333"><strong class="p_quantity"></strong></p></td>
                                                                                    <td style="padding:0;Margin:0;text-align:center;font-size:13px;line-height:13px" width="30%"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:21px;color:#333333"><strong class="p_price"></strong></p></td>
                                                                                </tr>
                                                                            </table></td>
                                                                    </tr>
                                                                </table></td>
                                                        </tr>
                                                    </table></td>
                                            </tr>
                                        </table></td>
                                </tr>
                                <tr style="border-collapse:collapse">
                                    <td align="left" style="padding:0;Margin:0;padding-left:20px;padding-right:20px;background-position:center center">
                                        <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                            <tr style="border-collapse:collapse">
                                                <td align="center" valign="top" style="padding:0;Margin:0;width:680px">
                                                    <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                        <tr style="border-collapse:collapse">
                                                            <td align="center" style="padding:0;Margin:0;padding-top:5px;padding-bottom:15px;font-size:0px">
                                                                <table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                    <tr style="border-collapse:collapse">
                                                                        <td style="padding:0;Margin:0;border-bottom:1px solid #CCCCCC;background:none;height:1px;width:100%;margin:0px"></td>
                                                                    </tr>
                                                                </table></td>
                                                        </tr>
                                                    </table></td>
                                            </tr>
                                        </table></td>
                                </tr>
                            </table></td>
                    </tr>
                </table>
                <table class="es-footer" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top">
                    <tr style="border-collapse:collapse">
                        <td align="center" style="padding:0;Margin:0">
                            <table class="es-footer-body" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:720px">
                                <tr style="border-collapse:collapse">
                                    <td align="left" style="padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px">
                                        <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                            <tr style="border-collapse:collapse">
                                                <td align="center" valign="top" style="padding:0;Margin:0;width:680px">
                                                    <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                        <tr style="border-collapse:collapse">
                                                            <td align="center" style="padding:0;Margin:0"><h5 style="Margin:0;line-height:120%;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">AZ ÜGY RÉSZLETEI</h5></td>
                                                        </tr>
                                                    </table></td>
                                            </tr>
                                        </table></td>
                                </tr>
                                <tr style="border-collapse:collapse">
                                    <td align="left" style="padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px">
                                        <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                            <tr style="border-collapse:collapse">
                                                <td align="center" valign="top" style="padding:0;Margin:0;width:680px">
                                                    <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                        <tr style="border-collapse:collapse">
                                                            <td align="left" style="padding:0;Margin:0"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:21px;color:#999999">Partner</p></td>
                                                        </tr>
                                                        <tr style="border-collapse:collapse">
                                                            <td align="left" style="padding:0;Margin:0"><h5 style="Margin:0;line-height:120%;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif"><?php echo $case["Partner"]["Store"]; ?></h5></td>
                                                        </tr>

                                                        <tr style="border-collapse:collapse">
                                                            <td align="left" style="padding:0;Margin:0;padding-top:5px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:21px;color:#999999">Hivatkozási szám</p></td>
                                                        </tr>
                                                        <tr style="border-collapse:collapse">
                                                            <td align="left" style="padding:0;Margin:0"><h5 style="Margin:0;line-height:120%;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif"><?php echo $case["ExternalID"]; ?></h5></td>
                                                        </tr>
                                                    </table></td>
                                            </tr>
                                        </table></td>
                                </tr>
                            </table></td>
                    </tr>
                </table>
                <table class="es-footer" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top">
                    <tr style="border-collapse:collapse">
                        <td align="center" style="padding:0;Margin:0">
                            <table class="es-footer-body" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:720px">
                                <tr style="border-collapse:collapse">
                                    <td align="left" style="padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px">
                                        <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                            <tr style="border-collapse:collapse">
                                                <td align="center" valign="top" style="padding:0;Margin:0;width:680px">
                                                    <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                        <tr style="border-collapse:collapse">
                                                            <td align="center" style="padding:0;Margin:0"><h5 style="Margin:0;line-height:120%;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">A BEVIZSGÁLÁS EREDMÉNYE</h5></td>
                                                        </tr>
                                                    </table></td>
                                            </tr>
                                        </table></td>
                                </tr>
                                <tr style="border-collapse:collapse">
                                    <td align="left" style="padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px">
                                        <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                            <tr style="border-collapse:collapse">
                                                <td align="center" valign="top" style="padding:0;Margin:0;width:680px">
                                                    <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                        <tr style="border-collapse:collapse">
                                                            <td align="left" style="padding:0;Margin:0"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:21px;color:#999999">A hiba leírása</p></td>
                                                        </tr>
                                                        <tr style="border-collapse:collapse">
                                                            <td align="left" style="padding:0;Margin:0"><h5 style="Margin:0;line-height:120%;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif"><?php echo $case["Problem"]["Description"]; ?></h5></td>
                                                        </tr>

                                                        <tr style="border-collapse:collapse">
                                                            <td align="left" style="padding:0;Margin:0;padding-top:5px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:21px;color:#999999">Az ügy megállapított típusa</p></td>
                                                        </tr>
                                                        <tr style="border-collapse:collapse">
                                                            <td align="left" style="padding:0;Margin:0"><h5 style="Margin:0;line-height:120%;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif"><?php echo $case["Inspection"]["Branch"]["TextHU"]; ?></h5></td>
                                                        </tr>
                                                        <tr style="border-collapse:collapse">
                                                            <td align="left" style="padding:0;Margin:0;padding-top:5px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:21px;color:#999999">Raktár</p></td>
                                                        </tr>
                                                        <tr style="border-collapse:collapse">
                                                            <td align="left" style="padding:0;Margin:0"><h5 style="Margin:0;line-height:120%;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif"><?php echo $case["Inspection"]["Warehouse"]; ?></h5></td>
                                                        </tr>
                                                        <tr style="border-collapse:collapse">
                                                            <td align="left" style="padding:0;Margin:0;padding-top:5px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:21px;color:#999999">Jegyzőkönyv</p></td>
                                                        </tr>
                                                        <tr style="border-collapse:collapse">
                                                            <td align="left" style="padding:0;Margin:0"><h5 style="Margin:0;line-height:120%;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif"><?php echo $case["Inspection"]["Text"]; ?></h5></td>
                                                        </tr>
                                                        <tr style="border-collapse:collapse" <?php if ($case["Partner"]["Name"] != "MediaMarkt" || $case["Branch"] == "rejected" || $case["Branch"] == "nff") { echo "hidden"; } ?>>
                                                            <td align="left" style="padding:0;Margin:0"><h5 style="Margin:0;line-height:120%;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif">Kérjük a jegyzőkönyv alapján állítsák ki felénk a könyvelési értesítőt.</h5></td>
                                                        </tr>
                                                    </table></td>
                                            </tr>
                                        </table></td>
                                </tr>
                            </table></td>
                    </tr>
                </table>
                <table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                    <tr style="border-collapse:collapse">
                        <td align="center" style="padding:0;Margin:0">
                            <table class="es-content-body" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:720px">
                                <tr style="border-collapse:collapse">
                                    <td align="left" style="padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px">
                                        <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                            <tr style="border-collapse:collapse">
                                                <td align="center" valign="top" style="padding:0;Margin:0;width:680px">
                                                    <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                        <tr style="border-collapse:collapse">
                                                            <td align="left" style="padding:0;Margin:0"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:21px;color:#999999"><?php echo $case["Inspection"]["Inspector"]["Name"]; ?> - <?php echo $case["Inspection"]["Inspector"]["Role"]["TextHU"]; ?></p></td>
                                                        </tr>
                                                        <tr style="border-collapse:collapse">
                                                            <td align="left" style="padding:0;Margin:0"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:21px;color:#999999">Budapest, <?php echo $case["Inspection"]["Date"]; ?></p></td>
                                                        </tr>
                                                    </table></td>
                                            </tr>
                                        </table></td>
                                </tr>
                            </table></td>
                    </tr>
                </table></td>
        </tr>
    </table>
</div>
</body>
</html>