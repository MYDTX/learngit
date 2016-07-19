<?php
/**
 * wechat php test
 */
//define your token
include ('auto.php');
$poo=new Poo();
$str=$_GET['str'];
$data=$poo->select('account',"atok='$str'");//查询数据
define("TOKEN", $data['0']['atoken']);
define("ID", $data['0']['aid']);
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
        $poo=new Poo();
        $one=$poo->select('wenzi','aid='.ID);
        $two=$poo->select('tuwen','aid='.ID);
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        if (!empty($postStr)){
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $fromUsername = $postObj->FromUserName;
            $toUsername = $postObj->ToUserName;
            $keyword = trim($postObj->Content);
            $time = time();
            //加载文字模板
            $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";
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
                $desription = "“糯米，贴吧，地图，视频，音乐，SEO，登录，“"; //简介
                $image = "https://www.baidu.com/img/bd_logo1.png"; //图片地址
                $turl = "https://www.baidu.com/index.php?tn=monline_3_dg"; //链接地址
                $resultStr = sprintf($picTpl, $fromUsername, $toUsername, $time, $msgType, $title,$desription,$image,$turl);
                echo $resultStr;
            }elseif($keyword==$two['0']['tuorder']){
                $msgType = "news";
                $title = $two['0']['tutitle']; //标题
                $data  = date('Y-m-d'); //时间
                $desription = $two['0']['jianjie']; //简介
                $image = $two['0']['tupian']; //图片地址
                $turl = $two['0']['webdizhi']; //链接地址
                $resultStr = sprintf($picTpl, $fromUsername, $toUsername, $time, $msgType, $title,$desription,$image,$turl);
                echo $resultStr;
            }elseif($keyword==$one['0']['wenorder']){
                $msgType = "text";
                $contentStr = $one['0']['wencontent'];
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
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