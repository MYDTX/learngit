<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>安装协议</title>
    <script type="text/javascript" src="../web/bootstrap/js/j.js"></script>
    <script type="text/javascript" src="../web/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../web/bootstrap/css/bootstrap.min.css">
    <style type="text/css">
        body{background: beige;}
    </style>
</head>
<body style="margin: 0px 200px">
<div class="well well-sm">
    <div class="well  well-sm" style="text-align: center">
        <h1>欢迎 <small>安装微信管理系统</small></h1>
    </div>
    <form action="index.php?r=install/three" id="tijiao" method="post">
        <input type="hidden" name="two" value="2">
        <table class="table table-bordered bg-info">
            <tr>
                <th class="text-center">确认协议</th>
                <th class="text-center">确认环境</th>
                <th class="text-center">配置系统</th>
            </tr>
        </table>
        <div class="progress">
            <div  class="progress-bar progress-bar-striped active "  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 67%">
                <span class="sr-only">67% Complete</span>
            </div>
        </div>
        <div class="well">
            <div class="panel panel-default">
                <div class="panel-heading">服务器信息</div>
                <table class="table table-striped">
                    <tbody><tr>
                        <th style="width:150px;">参数</th>
                        <th>值</th>
                        <th>状态</th>
                    </tr>
                    <tr class="warning">
                        <td>服务器操作系统</td>
                        <td><?PHP echo PHP_OS; ?></td>
                        <td><span class="glyphicon glyphicon-ok"></span></td>
                    </tr>
                    <tr class="">
                        <td>Web服务器环境</td>
                        <td><?PHP echo $_SERVER ['SERVER_SOFTWARE']; ?></td>
                        <td><span class="glyphicon glyphicon-ok"></span></td>
                    </tr>
                    <tr class="">
                        <td>PHP版本</td>
                        <td id="banben"><?php echo substr(PHP_VERSION, 0, 3); ?></td>
                        <td id="zt"><span class="glyphicon glyphicon-ok"></span></td>
                    </tr>
                    <tr class="">
                        <td>上传限制</td>
                        <td><?PHP echo get_cfg_var ("upload_max_filesize")?get_cfg_var ("upload_max_filesize"):"不允许上传附件"; ?></td>
                        <td><span class="glyphicon glyphicon-ok"></span></td>
                    </tr>
                    <tr class="">
                        <td>当前主机名</td>
                        <td><?PHP  echo $_SERVER['SERVER_NAME'];//当前主机名 ?></td>
                        <td><span class="glyphicon glyphicon-ok"></span></td>
                    </tr>
                    <tr class="">
                        <td>服务器Web端口</td>
                        <td><?PHP  echo $_SERVER['SERVER_PORT'];//当前主机名 ?></td>
                        <td><span class="glyphicon glyphicon-ok"></span></td>
                    </tr>
                    <tr class="">
                        <td>脚本最大执行时间</td>
                        <td><?php echo ini_get("max_execution_time")."秒";//脚本最大执行时间?></td>
                        <td><span class="glyphicon glyphicon-ok"></span></td>
                    </tr>
                    </tbody></table>
            </div>
        </div>
        <button type="submit" class="btn  btn-block bg-primary" id="queren"  data-container="body" data-toggle="popover" data-placement="left" data-content="PHP版本过低！">确认环境</button>
</div>
</form>
</body>
</html>
<script>
    $('#tijiao').submit(function(){
        var banben=$('#banben').html();
        if(banben<5.4){
            $('#queren').popover('show');
            return false;
        }
    })
</script>