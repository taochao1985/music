<?php
/**
  * wechat php test
  */
require_once("db.php"); //引入数据库类
$db = new DB();
define("TOKEN", $_GET['token']);
define("serverip", $_SERVER['HTTP_HOST']);
$wechatObj = new wechatCallbackapiTest();

if (isset($_GET['echostr'])){
  $wechatObj->valid();
}

$wechatObj->response($db);

class wechatCallbackapiTest
{
    public $fromUsername;
    public $toUsername;
    public $T=60;
    private $tokenFile;
    private $lastTimeFile;
    private $expire = 7000;
    private $token;

    public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
            echo $echoStr;
            exit;
        }
    }


//wechat response func
    public function response($db)
    {

        //get post data, May be due to the different environments
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

        //extract post data
        if (!empty($postStr)){
                /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
                   the best way is to check the validity of xml by yourself */
                //libxml_disable_entity_loader(true);
                $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $this->fromUsername = $postObj->FromUserName;
                $this->toUsername = $postObj->ToUserName;
                $keyword = trim($postObj->Content);
                $event   = $postObj->Event;
                $time = time();

                // error_log(print_r($postObj,true),3,'/home/www/tp/ll.txt');
                if(!empty($keyword)){
                    $this->responseMsg($db,$keyword,$event);
                }else{
                    if($postObj->Event != 'TEMPLATESENDJOBFINISH'){
                        $this->responseMsg($db,$postObj->EventKey,$event);
                    }
                }

        }else {
            echo "";
            exit;
        }
    }


//according to event type
    function responseMsg($db,$keyword,$event){


              if(($event == 'subscribe')||($event == 'unsubscribe')){
                    $resultStr = $this->_get_return_data($db,$event);


              }else if($event == 'event'){

                    $resultStr = $this->_get_return_data($db,$keyword);

              }else{

                    $resultStr = $this->_get_return_data($db,$keyword);
              }

            echo $resultStr;exit;
    }



//generate the return data
    public function _get_return_data($db,$keyword){

                $textTpl = "<xml>
                                <ToUserName><![CDATA[%s]]></ToUserName>
                                <FromUserName><![CDATA[%s]]></FromUserName>
                                <CreateTime>%s</CreateTime>
                                <MsgType><![CDATA[%s]]></MsgType>
                                <Content><![CDATA[%s]]></Content>
                                <FuncFlag>0</FuncFlag>
                            </xml>
                           ";

                $singleImgTextTpl = "<xml>
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
                                </xml> ";

                switch ($keyword) {
                                    case 'text':
                                        $msgType = "text";
                                        $contentStr = "Welcome to wechat world!";
                                        $resultStr = sprintf($textTpl, $this->fromUsername, $this->toUsername, time(), $msgType, $contentStr);
                                        break;
                                   /* case '图文':
                                         $resultStr = sprintf($singleImgTextTpl, $this->fromUsername, $this->toUsername, time(), '图文测试消息', '图文消息简介','http://demo.legendtao1985.com/getheadimg.jpeg','http://www.smm.cn');
                                         break;
                                    case '多图文':
                                          $return_info = array(
                                                          array('title'=>'多图文标题1','description'=>'多图文简介1','pic'=>'http://demo.legendtao1985.com/getheadimg.jpeg','url'=>'http://www.smm.cn'),
                                                          array('title'=>'多图文标题2','description'=>'多图文简介2','pic'=>'http://demo.legendtao1985.com/1.jpeg','url'=>'http://www.smm.cn'),
                                                          array('title'=>'多图文标题3','description'=>'多图文简介3','pic'=>'http://demo.legendtao1985.com/2.jpeg','url'=>'http://www.smm.cn'),
                                                          array('title'=>'多图文标题4','description'=>'多图文简介4','pic'=>'http://demo.legendtao1985.com/3.jpeg','url'=>'http://www.smm.cn'),
                                                          array('title'=>'多图文标题5','description'=>'多图文简介5','pic'=>'http://demo.legendtao1985.com/4.jpeg','url'=>'http://www.smm.cn')
                                           );

                                          $resultStr = $this->_get_mul_text_imgs($return_info);
                                          break;
                                    case 'token':
                                          $access_token = $this->_get_access_token();
                                          $msgType = "text";
                                          $contentStr = $access_token;
                                          $resultStr = sprintf($textTpl, $this->fromUsername, $this->toUsername, time(), $msgType, $contentStr);

                                          break;

                                    case '创建菜单':
                                          $this->_create_wechat_menu();
                                          break;

                                    case 'get_menu':
                                          $this->_get_wechat_menu();
                                          $contentStr = 'Success';
                                          $msgType = "text";
                                          $resultStr = sprintf($textTpl, $this->fromUsername, $this->toUsername, time(), $msgType, $contentStr);

                                          break;

                                    case 'delete_menu':
                                          $this->_delete_wechat_menu();
                                          $contentStr = 'Success';
                                          $msgType = "text";
                                          $resultStr = sprintf($textTpl, $this->fromUsername, $this->toUsername, time(), $msgType, $contentStr);
                                          break;
                                    */
                                    case 'subscribe':

                                          $resultStr = $this->_subscribe($db);//$this->_singletext($this->fromUsername,$this->toUsername);//sprintf($textTpl, $this->fromUsername, $this->toUsername, time(), $msgType, $contentStr);
                                          break;

                                    case '消息':
                                          $this->_send_template_message($this->fromUsername);
                                          break;


                                    case 'unsubscribe':
                                          // other logical codes

                                          break;

                                    default:
                                        $resultStr = $this->_other_msg_response($db, $keyword);
                                        break;
                                }

                    return $resultStr;
    }

    function _singletext($contentStr){
      $textTpl = "<xml>
                                <ToUserName><![CDATA[%s]]></ToUserName>
                                <FromUserName><![CDATA[%s]]></FromUserName>
                                <CreateTime>%s</CreateTime>
                                <MsgType><![CDATA[%s]]></MsgType>
                                <Content><![CDATA[%s]]></Content>
                                <FuncFlag>0</FuncFlag>
                            </xml>
                           ";
      $msgType = "text";
      return sprintf($textTpl, $this->fromUsername, $this->toUsername, time(), $msgType, $contentStr);
    }

    function _other_msg_response($db, $keyword){
      $result = $db->get_all("select * from materials where keywords like '%".$keyword."%'");
      $return_info = array();

      foreach ($result as $key => $value) {
         if($value['type'] == 'single'){
            $value  = unserialize($value['content']);
            if(trim($value['source_url'])==''){
                $url = "http://".serverip.'/front/article_detail/'.$value['id'].'/'.$key;
              }else{
                $url = $value['source_url'];
              }
            $return_info[] = array('title'=>$value['title'],
                  'description'=>$value['summary'],
                  'pic'=>"http://".serverip.$value['coverurl'],
                  'url'=>$url);

         }else{

            $values  = unserialize($value['content']);
            foreach($values as $k=>$v){
              if(trim($v['source_url'])==''){
                $url = "http://".serverip.'/front/article_detail/'.$value['id'].'/'.$key;
              }else{
                $url = $v['source_url'];
              }
              $return_info[] = array('title'=>$v['title'],
                  'description'=>$v['summary'],
                  'pic'=>"http://".serverip.$v['coverurl'],
                  'url'=>$url);
                 }
            }
         }
      return $this->_get_mul_text_imgs($return_info);
    }

    function _check_user($db, $openid){
      $result = $db->get_one("select * from student where openid='".$openid."'");
      if(!empty($result)){
        return true;
      }else{
         $last_num = $db->get_one("select `numbe` from student order by numbe desc limit 1 ");
         if(!empty($last_num)){
            $num = $this->_generate_num($last_num['numbe']);
         }else{
            $num = 'T000001';
         }

        $db->get_one("insert into student (`numbe`,`openid`,`created`) values ('".$num."','".$openid."','".date('Y-m-d H:i:s')."')");
      }
    }

    function _generate_num($num){
       $l = strlen(intval(ltrim($num,'T')));
       $next_num = intval(ltrim($num,'T'));
       $j = 'T';
       for($i = 0; $i< 6-$l; $i++){
        $j.='0';
       }
       return $j.++$next_num;
    }


    function _subscribe($db){
       $openid = $this->fromUsername;
       $this->_check_user($db, $openid);


       $text_follow = $db->get_one("select * from configs where type='first_follow'");
       if($text_follow){
          return $this->_singletext($text_follow['field_one']);
       }else{
          $materials = $db->get_one("select * from materials where keywords = 'first_follow'");
          if($materials){
            $material_content = unserialize($materials['content']);
            $material_con = array();
            if($materials['type'] == 0){
               $material_con[] = $material_content;
            }else{
               $material_con = $material_content;
            }
            $return_info = array();
            foreach ($material_con as $key => $value) {
              if(trim($v['source_url'])==''){
                $url = "http://".serverip.'/front/article_detail/'.$materials['id'].'/'.$key;
              }else{
                $url = $v['source_url'];
              }
                $return_info[] = array('title'=>$value['title'],
                  'description'=>$value['summary'],
                  'pic'=>"http://".serverip.$value['coverurl'],
                  'url'=>$url);
                 }

            return $this->_get_mul_text_imgs($return_info);
          }
       }
    }


//send template message to follower
    private function _send_template_message($openid){
       $userinfo = $this->_get_userinfo($openid);

       $openid =(array)$openid;
       $send_data = array(
        'touser'=>$openid[0],
        'template_id'=>'Yqn0erqYJIJOzuLqVlxhJbDCSqk9V9TkhXTN7Ei3MNs',
        'url'=>'http://www.baidu.com',
        'data'=>array(
            'first'=>array('value'=>'您有一个模板消息','color'=>'#173177'),
            'user'=>array('value'=>$userinfo['nickname'],'color'=>'#dd4000'),
            'reason'=>array('value'=>'Wechat demo'),
            'address'=>array('value'=>date('Y-m-d H:i:s')),
            'remark'=>array('value'=>'Be Happy')
            )
        );

        $access_token = $this->_get_access_token();
        $request_url = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=".$access_token;

        //$menu_data = json_encode($menu_array);
        $send_data = json_encode($send_data,JSON_UNESCAPED_UNICODE);
        $send_data = urldecode($send_data);
        $create_result = $this->_post_request($request_url,$send_data);
    }



//get_userinfo by openid
    private function _get_userinfo($openid){
        $access_token = $this->_get_access_token();
        $request_url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$access_token."&openid=".$openid."&lang=zh_CN";
       // $userinfo = $this->_get_request($request_url);
        //error_log(print_r())
        return  $this->_get_request($request_url);

    }




//delete wechat_menu
    private function _delete_wechat_menu(){
        $access_token = $this->_get_access_token();
        $request_url = "https://api.weixin.qq.com/cgi-bin/menu/delete?access_token=".$access_token;

        return  $this->_get_request($request_url);
    }



//get wechat_menu
    private function _get_wechat_menu(){
        $access_token = $this->_get_access_token();
        $request_url = "https://api.weixin.qq.com/cgi-bin/menu/get?access_token=".$access_token;

        return  $this->_get_request($request_url);
    }


//create wechat_menu
    private function _create_wechat_menu(){
        $menu_array = array(
                'button'=>array(
                                array(
                                        'type'=>'click',
                                        'name'=>'文本消息',
                                        'key' =>'text'
                                        ),
                                array(
                                    'name'=>'大菜单',
                                    'sub_button'=>array(
                                                        array(
                                                            'type'=>'view',
                                                            'name'=>'Smm',
                                                            'url' =>'http://3g.smm.cn'
                                                            ),
                                                        array(
                                                            'type'=>'view',
                                                            'name'=>'Youku',
                                                            'url' =>'http://www.youku.com'
                                                            ),
                                                        array(
                                                            'type'=>'click',
                                                            'name'=>'图文',
                                                            'key' =>'图文'
                                                            )
                                        )
                                    ),
                                array(

                                        'name'=>'菜单操作',
                                        'sub_button'=>array(
                                                            array(
                                                                'type'=>'click',
                                                                'name'=>'获取菜单',
                                                                'key' =>'get_menu'
                                                                ),
                                                            array(
                                                                'type'=>'click',
                                                                'name'=>'删除菜单',
                                                                'key' =>'delete_menu'
                                                                ),
                                            )
                                        )

            )
        );
        $access_token = $this->_get_access_token();
        $request_url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$access_token;

        //$menu_data = json_encode($menu_array);
        $menu_data = json_encode($menu_array,JSON_UNESCAPED_UNICODE);
        $menu_data = urldecode($menu_data);


        $create_result = $this->_post_request($request_url,$menu_data);

        error_log(print_r($create_result,true),3,'/home/www/tp/create_result.txt');

    }



 function _post_request($url,$data){

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0');
        //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 2);

        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        curl_setopt($ch, CURLOPT_NOSIGNAL,true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $tmpInfo = curl_exec($ch);
        if (curl_errno($ch)) {
          return  'Errno'.curl_error($ch);
        }
        curl_close($ch);
        return json_decode($tmpInfo,1);

 }



//获取access_token
    private function _get_access_token(){

        $touser = $this->toUsername;
        $this->tokenFile= $touser.'_login.txt';
        $this->lastTimeFile= $touser.'_last.txt';
        /*$this->cookieFile =  $touser.'_cookie.txt';

        if(!file_exists($this->cookieFile)){
            $fh = fopen($this->cookieFile,"w");
            fclose($fh);
        }*/

        if(!file_exists($this->tokenFile)){
            $fh = fopen($this->tokenFile,"w");
            fclose($fh);
        }

        if(!file_exists($this->lastTimeFile)){
            $fh = fopen($this->lastTimeFile,"w");
            fclose($fh);
        }

        $needLogin=true;
        $nowTime=time();
        if($lastTime=file_get_contents($this->lastTimeFile)){

        }else{
            $lastTime=0;
        }

        if(($nowTime-$lastTime)<=$this->expire){
            $needLogin=false;
        }

        $appid = "wx9b264da049fc319a";
        $appsecret = "870b4eed903f1c1a1627679fa92aad1a";

        if($needLogin==true){

            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$appsecret;

            $token = $this->_get_request($url);
            $token = $token['access_token'];
            if($token){
                file_put_contents($this->lastTimeFile,$nowTime);
                file_put_contents($this->tokenFile,$token);
                $this->token=$token;
                return $token;
            }else{
                return false;
            }
        }else{
            if($token=file_get_contents($this->tokenFile)){
                $this->token=$token;
                return $token;
            }else{
                return false;
            }
        }
    }



    public function _get_request($url){

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec($ch);
            curl_close($ch);
            $jsoninfo = json_decode($output, true);
            //$token = $jsoninfo["access_token"];
            curl_close($ch);

        return $jsoninfo;
    }



    //generate multiply text and image results
    private function _get_mul_text_imgs($ext_info){
       $str="<xml>
             <ToUserName><![CDATA[".$this->fromUsername."]]></ToUserName>
             <FromUserName><![CDATA[".$this->toUsername."]]></FromUserName>
             <CreateTime>".time()."</CreateTime>
             <MsgType><![CDATA[news]]></MsgType>";

            $str.="<ArticleCount>".count($ext_info)."</ArticleCount> <Articles>";
            foreach($ext_info as $k=>$einfo)
            {
                $str.="<item> <Title><![CDATA[".$einfo['title']."]]></Title>
                        <Description><![CDATA[".$einfo['description']."]]></Description>
                        <PicUrl><![CDATA[".$einfo['pic']."]]></PicUrl>
                        <Url><![CDATA[".$einfo['url']."]]></Url>
                       </item>";
            }
            $str.="</Articles>";
        $str.="</xml>";
        return $str;
    }



    private function checkSignature()
    {
        // you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }

        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];

        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );

        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }
}

?>