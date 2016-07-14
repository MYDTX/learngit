<!DOCTYPE html>
<html lang="en">
<?php include ('header.php')?>

<ol class="breadcrumb " style="background-color: white">
    <li><a href="#">首页</a></li>
    <li><a href="#">公众号管理</a></li>
    <li class="active">公众号添加</li>
</ol>
<form method="post" action="index.php?r=index/main">
    <div class="form-group">
        <label for="exampleInputEmail1">公众号账户</label>
        <input type="text" class="form-control" name="aname" placeholder="请输入公众号账户">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Appid</label>
        <input type="text" class="form-control" name="appid" placeholder="请输入Appid">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Appsecret</label>
        <input type="text" class="form-control" name="appsecret" placeholder="请输入Appsecret">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">内容</label>
        <textarea class="form-control" rows="3" name="account"></textarea>
    </div>
    <button type="submit" class="btn btn-block btn-default ">添加</button>
</form>
</div>
<?php include ('foot.php')?>
</body>
</html>