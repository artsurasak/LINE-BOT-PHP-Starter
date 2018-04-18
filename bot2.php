<?php

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('wNGFPyRYMYL1ZuaxZBZN+gw/1FOMR52WrEGtybbWfLlXsyIJU+2NUrUB70DQzT1ID4Jhwh34P4mc3fFdIEI7rtjUToiUzOlxjmtEfS/mekbd01VYgAYZybnHi9y0Q3REK0oaVFJricEwTEehEYaOGgdB04t89/1O/w1cDnyilFU=');
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '553bc1a177fb9b042fa30b3544357169']);
$response = $bot->getProfile('U0d589cbccf8f08124f85a5e2e86b8ce4');
if ($response->isSucceeded()) {
    $profile = $response->getJSONDecodedBody();
    echo $profile['displayName'];
    echo $profile['pictureUrl'];
    echo $profile['statusMessage'];
}


/*
	$access_token = 'wNGFPyRYMYL1ZuaxZBZN+gw/1FOMR52WrEGtybbWfLlXsyIJU+2NUrUB70DQzT1ID4Jhwh34P4mc3fFdIEI7rtjUToiUzOlxjmtEfS/mekbd01VYgAYZybnHi9y0Q3REK0oaVFJricEwTEehEYaOGgdB04t89/1O/w1cDnyilFU=';
	// Get POST body content
	$content = file_get_contents('php://input');
	// Parse JSON
	$events = json_decode($content, true);
	// Validate parsed JSON data
	if (!is_null($events['events'])) 
		{	
			foreach ($events['events'] as $event) 
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
			}
		}
		*/
		