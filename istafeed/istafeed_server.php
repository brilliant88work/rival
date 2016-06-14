<?php
//echo "<pre>"; print_r($_GET); die;
//header("location:istafeed_client.php?".$_GET);
 if(isset($_GET['error'])){
	header("location:istafeed_client.php?".$_GET['error']);
}
	
 ?>

<?php 
if(isset($_GET['code'])){
	$code = $_GET['code'];
 
	$post = [
    'client_id' => '5aaae18dbe404152be5026d3733acf4e',
    'client_secret' => 'f9e8bf8703a047e69838dc8a03652c12',
    'grant_type'   => 'authorization_code',
	'redirect_uri' => 'http://rival-solutions.com/projects/istafeed/istafeed_server.php',
	'code'   => $code
];

	$ch = curl_init();
	$url ="https://api.instagram.com/oauth/access_token";
	//curl_setopt($ch, CURLOPT_HEADER, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch,CURLOPT_POST, 1); 
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
	
	$data = curl_exec($ch);
	$Data =json_decode($data,true);
	curl_close($ch);

	//echo "<pre>"; print_r($Data); die;
	header("location:istafeed_client.php?access_token=".$Data['access_token']."&username=".$Data['user']['username']."&profile_picture=".$Data['user']['profile_picture']."&id=".$Data['user']['id']);
	//echo "<pre>"; print_r($Data);
	//echo 
	// die;
	//$datas =  curl_getinfo($ch) . '<br/>';
	//echo curl_errno($ch) . '<br/>';
	//echo curl_error($ch) . '<br/>';

}
//header("location:istafeed/istafeed_client.php");
?> 

    <!-- ******FOOTER****** --> 
