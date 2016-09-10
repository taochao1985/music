<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $session_language = $this->session->userdata('user_language')?$this->session->userdata('user_language'):'chinese';
        $this->load->model("music");
        $this->lang->load('page_lang', $session_language);
    }

    function _get_sign_package(){
        $wei_config = $this->music->select('configs','*',array('type'=>'weichat_config'));
        $weiconfig = $wei_config[0];

        $appid = trim($weiconfig->field_one);
        $appsecret = trim($weiconfig->field_two);
        require_once APPPATH.'libraries/wechat_pay/jssdk.php';
        $jssdk = new JSSDK($appid, $appsecret);
        $signPackage = $jssdk->GetSignPackage();
        return $signPackage;
    }

    function pay_class(){
        ini_set('date.timezone','Asia/Shanghai');
        require_once APPPATH."libraries/wechat_pay/lib/WxPay.Api.php";
        require_once APPPATH."libraries/wechat_pay/WxPay.JsApiPay.php";

        //①、获取用户openid
        $tools = new JsApiPay();
        $openId = 'o0kgkwT-AjvK-ina_l8_6FtaaGT8';//$tools->GetOpenid();

        //②、统一下单
        $input = new WxPayUnifiedOrder();
        $input->SetBody("test");
        $input->SetAttach("test");
        $input->SetOut_trade_no(WxPayConfig::MCHID.date("YmdHis"));
        $input->SetTotal_fee("1");
        $input->SetTime_start(date("YmdHis"));
        $input->SetTime_expire(date("YmdHis", time() + 600));
        $input->SetGoods_tag("test");
        $input->SetNotify_url(base_url().'member/wechat_callback');
        $input->SetTrade_type("JSAPI");
        $input->SetOpenid($openId);
        $order = WxPayApi::unifiedOrder($input);
        $sign = $this->_get_sign_package();

        $data['signPackage'] = $sign;
        $data['jsApiParameters'] = $tools->GetJsApiParameters($order);
        //获取共享收货地址js函数参数
        $data['editAddress'] = $tools->GetEditAddressParameters();

        $this->load->view('front/pay_class', $data);
    }


    function wechat_callback(){

        require_once(APPPATH.'libraries/wechat_pay/WxPayPubHelper.php');

        //使用通用通知接口
        $notify = new Notify_pub('wx1b82e825e4249ca6','1347593801','e10adc3949ba59abbe56e057f20f883e','45a7ef3de079b0d446249a8f68978b49');
        //存储微信的回调
        $xml = $GLOBALS['HTTP_RAW_POST_DATA'];
        $notify->saveData($xml);

        //验证签名，并回应微信。
        //对后台通知交互时，如果微信收到商户的应答不是成功或超时，微信认为通知失败，
        //微信会通过一定的策略（如30分钟共8次）定期重新发起通知，
        //尽可能提高通知的成功率，但微信不保证通知最终能成功。
        if($notify->checkSign() == FALSE){
          $notify->setReturnParameter("return_code","FAIL");//返回状态码
          $notify->setReturnParameter("return_msg","签名失败");//返回信息
        }else{
          $notify->setReturnParameter("return_code","SUCCESS");//设置返回码
        }
        $returnXml = $notify->returnXml();
        if($notify->checkSign() == TRUE)
        {
          if ($notify->data["return_code"] == "FAIL") {

          }elseif($notify->data["result_code"] == "SUCCESS"){
              $order_sn = $notify->data['out_trade_no'];
              $order_log_data = array(
                                        'jo_ordersn'=>$order_sn,
                                        'jo_prev_status'=>ORDER_CREATED,
                                        'jo_next_status'=>ORDER_PAYED
                                      );
              $log_check = $this->jeff->select('order_log','*',$order_log_data);
              if(count($log_check)==0){
                $update_order_data = array('jo_status'=>ORDER_PAYED,'jo_tradeno'=>$notify->data['transaction_id'],'jo_pay_method'=>'wechat','jo_pay_time'=>date('Y-m-d H:i:s'));
                $update_result = $this->jeff->update('orders',$update_order_data,array('jo_ordersn'=>$order_sn));
                $this->_deal_product_stock($order_sn);

                $this->jeff->_send_system_message($order_sn,'pay_success_order');

                $log_result = $this->_order_log($order_log_data);
              }
          }
        }
  }

}