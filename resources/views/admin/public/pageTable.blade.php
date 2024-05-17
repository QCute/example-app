<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <style>
        .layui-card-body {
            min-height: calc(100vh - 100px);
            display: flex; 
            flex-direction: column;
            /* justify-content: center; */
            align-items: center; 
        }

        .table-search-form {
            width: 66%;
        }

        .layui-row-table {
            width: 100%;
            flex-grow: 1;
        }

        .table {
            width: 100%;
            height: 100%;
        }

        .layui-table-view {
            width: 100%;
        }

        .table-page {
            align-self: flex-end;
        }

        .table-page a, .table-page span, .table-page em {
            user-select: none;
        }
    </style>
</head>

<body>
    <div class="pear-container">
        <div class="layui-card">
            <div class="layui-card-body">
                <form id="table-search-form" class="layui-form table-search-form layui-hide">
                    @foreach ($searches as $item)
                    @if ($item->type ?? '' == 'time')
                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <label class="layui-form-label">{{ $item->title }}</label>
                            <input type="text" style="display: none;" name="{{ $item->field }}" id="table-search-date-hide-{{ $item->field }}">
                            <div class="layui-inline" id="table-search-date-{{ $item->field }}">
                                <div class="layui-input-inline">
                                    <input type="text" autocomplete="off" id="table-search-date-begin-{{ $item->field }}" class="layui-input table-search-date-begin" placeholder="">
                                </div>
                                <div class="layui-form-mid">-</div>
                                <div class="layui-input-inline">
                                    <input type="text" autocomplete="off" id="table-search-date-end-{{ $item->field }}" class="layui-input table-search-date-end" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{ $item->title }}</label>
                        <div class="layui-input-block">
                            <input type="text" name="{{ $item->field }}" placeholder="{{ $item->title }}" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    @endif
                    @endforeach
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button type="reset" class="layui-btn layui-btn-primary">{{ trans('admin.form.reset') }}</button>
                            <button class="layui-btn" lay-submit lay-filter="table-search-form-submit">{{ trans('admin.form.submit') }}</button>
                        </div>
                    </div>
                </form>
                <script type="text/html" id="table-tool-bar">
                    <div class="layui-btn-container">
                        <button class="layui-btn layui-btn-sm" lay-event="LAY_TABLE_ADD"><i class="layui-icon layui-icon-addition"></i>{{ trans('admin.form.create') }}</button>
                        <!--
                        <button class="layui-btn layui-btn-sm layui-bg-red" lay-event="LAY_TABLE_DELETE"><i class="layui-icon layui-icon-delete"></i>删除</button>
                        -->
                    </div>
                </script>
                <table id="table" class="table layui-hide" lay-filter="table"></table>
                <script type="text/html" id="table-tag">
                    <span class="layui-btn layui-btn-xs layui-bg-blue" style="margin-right: 10px;">@{{= d[d.LAY_COL.field] }}</span>
                </script>
                <script type="text/html" id="table-tags">
                    @{{#  layui.each(d[d.LAY_COL.field].split(','), function(index, item){ }}
                    <span class="layui-btn layui-btn-xs layui-bg-blue" style="margin-right: 10px;">@{{= item }}</span>
                    @{{#  }); }}
                </script>
                <script type="text/html" id="table-json-tag">
                    <span class="layui-btn layui-btn-xs layui-bg-blue" style="margin-right: 10px;">@{{= d.LAY_COL.tag.split('.').reduce((a, i) => a[i], d[d.LAY_COL.field]) }}</span>
                </script>
                <script type="text/html" id="table-json-tags">
                    @{{#  layui.each(d[d.LAY_COL.field], function(index, item){ }}
                    <span class="layui-btn layui-btn-xs layui-bg-blue" style="margin-right: 10px;">@{{= d.LAY_COL.tag.split('.').reduce((a, i) => a[i], item) }}</span>
                    @{{#  }); }}
                </script>
                <script type="text/html" id="table-img">
                    <img src="@{{ d[d.LAY_COL.field] }}" style="width: 24px; height: 24px">
                </script>
                <script type="text/html" id="table-operate-bar">
                    <div class="layui-clear-space">
                        <a class="layui-btn layui-btn-xs layui-bg-blue" lay-event="LAY_TABLE_EDIT"><i class="layui-icon layui-icon-edit"></i>{{ trans('admin.table.edit') }}</a>
                        <a class="layui-btn layui-btn-xs layui-bg-red" lay-event="LAY_TABLE_DELETE"><i class="layui-icon layui-icon-delete"></i>{{ trans('admin.table.delete') }}</a>
                    </div>
                </script>
                <div id="table-page-bar" class="table-page"></div>
            </div>
        </div>
    </div>
    <script>
        layui.use(['admin', 'popup', 'nprogress', 'table'], function () {
            var admin = layui.admin;
            var popup = layui.popup;
            var progress = layui.nprogress;
            var form = layui.form;
            var table = layui.table;
            var page = layui.laypage;
            var laydate = layui.laydate;

            // 日期范围 - 左右面板独立选择模式
            @foreach ($searches as $item)
            @if($item->type ?? '' == 'time')
            laydate.render({
                elem: '#table-search-date-{{ $item->field }}',
                range: ['#table-search-date-begin-{{ $item->field }}', '#table-search-date-end-{{ $item->field }}'],
                done: function(value) {
                    document.querySelector('#table-search-date-hide-{{ $item->field }}').value = value;
                }
            });
            @endif
            @endforeach

            // 搜索提交
            form.on('submit(table-search-form-submit)', function(data){
                const query = Object
                    .keys(data.field)
                    .filter(k => data.field[k])
                    .map(k => `${k}=${data.field[k]}`)
                    .join('=');

                admin.changePage({ url: `${location.pathname}?${query}`, type: 1 });

                return false;
            });

            table.render({
                id: 'table',
				elem: '#table',
                toolbar: '#table-tool-bar',
                defaultToolbar: [
                    'filter', 
                    {
                        title: '{{ trans('admin.table.download') }}',
                        layEvent: 'LAYTABLE_EXPORT',
                        icon: 'layui-icon-download-circle'
                    }, 
                    {
                        title: '{{ trans('admin.table.export') }}',
                        layEvent: 'LAY_TABLE_DOWNLOAD',
                        icon: 'layui-icon-export'
                    }, 
                    {
                        title: '{{ trans('admin.table.search') }}',
                        layEvent: 'LAY_TABLE_SEARCH',
                        icon: 'layui-icon-search'
                    }
                ],
				cols: [@json($header)],
                data: @json($rows),
            });

            // 工具栏事件
            table.on('toolbar(table)', function (value) {
                switch (value.event) {
                    case 'LAY_TABLE_ADD': {
                        admin.changePage({ url: `${location.pathname}/create`, type: 1 });
                    };break;
                    case 'LAY_TABLE_DOWNLOAD':{
                    };break;
                    case 'LAY_TABLE_SEARCH':{
                        const search = document.querySelector('#table-search-form');
                        search.classList.toggle('layui-hide');
                    };break;
                };
            });

            // 触发单元格工具事件
            table.on('tool(table)', function (value) { // 双击 toolDouble
                switch(value.event) {
                    case 'LAY_TABLE_SHOW': {
                        admin.changePage({ url: `${location.pathname}/${value.data.id}`, type: 1 });
                    };break;
                    case 'LAY_TABLE_EDIT': {
                        admin.changePage({ url: `${location.pathname}/${value.data.id}/edit`, type: 1 });
                    };break;
                    case 'LAY_TABLE_DELETE': {
                        layer.confirm('{{ trans('admin.table.delete') }}: ' + value.data.id, async function (index) {

                            // /path/to/name/create => /path/to/name
                            const response = await fetch(`${location.pathname}/${value.data.id}`, {
                                method: 'DELETE',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-Requested-With': 'XMLHttpRequest',
                                },
                                body: JSON.stringify({ _token: '{{ csrf_token() }}' })
                            });
                            const { code, msg } = await response.json();

                            if(code || msg) {
                                popup.failure('{{ trans('admin.form.delete_failed') }}: ' + msg);
                                return false;
                            }

                            popup.success('{{ trans('admin.form.delete_succeed') }}', function() {
                                value.del(); // 删除对应行（tr）的DOM结构
                                layer.close(index);
                            });

                            return false;
                        });
                    };break;
                }
            });

            page.render({
                elem: 'table-page-bar', // 元素 id
                count: {{ $total }}, // 数据总数
                curr: {{ $page }},
                limit: {{ $perPage }},
                limits: [10, 20, 30, 40, 50, 60, 70, 80, 90, 100],
                layout: ['count', 'prev', 'page', 'next', 'limit', 'refresh', 'skip'], // 功能布局
                jump: function(value, first) {
                    // 跳过第一次
                    if(first) return;
                    const params = new URL(location.href).searchParams;
                    params.set('page', value.curr);
                    params.set('perPage', value.limit);
                    const search = Array.from(params).map(([k, v]) => `${k}=${v}`).join('&');
                    admin.changePage({ url: `${location.pathname}?${search}`, type: 1 });
                    return false;
                }
            });

            @if (!empty($date))
            // const date = new Date();
            // const year = date.getFullYear();
            // const month = (date.getMonth() + 1).toString().padStart(2, '0');
            // const day = date.getDate().toString().padStart(2, '0');
            // const params = new URL(location.href).searchParams;
            // const begin = params.get('begin') || `${year}-${month}-${day}`;
            // const end = params.get('end') || `${year}-${month}-${day}`;

            var date = layui.laydate;
            // render
            date.render({
                elem: '#date-range',
                range: ['#begin-date', '#end-date'],
                value: '{{$date->begin}} - {{$date->end}}',
                done: function (value, begin, end) {
                    console.log(value, begin, end);
                    const [beginTime, _, endTime] = value.trim().split(' ');
                    admin.changePage({ 'url': `${location.pathname}?begin=${beginTime}&end=${endTime}`, 'type': 0 });
                }
            });
            @endif
            
            @if (!empty($date))
            var date = layui.laydate;
            // render
            date.render({
                elem: '#date-range',
                range: ['#begin-date', '#end-date'],
                value: '{{$date->begin}} - {{$date->end}}',
                done: function (value, begin, end) {
                    console.log(value, begin, end);
                    const [beginTime, _, endTime] = value.trim().split(' ');
                    admin.changePage({ 'url': `${location.pathname}?begin=${beginTime}&end=${endTime}`, 'type': 0 });
                }
            });
            @endif

            @if (!empty($date))
                <div class="layui-row layui-row-date">
                    <div class="layui-inline">
                        <label class="layui-form-label">{{ trans('admin.form.date.range') }}</label>
                        <div class="layui-inline" id="date-range">
                            <div class="layui-input-inline">
                                <input type="text" autocomplete="on" id="begin-date" class="layui-input" placeholder="{{ trans('admin.form.date.range.begin') }}">
                            </div>
                            <div class="layui-form-mid">-</div>
                            <div class="layui-input-inline">
                                <input type="text" autocomplete="on" id="end-date" class="layui-input" placeholder="{{ trans('admin.form.date.range.end') }}">
                            </div>
                        </div>
                    </div>
                </div>
                @endif
        });
    </script>
    <div class="layui-row layui-row-date">
                    <div class="layui-inline">
                        <label class="layui-form-label">{{ trans('admin.form.date.range') }}</label>
                        <div class="layui-inline" id="date-range">
                            <div class="layui-input-inline">
                                <input type="text" autocomplete="on" id="begin-date" class="layui-input" placeholder="{{ trans('admin.form.date.range.begin') }}">
                            </div>
                            <div class="layui-form-mid">-</div>
                            <div class="layui-input-inline">
                                <input type="text" autocomplete="on" id="end-date" class="layui-input" placeholder="{{ trans('admin.form.date.range.end') }}">
                            </div>
                        </div>
                    </div>
                </div>
                @endif
</body>

</html>