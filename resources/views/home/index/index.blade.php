@extends('common.home')

@section('content')
        <div class="banner">
            <div id="focus" class="focus">
                <div class="hd"><ul></ul></div>
                <div class="bd">
                    <ul>
                        @foreach($ads as $ads)
                        <li>
                            <a href="{{$ads->link}}"><img src="{{$ads->pic}}"/></a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <script src="/home/js/TouchSlide.1.1.js">
            </script>
            <script type="text/javascript">
                TouchSlide({
                    slideCell: "#focus",
                    titCell: ".hd ul",
                    //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
                    mainCell: ".bd ul",
                    effect: "left",
                    autoPlay: true,
                    //自动播放
                    autoPage: true,
                    //自动分页
                    switchLoad: "_src" //切换加载，真实图片路径为"_src" 
                });
            </script>
        </div>
       <div class="iheader scolld">
            <ul>
                @foreach($nav as $nav)
                <li>
                    <a href="{{$nav->link}}">
                        <div>
                            <img src="{{$nav->pic}}"  style="width:3rem;height:3rem;" />
                            <span>{{$nav->title}}</span>
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="clearD">
        </div>
        <div class="inotice">
            <span class="volume"></span>
            <div class="intxt">
                <ul>
                    @foreach($notice as $notice)
                    <li>
                        <a href="/user/notice">{{$notice->title}}</a>
                        <em>{!!date('Y-m-d',$notice->ntime)!!}</em>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <script>
            function ancs() {
                $(".intxt ul").animate({
                    marginTop: "-28px"
                },
                600,
                function() {
                    $(this).css({
                        marginTop: "0px"
                    }).find("li:first").appendTo(this);
                })
            }
            $(function() {
                var ans = setInterval("ancs()", 3000);
                $(".intxt").hover(function() {
                    clearInterval(ans);
                },
                function() {
                    ans = setInterval("ancs()", 3000);
                })
            })
        </script>
        <div class="clearD"></div>
        <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
            <ul class="layui-tab-title">
                <li class="layui-this" style="font-size: 30px;  margin-bottom:5px;width: 30%">最新口子</li>
                <li style="font-size: 30px;  margin-bottom:5px;width: 30%">网贷攻略</li>
                <li style="font-size: 30px; margin-bottom:5px; width: 30%">办卡提额</li>
            </ul>
            <div class="layui-tab-content" style="height: 100px;">
                <!-- 最新口子 -->
                <div class="layui-tab-item layui-show">
                    <div class="icont">
                        <ul class="items">

                            @foreach($news1 as $news1)
                            <li class="list-item">
                                <a href="/news/{{$news1->id}}">
                                    <div class="txt"><img src="{{$news1->pic}}"/>
                                        <h1>{{$news1->title}}</h1>
                                        <p>
                                            <span>#最新口子</span>{!!date('Y-m-d',$news1->ctime)!!}
                                            <em class="y">{{$news1->num}}&nbsp;阅读</em>
                                        </p>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- 网贷攻略 -->
                <div class="layui-tab-item">
                    <div class="icont">
                        <ul class="items">
                            @foreach($news2 as $news2)
                            <li class="list-item">
                                <a href="/news/{{$news2->id}}">
                                    <div class="txt"><img src="{{$news2->pic}}"/>
                                        <h1>{{$news2->title}}</h1>
                                        <p>
                                            <span>#网贷攻略</span>{!!date('Y-m-d',$news2->ctime)!!}
                                            <em class="y">2027&nbsp;阅读</em>
                                        </p>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="layui-tab-item">
                    <div class="icont">
                        <ul class="items">
                            @foreach($news3 as $news3)
                            <li class="list-item">
                                <a href="/news/{{$news3->id}}">
                                    <div class="txt"><img src="{{$news3->pic}}"/>
                                        <h1>{{$news3->title}}</h1>
                                        <p>
                                            <span>#办卡提额</span>{!!date('Y-m-d',$news3->ctime)!!}
                                            <em class="y">2027&nbsp;阅读</em>
                                        </p>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <script>
            layui.use('element',function(){
                var $ = layui.jquery,
                element = layui.element; 
            });
        </script>
@endsection