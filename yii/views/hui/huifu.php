<!DOCTYPE html>
<html lang="en">
<?php include ('header.php')?>

<ol class="breadcrumb " style="background-color: white">
    <li><a href="index.php?r=index/main">首页</a></li>
    <li><a href="index.php?r=hui/huifu">自定义回复</a></li>
    <li class="active">回复规则</li>
</ol>
<table class="table table-bordered">
    <tr>
        <th class="text-center">选择用户</th>
        <th class="text-center">选择规则</th>
    </tr>
    <tr class="text-center">
        <td style="width: 50%">
            <select class="form-control" id="user">
                <option value="0">选择用户</option>
                <?php foreach($data as $k=>$v){?>
                <option value="<?php echo $v['aid']?>" ><?php echo $v['aname']?></option>
                <?php }?>
            </select>
        </td>
        <td style="width: 50%">
            <select class="form-control" id="order">
                <option value="0">选择规则</option>
                <option value="1">文字回复</option>
                <option value="2">图文回复</option>
            </select>
        </td>
    </tr>
</table>
<!--文字回复-->
<div class="well">
<div id="one">
    <h1>文字 <small>回复规则添加</small></h1>
    <form class="form-horizontal" role="form" id="oneform" action="index.php?r=hui/wenzi" method="post">
        <input type="hidden" name="aid" id="oneaid">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label" >设置标题</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="wentitle" id="inputEmail3" placeholder="请输入标题">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label" >回复关键字</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="wenorder" id="inputEmail3" placeholder="请输入规则">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label" >回复内容</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="wencontent" id="inputEmail3" placeholder="请输入内容">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">添加</button>
            </div>
        </div>
    </form>
</div>
<!--图文回复-->
<div id="two" style="display: none">
    <h1>图文 <small>回复规则添加</small></h1>
    <form class="form-horizontal" role="form"id="twoform" action="index.php?r=hui/tuwen" method="post">
        <input type="hidden" name="aid" id="twoaid">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label" >设置标题</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="tutitle"  placeholder="请输入设置标题">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label" >回复关键字</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="tuorder"  placeholder="请输入回复关键字">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label" >网址简介</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="jianjie"  placeholder="请输入网址简介">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label" >图片地址</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="tupian" placeholder="请输入图片地址">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label" >网址链接</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="webdizhi"  placeholder="请输入网址链接">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">添加</button>
            </div>
        </div>
    </form>
</div>

</div>

</div>
<?php include ('foot.php')?>
</body>
</html>
<script>
    /*
    * 规则切换
    * */
    $('#order').change(function(){
        var order=$(this).val();
        switch (order){
            case '0' :$('#one').show(1000);$('#two').hide(1000); break;
            case '1' :$('#one').show(1000);$('#two').hide(1000); break;
            case '2' :$('#two').show(1000);$('#one').hide(1000); break;
        }
    })
    /*
    * 切换用户
    * */
    $('#user').change(function(){
        var aid=$(this).val();
        $('#oneaid').val(aid);
        $('#twoaid').val(aid);
    })
    /*
    * 检验提交
    * */
    $('#oneform').submit(function(){
        var aid=$('#oneaid').val();
        if(aid==""||aid==null){
            alert("请选择用户！");
            return false;
        }
    })

    $('#twoform').submit(function(){
        var aid=$('#twoaid').val();
        if(aid==""||aid==null){
            alert("请选择用户！");
            return false;
        }
    })
</script>