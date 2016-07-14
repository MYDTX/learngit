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
    <form action="index.php?r=install/four" id="tijiao" method="post">
        <table class="table table-bordered bg-info">
            <tr>
                <th class="text-center">确认协议</th>
                <th class="text-center">确认环境</th>
                <th class="text-center">配置系统</th>
            </tr>
        </table>
        <div class="progress">
            <div class="progress-bar progress-bar-striped active "  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                <span class="sr-only">100% Complete</span>
            </div>
        </div>
        <div class="well">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">数据库&nbsp;&nbsp;&nbsp;&nbsp;IP</div>
                    <input class="form-control"  name="sqlhost" type="text" placeholder="数据库 IP">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">数据库账户</div>
                    <input class="form-control" name="sqlname" type="text" placeholder=" 数据库账户">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">数据库密码</div>
                    <input class="form-control"name="sqlpwd" type="password" placeholder="数据库密码">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">数据库端口</div>
                    <input class="form-control" name="sqlnum" type="text" placeholder="数据库端口">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">创建数据库</div>
                    <input class="form-control" name="namesql" type="text" placeholder="创建数据库">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">管理员账户</div>
                    <input class="form-control" name="u_name" type="text" placeholder="管理员账户">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">管理员密码</div>
                    <input class="form-control" name="u_pwd" type="password" placeholder="管理员密码">
                </div>
            </div>
        </div>
        <button type="submit" class="btn  btn-block bg-primary" id="queren"  data-container="body" data-toggle="popover" data-placement="left" data-content="请先同意安装协议！">配置系统</button>
</div>
</form>
</body>
</html>