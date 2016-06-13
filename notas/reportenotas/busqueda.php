<?php 
include_once '../../login/check.php';
$d=array();
foreach($_POST as $k=>$v){
	array_push($d,"$k=$v");
}
$url=implode("&",$d);
$url="ver.php?".$url;
?>
<iframe width="100%" height="500" src="<?php echo $url?>"></iframe>