<?php

	$token = 'f-0EIw2kQYem_ktikAnY5G:APA91bHvhMzLwvsyzglP3PEe51gwOXKvbQSEpr4FA0yTQT_b7GnkTWRNgVWDYJXOeH_lUbCnm4SiOtolMsXdJDa3FS8D70z82pieEKvh7tyvlJ754LnfxoWKJ4eb80JEItCP5ltcVamj';
	$title = "কি খবর তোমাদের?>>>>>>>>>>>>>>>>>>>>";
    $body = "ভালো আছি ভালো থেকো, আকাশের ঠিকানায় চিঠি লিখো........" ;		
	
    //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	//$url = "https://fcm.googleapis.com/fcm/send";
    //$serverKey = 'your_server_key';









    //new yeamin
    $url = "https://fcm.googleapis.com/v1/projects/fast-firebase-class/messages:send";
    
    // Include the get-access-token.php
    require 'get-access-token.php';

    // Path to your service account key file
    $serviceAccountKeyFile = 'service-account-file.json';

    // Obtain the OAuth 2.0 Bearer Token
    $accessToken = getAccessToken($serviceAccountKeyFile);
    
     //new yeamin








	//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	

    $datamsg = array(
       'title'   => $title,
       'body'  => $body
    );

    $arrayToSend = array('token' => $token,'data'=> $datamsg);

   // $json = json_encode($arrayToSend);
    $json = json_encode(['message' => $arrayToSend]);

    $headers = array();
    $headers[] = 'Content-Type: application/json';

    // $headers[] = 'Authorization: key='. $serverKey;
    $headers[] = 'Authorization: Bearer ' . $accessToken;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
    //Send the request
    $response = curl_exec($ch);
    //Close request
    if ($response === FALSE) {
    die('FCM Send Error: ' . curl_error($ch));
    }
    curl_close($ch);
	
	
	
?>