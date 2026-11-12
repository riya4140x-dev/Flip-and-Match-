<?php
header('Content-Type: application/json');
$in=json_decode(file_get_contents('php://input'),true);
$game=$in['game']??'';
if(!is_array($in)||!in_array($game,['memory','sequence'])){http_response_code(400);echo '{"ok":false}';exit;}
$name=substr(trim(strip_tags($in['name']??'')),0,20)?:'Player';
$entry=['name'=>$name,'game'=>$game,'score'=>(int)($in['score']??0),
  'detail'=>substr(strip_tags((string)($in['detail']??'')),0,60),'date'=>date('d M Y')];
$dir=__DIR__.'/data';if(!is_dir($dir))mkdir($dir,0777,true);
$fp=fopen($dir.'/scores.json','c+');flock($fp,LOCK_EX);
$all=json_decode(stream_get_contents($fp),true)?:[];
$all[]=$entry;
ftruncate($fp,0);rewind($fp);fwrite($fp,json_encode($all));fflush($fp);flock($fp,LOCK_UN);fclose($fp);
echo '{"ok":true}';
