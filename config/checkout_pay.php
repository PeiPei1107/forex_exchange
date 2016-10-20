<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*設定金流串接方式*/

/**以下為歐付寶
 * 
 * 測試環境參數
 * ServiceURL=>'http://payment-stage.allpay.com.tw/Cashier/AioCheckOut'
 * HashKey=>'5294y06JbISpM5x9'
 * HashIV=>'v77hoKGq4kWxNNIS'
 * MerchantID=>'2000132'
 * 
 * **/

	$config['AllPay']=[
		'AllPay_ServiceURL'=>'http://payment-stage.allpay.com.tw/Cashier/AioCheckOut',//測試環境
		'AllPay_HashKey'=>'5294y06JbISpM5x9',//測試環境參數
		'AllPay_HashIV'=>'v77hoKGq4kWxNNIS',
		'AllPay_MerchantID'=>'2000132'
	];

/**以下為智付寶
 * 
 * 測試環境參數
 * ServiceURL=>'https://capi.pay2go.com/MPG/mpg_gateway'
 * HashKey=>'5294y06JbISpM5x9'
 * HashIV=>'v77hoKGq4kWxNNIS'
 * MerchantID=>'2000132'
 * 
 */
	$config['Pay2Go']=[ 
			'Pay2Go_ServiceURL'=>'https://capi.pay2go.com/MPG/mpg_gateway',//測試環境
			'Pay2Go_HashKey'=>'vexUw0srCPCcOyngk0ztVHMnXISbOi4j',//測試環境參數
			'Pay2Go_HashIV'=>'xCd3DFvfu7rjFPz0',
			'Pay2Go_MerchantID'=>'32414814',
			'Pay2Go_Version'=>'1.2'
	];

// //中國信託信用卡所需資料
// $ctbcbank_pay = [
//     $MerchantName = '大田映像有限公司',
//     $MerchantID = '8220276806380',
//     $TerminalID = '90008132',
//     $txType = '0',
//     $Option = '1',
//     $OrderDetail = '大田映像有限公司',
//     $AutoCap = '1',
//     $customize = '1',
//     $Key = 'asxPcbeXE7o9qn2dlH0hC8ti',
//     $debug = '0'
// ];

// //歐付寶第三方金流所需資料
// $all_pay = [
//     $MerchantName = '大田映像有限公司',
//     $MerchantID = '8220276806380',
//     $TerminalID = '90008132',
//     $txType = '0',
//     $Option = '1',
//     $OrderDetail = '大田映像有限公司',
//     $AutoCap = '1',
//     $customize = '1',
//     $Key = 'asxPcbeXE7o9qn2dlH0hC8ti',
//     $debug = '0'
// ];

// //智付寶第三方金流所需資料
// $pay2go_pay = [
//     $MerchantName = '大田映像有限公司',
//     $MerchantID = '8220276806380',
//     $TerminalID = '90008132',
//     $txType = '0',
//     $Option = '1',
//     $OrderDetail = '大田映像有限公司',
//     $AutoCap = '1',
//     $customize = '1',
//     $Key = 'asxPcbeXE7o9qn2dlH0hC8ti',
//     $debug = '0'
// ];

// //訊航第三方金流所需資料
// $smile_pay = [
//     $MerchantName = '大田映像有限公司',
//     $MerchantID = '8220276806380',
//     $TerminalID = '90008132',
//     $txType = '0',
//     $Option = '1',
//     $OrderDetail = '大田映像有限公司',
//     $AutoCap = '1',
//     $customize = '1',
//     $Key = 'asxPcbeXE7o9qn2dlH0hC8ti',
//     $debug = '0'
// ];

// //支付寶第三方金流所需資料
// $ali_pay = [
//     $MerchantName = '大田映像有限公司',
//     $MerchantID = '8220276806380',
//     $TerminalID = '90008132',
//     $txType = '0',
//     $Option = '1',
//     $OrderDetail = '大田映像有限公司',
//     $AutoCap = '1',
//     $customize = '1',
//     $Key = 'asxPcbeXE7o9qn2dlH0hC8ti',
//     $debug = '0'
// ];