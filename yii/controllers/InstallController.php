<?php

namespace app\controllers;

use Yii;
use yii\db\mssql\PDO;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class InstallController extends Controller
{
    public $enableCsrfValidation = false;
    public $layout=false;
    /*
     * 安装第一步
     * */
    function actionOne(){
        if(file_exists('sql.txt')){
            $this->redirect('index.php?r=index/index');
        }else{
            return $this->render('one');
        }
    }
    /*
     * 安装第二步
     * */
    public  function actionTwo(){
        if($_POST){
            return $this->render('two');
        }else{
            return $this->render('one');
        }
    }
    /*
     * 安装第三步
     * */
    public function actionThree(){
        if($_POST){
            return $this->render('three');
        }else{
            return $this->render('one');
        }
    }
    /*
     * 安装第四步
     * */
    public function actionFour(){
        if($_POST){
            $_POST['u_pwd']=md5($_POST['u_pwd']);
            try{
                include ('../web/sone.php');
                $this->redirect('index.php?r=index/index');
            }catch(\PDOException $e){
                header("refresh:2;url=index.php?r=index/four");
                echo "<h1>数据库账户或数据库密码出错!</h1>";
            }
        }else{
            return $this->render('one');
        }
    }
}
