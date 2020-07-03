<?php
function send_post($url, $post_data) {
	$postdata = http_build_query($post_data);
	$options = array(
		'http' => array(
			'method' => 'POST',
			'header' => 'Content-type:application/x-www-form-urlencoded;Referer:https://www.bilibili.com;Origin:https://www.bilibili.com',
			'content' => $postdata,
			'timeout' => 15 * 60 // 超时时间（单位:s）
		)
	);
	$context = stream_context_create($options);
	$result = file_get_contents($url, false, $context);
	return $result;
}
header('Content-Type:application/json; charset=utf-8');
$pdata = array("build"=>9333,"buvid"=>"abc1234abc1234abc1234abc1234abc1","platform"=>"ios","share_channel"=>"COPY","share_content"=>"bishi","share_id"=>"public.webview.0.0.pv","share_mode"=>3,"share_title"=>"bishi","oid"=>$_GET['url']);
exit(send_post('https://api.bilibili.com/x/share/click', $pdata));
?>