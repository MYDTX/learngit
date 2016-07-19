<?php

namespace app\controllers;

use Yii;
use yii\db\mssql\PDO;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class HuiController extends Controller
{
    public $enableCsrfValidation = false;
    public $layout=false;
    /*
     * 添加回复
     * */
    public function actionHuifu(){
        $this->actionChecklogin();
        $u_id=Yii::$app->session['u_id'];
        $data=$this->poo->select('account',"u_id='$u_id'");
        return $this->render('huifu',['data'=>$data]);
    }

    /*
     * 判断登录
     * */
    public  function  actionChecklogin(){
        if(!file_exists('sql.txt')){
            header("refresh:2;url=index.php?r=install/one");
            die("<h1>请安装!</h1>") ;
        }
        if(empty(Yii::$app->session['u_name'])){
            header("refresh:2;url=index.php?r=index/index");
            die("<h1>请登录!</h1>") ;
        }
    }
    /*
     * 文字添加
     * */
    public function actionWenzi(){
        $_POST['u_id']=Yii::$app->session['u_id'];
        $bool=$this->poo->insert('wenzi',$_POST);
        if($bool){
            $this->redirect('index.php?r=hui/show');
        }else{
            header("refresh:2;url=index.php?r=hui/huifu");
            die("<h1>添加失败，请联系管理员!</h1>") ;
        }
    }
    /*
     * 图文回复
     * */
    public function actionTuwen(){
        $_POST['u_id']=Yii::$app->session['u_id'];
        $bool=$this->poo->insert('tuwen',$_POST);
        if($bool){
            $this->redirect('index.php?r=hui/show');
        }else{
            header("refresh:2;url=index.php?r=hui/huifu");
            die("<h1>添加失败，请联系管理员!</h1>") ;
        }
    }
    /*
     * 回复展示
     * */
    public function actionShow(){
        echo 123;die;
    }
}
