<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {
    public $_session_language;
    function __construct()
    {
        parent::__construct();
        define('ORDER_CREATED', 10);
        define('ORDER_PAYED', 20);
        $session_language = $this->session->userdata('user_language')?$this->session->userdata('user_language'):'chinese';
        $this->_session_language = $session_language;
        $student_session = $this->session->userdata('student_session');
        $method = $this->router->method;
        ini_set('display_errors','Off');
        if(!$student_session && !in_array($method, array('pay_class','wechat_callback'))){
            redirect('/front/index');
        }

        $this->load->model("music");
        //echo $session_language;exit;
        $this->lang->load('page_lang', $session_language);

    }


    function ajax_homework_status(){
        $call_id     = $this->input->post('call_id');
        $finish_flag = $this->input->post('finish_flag');
        $song        = $this->input->post('song');
        $video       = $this->input->post('video');
        $file        = $this->input->post('file');
        $student_comment = $this->input->post('student_comment');
        $homework_status = '';
        if($song){
            $song = rtrim($song,';');
            $homework_status.='song='.$song.'#';
        }

        if($video){
            $video = rtrim($video,';');
            $homework_status.='video='.$video.'#';
        }

        if($file){
            $file = rtrim($file,';');
            $homework_status.='file='.$file.'#';
        }

        if($homework_status){
            $homework_status = rtrim($homework_status,'#');
        }
        $update_array = array(
                'homework_flag'=>$finish_flag,
                'homework_status'=>$homework_status,
                'homework_comment'=>$student_comment
                );
        $result = $this->music->update('class_roll_call',$update_array,array('id'=>$call_id));
        if($result){
            echo json_encode(array('success'=>'yes'));exit;
        }else{
            echo json_encode(array('success'=>'no'));exit;
        }
    }

    function course_detail(){
        $course_id = $this->uri->segment(3);
        $student_info = $this->top();

        $sql = "select class_course_teacher.*, class_roll_call.id as call_id,class_roll_call.homework_comment, class_roll_call.homework_status,class_roll_call.homework_flag,class_roll_call.comment_id,class.class_week,class.class_start_time,class.class_end_time,instrument_comments.comment,class.numbe,class.level_id,class.instrument_id from instrument_comments";
        $sql.= ",class_course_teacher,class_roll_call,class where class.id = class_course_teacher.class_id and instrument_comments.id = class_roll_call.comment_id ";
        $sql.= " and class_roll_call.class_course_teacher_id = class_course_teacher.id and class_roll_call.class_course_teacher_id = ".$course_id." and class_roll_call.student_id=".$student_info->id;

        $class_course_detail = $this->music->personal_select($sql);
        $course_detail = $class_course_detail[0];
        if($this->_session_language == 'chinese'){
            $field = 'name,id';
        }else {

            $field = 'en_name as name,id';
        }
        $data['course_detail'] = $course_detail;
        $temp_level = $this->music->select('base_info',$field,array('id'=>$course_detail->level_id));
        $data['level_name'] = $temp_level[0]->name;

        $temp_instrument = $this->music->select('base_info',$field,array('id'=>$course_detail->instrument_id));
        $data['instrument_name'] = $temp_instrument[0]->name;

        if($course_detail->course_suggest_song){
            $temp_song_id = explode(';', $course_detail->course_suggest_song);
            $temp_songs = array();
            foreach ($temp_song_id as $key => $value) {
                $temp_suggest_song = $this->music->select('suggest_song','*',array('id'=>$value));
                if($temp_suggest_song){
                    $temp_suggest_song = $temp_suggest_song[0];
                    $temp_songs[] = $temp_suggest_song;
                }
            }

            $data['suggest_song'] = $temp_songs;
        }else{
            $data['suggest_song'] = '';
        }

        if($course_detail->course_suggest_video){
            $temp_video_id = explode(';', $course_detail->course_suggest_video);
            $temp_videos = array();
            foreach ($temp_video_id as $key => $value) {
                $temp_suggest_video = $this->music->select('suggest_video','*',array('id'=>$value));
                if($temp_suggest_video){
                    $temp_videos[] = $temp_suggest_video[0];
                }
            }
            $data['suggest_video'] = $temp_videos;
        }else{
            $data['suggest_video'] = '';
        }

        if($course_detail->course_suggest_files_url){
            $files_url  = explode(';', $course_detail->course_suggest_files_url);
            $files_bame = explode('<br>', trim($course_detail->course_suggest_file_name));
            $data['files_url'] = $files_url;
            $data['files_name'] = $files_bame;
        }else{
            $data['files_url'] = '';
            $data['files_name'] = '';
        }

        $homework_video_status = array();
        $homework_song_status  = array();
        $homework_file_status  = array();

        if($course_detail->homework_status){
            $temp_status = explode('#', $course_detail->homework_status);
            foreach($temp_status as $k=>$v){
                $temp_item = explode('=', $v);
                $temp_detail = explode(';', $temp_item[1]);
                if($temp_item[0] == 'video'){
                    $homework_video_status = $temp_detail;
                }
                if($temp_item[0] == 'song'){
                    $homework_song_status = $temp_detail;
                }
                if($temp_item[0] == 'file'){
                    $homework_file_status = $temp_detail;
                }
            }
        }

        $data['homework_video_status'] = $homework_video_status;
        $data['homework_song_status']  = $homework_song_status;
        $data['homework_file_status']  = $homework_file_status;
        //echo '<pre>';print_r($data);exit;
        $this->load->view('student/course_detail',$data);
    }


    function payment_list(){
        $student_info = $this->top();
        $payment_list = $this->music->select('student_class_order','*',array('student_id'=>$student_info->id));
        if($this->_session_language == 'chinese'){
            $field = 'name,id';
        }else {
            $field = 'en_name as name,id';
        }
        foreach ($payment_list as $key => $value) {
            $temp_class = $this->music->select('class','*',array('id'=>$value->class_id));
            if($temp_class){
                $cl = $temp_class[0];
                $numbe = $cl->numbe;
                $temp_level = $this->music->select('base_info',$field,array('id'=>$cl->level_id));
                $level_name = $temp_level[0]->name;

                $temp_instrument = $this->music->select('base_info',$field,array('id'=>$cl->instrument_id));
                $instrument_name = $temp_instrument[0]->name;

                $temp_branch = $this->music->select('branch',$field,array('id'=>$cl->branch_id));
                $branch_name = $temp_branch[0]->name;


                $class_week = $cl->class_week;
                $class_time = $cl->class_start_time.'-'.$cl->class_end_time;
                $duration   = $cl->duration;
                $class_numbe= $cl->numbe;
                $pay_time   = $value->payed;

            }else{
                $class_week = $class_time = $duration = $level_name = $instrument_name = $class_numbe = $pay_time = $branch_name = '';
            }
            $payment_list[$key]->class_week      = $class_week;
            $payment_list[$key]->class_time      = $class_time;
            $payment_list[$key]->duration        = $duration;
            $payment_list[$key]->level_name      = $level_name;
            $payment_list[$key]->instrument_name = $instrument_name;
            $payment_list[$key]->class_numbe     = $class_numbe;
            $payment_list[$key]->pay_time        = $pay_time;
            $payment_list[$key]->branch_name     = $branch_name;
        }
        $data['payment_list'] = $payment_list;
        $data['order_status'] = array('10'=>'未支付','20'=>'已支付');
        $this->load->view('student/payment_list',$data);
    }

    function my_course(){
        $student_info = $this->top();
        $sql = "select class.* from class,student_class where student_class.class_id = class.id and student_class.student_id = ".$student_info->id;
        $class_course = $this->music->personal_select($sql);

        if($this->_session_language == 'chinese'){
            $field = 'name,id';
            $name = $student_info->name;
        }else {
            $name = $student_info->en_name;
            $field = 'en_name as name,id';
        }

        foreach($class_course as $k=>$cl){
            $temp_level = $this->music->select('base_info',$field,array('id'=>$cl->level_id));
            $level_name = $temp_level[0]->name;

            $temp_instrument = $this->music->select('base_info',$field,array('id'=>$cl->instrument_id));
            $instrument_name = $temp_instrument[0]->name;

            $temp_branch = $this->music->select('branch',$field,array('id'=>$cl->branch_id));
            $branch_name = $temp_branch[0]->name;
            $passed_count= $this->music->select_count_where('class_roll_call',array('class_id'=>$cl->id));
            $class_course[$k]->left_amount     = $cl->duration - $passed_count;
            $class_course[$k]->level_name      = $level_name;
            $class_course[$k]->instrument_name = $instrument_name;
            $class_course[$k]->branch_name     = $branch_name;
        }
        $data['username'] = $name;
        //echo '<pre>';print_r($class_course);exit;
        $data['class_course'] = $class_course;
        $this->load->view('student/my_course',$data);
    }

    function index(){
        $flag = $this->uri->segment(3);
        $student_info = $this->top();
        $sql = "select class.instrument_id,class_course_teacher.lession_no,class.numbe, class_roll_call.homework_flag,class_course_teacher.id as course_id,class_course_teacher.course_homework from class_course_teacher,class_roll_call,class ";
        $sql.= " where class_course_teacher.id = class_roll_call.class_course_teacher_id and class_roll_call.class_id = class.id";
        $sql.= " and class_roll_call.student_id = ".$student_info->id;
        if($flag){
            if($flag == 1){
                $sql.=" and class_roll_call.homework_flag = 0";
            }else if($flag == 2){
                $sql.=" and class_roll_call.homework_flag = 1";
            }
        }
        $class_log = $this->music->personal_select($sql);
        if($this->_session_language == 'chinese'){
            $field = 'name,id';
        }else {
            $field = 'en_name as name,id';
        }
        foreach($class_log as $k=>$v){
            $temp_instrument = $this->music->select('base_info',$field,array('id'=>$v->instrument_id));
            if($temp_instrument){
                $instrument_name = $temp_instrument[0]->name;
            }else{
                $instrument_name = '';
            }
            $class_log[$k]->instrument_name = $instrument_name;
        }
        $data['flag'] = $flag;
        $data['class_log'] = $class_log;
        $this->load->view('student/index', $data);
    }


    function member_center(){

        $student_class_id = $this->uri->segment(3);
        $data['student_class_id'] = $student_class_id?$student_class_id:0;
        $this->load->view('student/member_center', $data);
    }


    function top(){
        $student_session = $this->session->userdata('student_session');
        return $student_session;
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
        $student_class_id = $this->uri->segment(3);
        $student_class_temp = $this->music->select('student_class','*',array('id'=>$student_class_id));
        $student_id = $student_class_temp[0]->student_id;
        $class_id = $student_class_temp[0]->class_id;

        $temp_student = $this->music->select('student','openid',array('id'=>$student_id));
        $openId = $temp_student[0]->openid;

        $temp_class = $this->music->select('class','tuition',array('id'=>$class_id));
        $tuition = $temp_class[0]->tuition;
        $numbe = $this->music->_generate_num('student_class_order','SCO').time();
        $student_class_order_data = array(
            'student_id'  => $student_id,
            'class_id'    => $class_id,
            'price'       => $tuition,
            'created'     => date('Y-m-d H:i:s'),
            'numbe'       => $numbe,
            'status'      => ORDER_CREATED

            );
        $order_log_data = array(
                                'numbe'=>$numbe,
                                'prev_status'=>ORDER_CREATED,
                                'next_status'=>ORDER_CREATED,
                                'created'     => date('Y-m-d H:i:s')
                              );
        $check_data = array('student_id'=>$student_id,'class_id'=>$class_id,'price'=>$tuition);
        $order_check = $this->music->select('student_class_order','*',$check_data);
        if(!$order_check){
            $this->music->insert('student_class_order', $student_class_order_data);
        }

        $this->music->insert('order_log', $order_log_data);
        //②、统一下单
        $input = new WxPayUnifiedOrder();
        $input->SetBody("test");
        $input->SetAttach("test");
        $input->SetOut_trade_no($numbe);
        $input->SetTotal_fee("1");
        $input->SetTime_start(date("YmdHis"));
        $input->SetTime_expire(date("YmdHis", time() + 600));
        $input->SetGoods_tag("test");
        $input->SetNotify_url(base_url().'student/wechat_callback');
        $input->SetTrade_type("JSAPI");
        $input->SetOpenid($openId);
        $order = WxPayApi::unifiedOrder($input);
        $sign = $this->_get_sign_package();

        $data['signPackage'] = $sign;
    //echo '<pre>';print_r($order);exit;
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

          }else if($notify->data["result_code"] == "SUCCESS"){
              $order_sn = $notify->data['out_trade_no'];
              $order_log_data = array(
                                        'numbe'=>$order_sn,
                                        'prev_status'=>ORDER_CREATED,
                                        'next_status'=>ORDER_PAYED
                                      );
              $log_check = $this->music->select('order_log','*',$order_log_data);
              if(count($log_check)==0){
                $update_order_data = array('status'=>ORDER_PAYED,'tradeno'=>$notify->data['transaction_id'],'payed'=>date('Y-m-d H:i:s'));
                $update_result = $this->music->update('student_class_order',$update_order_data,array('numbe'=>$order_sn));
                $order_log_data['created']= date('Y-m-d H:i:s');
                $log_result = $this->music->insert('order_log',$order_log_data);
              }else{
                //error_log(print_r($log_check,true),3,'/home/www/log.txt');
              }
          }
        }else{
             //error_log(print_r($xml,true),3,'/home/www/xml2.txt');
        }
  }

}