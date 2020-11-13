<?php
$url = 'http://localhost/RUT/oia/api/requests/';
function curlPostRequest($page,$dataArr){
    global $url;
    $url.=$page;
   //create name value pairs seperated by &
   
    $ch = curl_init();  
 
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_HEADER, false); 
    curl_setopt($ch, CURLOPT_POST, count($_POST));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataArr);    
 
    $output=curl_exec($ch);

    curl_close($ch);
    return $output;
}
function curlGetRequest($page){
    global $url;
    $url.=$page;
    $ch = curl_init();  
 
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch, CURLOPT_HTTPHEADER,array("Content-Type"=>"application/json"));
 
    $output=curl_exec($ch);
 
    curl_close($ch);
    return $output;
}
function validateSession($allowedSession){
    if(!isset($_SESSION['sessid']) && isset($_SESSION['category'])) header("location:signin.php");
    else{//validate if allowed to access the page
        if($_SESSION['category'] != $allowedSession) {
            session_destroy();
            header("location:signin.php");
        }
    }
}
?>