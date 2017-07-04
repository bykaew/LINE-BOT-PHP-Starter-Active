<?php
$access_token = '77Bbsyeb/KCuCwrqUvooRboBCR33p7uw7CIEvysWA4fPsgTwb9zqPAXiFD08KrmyX1wiFL2pTFqsVVDx5cJWevN3nMksSHPuhE8kvpyanlcGXTD3HTiZ6mknvZNfHaCx0k+l/ahlMdswsnCedMKIKwdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			//$text = $event['message']['text'];
			//$text ='Menu';

			/**** Addition Code *****/

		    $t_text=strtolower(trim($event['message']['text']));
		 
			 
			if($t_text=='pr'){
				$text ='Promotion ..............';
			}elseif($t_text=='br'){
				$text ='Branch...........';
			}elseif($t_text=='oct'){
				$text ='Open - Close Shop';
			}else{
				$text ='Thank you for interesting the Line Bot by Minnie 
				
						  - พิมพ์Promtion typing is PR 
						  
						  - Payment Shop typing is BR
						  
						  - Open and Close Time typing is OCT';
				/*
				$text='(blowkiss) ขอบคุณค่ะที่ให้ความสนใจ Line Bot by Minnie บริการเบื้องต้นที่ภูมิใจนำเสนอคุณ  (scissors)

				(shiny) โปรโมชั่นของเรา พิมพ์ PR

				(shiny)  แผนที่จุดชำระเงินของเรา พิมพ์ BR

				(shiny)  เวลาเปิดปิดของจุดชำระเงิน พิมพ์ OCT
				';
				*/
			}
			 
			/************************/

			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";