<?php

error_reporting(-1);
ini_set('display_errors', 'On');

try 
{
	//These parameters are needed to be optimalise depending on the environment:
	ini_set('memory_limit','1024M');
	ini_set('max_execution_time', 600);
	
	date_default_timezone_set("Europe/Budapest");
	
	//The service URL:
	$url = 'https://api.test.mygls.hu/SERVICE_NAME.svc/';
	
	//Test ClientNumber:
	$clientNumber = 100002247; //!!!NOT FOR CUSTOMER TESTING, USE YOUR OWN, USE YOUR OWN!!!
	//Test username:
	$username = "boldizsar.fodor@silverwolf.pro"; //!!!NOT FOR CUSTOMER TESTING, USE YOUR OWN, USE YOUR OWN!!!
	//Test password:
	$pwd = "SilverWolf2003"; //!!!NOT FOR CUSTOMER TESTING, USE YOUR OWN, USE YOUR OWN!!!
	
	$isXmlFormat = false;

    $url .= "json/";

    $password = "[".implode(',',unpack('C*', hash('sha512', $pwd, true)))."]";

    $pickupDate = "\/Date(".(strtotime(date("Y-m-d H:i:s") . " + 1 days") * 1000).")\/";

    $cid = $_POST["cid"];
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $postcode = $_POST["postcode"];
    $city = $_POST["city"];
    $street = $_POST["street"];
    $housenumber = $_POST["housenumber"];
    $addressend = $_POST["addressend"];

    $action = $_POST["action"];

    if ($action == "client-to-mds") {
        $parcels = '[{
		  "ClientNumber": "'.$clientNumber.'",
		  "ClientReference": "C'.$cid.'",
		  "Content": "C'.$cid.'",
		  "Count": 1,
		  "DeliveryAddress": {
			"City": "Budapest",
			"ContactEmail": "szerviz@mydroneservice.hu",
			"ContactName": "MyDroneService",
			"ContactPhone": "+3614450109",
			"CountryIsoCode": "HU",
			"HouseNumber": "35",
			"Name": "MyDroneService",
			"Street": "Öv utca",
			"ZipCode": "1141",
			"HouseNumberInfo": ""
		  },
		  "PickupAddress": {
			"City": "'.$city.'",
			"ContactEmail": "'.$email.'",
			"ContactName": "'.$name.'",
			"ContactPhone": "'.$phone.'",
			"CountryIsoCode": "HU",
			"HouseNumber": "'.$housenumber.'",
			"Name": "'.$name.'",
			"Street": "'.$street.'",
			"ZipCode": "'.$postcode.'",
			"HouseNumberInfo": "'.$addressend.'"
		  },
		  "PickupDate": "'.$pickupDate.'",
		  "ServiceList":[{ 
				"Code":"PRS"
			}
		  ]
		}]';
    } else if ($action == "mds-to-client") {
        $parcels = '[{
		  "ClientNumber": "'.$clientNumber.'",
		  "ClientReference": "C'.$cid.'",
		  "Content": "C'.$cid.'",
		  "Count": 1,
		  "PickupAddress": {
			"City": "Budapest",
			"ContactEmail": "szerviz@mydroneservice.hu",
			"ContactName": "MyDroneService",
			"ContactPhone": "+3614450109",
			"CountryIsoCode": "HU",
			"HouseNumber": "35",
			"Name": "MyDroneService",
			"Street": "Öv utca",
			"ZipCode": "1141",
			"HouseNumberInfo": ""
		  },
		  "DeliveryAddress": {
			"City": "'.$city.'",
			"ContactEmail": "'.$email.'",
			"ContactName": "'.$name.'",
			"ContactPhone": "'.$phone.'",
			"CountryIsoCode": "HU",
			"HouseNumber": "'.$housenumber.'",
			"Name": "'.$name.'",
			"Street": "'.$street.'",
			"ZipCode": "'.$postcode.'",
			"HouseNumberInfo": "'.$addressend.'"
		  },
		  "PickupDate": "'.$pickupDate.'",
		  "ServiceList":[{ 
				"Code":"PRS"
			}
		  ]
		}]';
    }


	//Parcel service:
	$serviceName = "ParcelService";
	
	PrintLabels($username,$password,str_replace("SERVICE_NAME",$serviceName,$url),"PrintLabels",$parcels,$isXmlFormat);
	
	//GetPrintedLabels(str_replace("SERVICE_NAME",$serviceName,$url),"GetPrintedLabels",PrepareLabels($username,$password,str_replace("SERVICE_NAME",$serviceName,$url),"PrepareLabels",$parcels,$isXmlFormat),$isXmlFormat);
	
	//GetParcelList($username,$password,str_replace("SERVICE_NAME",$serviceName,$url),"GetParcelList",$isXmlFormat);
	
	//GetParcelStatuses($username,$password,str_replace("SERVICE_NAME",$serviceName,$url),"GetParcelStatuses",$isXmlFormat);
} 
catch (Exception $e) 
{
    echo $e->getMessage();
}

/*
* Label(s) generation by the service.
*/
function PrintLabels($username,$password,$url,$method,$parcels,$isXmlFormat)
{
    $cid = $_POST["cid"];
    $action = $_POST["action"];
	//Test request:
	$request = GetRequestString($username,$password,$parcels,$isXmlFormat,$method);

	$response = GetResponse($url,$method,$request,$isXmlFormat);

	if($isXmlFormat == false)
	{
		if($response == true && count(json_decode($response)->PrintLabelsErrorList) == 0 && count(json_decode($response)->Labels) > 0)
		{		
			//Label(s) saving:
			$pdf = implode(array_map('chr', json_decode($response)->Labels));

            if (is_dir("./../uploads/" . hash("sha256", $cid)) == false) {
                mkdir("./../uploads/" . hash("sha256", $cid));
            }

            if ($action == "client-to-mds") {
                file_put_contents('./../uploads/'. hash("sha256", $cid) . '/GLS_C'.$cid.'_BE.pdf', $pdf);
            } else if ($action == "mds-to-client") {
                file_put_contents('./../uploads/'. hash("sha256", $cid) . '/GLS_C'.$cid.'_KI.pdf', $pdf);
            }

            header('Location: ' . $_SERVER['HTTP_REFERER']);
            return;
		}
	}
	else
	{		
		if($response != "" && strpos($response,"ErrorCode") == false)
		{
			$labelsNodeName = "<Labels>";
			$labels = strpos($response, $labelsNodeName);
			if($labels != false)
			{
				$firstPosition = ($labels + strlen($labelsNodeName));
				$lastPosition = strpos($response,"</Labels>");
								
				//Label(s) saving:
				file_put_contents('php_rest_client_'.$method.'.pdf', base64_decode(substr($response, $firstPosition, ($lastPosition - $firstPosition))));
			}
		}
	}
}

/*
* Preparing label(s) by the service.
*/
function PrepareLabels($username,$password,$url,$method,$parcels,$isXmlFormat)
{
	//Test request:
	$request = GetRequestString($username,$password,$parcels,$isXmlFormat,$method);
	
	$response = GetResponse($url,$method,$request,$isXmlFormat);
		
	if($isXmlFormat == false)
	{
		$parcelIdList = [];
		if($response == true && count(json_decode($response)->PrepareLabelsError) == 0 && count(json_decode($response)->ParcelInfoList) > 0)
		{	
			$parcelIdList[] = json_decode($response)->ParcelInfoList{0}->ParcelId;
		}
		
		//Test request:
		$getPrintedLabelsRequest = '{"Username":"'.$username.'","Password":'.$password.',"ParcelIdList":'.json_encode($parcelIdList).',"PrintPosition":1,"ShowPrintDialog":0}';
	}
	else
	{
		$parcelIdList = "";
		if($response != "" && strpos($response,"ErrorCode") == false)
		{
			$parcelIdNodeName = "<ParcelId>";
			$parcelId = strpos($response, $parcelIdNodeName);
			if($parcelId != false)
			{
				$firstPosition = ($parcelId + strlen($parcelIdNodeName));
				$lastPosition = strpos($response,"</ParcelId>");
								
				$parcelIdList = "<a:int>".substr($response, $firstPosition, ($lastPosition - $firstPosition))."</a:int>";
			}
			
			$parcelIdList = '<ParcelIdList xmlns:a="http://schemas.microsoft.com/2003/10/Serialization/Arrays">'.$parcelIdList.'</ParcelIdList>';
			
			$getPrintedLabelsRequest = GetRequestString($username,$password,$parcelIdList,$isXmlFormat,"GetPrintedLabels");
		}
	}
	
	return $getPrintedLabelsRequest;
}

/*
* Get label(s) by the service.
*/
function GetPrintedLabels($url,$method,$getPrintedLabelsRequest,$isXmlFormat)
{	
	$response = GetResponse($url,$method,$getPrintedLabelsRequest,$isXmlFormat);	
	
	if($isXmlFormat == false)
	{
		if($response == true && count(json_decode($response)->GetPrintedLabelsErrorList) == 0 && count(json_decode($response)->Labels) > 0)
		{		
			//Label(s) saving:
			$pdf = implode(array_map('chr', json_decode($response)->Labels));
			
			file_put_contents('php_rest_client_'.$method.'.pdf', $pdf);
		}
	}
	else
	{		
		if($response != "" && strpos($response,"ErrorCode") == false)
		{
			$labelsNodeName = "<Labels>";
			$labels = strpos($response, $labelsNodeName);
			if($labels != false)
			{
				$firstPosition = ($labels + strlen($labelsNodeName));
				$lastPosition = strpos($response,"</Labels>");
								
				//Label(s) saving:
				file_put_contents('php_rest_client_'.$method.'.pdf', base64_decode(substr($response, $firstPosition, ($lastPosition - $firstPosition))));
			}
		}
	}
}

/*
* Get parcel(s) information by date ranges.
*/
function GetParcelList($username,$password,$url,$method,$isXmlFormat)
{
	//Test request:
	if($isXmlFormat == false)
	{
		$pickupDateFrom="\/Date(".(strtotime("2020-04-16 23:59:59") * 1000).")\/";
		$pickupDateTo="\/Date(".(strtotime("2020-04-16 23:59:59") * 1000).")\/";
		$request = '{"Username":"'.$username.'","Password":'.$password.',"PickupDateFrom":"'.$pickupDateFrom.'","PickupDateTo":"'.$pickupDateTo.'","PrintDateFrom":null,"PrintDateTo":null}';
	}
	else
	{
		$request = '<GetParcelListRequest
					xmlns="http://schemas.datacontract.org/2004/07/GLS.MyGLS.ServiceData.APIDTOs.ParcelOperations"
					xmlns:i="http://www.w3.org/2001/XMLSchema-instance">
						<ClientNumberList
						xmlns="http://schemas.datacontract.org/2004/07/GLS.MyGLS.ServiceData.APIDTOs.Common"
						xmlns:a="http://schemas.microsoft.com/2003/10/Serialization/Arrays"/>
						<Password
							xmlns="http://schemas.datacontract.org/2004/07/GLS.MyGLS.ServiceData.APIDTOs.Common">'.$password.'</Password>
						<Username
							xmlns="http://schemas.datacontract.org/2004/07/GLS.MyGLS.ServiceData.APIDTOs.Common">'.$username.'</Username>
						<PickupDateFrom>2020-04-16T00:00:00</PickupDateFrom>
						<PickupDateTo>2020-04-16T00:00:00</PickupDateTo>
						<PrintDateFrom i:nil="true"/>
						<PrintDateTo i:nil="true"/>
					</GetParcelListRequest>';
	}

	$response = GetResponse($url,$method,$request,$isXmlFormat);

	if($isXmlFormat == false)
	{
		var_dump(count(json_decode($response)->GetParcelListErrors));
		var_dump(count(json_decode($response)->PrintDataInfoList));
	}
	else
	{
		if($response != "")
		{
			die("GetParcelList: OK");
			
			//die($response);
			
			/*
			//https://www.php.net/manual/en/function.xml-parse-into-struct.php
			$p = xml_parser_create();
			xml_parse_into_struct($p, $response, $vals, $index);
			xml_parser_free($p);
			
			foreach ($vals as $val) 
			{
				var_dump($val);
			}
			*/
		}
	}
}

/*
* Get parcel statuses.
*/
function GetParcelStatuses($username,$password,$url,$method,$isXmlFormat)
{
	//Test request:
	$parcelNumber = 0;
	if($isXmlFormat == false)
	{
		$request = '{"Username":"'.$username.'","Password":'.$password.',"ParcelNumber":'.$parcelNumber.',"ReturnPOD":true,"LanguageIsoCode":"HU"}';
	}
	else
	{
		$request = '<GetParcelStatusesRequest
					xmlns="http://schemas.datacontract.org/2004/07/GLS.MyGLS.ServiceData.APIDTOs.ParcelOperations"
					xmlns:i="http://www.w3.org/2001/XMLSchema-instance">
						<ClientNumberList
						xmlns="http://schemas.datacontract.org/2004/07/GLS.MyGLS.ServiceData.APIDTOs.Common"
						xmlns:a="http://schemas.microsoft.com/2003/10/Serialization/Arrays"/>
						<Password
							xmlns="http://schemas.datacontract.org/2004/07/GLS.MyGLS.ServiceData.APIDTOs.Common">'.$password.'</Password>
						<Username
							xmlns="http://schemas.datacontract.org/2004/07/GLS.MyGLS.ServiceData.APIDTOs.Common">'.$username.'</Username>
						<LanguageIsoCode>HU</LanguageIsoCode>
						<ParcelNumber>'.$parcelNumber.'</ParcelNumber>
						<ReturnPOD>true</ReturnPOD>
					</GetParcelStatusesRequest>';
	}
		
	$response = GetResponse($url,$method,$request,$isXmlFormat);
	
	if($isXmlFormat == false)
	{	
		if($response == true)
		{
			var_dump(count(json_decode($response)->GetParcelStatusErrors));
			if(count(json_decode($response)->GetParcelStatusErrors) == 0 && count(json_decode($response)->POD) > 0)
			{				
				//POD saving:
				$pdf = implode(array_map('chr', json_decode($response)->POD));
				
				file_put_contents('php_rest_client_'.$method.'.pdf', $pdf);
			}
		}
	}
	else
	{
		if($response != "" && strpos($response,"ErrorCode") == false)
		{
			$podNodeName = "<POD>";
			$pod = strpos($response, $podNodeName);
			if($pod != false)
			{
				$firstPosition = ($pod + strlen($podNodeName));
				$lastPosition = strpos($response,"</POD>");
								
				//POD saving:
				file_put_contents('php_rest_client_'.$method.'.pdf', base64_decode(substr($response, $firstPosition, ($lastPosition - $firstPosition))));
			}
		}
	}
}

//Utility functions:

function GetRequestString($username,$password,$dataList,$isXmlFormat,$requestObjectName)
{
	$result = "";
	
	if($isXmlFormat == false)
	{		
		switch ($requestObjectName) {
			case "PrintLabels":
				$result = '{"Username":"'.$username.'","Password":'.$password.',"ParcelList":'.$dataList.',"PrintPosition":1,"ShowPrintDialog":0}';
				break;
			case "PrepareLabels":
				$result = '{"Username":"'.$username.'","Password":'.$password.',"ParcelList":'.$dataList.'}';
				break;
			case "GetPrintedLabels":
				$result = '{"Username":"'.$username.'","Password":'.$password.',"ParcelIdList":'.json_encode($dataList).',"PrintPosition":1,"ShowPrintDialog":0}';;
				break;
} 
	}
	else
	{		
		$additionalParameters = "";
		if(in_array($requestObjectName, array("PrintLabels", "GetPrintedLabels")) == true)
		{
			$additionalParameters = "<PrintPosition>1</PrintPosition><ShowPrintDialog>false</ShowPrintDialog>";
		}

		$result =  '<'.$requestObjectName.'Request
		xmlns="http://schemas.datacontract.org/2004/07/GLS.MyGLS.ServiceData.APIDTOs.LabelOperations"
		xmlns:i="http://www.w3.org/2001/XMLSchema-instance">
			<ClientNumberList
			xmlns="http://schemas.datacontract.org/2004/07/GLS.MyGLS.ServiceData.APIDTOs.Common"
			xmlns:a="http://schemas.microsoft.com/2003/10/Serialization/Arrays"/>
			<Password
				xmlns="http://schemas.datacontract.org/2004/07/GLS.MyGLS.ServiceData.APIDTOs.Common">'.$password.'</Password>
			<Username
				xmlns="http://schemas.datacontract.org/2004/07/GLS.MyGLS.ServiceData.APIDTOs.Common">'.$username.'</Username>
			'.$dataList.$additionalParameters.'
		</'.$requestObjectName.'Request>';
		
		$toBeReplaced = array("\r", "\n");
		$result = str_replace($toBeReplaced, "", $result);
	}
	
	return $result;
}

function GetResponse($url,$method,$request,$isXmlFormat)
{	
	//Service calling:
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_URL, $url.$method);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_TIMEOUT, 600);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $request);
	if($isXmlFormat == false)
	{
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(                                                                          
			'Content-Type: application/json',                                                                            
			'Content-Length: ' . strlen($request))                                                                       
		);
	}
	else
	{
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(                                                                          
			'Content-Type: text/xml',                                                                            
			'Content-Length: ' . strlen($request))                                                                       
		);
	}
	   
	$response = curl_exec($curl);	
	
	if(curl_getinfo($curl)["http_code"] == "401")
	{
		die("Unauthorized");
	}
	
	if ($response === false) 
	{
		die('curl_error:"' . curl_error($curl) . '";curl_errno:' . curl_errno($curl));
	}
	curl_close($curl);
	
	return $response;
}