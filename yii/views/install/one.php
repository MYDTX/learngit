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
    <form action="index.php?r=install/two" id="tijiao" method="post">
<table class="table table-bordered bg-info">
    <tr>
        <th class="text-center">确认协议</th>
        <th class="text-center">确认环境</th>
        <th class="text-center">配置系统</th>
    </tr>
</table>
<div class="progress">
    <div class="progress-bar progress-bar-striped active "  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 33%">
        <span class="sr-only">33% Complete</span>
    </div>
</div>
<div class="well">
    <h3 class="text-center">版权所有 (c)2014，微擎团队保留所有权利。 </h3>

    <p>
        感谢您选择微擎 - 微信公众平台自助开源引擎（以下简称WE7，WE7基于 PHP + MySQL的技术开发，全部源码开放。 <br>
        为了使你正确并合法的使用本软件，请你在使用前务必阅读清楚下面的协议条款：
    </p>
    <p>
        <strong>一、本授权协议适用且仅适用于微擎系统(We7, MicroEngine. 以下简称微擎)任何版本，微擎官方对本授权协议的最终解释权。</strong>
    </p>
    <p>
        <strong>二、协议许可的权利 </strong>
    </p><ol>
        <li>您可以在完全遵守本最终用户授权协议的基础上，将本软件应用于非商业用途，而不必支付软件版权授权费用。</li>
        <li>您可以在协议规定的约束和限制范围内修改微擎源代码或界面风格以适应您的网站要求。</li>
        <li>您拥有使用本软件构建的网站全部内容所有权，并独立承担与这些内容的相关法律义务。</li>
        <li>获得商业授权之后，您可以将本软件应用于商业用途，同时依据所购买的授权类型中确定的技术支持内容，自购买时刻起，在技术支持期限内拥有通过指定的方式获得指定范围内的技术支持服务。商业授权用户享有反映和提出意见的权力，相关意见将被作为首要考虑，但没有一定被采纳的承诺或保证。</li>
    </ol>
    <p></p>
    <p>
        <strong>三、协议规定的约束和限制 </strong>
    </p><ol>
        <li>未获商业授权之前，不得将本软件用于商业用途（包括但不限于企业网站、经营性网站、以营利为目的或实现盈利的网站）。</li>
        <li>未经官方许可，不得对本软件或与之关联的商业授权进行出租、出售、抵押或发放子许可证。</li>
        <li>未经官方许可，禁止在微擎的整体或任何部分基础上以发展任何派生版本、修改版本或第三方版本用于重新分发。</li>
        <li>如果您未能遵守本协议的条款，您的授权将被终止，所被许可的权利将被收回，并承担相应法律责任。</li>
    </ol>
    <p></p>
    <p>
        <strong>四、有限担保和免责声明 </strong>
    </p><ol>
        <li>本软件及所附带的文件是作为不提供任何明确的或隐含的赔偿或担保的形式提供的。</li>
        <li>用户出于自愿而使用本软件，您必须了解使用本软件的风险，在尚未购买产品技术服务之前，我们不承诺对免费用户提供任何形式的技术支持、使用担保，也不承担任何因使用本软件而产生问题的相关责任。</li>
        <li>电子文本形式的授权协议如同双方书面签署的协议一样，具有完全的和等同的法律效力。您一旦开始确认本协议并安装  WE7，即被视为完全理解并接受本协议的各项条款，在享有上述条款授予的权力的同时，受到相关的约束和限制。协议许可范围以外的行为，将直接违反本授权协议并构成侵权，我们有权随时终止授权，责令停止损害，并保留追究相关责任的权力。</li>
        <li>如果本软件带有其它软件的整合API示范例子包，这些文件版权不属于本软件官方，并且这些文件是没经过授权发布的，请参考相关软件的使用许可合法的使用。</li>
    </ol>
    <p></p>
    同意：<input type="checkbox" id="xy" name="xy" value="1">
</div>
<button type="submit" class="btn  btn-block bg-primary" id="queren"  data-container="body" data-toggle="popover" data-placement="left" data-content="请先同意安装协议！">确认协议</button>
</div>
</form>
</body>
</html>
<script>
    $('#tijiao').submit(function(){
        var xy=document.getElementById('xy');
        if(xy.checked==false){
            $('#queren').popover('show');
            return false;
        }
    })
</script>