<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

	 function __construct()
    {
        parent::__construct();
        $session_language = $this->session->userdata('user_language')?$this->session->userdata('user_language'):'chinese';
        $this->_session_language = $session_language;
        $this->load->model("music");
        $this->lang->load('page_lang', $session_language);
    }


    public function set_language(){
        $current_language = $this->session->userdata('user_language')?$this->session->userdata('user_language'):'chinese';

        if($current_language == 'chinese'){
            $this->session->set_userdata('user_language','english');
        }else{
            $this->session->set_userdata('user_language', 'chinese');
        }

        echo json_encode(array('success'=>'yes'));exit;
    }



	public function index()
	{
        if($this->_session_language == 'chinese'){
            $brief_info_field = 'desc';
            $base_field = 'name as display_name,en_name';
            $teacher_fields = 'name,desc,thumb,instrument,id,country';
            $course_fields = 'name, desc, recommand_pic, display_order,id';

        }else{
            $brief_info_field = 'en_desc as desc';
            $base_field = 'en_name as display_name,en_name';
            $teacher_fields = 'en_name  as name,en_desc as desc,thumb,instrument,id,en_country as country';
            $course_fields = 'en_name as name, en_desc as desc, en_recommand_pic as recommand_pic, display_order,id';
        }

        $data['course_info'] = $this->music->select('course',$course_fields,'','','',array('display_order'=>'asc'));
        $data['instrument'] = $this->music->select('base_info',$base_field,array('type' => 'instrument'));
        $teachers = $this->music->select('teacher',$teacher_fields);
        foreach($teachers as $k=>$v){

            $t_instrument = explode(',' ,$v->instrument);
            $instrument = array();
            foreach ($t_instrument as $key => $value) {
                $tt_instrument = $this->music->select('base_info',$base_field,array('id' => $value));
                if($tt_instrument){
                    $instrument[] = $tt_instrument[0];
                }
            }
            $teachers[$k]->instrument_info = $instrument;
        }
        //echo '<pre>';print_r($teachers);exit;
        $data['teachers']      = $teachers;
        $data['school_brief']  = $this->music->select('brief_info',$brief_info_field,array('cate'=>'school'));
        $data['student_words'] = $this->music->select('brief_info',$brief_info_field,array('cate'=>'student_words'));
        $data['parents_words'] = $this->music->select('brief_info',$brief_info_field,array('cate'=>'parents_words'));

        $this->load->view('front/index',$data);
	}



	function article_detail(){
		$id = $this->uri->segment(3);
		$key = $this->uri->segment(4);
		$article = $this->music->select('materials','*',array('id'=>$id));
		if($article){
              $material = $article[0];
              $tem = array();
              $temp_title = explode('|||',$material->title);
              $temp_content = explode('|||',$material->content);
              $temp_sourceurl = explode('|||',$material->source_url);
              $temp_coverurl = explode('|||',$material->coverurl);
              $temp_summary = explode('|||',$material->summary);
              foreach($temp_title as $k=>$v){
                $tem[] = array(
                  'title'=>$v,
                  'content'=>isset($temp_content[$k])?$temp_content[$k]:'',
                  'source_url'=>isset($temp_sourceurl[$k])?$temp_sourceurl[$k]:'',
                  'coverurl' =>isset($temp_coverurl[$k])?$temp_coverurl[$k]:'',
                  'summary' =>isset($temp_summary[$k])?$temp_summary[$k]:''
                  );
              }
        }
        $data['article_content'] = $tem[$key]['content'];
        $data['title'] = $tem[$key]['title'];
        $data['summary'] = $tem[$key]['summary'];
        $this->load->view('front/article_detail',$data);
	}

    function _check_class($class_id){
        $check_class = $this->music->select('class','*',array('id'=>$class_id));
        if(!$check_class){
            echo json_encode(array('success'=>'no','msg'=>$this->lang->line('wrong_class_id')));exit;
        }else{
            return $check_class[0];
        }
    }


    function _check_tutor($tutor_id){
        $check_class = $this->music->select('teacher','*',array('id'=>$tutor_id));
        if(!$check_class){
            echo json_encode(array('success'=>'no','msg'=>$this->lang->line('wrong_tutor_id')));exit;
        }else{
            return $check_class[0];
        }
    }



    function wap_register(){
        $openid = $this->uri->segment(3);
        $portrait = "/asset/images/logo.png";
        if($openid){
            $temp_student = $this->music->select('student','*',array('openid'=>$openid));
            if($temp_student){
                $portrait = base_url().$temp_student[0]->wechat_thumb;
            }
            $student_info = $temp_student[0];
            $student_id = $student_info->id;
            $this->session->set_userdata('student_session',$temp_student[0]);
            if($student_info->class_id && $student_info->mobile){
                redirect('/student/member_center');
            }
        }else{
            $student_id = 0;
        }

        $data['portrait'] = $portrait;
        $data['student_id'] = $student_id;
        $data['openid'] = $openid;
        $this->load->view('student/wap_register', $data);
    }


    function do_login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $member_type = $this->input->post('member_type');

        if($member_type == 'student'){
            $student_check = $this->music->select('student','*',array('username'=>$username));
            if(!$student_check){
                echo json_encode(array('success'=>'no','msg'=>$this->lang->line('username_not_exist')));exit;
            }

            $student_info = $student_check[0];

            if(md5(md5($password.'music')) != $student_info->password){
                echo json_encode(array('success'=>'no','msg'=>$this->lang->line('password_wrong')));exit;
            }

            $this->session->set_userdata('student_session',$student_info);

        }else{
            $teacher_check = $this->music->select('teacher','*',array('username'=>$username));
            if(!$teacher_check){
                echo json_encode(array('success'=>'no','msg'=>$this->lang->line('username_not_exist')));exit;
            }

            $teacher_check = $teacher_check[0];

            if(md5(md5($password.'music')) != $teacher_check->password){
                echo json_encode(array('success'=>'no','msg'=>$this->lang->line('password_wrong')));exit;
            }

            $this->session->set_userdata('teacher_session',$teacher_check);
        }

        echo json_encode(array('success'=>'yes','msg'=>$this->lang->line('login_success')));exit;
    }


    function logout(){
        $session_type = $this->uri->segment(3);
        if($session_type == 'student'){
            $this->session->set_userdata('student_session','');
        }else{
            $this->session->set_userdata('teacher_session','');
        }
        redirect('/front/index');
    }


    function reset_password(){
        $mobile = trim($_POST['mobile']);
        $captcha = trim($_POST['captcha']);
        $member_type = trim($_POST['member_type']);
        $password = trim($_POST['password']);
        $this->_verify_captcha($mobile,$captcha);
        $password = md5(md5($password.'music'));
        if($member_type == 'student'){

            $student_check = $this->music->select('student','*',array('mobile'=>$mobile));
            if(!$student_check){
                $r = array('success'=>'no','msg'=>$this->lang->line('mobile_not_exist'));
                echo json_encode($r);exit;
            }else{
                $this->music->update('student',array('password'=>$password),array('id'=>$student_check[0]->id));

                $this->session->set_userdata('student_session',$student_check[0]);
                $r = array('success'=>'yes','msg'=>$this->lang->line('edit_success'));
                echo json_encode($r);exit;
            }
        }else{
            $teacher_check = $this->music->select('teacher','*',array('mobile'=>$mobile));
            if(!$teacher_check){
                $r = array('success'=>'no','msg'=>$this->lang->line('mobile_not_exist'));
                echo json_encode($r);exit;
            }else{
                $this->music->update('teacher',array('password'=>$password),array('id'=>$teacher_check[0]->id));
                $r = array('success'=>'yes','msg'=>$this->lang->line('edit_success'));
                $this->session->set_userdata('teacher_session',$teacher_check[0]);
                echo json_encode($r);exit;
            }
        }
    }

    function _verify_captcha($mobile,$captcha){
        $check_time = strtotime("-10 min");
        //检测验证码是否有效
        $check = $this->music->select('mobile_codes','',array('tmc_mobile'=>$mobile,'tmc_code'=>$captcha,'tmc_created >='=>$check_time));
        if (!$check){
            $r = array('success'=>'no','msg'=>$this->lang->line('wrong_captcha'));
            echo json_encode($r);exit;
        }else{
            return true;
        }

    }

    function _match_mobile($mobile){
        return preg_match("/^13[0-9]{1}[0-9]{8}$|15[0-9]{1}[0-9]{8}$|17[0-9]{1}[0-9]{8}$|18[0-9]{1}[0-9]{8}$/",$mobile);
    }


    //获取手机验证码
    function get_captcha(){
        if($_POST){
            $mobile = trim($_POST['mobile']);
            $type = trim($_POST['type']);
            if(!$mobile){
                echo json_encode(array('success'=>'no','msg'=>$this->lang->line('mobile_empty')));exit;
            }

            if(!$this->_match_mobile($mobile)){
                echo json_encode(array('success'=>'no','msg'=>$this->lang->line('mobile_format')));exit;
            }

            //判断此手机1分钟内是否已经发过消息
            $check_time = strtotime("-1 min");
            $sms_check = $this->music->select('mobile_codes','*',array('tmc_mobile'=>$mobile,'tmc_created >='=>$check_time));
            if ($sms_check){
                $r = array('success'=>'no','msg'=>$this->lang->line('one_minute_limit'));
                echo json_encode($r);exit;
            }else{
                $this->music->delete('mobile_codes',array('tmc_mobile'=>$mobile));
            }

            $code = $this->music->_generate_code(6);
            if($type == 'register'){
                $sms = str_replace('$sms',$code,'您好，欢迎注册Rolling Music音乐教育机构线上教务系统，您的验证码为$sms温馨提示：注册完后请妥善保管登录密码哦！');
            }else if($type == 'edit_password'){
                $sms = str_replace('$sms',$code,'您好，您的验证码为$sms，Rolling Music音乐教育机构温馨提示：更改完成后请妥善保管登录密码哦！');
            }

            $sms = $this->music->_send_sms($mobile,$sms);
              if($sms == 'success'){

                $code_data = array('tmc_mobile'=>$mobile,'tmc_code'=>$code,'tmc_created'=>time());
                $r = $this->music->insert('mobile_codes',$code_data);
                if ($r){
                  echo json_encode(array('success'=>'yes','msg'=>'Sent'));exit;
                }else{
                  echo json_encode(array('success'=>'no','msg'=>'Failure'));exit;
                }
              }else{
                echo json_encode(array('success'=>'no','msg'=>'Failure'));exit;
              }
        }
    }


    function do_register(){
        $username = $this->input->post('username');
        $en_name = $this->input->post('en_name');
        $name = $this->input->post('name');
        $age = $this->input->post('age');
        $gender = $this->input->post('gender');
        $email = $this->input->post('email');
        $mobile = $this->input->post('mobile');
        $captcha = $this->input->post('captcha');
        $class_id = $this->input->post('class_id');
        $tutor_id = $this->input->post('tutor_id');
        $password = $this->input->post('password');
        $repassword = $this->input->post('repassword');
        $openid = $this->input->post('openid');
        $student_id = $this->input->post('student_id');

        $student_check = $this->music->select('student','id',array('username'=>$username));
        if($student_check){
            echo json_encode(array('success'=>'no','msg'=>$this->lang->line('username_exist')));exit;
        }

        $mobile_check = $this->music->select('student','id',array('mobile'=>$mobile));
        if($mobile_check){
            echo json_encode(array('success'=>'no','msg'=>$this->lang->line('mobile_exist')));exit;
        }
        $this->_verify_captcha($mobile,$captcha);
        if($password != $repassword){
            echo json_encode(array('success'=>'no','msg'=>$this->lang->line('wrong_password')));exit;
        }

        $this->_check_class($class_id);
        $this->_check_tutor($tutor_id);

        $student_data = array(
                                'username' => $username,
                                'en_name'  => $en_name,
                                'name'     => $name,
                                'age'      => $age,
                                'gender'   => $gender,
                                'email'    => $email,
                                'mobile'   => $mobile,
                                'class_id' => $class_id,
                                'password' => md5(md5($password.'music')),
                                'created'  => date('Y-m-d H:i:s')
                            );
        if($openid){
            $reslt  = $this->music->update('student',$student_data, array('openid'=>$openid));
            $resl_t = $this->music->select('student','id',array('openid'=>$openid));
            $insert_result = $resl_t[0]->id;
        }else{
            $numbe = $this->music->_generate_num('student','S');
            $student_data['numbe']    = $numbe;
            $insert_result = $this->music->insert('student',$student_data);
        }

        if($insert_result){
            $student_check = $this->music->select('student','*',array('id'=>$insert_result));
            $student_info = $student_check[0];

            $student_class = array('student_id'=>$student_info->id,'class_id'=>$class_id,'tutor_id' => $tutor_id);
            $student_class_check = $this->music->select('student_class','id',$student_class);
            if(!$student_class_check){
                $student_class_id = $this->music->insert('student_class', $student_class);
            }else{
                $student_class_id = $student_class_check[0]->id;
            }

            $this->session->set_userdata('student_session',$student_info);
            echo json_encode(array('success'=>'yes','msg'=>$this->lang->line('register_success'),'student_class_id'=>$student_class_id));exit;
        }else{
            echo json_encode(array('success'=>'no','msg'=>$this->lang->line('register_failure')));exit;
        }
    }
}
