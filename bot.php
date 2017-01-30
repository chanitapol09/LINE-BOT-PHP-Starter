<?php
$access_token = '1OZId+sFxEGTDwVCcggP4aC+02i2aEsD3K0cVwHM8T1jzPz7IHgwuDPSTgePqcn0OyiWvIVCRsWWPIqhpni3EvOhTfFIUGb7m0JYVDOXtl94+VR+AlAsKXzsMQ0emuumJ+4g4V4Mp6qCi+RAYY+E0AdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON date
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			'messages' => [
     			 [
       			 'type' => 'image',
      			  'originalContentUrl' => 'https://raw.githubusercontent.com/kittinan/Sample-Line-Bot/master/images/beer.jpg',
      			  'previewImageUrl' => 'https://raw.githubusercontent.com/kittinan/Sample-Line-Bot/master/images/beer_preview.jpg',
     			 ],			
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
