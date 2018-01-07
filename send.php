<?php

if(isset($_POST['name'])){$name = $_POST['name'];}

if(isset($_POST['tel'])){$tel = $_POST['tel'];}

$to = "<адрес почты для получения заявок с сайта>"  ; 
$subject = "Заявка на заказ звонка менеджера"; 

$msg = "Тип заявки: {$subject}\nИмя: {$name}\nТелефон: {$tel}";

$token='513599391:AAFr6Lfub_QCI2tsCplInXNWlvHgIE7Qeyk';
$query = [
    'chat_id' => -237184857,
    'parse_mode' => 'HTML',
    'text' => $msg
];

$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/plain; charset=utf-8\r\n";
$headers .= "From: mail@mail.com\r\n";

if($name and $tel){
	
	mail($to, $subject, $msg, $headers);
					
	file_get_contents(sprintf('https://api.telegram.org/bot%s/sendMessage?%s', $token, http_build_query($query)
							 
	));
	
}

?>