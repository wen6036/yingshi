@extends('admin.layouts.app')
@section('new','active opened active')
@section('addnew','active')
@section('content')
    <div class="row">
        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">增加尝鲜</h3>
                    <div class="panel-options">

                    </div>
                </div>
                <div class="panel-body">

                    <form role="form" class="form-horizontal" id="myform" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="col-sm-2 control-label">视频名称</label>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <input type="text" class="form-control no-right-border form-focus-info" id="field-1" name="dyname" placeholder="请输入视频名称">
                                    <span class="input-group-btn">
                                        <select class="form-control" name="dizhi" id="dizhi" style="width: 100px">
                                            <option value="">--来源--</option>
                                            @foreach(config('sourceconfig') as $key=>$v)
                                                <option value="{{$v}}">{{$key}}</option>
                                            @endforeach
										</select>
                                        <button type="button" class="btn btn-info" onclick="getdata()">获取</button></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-2">视频描述</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-2" name="dydesc" value="" placeholder="请输入视频描述" required>
                            </div>
                        </div>
                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-3">视频海报地址</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="dylogo" id="field-3" placeholder="请输入视频图片地址">
                            </div>
                        </div>
                        <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-4">视频播放地址</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="dyaddr" cols="5" rows="5" id="field-4" placeholder="请输入视频播放地址"></textarea>
                            </div>
                        </div>
                        <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-5"></label>
                            <button type="button" class="btn btn-info btn-single" id="submit">增加</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
    <script>
        $(function () {
            layer.alert('请填写可直接播放的视频地址,否则无法进行播放', {icon: 6});
            $('#submit').click(function () {
                var dyname = $('#field-1').val();
                var dydesc = $('#field-2').val();
                var dylogo = $('#field-3').val();
                var dyaddr = $('#field-4').val();
                if(dyname==''||dydesc==''||dyaddr==''||dylogo==''){
                    layer.msg('请填写完整信息')
                    return false;
                }
                var fm = new FormData($('#myform')[0]);
                $.ajax({
                    type:"post",
                    url:"/action/addnewmovie",
                    dataType:"json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: fm,
                    processData: false,
                    contentType: false,
                    success: function (resp){
                        if(resp.status==200){
                            layer.msg(resp.msg);
                            window.location = '/{{$webset['webdir']}}/newmovielist'
                        }
                        else {
                            layer.msg(resp.msg)
                        }
                    }
                })
            })
        })
    </script>
    <script>
        function getdata() {
         var key = $('#field-1').val();
         var dizhi = $("#dizhi").val();
         console.log(dizhi);
         if(key==''||dizhi==''){
             layer.alert('请输入视频名称和来源');
             return false;
         }
            layer.msg('获取中', {
                icon: 16,shade: 0.01,time: 10*1000
            });
            $.ajax({
                type:"post",
                url:"/action/getcx",
                dataType:"json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {wd:key,dizhi:dizhi},
                success: function (resp){
                    if(resp.status==200){
                        $('#field-1').val(resp.dyname);
                        $('#field-2').val(resp.dydesc);
                        $('#field-3').val(resp.dylogo);
                        $('#field-4').val(resp.dyaddr)
                        layer.msg('获取成功')

                    }
                    else {
                        layer.msg('获取失败,暂无相关资源')
                    }
                }
            })

        }
    </script>
@endsection