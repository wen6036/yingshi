@include('admin.layouts.header')
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>系统设置</h5>
                    </div>
                    <div class="ibox-content">
                        <form method="post" class="form-horizontal" id="form1" name="form1">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label class="col-sm-2 control-label">网站名称</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="webname" id="webname" value="{{$settingInfo['webname']}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">网站副标题</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="websubname" id="websubname" value="{{$settingInfo['websubname']}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">网站域名</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="webdomin" id="webdomin" value="{{$settingInfo['webdomin']}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">网站关键字</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="webkeywords" id="webkeywords" value="{{$settingInfo['webkeywords']}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">网站描述信息</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="webdesc" id="webdesc" value="{{$settingInfo['webdesc']}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">后台路径</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="webdir" id="webdir" value="{{$settingInfo['webdir']}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">网站备案号</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="webicp" id="webicp" value="{{$settingInfo['webname']}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">站长邮箱</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="webmail" id="webmail" value="{{$settingInfo['webmail']}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">底部版权</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="copyright" id="copyright" value="{{$settingInfo['copyright']}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">网站logo</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="weblogo" id="weblogo" value="{{$settingInfo['weblogo']}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">畅言代码</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="cy" id="cy" value="{{$settingInfo['cy']}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">统计代码</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="webtongji" id="webtongji" value="{{$settingInfo['webtongji']}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">是否开放注册</label>

                                <div class="col-sm-5">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" value="1" id="isregister" name="isregister">是</label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" value="0" id="isregister" name="isregister" >否</label>
                                    </div>
                                </div>
                            </div>                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="button" onClick="doSubmit();">保存内容</button>
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
    var vv = $("#form1").serialize();
    var url = "/action/webset";
	$.post(url,$("#form1").serialize(),function(data){
		if (data.status == 0){
			setTimeout(function(){
				window.location.reload();
			},1000);
		}else{
			showTips(data.info);
		}
	},'json');
}
</script>
