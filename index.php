
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<title>WORD?</title>
</head>

<body>
	
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="WORDSapi.php">GO?</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">About</a></li>
    </ul>
  </div>
</nav>
	
<h1>THE WORD?</h1>
<h5> GIVING YOU THE SLANG DEFINITION & LITERAL DEFINTION</h5>
	
<form action="" method="post">
Enter Word:<br>
	<input type="text" name="word">
	<input type="submit" value="search"
</form>

<?php

$service_url = 'https://mashape-community-urban-dictionary.p.rapidapi.com/define?term=';
	
$curl = curl_init($service_url);
$curl_post_data = array(
        'word' =>'definition',
        'useridentifier' => 'author',
        'x-rapidapi-key' => '78e7ad7edemsh75908ca75bf2122p16d910jsn5b8265b0e1ca'
);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
$curl_response = curl_exec($curl);
	
if ($curl_response === false) {
    $info = curl_getinfo($curl);
    curl_close($curl);
    die('error occured during curl exec. Additioanl info: ' . var_export($info));
}
curl_close($curl);
$decoded = json_decode($curl_response);
if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
    die('error occured: ' . $decoded->response->errormessage);
}
echo 'response ok!';
var_export($decoded->response);
	?>
	
<p>search a word @ <?=$service_url?></p>
	
<p>Status <?=$decoded->status?></p>
	
	<?php
	
	echo $curl_response
	
	?>
	

	
	
	
	
	
	
	
	
	
	
	
	</body>
</html>