<?php
declare(strict_types=1);
if($_SERVER['REQUEST_METHOD']!=='POST'){header('Location: /#contact');exit;}
if(!empty($_POST['website']??'')){header('Location: /thank-you.html');exit;}
$name=trim((string)($_POST['name']??''));$company=trim((string)($_POST['company']??''));$email=trim((string)($_POST['email']??''));$country=trim((string)($_POST['country']??''));$message=trim((string)($_POST['message']??''));$consent=(string)($_POST['consent']??'');
if($name===''||$email===''||$message===''||$consent!=='yes'||!filter_var($email,FILTER_VALIDATE_EMAIL)){http_response_code(400);exit('Please complete the required fields and try again.');}
$clean=function($v){return str_replace(["\r","\n"],' ',(string)$v);};$name=$clean($name);$company=$clean($company);$email=$clean($email);$country=$clean($country);
$body="New CEYVANA Global website enquiry\n\nName: $name\nCompany: $company\nEmail: $email\nCountry: $country\n\nEnquiry:\n$message\n";
$headers="From: CEYVANA Website <hello@ceyvanaglobal.com>\r\nReply-To: $email\r\nBcc: sathilad@gmail.com\r\nMIME-Version: 1.0\r\nContent-Type: text/plain; charset=UTF-8";
if(mail('hello@ceyvanaglobal.com','New CEYVANA Global website enquiry',$body,$headers)){header('Location: /thank-you.html');exit;}http_response_code(500);exit('We could not send your enquiry right now. Please email hello@ceyvanaglobal.com directly.');
?>