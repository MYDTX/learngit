<!DOCTYPE html>
<html lang="en">
<?php include ('header.php')?>

<ol class="breadcrumb " style="background-color: white">
    <li><a href="#">首页</a></li>
    <li><a href="#">公众号管理</a></li>
    <li class="active">公众号修改</li>
</ol>
<form method="post" action="index.php?r=index/save">
    <input type="hidden" name="aid" value="<?php echo $arr['aid']?>">
    <div class="form-group">
        <label for="exampleInputEmail1">公众号账户</label>
        <input type="text" class="form-control" name="aname" value="<?php echo $arr['aname']?>" placeholder="请输入公众号账户">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Appid</label>
        <input type="text" class="form-control" name="appid" value="<?php echo $arr['appid']?>" placeholder="请输入Appid">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Appsecret</label>
        <input type="text" class="form-control" name="appsecret" value="<?php echo $arr['appsecret']?>" placeholder="请输入Appsecret">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">内容</label>
        <textarea class="form-control" rows="3" name="account"><?php echo $arr['account']?></textarea>
    </div>
    <button type="submit" class="btn btn-block btn-default ">修改</button>
</form>
</div>
<?php include ('foot.php')?>
</body>
</html>