@include('admin.layouts.header')
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
    
    <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <button class="btn btn-primary " type="button" onClick="addNew();"><i class="fa fa-check"></i>&nbsp;新增新闻</button>
                    <button class="btn btn-success " type="button" onClick="window.location.reload();"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;刷新页面</button>
                    
                </div>
            </div>
        </div>
    
            <div class="row">
                <div class="col-sm-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>新闻列表 </h5>
                        </div>
                        <div class="ibox-content">
                            <table class="footable table table-stripped" data-page-size="8" data-filter=#filter>
                                <thead>
                                        <tr>
                                            <th>新闻标题</th>
                                            <th>是否显示</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php ?>
                                        <tr class="gradeX">
                                        <td></td>
                                        <td>
                                        
                                        </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button data-toggle="dropdown" class="btn btn-default btn-xs dropdown-toggle" aria-expanded="false">操作 <span class="caret"></span></button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="javascript:void(0);LockInfo();" class="font-bold">查看详情</a></li>
                                                        <li class="divider"></li>
                                                        <li><a href="javascript:void(0);Edit();" class="font-bold">编辑</a></li>
                                                        <li class="divider"></li>
                                                        <li><a href="javascript:void(0);Del();">删除</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php  ?>
                                    </tbody>
                            </table>
                             <?php  ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@include('admin.layouts.footer')
<script>
//查看会员详细资料
function LockInfo(user_id){
    showFarme('查看新闻详情','','80%','90%');
}


//添加新分组
function addNew(){
    showFarme('新增新闻','','80%','90%');
}

//新闻编辑
function Edit(id){
    showFarme('新增编辑','','80%','90%');
}
//删除分组
function Del(group_id){
        layer.confirm('您确定要删除吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.get("",function(data){
                if (data.status == 1){
                    showTips(data.info,'error');
                }else{
                    showTips('删除成功！','success');
                    setTimeout(function(){window.location.reload();},1000);
                }
            },'json');
        });
}
</script>

