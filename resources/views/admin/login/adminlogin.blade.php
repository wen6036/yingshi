<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>影视登录</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <link rel="shortcut icon" href="favicon.ico"> <link href="/public/static/admin/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="/public/static/admin/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">

    <link href="/public/static/admin/css/animate.min.css" rel="stylesheet">
    <link href="/public/static/admin/css/style.min862f.css?v=4.1.0" rel="stylesheet">
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <script>if(window.top !== window.self){ window.top.location = window.location;}</script>
</head>
<style>
    body.gray-bg {
/*    background: url(/public/static/admin/img/b2.jpg) no-repeat center fixed;
*/}
</style>
<body class="gray-bg">

    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">YS</h1>

            </div>
            <h3>欢迎登陆影视后台</h3>

            <form class="m-t" role="form" action="">
                <div class="form-group">
                    <input type="text" name="username" id="username" class="form-control" placeholder="用户名" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="passwd" id="passwd" class="form-control" placeholder="密码" required="">
                </div>
                <button type="button" class="btn btn-primary block full-width m-b" onclick="doSave()">登 录</button>


                <p class="text-muted text-center"> <a href="login.html#"><small>忘记密码了？</small></a> | <a href="register.html">注册一个新账号</a>
                </p>

            </form>
        </div>
    </div>
    <script src="/public/static/admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="/public/static/admin/js/bootstrap.min.js?v=3.3.6"></script>
    <script type="text/javascript">
     
     function doSave(){
        var username = $("#username").val();
        var passwd = $("#passwd").val();
        var token = "{{csrf_token()}}";
        $.post("admin/login_check",{"_token":token,"username": username,"passwd": passwd},function(data){
           if (data.accessGranted) {
                window.location.href = '/admin';
                // window.location.href = '/';
            }else {
                alert('登陆失败')
            }
        },'json');
    }
</script>
</body>
</html>
