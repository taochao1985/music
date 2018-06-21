<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

define('TOKEN', 'music');
class Wechat extends CI_Controller
{
    public $fromUsername;
    public $toUsername;
    public $T = 60;
    private $tokenFile;
    private $lastTimeFile;
    private $expire = 7000;
    private $token;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('music');
    }
    // 在微信平台上设置的对外 URL
    public function index()
    {
        if ($this->_valid()) {
            // 判读是不是只是验证
            $echostr = $this->input->get('echostr');
            if (!empty($echostr)) {
                $this->load->view('valid_view', array('output' => $echostr));
            } else {
                // 实际处理用户消息
                $this->_responseMsg();
            }
        } else {
            $this->load->view('valid_view', array('output' => 'Error!'));
        }
    }

    // 用于接入验证
    private function _valid()
    {
        return true;
        $token = TOKEN;

        $signature = $this->input->get('signature');
        $timestamp = $this->input->get('timestamp');
        $nonce = $this->input->get('nonce');

        $tmp_arr = array($token, $timestamp, $nonce);
        sort($tmp_arr);
        $tmp_str = implode($tmp_arr);
        $tmp_str = sha1($tmp_str);

        return $tmp_str == $signature;
    }

    // 这里是处理消息的地方，在这里拿到用户发送的字符串
    private function _responseMsg()
    {
        $post_str = $GLOBALS['HTTP_RAW_POST_DATA'];
        if (!empty($post_str)) {
            // 解析微信传过来的 XML 内容
            $postObj = simplexml_load_string($post_str, 'SimpleXMLElement', LIBXML_NOCDATA);
            $this->fromUsername = $postObj->FromUserName;
            $this->toUsername = $postObj->ToUserName;
            $keyword = trim($postObj->Content);
            $event = $postObj->Event;
            $time = time();
            $this->responseMsg($keyword, $event, $postObj);
        } else {
            $this->load->view('valid_view', array('output' => 'Error!'));
        }
    }


//according to event type
    public function responseMsg($keyword, $event, $postObj)
    {
        $this->_check_user($this->fromUsername);
        if (($event == 'subscribe') || ($event == 'unsubscribe')) {
            $resultStr = $this->_get_return_data($event);
        } else if ($event == 'event') {
            $resultStr = $this->_get_return_data($keyword);
        } else if ($event == 'CLICK') {
            if (($postObj->EventKey == 'register')||($postObj->EventKey == '注册')) {
                $resultStr = $this->_get_return_data('register');
            } else {
                $resultStr = $this->_get_return_data($postObj->EventKey);
            }
        }else {

            $resultStr = $this->_get_return_data($keyword);
        }
        echo $resultStr;
        exit;
    }

//generate the return data
    public function _get_return_data($keyword)
    {
        $textTpl = '<xml>
                                <ToUserName><![CDATA[%s]]></ToUserName>
                                <FromUserName><![CDATA[%s]]></FromUserName>
                                <CreateTime>%s</CreateTime>
                                <MsgType><![CDATA[%s]]></MsgType>
                                <Content><![CDATA[%s]]></Content>
                                <FuncFlag>0</FuncFlag>
                            </xml>
                           ';

        $singleImgTextTpl = '<xml>
                                <ToUserName><![CDATA[%s]]></ToUserName>
                                <FromUserName><![CDATA[%s]]></FromUserName>
                                <CreateTime>%s</CreateTime>
                                <MsgType><![CDATA[news]]></MsgType>
                                <ArticleCount>1</ArticleCount>
                                <Articles>
                                <item>
                                <Title><![CDATA[%s]]></Title>
                                <Description><![CDATA[%s]]></Description>
                                <PicUrl><![CDATA[%s]]></PicUrl>
                                <Url><![CDATA[%s]]></Url>
                                </item>
                                </Articles>
                                </xml> ';

        switch ($keyword) {
                                    case 'text':
                                        $msgType = 'text';
                                        $contentStr = 'Welcome to wechat world!';
                                        $resultStr = sprintf($textTpl, $this->fromUsername, $this->toUsername, time(), $msgType, $contentStr);
                                        break;
                                    case 'register':
                                         $resultStr = sprintf($singleImgTextTpl, $this->fromUsername, $this->toUsername, time(), '会员注册', '', base_url().'asset/images/logo.png', base_url().'front/wap_register/'.$this->fromUsername);
                                         break;

                                    case 'subscribe':

                                          $resultStr = $this->_subscribe();//$this->_singletext($this->fromUsername,$this->toUsername);//sprintf($textTpl, $this->fromUsername, $this->toUsername, time(), $msgType, $contentStr);
                                          break;

                                    case '消息':
                                          $this->_send_template_message($this->fromUsername);
                                          break;

                                    case 'unsubscribe':
                                          // other logical codes

                                          break;

                                    default:
                                        $resultStr = $this->_other_msg_response($keyword);
                                        break;
                                }
        return $resultStr;
    }

    public function _subscribe()
    {
        $openid = $this->fromUsername;
        $this->_check_user($openid);

        $text_follow = $this->music->select('configs', '*', array('type' => 'first_follow'));//$db->get_one("select * from configs where type='first_follow'");

       if ($text_follow) {
           return $this->_singletext($text_follow[0]->field_one);
       } else {
           $materials = $this->music->select('materials', '*', array('keywords' => 'first_follow'));//$db->get_one("select * from materials where keywords = 'first_follow'");

          if ($materials) {
              $materials = (array) $materials[0];
              $material = $materials[0];
              $material_con = array();
              if ($materials['type'] == 0) {
                  $material_con[] = $materials;
              } else {
                  $tem = array();
                  $temp_title = explode('|||', $material->title);
                  $temp_content = explode('|||', $material->content);
                  $temp_sourceurl = explode('|||', $material->source_url);
                  $temp_coverurl = explode('|||', $material->coverurl);
                  foreach ($temp_title as $k => $v) {
                      $tem[] = array(
                      'title' => $v,
                      'content' => isset($temp_content[$k]) ? $temp_content[$k] : '',
                      'source_url' => isset($temp_sourceurl[$k]) ? $temp_sourceurl[$k] : '',
                      'coverurl' => isset($temp_coverurl[$k]) ? $temp_coverurl[$k] : '',
                      'summary' => '',
                      );
                  }
                  $material_con = $tem;
              }
              $return_info = array();
              foreach ($material_con as $key => $value) {
                  if (trim($v['source_url']) == '') {
                      $url = base_url().'front/article_detail/'.$materials['id'].'/'.$key;
                  } else {
                      $url = $v['source_url'];
                  }
                  $return_info[] = array('title' => $value['title'],
                  'description' => $value['summary'],
                  'pic' => base_url().$value['coverurl'],
                  'url' => $url, );
              }

              return $this->_get_mul_text_imgs($return_info);
          }
       }
    }

    public function _other_msg_response($keyword)
    {
        $result = $this->music->select('materials', '*', array(), '', '', '', array('keywords' => $keyword));//$db->get_all("select * from materials where keywords like '%".$keyword."%'");
      $return_info = array();

        foreach ($result as $key => $value) {
            $value = (array) $value;
            if ($value['type'] == 'single') {
                $value = (array) $value;
                if (trim($value['source_url']) == '') {
                    $url = base_url().'front/article_detail/'.$value['id'].'/'.$key;
                } else {
                    $url = $value['source_url'];
                }
                $return_info[] = array('title' => $value['title'],
                  'description' => $value['summary'],
                  'pic' => base_url().$value['coverurl'],
                  'url' => $url, );
            } else {
                $material = (object) $value;
                $tem = array();
                $temp_title = explode('|||', $material->title);
                $temp_content = explode('|||', $material->content);
                $temp_sourceurl = explode('|||', $material->source_url);
                $temp_coverurl = explode('|||', $material->coverurl);
                foreach ($temp_title as $k => $v) {
                    $tem[] = array(
                      'title' => $v,
                      'content' => isset($temp_content[$k]) ? $temp_content[$k] : '',
                      'source_url' => isset($temp_sourceurl[$k]) ? $temp_sourceurl[$k] : '',
                      'coverurl' => isset($temp_coverurl[$k]) ? $temp_coverurl[$k] : '',
                      'summary' => '',
                      );
                }
                foreach ($tem as $k => $v) {
                    if (trim($v['source_url']) == '') {
                        $url = base_url().'front/article_detail/'.$material->id.'/'.$k;
                    } else {
                        $url = $v['source_url'];
                    }
                    $return_info[] = array('title' => $v['title'],
                  'description' => $v['summary'],
                  'pic' => base_url().$v['coverurl'],
                  'url' => $url, );
                }
            }
        }
        //  error_log(print_r($return_info,true),3,'/home/www/auto.txt');
      return $this->_get_mul_text_imgs($return_info);
    }

    public function _singletext($contentStr)
    {
        $textTpl = '<xml>
                                <ToUserName><![CDATA[%s]]></ToUserName>
                                <FromUserName><![CDATA[%s]]></FromUserName>
                                <CreateTime>%s</CreateTime>
                                <MsgType><![CDATA[%s]]></MsgType>
                                <Content><![CDATA[%s]]></Content>
                                <FuncFlag>0</FuncFlag>
                            </xml>
                           ';
        $msgType = 'text';

        return sprintf($textTpl, $this->fromUsername, $this->toUsername, time(), $msgType, $contentStr);
    }

    private function _get_mul_text_imgs($ext_info)
    {
        $str = '<xml>
             <ToUserName><![CDATA['.$this->fromUsername.']]></ToUserName>
             <FromUserName><![CDATA['.$this->toUsername.']]></FromUserName>
             <CreateTime>'.time().'</CreateTime>
             <MsgType><![CDATA[news]]></MsgType>';

        $str .= '<ArticleCount>'.count($ext_info).'</ArticleCount> <Articles>';
        foreach ($ext_info as $k => $einfo) {
            $str .= '<item> <Title><![CDATA['.$einfo['title'].']]></Title>
                        <Description><![CDATA['.$einfo['description'].']]></Description>
                        <PicUrl><![CDATA['.$einfo['pic'].']]></PicUrl>
                        <Url><![CDATA['.$einfo['url'].']]></Url>
                       </item>';
        }
        $str .= '</Articles>';
        $str .= '</xml>';

        return $str;
    }

    private function _get_userinfo($openid)
    {
        $access_token = $this->_get_access_token();
        $request_url = 'https://api.weixin.qq.com/cgi-bin/user/info?access_token='.$access_token.'&openid='.$openid.'&lang=zh_CN';

        return  $this->_get_request($request_url);
    }

    private function _send_template_message($openid)
    {
        $userinfo = $this->_get_userinfo($openid);
        $openid = (array) $openid;
        $send_data = array(
        'touser' => $openid[0],
        'template_id' => 'Yqn0erqYJIJOzuLqVlxhJbDCSqk9V9TkhXTN7Ei3MNs',
        'url' => 'http://www.baidu.com',
        'data' => array(
            'first' => array('value' => '您有一个模板消息', 'color' => '#173177'),
            'user' => array('value' => $userinfo['nickname'], 'color' => '#dd4000'),
            'reason' => array('value' => 'Wechat demo'),
            'address' => array('value' => date('Y-m-d H:i:s')),
            'remark' => array('value' => 'Be Happy'),
            ),
        );

        $access_token = $this->_get_access_token();
        $request_url = 'https://api.weixin.qq.com/cgi-bin/message/template/send?access_token='.$access_token;

        //$menu_data = json_encode($menu_array);
        $send_data = json_encode($send_data, JSON_UNESCAPED_UNICODE);
        $send_data = urldecode($send_data);
        $create_result = $this->_post_request($request_url, $send_data);
    }

    public function _check_user($openid)
    {
        $result = $this->music->select('student', '*', array('openid' => $openid));
        if (!empty($result)) {
            $student_info = $result[0];
            $this->session->set_userdata('student_session', $student_info);

            return true;
        } else {
            $user_info = $this->_get_userinfo($openid);
            $last_num = $this->music->select('student', 'numbe', array(), 1, 0, array('id' => 'desc'));

            if (!empty($last_num)) {
                $num = $this->_generate_num($last_num[0]->numbe);
            } else {
                $num = 'S000001';
            }
            $save_dir = 'asset/thumb';
            $image_new_name = $this->generate_code(10).'.jpg';
            $image = $this->getImage($user_info['headimgurl'], $save_dir, $image_new_name, 1);

            $student_data = array('numbe' => $num, 'openid' => $openid, 'created' => date('Y-m-d H:i:s'),
          'wechat_nickname' => $user_info['nickname'],
          'wechat_thumb' => $image['save_path'], );
            $this->music->insert('student', $student_data);
            $result = $this->music->select('student', '*', array('openid' => $openid));
            $student_info = $result[0];
            $this->session->set_userdata('student_session', $student_info);
        }
    }

    private function _get_access_token()
    {
        $wei_config = $this->music->select('configs', '*', array('type' => 'weichat_config'));
        $weiconfig = $wei_config[0];

        $appid = trim($weiconfig->field_one);
        $appsecret = trim($weiconfig->field_two);

        $this->tokenFile = 'asset/token_login.txt';
        $this->lastTimeFile = 'asset/token_last.txt';
        /*$this->cookieFile =  $touser.'_cookie.txt';

        if(!file_exists($this->cookieFile)){
            $fh = fopen($this->cookieFile,"w");
            fclose($fh);
        }*/

        if (!file_exists($this->tokenFile)) {
            $fh = fopen($this->tokenFile, 'w');
            fclose($fh);
        }

        if (!file_exists($this->lastTimeFile)) {
            $fh = fopen($this->lastTimeFile, 'w');
            fclose($fh);
        }

        $needLogin = true;
        $nowTime = time();
        if ($lastTime = file_get_contents($this->lastTimeFile)) {
        } else {
            $lastTime = 0;
        }

        if (($nowTime - $lastTime) <= $this->expire) {
            $needLogin = false;
        }

        if ($needLogin == true) {
            $url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$appid.'&secret='.$appsecret;

            $token = $this->_get_request($url);
            $token = $token['access_token'];
            if ($token) {
                file_put_contents($this->lastTimeFile, $nowTime);
                file_put_contents($this->tokenFile, $token);
                $this->token = $token;

                return $token;
            } else {
                return false;
            }
        } else {
            if ($token = file_get_contents($this->tokenFile)) {
                $this->token = $token;

                return $token;
            } else {
                return false;
            }
        }
    }

    public function getImage($url, $save_dir = '', $filename = '', $type = 0)
    {
        if (trim($url) == '') {
            return array('file_name' => '', 'save_path' => '', 'error' => 1);
        }
        if (trim($save_dir) == '') {
            $save_dir = './';
        }
        if (trim($filename) == '') {
            //保存文件名
      $ext = strrchr($url, '.');
            if ($ext != '.gif' && $ext != '.jpg') {
                return array('file_name' => '', 'save_path' => '', 'error' => 3);
            }
            $filename = time().$ext;
        }
        if (0 !== strrpos($save_dir, '/')) {
            $save_dir .= '/';
        }
    //创建保存目录
    if (!file_exists($save_dir) && !mkdir($save_dir, 0777, true)) {
        return array('file_name' => '', 'save_path' => '', 'error' => 5);
    }
    //获取远程文件所采用的方法
    if ($type) {
        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $img = curl_exec($ch);
        curl_close($ch);
    } else {
        ob_start();
        readfile($url);
        $img = ob_get_contents();
        ob_end_clean();
    }

    //$size=strlen($img);
    //文件大小
    $fp2 = @fopen('/home/www/music/'.$save_dir.$filename, 'a');
        fwrite($fp2, $img);
        fclose($fp2);
    //unset($img,$url);
    return array('file_name' => $filename, 'save_path' => $save_dir.$filename, 'error' => 0);
    }

    public function _get_request($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        $jsoninfo = json_decode($output, true);

        return $jsoninfo;
    }

    public function generate_code($len = 10)
    {
        $chars = '0123456789';

        for ($i = 0, $count = strlen($chars); $i < $count; ++$i) {
            $arr[$i] = $chars[$i];
        }

        mt_srand((double) microtime() * 1000000);
        shuffle($arr);
        $code = substr(implode('', $arr), 0, $len);

        return $code;
    }

    public function _generate_num($num)
    {
        $l = strlen(intval(ltrim($num, 'S')));
        $next_num = intval(ltrim($num, 'S'));
        $j = 'S';
        for ($i = 0; $i < 6 - $l; ++$i) {
            $j .= '0';
        }
        ++$next_num;
        $t = strlen($next_num);
        $tt = substr($next_num, $t - 1, $t);
        if ($tt == 4) {
            ++$next_num;
        }

        return $j.$next_num;
    }

    // 解析用户输入的字符串
    private function _parseMessage($message)
    {
        log_message('debug', $message);

        // TODO: 在这里做一些字符串解析，比如分析某关键字，返回什么信息等等

        return '解析后的结果，会直接回复给用户';
    }
}
