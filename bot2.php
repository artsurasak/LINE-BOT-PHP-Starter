<?php
	$access_token = 'wNGFPyRYMYL1ZuaxZBZN+gw/1FOMR52WrEGtybbWfLlXsyIJU+2NUrUB70DQzT1ID4Jhwh34P4mc3fFdIEI7rtjUToiUzOlxjmtEfS/mekbd01VYgAYZybnHi9y0Q3REK0oaVFJricEwTEehEYaOGgdB04t89/1O/w1cDnyilFU=';
	// Get POST body content
	$content = file_get_contents('php://input');
	// Parse JSON
	$events = json_decode($content, true);
	// Validate parsed JSON data
	if (!is_null($events['events'])) 
		{	
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
			$replyToken = $event['replyToken'];	
			$url = 'https://api.line.me/v2/bot/message/reply';	
			$headers = array('Content-Type: application/json', 
									 'Authorization: Bearer ' . $access_token
									 );
			$messages = [
						'type' => 'text',
						'text' => 'Hello,user'
						];		
			$data = [
						'replyToken' => $replyToken,
						'messages' => [$messages],			
							];	
			$post = json_encode($data);		
			$ch = curl_init($url);			
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");			
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);			
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);			
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);			
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);			
			$result = curl_exec($ch);			
			curl_close($ch);			
			echo $result . "";		
			
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
			}*/
		}
echo "OK";