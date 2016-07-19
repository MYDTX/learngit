<head>
    <meta charset="utf-8">
    <title>微信管理</title>
    <script type="text/javascript" src="bootstrap/js/j.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="cp/jquery.zclip.js"></script>
    <style type="text/css">
        body{background: beige;}
    </style>
</head>
<body  style="margin: 0px 200px">
<nav class="navbar " role="navigation"  style="background-color: white">
    <div class="navbar-header ">
        <a class="navbar-brand" href="#"><font face="Matura MT Script Capitals" color="black">WeiXinGuanLi</font></a>
    </div>
    <div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="index.php?r=index/main">首页</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    公众号管理 <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="index.php?r=index/main">添加公众号</a></li>
                    <li class="divider"></li>
                    <li><a href="index.php?r=index/show">管理公众号</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    自定义回复 <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="index.php?r=hui/huifu">回复规则</a></li>
                    <li class="divider"></li>
                    <li><a href="#">文字回复</a></li>
                    <li class="divider"></li>
                    <li><a href="#">图文回复</a></li>
                    <li class="divider"></li>
                    <li><a href="#">机器回复</a></li>
                </ul>
            </li>
            <li class="dropdown" style="margin-left: 300px">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <font face="Algerian" color="black">welcome <?php echo $_SESSION['u_name']?> login</font>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="index.php?r=index/layout">退出</a></li>
                    <li class="divider"></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<div class="well">
