<?php
	$access_token = 'wNGFPyRYMYL1ZuaxZBZN+gw/1FOMR52WrEGtybbWfLlXsyIJU+2NUrUB70DQzT1ID4Jhwh34P4mc3fFdIEI7rtjUToiUzOlxjmtEfS/mekbd01VYgAYZybnHi9y0Q3REK0oaVFJricEwTEehEYaOGgdB04t89/1O/w1cDnyilFU=';
	// Get POST body content
	$content = file_get_contents('php://input');
	// Parse JSON
	$events = json_decode($content, true);
	// Validate parsed JSON data
	$url = 'https://api.line.me/v2/bot/richmenu';	
	$sizeTest = [
			 'width' => 2500,
			 'height' => 1586
			];
	$areaTest = [
				'bounds' => ['x' => 0,'y' => 0,'width' => 2500,'height' => 1686],
				'action' => ['type' => 'postback','data' => 'action=buy&itemid=123']
				]
	$data = [
			 'size' => [$sizeTest],
			 'selected' => false,
			 'name' => 'Controller',
			 'chatBarText' => 'Controller',
			 'areas' => [$areaTest]
			 //'messages' => [$messages],			
			];	
	$post = json_encode($data);			
	$headers = array('Content-Type: application/json', 
					 'Authorization: Bearer ' . $access_token
					);
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");			
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);			
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);			
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);			
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);			
	$result = curl_exec($ch);			
	curl_close($ch);			
	echo $result . "";		
	
	/*
	if (!is_null($events['events'])) 
		{	
		// Loop through each event	
			foreach ($events['events'] as $event) 
			{		// Reply only when message sent is in 'text' format		
				if ($event['type'] == 'message' && $event['message']['type'] == 'text') 
				{	// Get text sent			
					$text = $event['message']['text'];			
					// Get replyToken			
					$replyToken = $event['replyToken'];			
					// Build message to reply back			
					$messages = [
								 'type' => 'text',
								 'text' => $text
								 //'text' => 'Hello!'
								];			
					// Make a POST Request to Messaging API to reply to sender			
					$url = 'https://api.line.me/v2/bot/message/reply';			
					//$url = 'https://api.line.me/v2/bot/richmenu';
					$data = [
							 'replyToken' => $replyToken,
							 'messages' => [$messages],			
							];			
					//$data = {
					//		"richMenuId": "richmenu-88c05ef6921ae53f8b58a25f3a65faf7",
					//		"size": {"width": 2500,"height": 1686},
					//		"selected": false,
					//		"name": "Nice richmenu",
					//		"chatBarText": "Tap to open",
					//		"areas": [
					//				  {
					//					"bounds": {"x": 0,"y": 0,"width": 2500,"height": 1686},
					//					"action": {"type": "postback",
					//							   "data": "action=buy&itemid=123"
					//							  }
					//				  }
					//				 ]
					//}
					$post = json_encode($data);			
					$headers = array('Content-Type: application/json', 
									 'Authorization: Bearer ' . $access_token
									 );			
					$ch = curl_init($url);			
					curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");			
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);			
					curl_setopt($ch, CURLOPT_POSTFIELDS, $post);			
					curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);			
					curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);			
					$result = curl_exec($ch);			
					curl_close($ch);			
					echo $result . "";		
				}	
			}
		}*/
echo "OK";