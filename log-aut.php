<!DOCTYPE html>
<html>
<head>
  <?php
   require_once('ClassFramework.php'); 
   $echohead = new Framework();
   $echohead->headbootstrap();
   $echohead->headcontent();
   ?>
   <title>Detail Information</title>
</head>
<body>
  <div style="margin:0 20% 0 20%">

  <?php
session_start();
require_once realpath(dirname(__FILE__) . '/google-api-php-client/autoload.php');

 $client_id = '935017123254-fhtnms01bchecihui0o1fc6cu371je5t.apps.googleusercontent.com';
 $client_secret = 'xtcWuRMD07rBCFCh52mNUG7m';
 $redirect_uri = 'https://fgc-jiucai.rhcloud.com/log-aut.php';

$client = new Google_Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope("https://www.googleapis.com/auth/calendar");

$service = new Google_Service_Calendar($client);

if (isset($_REQUEST['logout'])) {
    unset($_SESSION['access_token']);
}

if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
  header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
} else {
  $authUrl = $client->createAuthUrl();
}

if ($client->getAccessToken() && isset($_GET['url'])) {
  $url = new Google_Service_Calendar_Url();
  $url->longUrl = $_GET['url'];
  $short = $service->url->insert($url);
  $_SESSION['access_token'] = $client->getAccessToken();
}

?>
<div class="box">
  <div class="request">

<?php 
if (isset($authUrl)) {
  echo "<div style=\"margin:0 20% 0 20%\">
        <h3><a class='login' href='" . $authUrl . "'><strong>Connect Me!</strong></a></h3>
        </div>";
        
} else {
    
    echo "<div style=\"margin:0 20% 0 20%\">
          <h3><a href = 'https://fgc-jiucai.rhcloud.com/add_event.php' ><strong>确认添加</strong></a><h3>
          </div>";
    
    echo "<div style=\"margin:0 20% 0 20%\">
          <a class='logout' href='?logout'>Logout</a>
          </div>";
}
?>
  </div>

  <div class="shortened">
<?php
if (isset($short)) {
  var_dump($short);
}
?>
  </div>
</div>

</body>
</html>