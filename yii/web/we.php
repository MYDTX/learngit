<?php
/**
 * wechat php test
 */

//define your token
include ('Poo.class.php');
$poo=new Poo();
$str=$_GET['str'];
$token=$poo->find('atoken','account',"atok='$str'");
define("TOKEN", $token);
$wechatObj = new wechatCallbackapiTest();
$wechatObj->valid();

class wechatCallbackapiTest
{
    public function valid()
    {
        $echoStr = $_GET["echostr"];


        if($this->checkSignature()){
            echo $echoStr;
            $this->responseMsg();
            exit;
        }
    }

    public function responseMsg()
    {
        //get post data, May be due to the different environments
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

        //extract post data

        if (!empty($postStr)){
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $fromUsername = $postObj->FromUserName;
            $toUsername = $postObj->ToUserName;
            $keyword = trim($postObj->Content);
            $time = time();
            //加载图文模版
            $picTpl = "<xml>
                                   <ToUserName><![CDATA[%s]]></ToUserName>
                                   <FromUserName><![CDATA[%s]]></FromUserName>
                                   <CreateTime>%s</CreateTime>
                                   <MsgType><![CDATA[%s]]></MsgType>
                                   <ArticleCount>1</ArticleCount>
                                   <Articles>
                                   <item>
                                   <Title><![CDATA[%s]]></Title>
                                   <Description><![CDATA[%s]]></Description>
                                   <PicUrl><![CDATA[%s]]></PicUrl>
                                   <Url><![CDATA[%s]]></Url>
                                   </item>
                                   </Articles>
                                   <FuncFlag>1</FuncFlag>
                                   </xml> ";
            if(trim($postObj->MsgType) == "event" and trim($postObj->Event) == "subscribe")//判断是否是新关注
            {
                $msgType = "news";
                $title = "百度"; //标题
                $data  = date('Y-m-d'); //时间
                $desription = "“不会就百度吧！“"; //简介
                $image = "https://www.baidu.com/img/bd_logo1.png"; //图片地址
                $turl = "https://www.baidu.com/index.php?tn=monline_3_dg"; //链接地址
                $resultStr = sprintf($picTpl, $fromUsername, $toUsername, $time, $msgType, $title,$desription,$image,$turl);
                echo $resultStr;
            }elseif($keyword=="百度"){
                $msgType = "news";
                $title = "百度"; //标题
                $data  = date('Y-m-d'); //时间
                $desription = "“不会就百度吧！“"; //简介
                $image = "https://www.baidu.com/img/bd_logo1.png"; //图片地址
                $turl = "https://www.baidu.com/index.php?tn=monline_3_dg"; //链接地址
                $resultStr = sprintf($picTpl, $fromUsername, $toUsername, $time, $msgType, $title,$desription,$image,$turl);
                echo $resultStr;
            }elseif(!empty($keyword )){
                $msgType = "news";
                $title = "张老师的博客"; //标题
                $data  = date('Y-m-d'); //时间
                $desription = "“张老师对php的讲解！“"; //简介
                $image = "http://avatar.csdn.net/6/A/F/1_zph1234.jpg"; //图片地址
                $turl = "http://blog.csdn.net/zph1234/article/details/51250523"; //链接地址
                $resultStr = sprintf($picTpl, $fromUsername, $toUsername, $time, $msgType, $title,$desription,$image,$turl);
                echo $resultStr;
            }else{
                echo "说点什么吧!";
            }
        }else {
            echo "";
            exit;
        }
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