@extends('common.admin')

@section('content')
        <blockquote class="layui-elem-quote layui-bg-red">
            这儿是一句话
        </blockquote>

        <div class="layui-fluid">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-xs12 layui-col-sm12 layui-col-md6 layui-col-lg6">
                    <section class="layui-panel">
                        <div class="layui-panel-body">
                            <table class="layui-table">
                                <tr>
                                    <td><span>系统名称:</span></td>
                                    <td><span>金融系统【企业版】</span></td>
                                </tr>
                                <tr>
                                    <td><span>博客版本:</span></td>
                                    <td><span>{{ config('home.version') }}</span></td>
                                </tr>
                                <tr>
                                    <td><span>操作系统:</span></td>
                                    <td>{{ PHP_OS }}</td>
                                </tr>
                                <tr>
                                    <td><span>PHP版本:</span></td>
                                    <td>{{ PHP_VERSION }}</td>
                                </tr>
                                <tr>
                                    <td><span>Mysql版本:</span></td>
                                    <td>{{ mysqli_get_client_version() }}</td>
                                </tr>
                                <tr>
                                    <td><span>服务器信息:</span></td>
                                    <td>{{ $_SERVER ['SERVER_SOFTWARE'] }}</td>
                                </tr>
                                <tr>
                                    <td><span>脚本最大执行时间(s):</span></td>
                                    <td>{{ get_cfg_var("max_execution_time") }}</td>
                                </tr>
                                <tr>
                                    <td><span class="tit">上传限制:</span></td>
                                    <td>{{ get_cfg_var ("upload_max_filesize") }}</td>
                                </tr>
                                <tr>
                                    <td><span>当前时间:</span></td>
                                    <td>{{ date("Y-m-d H:i:s") }}</td>
                                </tr>
                            </table>
                        </div>
                    </section>
                </div>
                <!-- JVM概览 -->
                <div class="layui-col-xs12 layui-col-sm12 layui-col-md6 layui-col-lg6">
                    <section class="layui-panel">
                        <div class="layui-panel-body">
                            <table class="layui-table">
                                <tr>
                                    <td><span>JVM信息:</span></td>
                                    <td><span>Java HotSpot(TM) 64-Bit Server VM</span></td>
                                </tr>
                                <tr>
                                    <td><span>博客版本:</span></td>
                                    <td><span>{{ config('home.version') }}</span></td>
                                </tr>
                                <tr>
                                    <td><span>JAVA_HOME:</span></td>
                                    <td>/usr/java/jdk1.8.0_144/jre</td>
                                </tr>
                                <tr>
                                    <td><span>工作目录:</span></td>
                                    <td>/work/demo/renren-security-pro</td>
                                </tr>
                                <tr>
                                    <td><span>JVM占用内存:</span></td>
                                    <td>354MB</td>
                                </tr>
                                <tr>
                                    <td><span>JVM空闲内存:</span></td>
                                    <td>178MB</td>
                                </tr>
                                <tr>
                                    <td><span>JVM最大内存:</span></td>
                                    <td>843MB</td>
                                </tr>
                                <tr>
                                    <td><span>当前用户:</span></td>
                                    <td>root</td>
                                </tr>
                                <tr>
                                    <td><span>CPU负载:</span></td>
                                    <td>1.47%</td>
                                </tr>
                            </table>
                        </div>
                    </section>
                </div>
            </div>
        </div>
@endsection