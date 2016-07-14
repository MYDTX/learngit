<?php

namespace app\controllers;

use Yii;
use yii\db\mssql\PDO;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class IndexController extends Controller
{
    public $enableCsrfValidation = false;
    public $layout=false;

    /*
    * 登录
    * */
    public function actionIndex(){
        if($_POST){
            $_POST['u_pwd']=md5($_POST['u_pwd']);
            $db = \Yii::$app->db;
            $bool=$db->createCommand('SELECT * FROM `admin` WHERE u_name=:u_name AND u_pwd=:u_pwd')->bindValues([':u_name'=>$_POST['u_name'],':u_pwd'=>$_POST['u_pwd']])->queryOne();
            if($bool){
                Yii::$app->session['u_name']=$bool['u_name'];
                Yii::$app->session['u_id']=$bool['u_id'];
                $this->redirect('index.php?r=index/main');
            }else{
                header("refresh:2;url=index.php?r=index/index");
                echo "<h1>账户或密码错误!</h1>";
            }

        }else{
            return $this->render('index');
        }
    }
    /*
     * 公众号添加
     * */
    public  function actionMain(){
        $this->actionChecklogin();
        if($_POST){
            $atok=$this->actionRands(5);
            $url=substr('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],0,strpos('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],'we'))."we7/we.php?str=".$atok;
            $connection=\Yii::$app->db;
            $arr=\Yii::$app->request->post();
            $arr['atoken']=md5(rand(1000,9999));
            $connection->createCommand()->insert('account', [
                'appid' => $arr['appid'],
                'aname' => $arr['aname'],
                'account' => $arr['account'],
                'appsecret' => $arr['appsecret'],
                'aurl' => $url,
                'atok'=> $atok,
                'u_id'=> Yii::$app->session['u_id'],
                'atoken'=>$arr['atoken'],

            ])->execute();
            $this->redirect('index.php?r=index/show');
        }else{
            return $this->render('main');
        }
    }
    /*
     * 公众号展示
     * */
    public  function actionShow(){
        $this->actionChecklogin();
        $uid=Yii::$app->session['u_id'];
        $sql="select * from account join admin on account.u_id=admin.u_id where account.u_id='$uid'";
        $connection=\Yii::$app->db->createCommand($sql);
        $arr=$connection->queryAll();
        $num=count($arr);
        return $this->render('show',['arr'=>$arr,'num'=>$num]);
    }
    /*
     * 公众号删除
     * */
    public function actionDel(){
        $this->actionChecklogin();
        $db = Yii::$app->db->createCommand();
        $bool=$db->delete('account',['aid' => $_GET['aid']] )->execute();
        if($bool){
            echo json_encode(1);
        }else{
            echo json_encode(0);
        }
    }
    /*
     * 修改公众号
     * */
    public function actionSave(){
        $this->actionChecklogin();
        if($_POST){
            $arr=Yii::$app->request->post();
            $db = Yii::$app->db->createCommand()->update('account',['aname'=>$arr['aname'],'appsecret'=>$arr['appsecret'],'appid'=>$arr['appid'],'account'=>$arr['account']],'aid=:aid',[':aid'=>$arr['aid']])->execute();
            if($db){
                $this->redirect('index.php?r=index/show');
            }else{
                header("refresh:2;url=index.php?r=index/show");
                die("<h1>修改失败，请联系管理员!</h1>") ;
            }
        }else{
            $id=$_GET['aid'];
            $sql="select * from account where aid ='$id'";
            $connection=\Yii::$app->db->createCommand($sql);
            $arr=$connection->queryAll();
            return $this->render("save",['arr'=>$arr['0']]);
        }
    }
    /*
     * 判断登录
     * */
    public  function  actionChecklogin(){
        if(Yii::$app->session['u_name']==""||Yii::$app->session['u_name']==false){
            header("refresh:2;url=index.php?r=index/index");
            die("<h1>请登录!</h1>") ;
        }
    }
    /*
     * 退出登录
     * */
    public function actionLayout(){
        unset(Yii::$app->session['u_name']);
        $this->redirect('index.php?r=index/index');
    }
    /*
     *生成atok
     * */
    public function actionRands($length){
        $this->actionChecklogin();
        $str = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randString = '';
        $len = strlen($str)-1;
        for($i = 0;$i < $length;$i ++)
        {
            $num = mt_rand(0, $len); $randString .= $str[$num];
        }
        return $randString ;
    }
}
