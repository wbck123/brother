<div class="banner">
            <div id="focus" class="focus">
                <div class="hd"><ul></ul></div>
                <div class="bd">
                    <ul>
                    	@foreach($ads as $ads)
                        <li>
                            <a href="/"><img src="http://www.ppxlm666.com//Public/upload/images/1806/13/100433990388001269.jpg"/></a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <script src="/admins/js/TouchSlide.1.1.js">
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