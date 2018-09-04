@include('admin.layouts.header')
<body class="gray-bg">
<div class="wrapper  wrapper-content  animated  fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <form method="get" class="form-horizontal" id="form1" name="form1">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">轮播名称:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="product" id="product" value="">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">图片地址：</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="norms" id="norms" value="">
                            </div>
                        </div>
                        <div  class="hr-line-dashed"></div>
                        <div  class="form-group">
                            <label  class="col-sm-2 control-label">连接地址：</label>
                            <div  class="col-sm-6">
                                <input  type="text" class="form-control"  name="price"  id="price"  value="">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-primary" type="button" onClick="doSubmit();">保存信息</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.layouts.footer')
<script>
//保存配置信息
function doSubmit(){
    var product = $("#product").val();
    var cate_id = $("#cate_id option:selected").val();
    var price = $("#price").val();
    if (!product){showTips('请填写商品名称！','error','',1);return false;}
    if (!cate_id){showTips('请选择商品类型！','error','',1);return false;}
    if (!price){showTips('请填写商品价格！','error','',1);return false;}
    $.post("",$("#form1").serialize(),function(data){
        if (data.status == 0){
            showTips('保存成功！','success','',1);
            setTimeout(function(){
                window.parent.location.reload();
            },1000);
        }else{
            showTips(data.info,'','',1);
        }
    },'json');
}

    //选择地区
    function switchVoid(){
        var area = $("#area").val();
        showFarme('选择地区',''+area,'70%','90%');
    }
    /**
     * 地区选择框回调获取地址
     */
    function parentSwitchArea(pro,cty,dis){
        province = pro;
        city = cty;
        district = dis;
        $("#area").val(province+","+city+","+district);
        $("#area_txt").html("已选择").css("color","green");
    }
</script>