<!DOCTYPE html>
<html lang="en">
<?php include ('header.php')?>
<ol class="breadcrumb " style="background-color: white">
    <li><a href="index.php?r=index/main">首页</a></li>
    <li><a href="index.php?r=index/show">公众号管理</a></li>
    <li class="active">公众号展示</li>
</ol>
<table class="table table-hover table-striped table-bordered">
    <tr>
        <th class="text-center">编号</th>
        <th class="text-center">微信号</th>
        <th class="text-center">Token</th>
        <th class="text-center">Aurl</th>
        <th class="text-center">操作</th>
    </tr>
    <?php foreach($arr as $k=>$v){?>
    <tr class="text-center">
        <td><?php echo $v['aid']?></td>
        <td><?php echo $v['aname']?></td>
        <td >
            <div class="input-group">
                <div class="input-group-addon cp1">复制</div>
                <input class="form-control to"  type="text" value="<?php echo $v['atoken']?>">
            </div>
        </td>
        <td>
            <div class="input-group">
                <div class="input-group-addon cp2">复制</div>
                <input class="form-control ur" type="text" value="<?php echo $v['aurl']?>">
            </div>
        </td>
        <td>
            <a href="index.php?r=index/save&aid=<?php echo $v['aid']?>" class="glyphicon glyphicon-pencil"></a>
            <a href="#" class="glyphicon glyphicon-minus" aid="<?php echo $v['aid']?>"></a>
        </td>
    </tr>
    <?php }?>
</table>
</div>
<?php include ('foot.php')?>
</body>
</html>
<script>

    $(".cp1").zclip({
        path:'cp/ZeroClipboard.swf',
        copy:$('.to').val()
    });
    $(".cp2").zclip({
        path:'cp/ZeroClipboard.swf',
        copy:$('.ur').val()
    });

    $('.glyphicon-minus').click(function(){
        var _this=$(this);
        var aid=$(this).attr('aid');
        $.get("index.php?r=index/del",{aid:aid},function(msg){
           if(msg==1){
                _this.parents('tr').hide();
            }else(
                alert("删除失败！")
            )
        })
    })
</script>