<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/13
 * Time: 18:47
 */
$pdo=new \PDO("mysql:host=".$_POST['sqlhost'].";port=".$_POST['sqlnum'],$_POST['sqlname'],$_POST['sqlpwd']);
$sqlone="DROP DATABASE IF EXISTS ".$_POST['namesql'].";CREATE DATABASE ".$_POST['namesql']." DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
$boolone=$pdo->exec($sqlone);
$sql=new \PDO("mysql:host=".$_POST['sqlhost'].";dbname=".$_POST['namesql'].";port=".$_POST['sqlnum'],$_POST['sqlname'],$_POST['sqlpwd']);
$sql->exec("DROP TABLE IF EXISTS `admin`;CREATE TABLE `admin` ( `u_id` int(11) NOT NULL AUTO_INCREMENT,`u_name` varchar(255) DEFAULT NULL,`u_pwd` varchar(255) DEFAULT NULL,PRIMARY KEY (`u_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8;");
$sql->exec("insert into admin (u_name,u_pwd) values('".$_POST['u_name']."','".$_POST['u_pwd']."')");
$sql->exec("DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `mid` int(11) DEFAULT NULL,
  `u_id` int(11) DEFAULT NULL,
  `aname` varchar(255) NOT NULL,
  `account` varchar(255) NOT NULL,
  `appid` varchar(50) NOT NULL,
  `appsecret` varchar(50) NOT NULL,
  `atoken` varchar(50) DEFAULT NULL,
  `atok` varchar(255) DEFAULT NULL,
  `aurl` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`aid`),
  KEY `FK_Relationship_4` (`u_id`),
  KEY `FK_Relationship_5` (`mid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;");
$sql->exec("DROP TABLE IF EXISTS `session`;
CREATE TABLE `session`
(
    id CHAR(40) NOT NULL PRIMARY KEY,
    expire INTEGER,
    data BLOB
);");

$sql->exec("DROP TABLE IF EXISTS `tuwen`;
CREATE TABLE `tuwen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) DEFAULT NULL,
  `tutitle` varchar(255) DEFAULT NULL,
  `tuorder` varchar(255) DEFAULT NULL,
  `jianjie` varchar(255) DEFAULT NULL,
  `tupian` varchar(255) DEFAULT NULL,
  `webdizhi` varchar(255) DEFAULT NULL,
  `u_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;");

$sql->exec("DROP TABLE IF EXISTS `wenzi`;
CREATE TABLE `wenzi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) DEFAULT NULL,
  `wentitle` varchar(255) DEFAULT NULL,
  `wenorder` varchar(255) DEFAULT NULL,
  `wencontent` varchar(255) DEFAULT NULL,
  `u_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;");

$lianjie="<?php
define('SESSION_DNS', 'mysql:host=".$_POST['sqlhost'].";dbname=".$_POST['namesql'].";port=".$_POST['sqlnum'].";charset=utf8');
define('SESSION_USR', '".$_POST['sqlname']."');
define('SESSION_PWD', '".$_POST['sqlpwd']."');
";


$str="<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=".$_POST['sqlhost'].";port=".$_POST['sqlnum'].";dbname=".$_POST['namesql']."',
    'username' => '".$_POST['sqlname']."',
    'password' => '".$_POST['sqlpwd']."',
    'charset' => 'utf8',
];
";


file_put_contents('lianjie.php',$lianjie);
file_put_contents("../config/db.php",$str);
file_put_contents('sql.txt',1);