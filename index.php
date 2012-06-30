<?php

include 'src/facebook.php';
$config['appId']='194011800726148';
$config['secret']='c2f351f9aae168f53822f9f826f62804';
$config['fileUpload']=true;

	
$facebook = new Facebook($config);
$userid = $facebook->getUser();
if ($userid) {
  try {

	  $array=array(
				0=>'B?n nên ? nhà',
				1=>'B?n nên di h?c',
				2=>'B?n nên di làm',
				3=>'B?n nên di choi',
			);
			$key=array_rand($array,1);
			$nenlam="Hôm nay: $array[$key]";
//$user = $facebook->api('/me');
//echo 'thong tin<br>';
//var_dump ($user);
	} catch (FacebookApiException $e) {
		exit ('L&#7895;i:'.$e->getMessage());
	$user = null;
	}
}
else
{
	$loginUrl = $facebook->getLoginUrl();
	exit("Vui lòng login l&#7841;i <a href='$loginUrl' target='_top'>vào &#273;ây</a> &#273;&#7875; &#273;&#259;ng nh&#7853;p l&#7841;i");
}
?>

<form name="test" method="POST">
Hôm nay ban nen <br>
<?=$nenlam?><br>
<input type="hidden" name="nenlamgi" value="<?php echo $nenlam; ?>">
<input name="do" value="up wall" type="submit">
</form>