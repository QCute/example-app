<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>{{ config('admin.name') }}</title>
        <link rel="apple-touch-icon" href="/{{ config('admin.vendor.path') }}/pear-admin-site/assets/favicon.ico" type="image/x-icon">
        <link rel="shortcut icon bookmark" href="/{{ config('admin.vendor.path') }}/pear-admin-site/assets/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="{{ admin_asset("./component/pear/css/pear.css") }}" />
        <link rel="stylesheet" href="{{ admin_asset("./admin/css/admin.css") }}" />
        <link rel="stylesheet" href="{{ admin_asset("./admin/css/admin.dark.css") }}" />
        <link rel="stylesheet" href="{{ admin_asset("./admin/css/variables.css") }}" />
        <!--
        <link rel="stylesheet" href="{{ admin_asset("./admin/css/reset.css") }}" />
        -->
        <link href="/{{ config('admin.vendor.path') }}/font-awesome/css/all.min.css" rel="stylesheet">
        <link href="/{{ config('admin.vendor.path') }}/remix-icon/fonts/remixicon.css" rel="stylesheet">
    </head>
    <!-- 结 构 代 码 -->
    <body class="layui-layout-body pear-admin">
        <!-- 布 局 框 架 -->
        <div class="layui-layout layui-layout-admin">
            <!-- 顶 部 样 式 -->
            <div class="layui-header">
                <!-- 菜 单 顶 部 -->
                <div class="layui-logo">
                    <!-- 图 标 -->
                    <img class="logo">
                    <!-- 标 题 -->
                    <span class="title"></span>
                </div>
                <!-- 顶 部 左 侧 功 能 -->
                <ul class="layui-nav layui-layout-left">
                    <li class="collapse layui-nav-item"><a href="#" class="layui-icon layui-icon-shrink-right"></a></li>
                    <li class="refresh layui-nav-item"><a href="#" class="layui-icon layui-icon-refresh-1" loading = 600></a></li>
                </ul>
                <!-- 多 系 统 菜 单 -->
                <div id="control" class="layui-layout-control"></div>
                <!-- 顶 部 右 侧 菜 单 -->
                <ul class="layui-nav layui-layout-right">
                    <li class="layui-nav-item layui-hide-xs layui-form" style="margin-left: 1em;">
                        <select class="channel-select" lay-search="" lay-filter="channel-select-filter">
                            @foreach ($channels as $item)
                            <option class="channel channel-{{ $item->id }}" value="{{ $item->id }}" {{ $item->id == $channel->id ? 'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </li>
                    <li class="layui-nav-item layui-hide-xs layui-form" style="margin-left: 1em;">
                        <select class="server-select" lay-search="" lay-filter="server-select-filter">
                            @foreach ($channels->first()->servers as $item)
                            <option class="hide server server-{{ $item->id }} channel-server-{{ $item->channel->id }}" value="{{ $item->id }}" {{ $item->id == $server->id ? 'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </li>
                    <li class="layui-nav-item layui-hide-xs"><a href="#" class="menuSearch layui-icon layui-icon-search"></a></li>
                    <li class="layui-nav-item layui-hide-xs message"></li>
                    <!--
                    <li class="layui-nav-item layui-hide-xs"><a href="#" class="fullScreen layui-icon layui-icon-screen-full"></a></li>
                    -->
                    <li class="layui-nav-item user">
                        <!-- 头 像 -->
                        <a class="layui-icon layui-icon-username" href="javascript:;"></a>
                        <!-- 功 能 菜 单 -->
                        <dl class="layui-nav-child">
                            <dd>
                                <a user-menu-url="{{ admin_path(config('admin.auth.profile')) }}" user-menu-id="" user-menu-title="{{ trans('admin.profile') }}">
                                    {{ trans('admin.profile') }}
                                </a>
                            </dd>
                            <dd>
                                <a href="javascript:void(0);" class="logout">
                                    {{ trans('admin.logout') }}
                                </a>
                            </dd>
                        </dl>
                    </li>
                    <!-- 主 题 配 置 -->
                    <li class="layui-nav-item setting"><a href="#" class="layui-icon layui-icon-more-vertical"></a></li>
                </ul>
            </div>
            <!-- 侧 边 区 域 -->
            <div class="layui-side layui-bg-black">
                <!-- 菜 单 顶 部 -->
                <div class="layui-logo">
                    <!-- 图 标 -->
                    <img class="logo">
                    <!-- 标 题 -->
                    <span class="title"></span>
                </div>
                <!-- 菜 单 内 容 -->
                <div class="layui-side-scroll">
                    <div id="side"></div>
                </div>
            </div>
            <!-- 视 图 页 面 -->
            <div class="layui-body">
                <!-- 内 容 页 面 -->
                <div id="content"></div>
            </div>
            <!-- 页脚 -->
            <div class="layui-footer layui-text"></div>
            <!-- 遮 盖 层 -->
            <div class="pear-cover"></div>
            <!-- 加 载 动 画 -->
            <div class="loader-wrapper">
                <!-- 动 画 对 象 -->
                <div class="loader"></div>
            </div>
        </div>
        <!-- 移 动 端 便 捷 操 作 -->
        <div class="pear-collapsed-pe collapse">
            <a href="#" class="layui-icon layui-icon-shrink-right"></a>
        </div>
        <!-- 依 赖 脚 本 -->
        <script src="{{ admin_asset("./component/layui/layui.js") }}"></script>
        <script src="{{ admin_asset("./component/pear/pear.js") }}"></script>
        <!-- 框 架 初 始 化 -->
        <script>
            let menu = {}; 
            let href = '';
            // 加载组件
            layui.use(['admin', 'menu', 'jquery', 'popup', 'page', 'nprogress'], function() {
                // jquery serialize
                layui.jquery.fn.serializeObject = function() {
                    return this.serializeArray().reduce((acc, { name, value }) => {
                        acc[name] = acc[name] ? (Array.isArray(acc[name]) ? acc[name].concat([value]) : [acc[name], value]) : value;
                        return acc;
                    }, {});
                };
                var $ = layui.jquery;
                var admin = layui.admin;
                var page = layui.page;
                var popup = layui.popup;
                var progress = layui.nprogress;
                var form = layui.form;
                var layer = layui.layer;
                // progress
                $(document).on("ajaxSend", function(event, state, config) {
                    // if(!menu[config.url]) return;
                    if(config.dataType !== 'html') return;
                    progress.start();
                    history.pushState(null, '', config.url);
                }).on("ajaxComplete", function(event, state, config) {
                    const headers = state
                        .getAllResponseHeaders()
                        .split("\r\n")
                        .filter(i => i)
                        .map(i => i.split(":"))
                        .reduce((acc, [k, v]) => {
                            acc[k] = v;
                            return acc;
                        }, {});
                    if(config.url === '{{ config('admin.vendor.config.url') }}') {
                        menu = state
                            .responseJSON
                            .map(m => [m, m.children])
                            .flat(Number.MAX_VALUE)
                            .filter(m => m.type == 1)
                            .reduce((acc, item) => {
                                acc[item.href] = item;
                                return acc;
                            }, {});
                    }
                    if(config.dataType !== 'html') return;
                    progress.done();
                }).on("ajaxSuccess", function(event, state, config) {
                    const login = (new DOMParser()).parseFromString(state.responseText, 'text/html').head.querySelector('meta[name="login"]');
                    if(login) {
                        throw location.href = "{{ admin_path(config('admin.auth.redirect_to')) }}";
                    }
                }).on("ajaxError", function(event, state, config) {
                    document.write(state.responseText);
                });

                href = location.pathname;
                window.onpopstate = function(event) {
                    if(event.currentTarget.location.pathname == href) return;
                    href = event.currentTarget.location.pathname;
                    admin.changePage({ url: event.currentTarget.location.pathname, type: 1 });
                };

                // yml | json | api
                const path = "{{ admin_path(config('admin.vendor.config.url')) }}";
                const param = 'path' + '=' + location.pathname;
                admin.setConfigurationPath(path + '?' + param);
                
                // 渲染
                admin.render();

                // 注销
                admin.logout(async function() {

                    const url = "{{ admin_path(config('admin.auth.logout')) }}";
                    await fetch(url, {
                        method: 'GET',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest',
                        },
                    });

                    popup.success('{{ trans('admin.logout.success') }}', function() {
                        location.href = "{{ admin_path(config('admin.auth.redirect_to')) }}";
                    });

                    // 清空 tabs 缓存
                    return true;
                });

                const channels = @json($channels);

                // select 事件
                form.on('select(channel-select-filter)', async function(data) {
                    var value = data.value; // 获得被选中的值
                    $('.server-select').empty();
                    const channel = channels[value];

                    // request
                    const url = "{{ admin_path('/channel/change') }}";
                    const response = await fetch(url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest',
                        },
                        body: JSON.stringify({ _token: '{{ csrf_token() }}', channel: value, server: channel.servers[0] || 0 }),
                    });
                    const result = await response.json();

                    const html = channel.servers.map(server => {
                        return '<option value="' + server.id + '">' + server.name + '</option>';
                    });

                    $('.server-select').html(html);
                    form.render('select'); //这个很重要,没有这个新的option不会显示

                    admin.refresh();
                });

                form.on('select(server-select-filter)', async function(data) {
                    // request
                    const url = "{{ admin_path('/server/change') }}";
                    const response = await fetch(url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest',
                        },
                        body: JSON.stringify({ _token: '{{ csrf_token() }}', server: data.value }),
                    });
                    const result = await response.json();

                    admin.refresh();
                });
            });
        </script>        
    </body>
</html>