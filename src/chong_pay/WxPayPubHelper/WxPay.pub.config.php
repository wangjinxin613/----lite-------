<?php
/**
* 	配置账号信息
*/

//require ('../../config/index_config.php');

class WxPayConf_pub
{
	//=======【基本信息设置】=====================================
	//微信公众号身份的唯一标识。审核通过后，在微信发送的邮件中查看

	const APPID = 'wx8888888888888888';
	//受理商ID，身份标识

	static $mchid;
	//商户支付密钥Key。审核通过后，在微信发送的邮件中查看

	static $key;
	//JSAPI接口中获取openid，审核后在公众平台开启开发模式后可查看
	const APPSECRET = '48888888888888888888888888888887';

	//=======【JSAPI路径设置】===================================
	//获取access_token过程中的跳转uri，通过跳转将code传入jsapi支付页面
	const JS_API_CALL_URL = 'http://www.xxxxxx.com/demo/js_api_call.php';

	//=======【证书路径设置】=====================================
	//证书路径,注意应该填写绝对路径
	const SSLCERT_PATH = '/xxx/xxx/xxxx/WxPayPubHelper/cacert/apiclient_cert.pem';
	const SSLKEY_PATH = '/xxx/xxx/xxxx/WxPayPubHelper/cacert/apiclient_key.pem';

	//=======【异步通知url设置】===================================
	//异步通知url，商户根据实际开发过程设定
	const NOTIFY_URL = 'http://www.nsg0769.cn/chong_pay/demo/notify_url.php';

	//=======【curl超时设置】===================================
	//本例程通过curl使用HTTP POST方法，此处可修改其超时时间，默认为30秒
	const CURL_TIMEOUT = 30;
}
include_once('../../config/conn.php');
//include_once('../../config/index_config.php');
$store_id = $_SESSION['store_id']; //店铺id作为一个全局变量
		$sql1 = "where store_id = '$store_id'";
			mysql_select_db("my_db", $con);
	$result = mysql_query("SELECT * FROM store_setting {$sql1}");
	while($row = mysql_fetch_array($result))
 	{
 			$mchid = $row['mchid'];
 			$key = $row['mchid_key'];
 		}

 WxPayConf_pub::$mchid = $mchid;
  WxPayConf_pub::$key = $key;
?>
