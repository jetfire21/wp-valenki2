<?php
/* ************ send mail *********** */
function back_call(){
	
		if($_POST['name']) $arr['name'] = strip_tags( trim($_POST['name']) );			
		// if($_POST['email']) $arr['email'] = trim($_POST['email']);					
		// if($_POST['message']) $arr['message'] = trim($_POST['message']);	
		if($_POST['phone']) $arr['phone'] = strip_tags( trim($_POST['phone']) );	
		if($_POST['title']) $arr['title'] = strip_tags( trim($_POST['title']) );	
		if($_POST['price']) $arr['price'] = strip_tags( trim($_POST['price']) );	
			
		if( !empty($arr['name']) and !empty($arr['phone'])) {
			
			// if( preg_match("/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i", $arr['email']) )
			// {

				$to = 'freerun-2012@yandex.ru'; /**** 21arenda@gmail.com ****/
				$sitename = $_SERVER['HTTP_HOST'];
				$subject = "Перезвоните мне";
				$message = "Имя: " .$arr['name'].  "\r\nТелефон: " . $arr['phone'] ."\r\nТовар: " .$arr['title'].  "\r\n" . "Цена: " .$arr['price'].  "\r\n";
				$headers = "From: {$sitename} <" .$to. ">\r\nContent-type:text/plain; charset=utf-8\r\n";
				mail($to,$subject,$message,$headers);
				$arr['res'] = 'success';
				echo json_encode($arr); 
			// }
			// else{
			// 	$arr['res'] = 'error_email'; 
			// 	echo json_encode($arr);
			// }
		}
		else{
			$arr['res'] = 'error_empty'; 
			echo json_encode($arr);
		 }
}
back_call();
?>