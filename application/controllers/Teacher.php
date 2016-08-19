<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends CI_Controller {
    public $_session_language;
    function __construct()
    {
        parent::__construct();
        define('ORDER_CREATED', 10);
        define('ORDER_PAYED', 20);
        $session_language = $this->session->userdata('user_language')?$this->session->userdata('user_language'):'chinese';
        $this->_session_language = $session_language;
        $teacher_session = $this->session->userdata('teacher_session');

        if(!$teacher_session){
            redirect('/front/index');
        }
        $this->load->model("music");
        $this->lang->load('page_lang', $session_language);
    }


    function suggest_song(){
        $class = $this->music->select('suggest_song');
        foreach ($class as $key => $value) {

          $temp_level_name = $this->music->select('base_info','name',array('id'=>$value->level_id));
          if($temp_level_name){
            $level_name = $temp_level_name[0]->name;
          }else{
            $level_name = '';
          }
          $temp_instrument = $this->music->select('base_info','name',array('id'=>$value->instrument_id));
          if($temp_instrument){
            $temp_instrument_name = $temp_instrument[0]->name;
          }else{
            $temp_instrument_name = '';
          }
          $class[$key]->instrument = $temp_instrument_name;
          $class[$key]->level_name    = $level_name;
        }
        $data['suggest_song'] = $class;
        $this->load->view('teacher/suggest_song',$data);
    }


    function suggest_video(){
        $class = $this->music->select('suggest_video');
        foreach ($class as $key => $value) {

          $temp_level_name = $this->music->select('base_info','name',array('id'=>$value->level_id));
          if($temp_level_name){
            $level_name = $temp_level_name[0]->name;
          }else{
            $level_name = '';
          }
          $temp_instrument = $this->music->select('base_info','name',array('id'=>$value->instrument_id));
          if($temp_instrument){
            $temp_instrument_name = $temp_instrument[0]->name;
          }else{
            $temp_instrument_name = '';
          }
          $class[$key]->instrument = $temp_instrument_name;
          $class[$key]->level_name    = $level_name;
        }
        $data['suggest_video'] = $class;

        $this->load->view('teacher/suggest_video',$data);
    }


    function ajax_delete_data(){
        $id = $this->input->post('id');
        $class_roll_call = $this->music->select('class_roll_call','id',array('class_course_teacher_id'=>$id));
        if($class_roll_call){
            echo json_encode(array('success'=>'no'));exit;
        }else{
            $this->music->delete('class_course_teacher',array('id'=>$id));
            echo json_encode(array('success'=>'yes','msg'=>'Success'));exit;
        }
    }

    function update_roll_call_data(){
        $course_class_teacher_id = $this->input->post('course_class_teacher_id');
        $student_id              = $this->input->post('student_id');
        $instrument_id           = $this->input->post('instrument_id');
        $comment_select          = $this->input->post('comment_select');
        $comment_input           = $this->input->post('comment_input');

        if($comment_input){
            $comment_check = $this->music->select('instrument_comments','*',array('instrument_id'=>$instrument_id,'comment'=>$comment_input));
            if(!$comment_check){
                $comment_select = $this->music->insert('instrument_comments',array('instrument_id'=>$instrument_id,'comment'=>$comment_input));
            }
        }

        $this->_do_roll_call($course_class_teacher_id, $student_id, '', $comment_select);
        echo json_encode(array('success'=>'yes','msg'=>'Success'));exit;
    }


    function do_roll_call(){
        $course_class_teacher_id = $this->input->post('course_class_teacher_id');
        $type                    = $this->input->post('type');
        $student_id              = $this->input->post('student_id');

        $this->_do_roll_call($course_class_teacher_id, $student_id, $type, 0);

        echo json_encode(array('success'=>'yes'));exit;
    }

    function _do_roll_call($course_class_teacher_id, $student_id, $type, $comment_id){
        $temp = $this->music->select('class_course_teacher','class_id',array('id'=>$course_class_teacher_id));
        $class_id = $temp[0]->class_id;

        $check_data = array('class_id'=>$class_id,'class_course_teacher_id'=>$course_class_teacher_id,'student_id'=>$student_id);
        $check_result = $this->music->select('class_roll_call','*',$check_data);
        if($comment_id){
                $check_data['comment_id']   = $comment_id;
            if(!$check_result){

                $check_data['comment_time'] = date('Y-m-d H:i:s');
                $this->music->insert('class_roll_call', $check_data);
            }else{
                $this->music->update('class_roll_call', $check_data, array('id'=>$check_result[0]->id));
            }
        }else{

            if(($type == 'check')&&(!$check_result)){
                $check_data['comment_id']   = $comment_id;
                $check_data['comment_time'] = date('Y-m-d H:i:s');
                $this->music->insert('class_roll_call', $check_data);
            }else{
                if($check_result){
                    $this->music->delete('class_roll_call', $check_data);
                }
            }
        }
        return true;
    }

    function course_roll_call(){
        $id = $this->uri->segment(3);
        if($this->_session_language == 'chinese'){
            $field = 'student.name,student.id,class.numbe,class_course_teacher.lession_no';
        }else {
            $field = 'student.en_name as name,student.id,class.numbe,class_course_teacher.lession_no';
        }
        $sql = "select class.instrument_id,".$field." from student,student_class,class_course_teacher,class where ";
        $sql.= " class.id = class_course_teacher.class_id and student_class.class_id = class_course_teacher.class_id ";
        $sql.= " and student_class.student_id = student.id and class_course_teacher.id = ".$id;
        $student = $this->music->personal_select($sql);

        foreach($student as $k=>$v){
            $roll_call = $this->music->select('class_roll_call','*',array('class_course_teacher_id'=>$id,'student_id'=>$v->id));
            if($roll_call){
                $call_flag = 1;
                $comment_id = $roll_call[0]->comment_id;
                $homework_flag = $roll_call[0]->homework_flag;
            }else{
                $call_flag = 0;
                $comment_id = 0;
                $homework_flag = 0;
            }
            $student[$k]->homework_flag = $homework_flag;
            $student[$k]->call_flag = $call_flag;
            $student[$k]->comment_id = $comment_id;
        }
        $data['student'] = $student;
        $data['course_class_teacher_id'] = $id;
        $data['comment_select'] = $this->music->select('instrument_comments','*',array('instrument_id'=>$student[0]->instrument_id));
        $this->load->view('teacher/course_roll_call', $data);
    }

    function index(){
        $teacher_info = $this->top();
        $sql = "select class.instrument_id,class.numbe as class_numbe,class.level_id as class_level, student_class.class_id from student_class,class where class.id = student_class.class_id and student_class.tutor_id = ". $teacher_info->id;
        $temp_class = $this->music->personal_select($sql);
        if($temp_class){

            $first_class = $temp_class[0];
            $data['first_numbe'] = $first_class->class_numbe;
            $data['first_class_id'] = $first_class->class_id;
            $data['class'] = $temp_class;
            $data['map_plan'] = $this->_get_class_course_map_plan($temp_class[0]->instrument_id);
        }else{
            $data['first_numbe'] = $data['first_class_id'] = $data['class'] = $data['map_plan'] = '';
        }
        $class_course = $this->music->select('class_course_teacher','*',array('teacher_id'=>$teacher_info->id));
        if($class_course){
            if($this->_session_language == 'chinese'){
                $field = 'name,id';
            }else {
                $field = 'en_name as name,id';
            }
            foreach ($class_course as $key => $value) {
                $temp_class   = $this->music->select('class','class_start_time,class_end_time,class_week,numbe,instrument_id',array('id'=>$value->class_id));
                if($temp_class){
                    $class_numbe = $temp_class[0]->numbe;
                }else{
                    $class_numbe = '';
                }
                $homework     = $this->_get_course_config_name($field, $value->course_homework);
                $suggest_song = $this->_get_course_config_name($field, $value->course_suggest_song);
                $value->content      = $value->course_content;
                $value->material     = $value->course_material;
                $value->homework     = $homework;
                $value->suggest_song = $suggest_song;
                $value->class_numbe  = $class_numbe;
                $value->instrument_id= $temp_class[0]->instrument_id;
                $value->class_start_time= $temp_class[0]->class_start_time;
                $value->class_end_time= $temp_class[0]->class_end_time;
                $value->class_week= $temp_class[0]->class_week;
                $class_course[$key]  = $value;
            }
        }else{
            $class_course = array();
        }


        $data['class_course'] = $class_course;
       // echo '<pre>';print_r($data);exit;
        $this->load->view('teacher/index', $data);
    }

    function ajax_get_class_map_plan(){
        $teacher_info = $this->top();
        $instrument_id = intval($_POST['instrument_id']);
        $map_plan = $this->_get_class_course_map_plan($instrument_id);
        echo json_encode(array('success'=>'yes','msg'=>$map_plan));exit;
    }


    function _get_class_course_map_plan($instrument_id){
        $temp_course_map  = $this->music->select('course_map_plan','*',array('instrument_id'=>$instrument_id,'type'=>'map'));
        $temp_course_plan = $this->music->select('course_map_plan','*',array('instrument_id'=>$instrument_id,'type'=>'plan'));
        $temp_course_intro = $this->music->select('course_map_plan','*',array('instrument_id'=>$instrument_id,'type'=>'intro'));
        $class_map = array();
        if($temp_course_map){
            $class_map = $temp_course_map[0];
        }
        $class_plan = array();
        if($temp_course_plan){
            $class_plan = $temp_course_plan[0];
        }
        $class_intro = array();
        if($temp_course_intro){
            $class_intro = $temp_course_intro[0];
        }

        return array('map'=>$class_map,'plan'=>$class_plan,'intro'=>$class_intro);
    }


    function _get_course_config_name($field, $course_content){
        $content = '';
        if($course_content){
            $course_content = explode(',', $course_content);
            foreach($course_content as $k=>$v){
                $temp_con = $this->music->select('course_config',$field,array('id'=>$v));
                if($temp_con){
                    $content.= $temp_con[0]->name.',';
                }
            }
        }

        return rtrim($content, ',');
    }

    function create_course(){
        if($_POST){
            $class_id            = $this->input->post('class_id');
            $lession_no         = $this->input->post('lession_no');
            $teacher_id          = $this->input->post('teacher_id');
            $id                  = $this->input->post('id');
            $course_content      = $this->input->post('course_content');
            $course_material     = $this->input->post('course_material');
            $course_homework     = $this->input->post('course_homework');
            $course_subject      = $this->input->post('course_subject');
            $copy_flag           = $this->input->post('copy_flag');
            $course_suggest_song = $this->input->post('course_suggest_song');
            $course_suggest_video= $this->input->post('course_suggest_video');
            $course_suggest_files_url = $this->input->post('course_suggest_files_url');
            $course_suggest_file_name = $this->input->post('course_suggest_file_name');

            $temp_class = $this->music->select('class','instrument_id',array('id'=>$class_id));
            $instrument_id = $temp_class[0]->instrument_id;
            $class_course = array(
                                'class_id' => $class_id,
                                'instrument_id'=>$instrument_id,
                                'lession_no'=>$lession_no,
                                'course_content'=>$course_content,
                                'course_material'=>$course_material,
                                'course_homework'=>$course_homework,
                                'course_subject'=>$course_subject,
                                'course_suggest_song'=>$course_suggest_song,
                                'course_suggest_video'=>$course_suggest_video,
                                'course_suggest_files_url'=>rtrim($course_suggest_files_url,';'),
                                'course_suggest_file_name'=>rtrim($course_suggest_file_name,'<br>'),
                                'teacher_id'=>$teacher_id
                            );
            if($id){
                $result = $this->music->update('class_course_teacher',$class_course,array('id'=>$id));
            }else{
                $class_course['created'] = date('Y-m-d H:i:s');
                $result = $this->music->insert('class_course_teacher',$class_course);
            }

            if($result){
                echo json_encode(array('success'=>'yes','msg'=>'Success'));exit;
            }else{
                echo json_encode(array('success'=>'no','msg'=>'Failure'));exit;
            }
        }else{
            $course_class_id = $this->uri->segment(3);
            $copy_flag       = $this->uri->segment(4);
            $class_id        = $this->uri->segment(5);
            $exist_old       = 0 ;

            $teacher_info = $this->top();
            $class_sql = "select class.level_id,class.instrument_id,class.id as class_id,class.numbe as class_numbe from student_class,class where class.id = student_class.class_id and student_class.tutor_id = ".$teacher_info->id;
            $already_course_count = $this->music->select_count_where('class_course_teacher',array('class_id'=>$class_id));
            if($class_id){
                $class_sql.=" and class.id = ".$class_id;
            }

            $data['last_course_no'] = ++$already_course_count;
            $temp_info = $this->music->personal_select($class_sql);

            if($course_class_id || (!$course_class_id && !$copy_flag)){
                if(!$course_class_id && !$copy_flag){
                    $course_class = $this->music->select('class_course_teacher','*',array('instrument_id'=>$temp_info[0]->instrument_id,'lession_no'=>$already_course_count));
                    if($course_class){
                        $exist_old = 1;
                    }

                }else{
                    $course_class = $this->music->select('class_course_teacher','*',array('id'=>$course_class_id));
                }
                if($course_class){
                    $course_class = $course_class[0];
                    $data['lession_no'] = $course_class->lession_no;
                    $data['course_class_id']     = $course_class->class_id;
                    $data['course_class']        = $course_class;
                    $data['course_suggest_song_selected'] = explode(',', $course_class->course_suggest_song);
                    $data['course_suggest_video_selected'] = explode(',', $course_class->course_suggest_video);
                }else{
                    $data['lession_no'] = '';

                }
            }
            $data['exist_old'] = $exist_old;
            $data['course_class_teacher_id'] = $course_class_id;

            $data['copy_flag'] = $copy_flag;
            $temp_class = $this->music->personal_select($class_sql);
            $data['class'] = $temp_class;
            if($this->_session_language == 'chinese'){
                $field = 'name,id';
            }else {
                $field = 'en_name as name,id';
            }
            $data['teacher_id'] = $teacher_info->id;
            $suggest_videos = $this->music->select('suggest_video','*',array('instrument_id'=>$temp_info[0]->instrument_id,'level_id'=>$temp_info[0]->level_id));
            foreach($suggest_videos as $k=>$v){
                $temp_level = $this->music->select('base_info',$field,array('id'=>$v->level_id));
                $level_name = $temp_level[0]->name;

                $temp_instrument = $this->music->select('base_info',$field,array('id'=>$v->instrument_id));
                $instrument_name = $temp_instrument[0]->name;

                $suggest_videos[$k]->level_name = $level_name;
                $suggest_videos[$k]->instrument_name = $instrument_name;
            }
            $data['course_suggest_video'] = $suggest_videos;

            $suggest_songs = $this->music->select('suggest_song','*',array('instrument_id'=>$temp_info[0]->instrument_id,'level_id'=>$temp_info[0]->level_id));
            foreach($suggest_songs as $k=>$v){
                $temp_level = $this->music->select('base_info',$field,array('id'=>$v->level_id));
                $level_name = $temp_level[0]->name;

                $temp_instrument = $this->music->select('base_info',$field,array('id'=>$v->instrument_id));
                $instrument_name = $temp_instrument[0]->name;

                $suggest_songs[$k]->level_name = $level_name;
                $suggest_songs[$k]->instrument_name = $instrument_name;
            }
            $data['course_suggest_song'] = $suggest_songs;
            $data['map_plan'] = $this->_get_class_course_map_plan($temp_class[0]->instrument_id);

            $this->load->view('teacher/create_course', $data);
        }
    }


    function top(){
        $teacher_session = $this->session->userdata('teacher_session');
        return $teacher_session;
    }
}