<?php
define('API_KEY','1035357676:AAH22Vc0pC4ObXDzq-yFcyJuPv7OxXlTlVk');//botingiz tokeni

function devfox($method,$datas=[]){
$url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}else{
return json_decode($res);
}
}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$mid = $message->message_id;
$cid = $message->chat->id;
$name = $message->chat->first_name;
$tx = $message->text;

if(stripos($tx,"/start")!==false){
devfox('sendMessage', [
'chat_id'=>$cid,
'text'=>"Salom $name xush kelibsiz😉",
]);
}
if(mb_stripos($tx,"/stop")!==false){
devfox('sendMessage', [
'chat_id'=>$cid,
'text'=>"Salom🙄",
]);
}
