<!DOCTYPE html>
    <head>
    <meta charset="UTF-8">
    <title>{{config('web.title')}}</title>
    <meta name="keywords" content="{!!config('web.keywords')!!}">
    <meta name="description" content="{!!config('web.desc')!!}">
    <meta name="viewport" content="width=640,target-densitydpi=device-dpi,maximum-scale=1.0, user-scalable=no ">
    <!-- <link rel="stylesheet" href="home/css/style.css" type="text/css"> -->
    <link rel="stylesheet" href="/admins/layui/css/layui.css">
    <script src="/admins/layui/layui.js"></script>
    <link rel="stylesheet" href="/home/css/common.css" type="text/css">
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="/home/css/font-awesome.min.css">
	<link rel="stylesheet" href="/home/css/swiper.min.css" type="text/css">
	<!-- <script src="/home/js/jquery-2.1.3.min.js" type="text/javascript"></script> -->
	<script src="/home/js/common.js" type="text/javascript"></script>
	<!-- <script src="/home/js/Validform_min.js"></script> -->
	<script src="/home/js/infinite-scroll.pkgd.min.js"></script>
	<script src="/home/js/swiper.min.js"></script>

    </head>
    <body>
	@section('content')
	@show    <!-- 底部栏目 -->
            <footer>

                <div class="bot_nav">
                    <ul>
                        <li class="active">
                            <div class="boot_nav_i boot_nav_i01">
                                <a href="/"><i></i><span>首页</span></a>
                            </div>
                        </li>
                        <li>
                            <div class="boot_nav_i boot_nav_i02">
                                <a href="/bank"><i></i><span>办卡</span></a>
                            </div>
                        </li>
                        
                        <li>
                            <div class="boot_nav_i boot_nav_i04">
                                <a href="/bank"><i></i><span>网贷</span></a>
                            </div>
                        </li>
                        <li>
                            <div class="boot_nav_i boot_nav_i05">
                                <a href="/user"><i></i><span>个人中心</span></a>
                            </div>
                        </li>
                    </ul>
                </div>

            </footer>
    @section('js')
    @show


</body>

</html>