<!DOCTYPE html>
<html>
<head>
	<title>test</title>
</head>
<body>



<?php
$access_token = 'bc9PBjw9ey7HJGp+uA23IFC+tmHSS/LB6RqG4FZqabI+788V3BBb9hKA4PjeiEh/duOWvVp3/qd/TL7S62NTAKPqrZDKUYEN6/FKuK4ziSivX5HVN+frXgPsBj9l/jWMlOLducjNKqKODO15jqlRAwdB04t89/1O/w1cDnyilFU=';

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
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			$replyuser = $event['source']['userId'];
			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => 'hello'.date("H:i:s",time()+(60*60*7))
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages]
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
/*
$access_token ='bc9PBjw9ey7HJGp+uA23IFC+tmHSS/LB6RqG4FZqabI+788V3BBb9hKA4PjeiEh/duOWvVp3/qd/TL7S62NTAKPqrZDKUYEN6/FKuK4ziSivX5HVN+frXgPsBj9l/jWMlOLducjNKqKODO15jqlRAwdB04t89/1O/w1cDnyilFU=';
$headers = ['Content-Type: application/json', 'Authorization: Bearer ' . $access_token];
$userid = "U0fc91b822df6c2a9bfbc66232fbe93df";
$url = 'https://api.line.me/v2/bot/message/push';
$messages = [
        'type' => 'text',
        'text' => 'hello'.date("H:i:s",time()) 
      ];
$data = [
        'to' => $userid,
        'messages' => [$messages]                   
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
echo $result."<br><br>";
*/
?>







</body>
</html>

