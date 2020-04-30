@extends('layouts.app')
@section('style')
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
    @endsection
@section('content')
    <div class="container">
        {{--part 1 --}}
        <div class="part-one d-flex">
            {{-- 图片区 --}}
            <div class="pic-area">
                {{-- 图片放大 --}}
                <div class="text-center pic-big">
                    <img class="img-responsive center-block" src="//img.alicdn.com/imgextra/i4/814413924/O1CN01omQpbH1erEktA6qZ4_!!814413924.jpg" width="70px" height="200px;" />
                </div>
                {{-- 图片列表 --}}
                <div class="d-flex justify-content-between align-items-end pic-item">
                    <img src="//img.alicdn.com/imgextra/i4/814413924/O1CN01omQpbH1erEktA6qZ4_!!814413924.jpg" width="50px" height="80px">
                    <img src="//img.alicdn.com/imgextra/i4/814413924/O1CN01omQpbH1erEktA6qZ4_!!814413924.jpg" width="50px" height="80px">
                    <img src="//img.alicdn.com/imgextra/i4/814413924/O1CN01omQpbH1erEktA6qZ4_!!814413924.jpg" width="50px" height="80px">
                    <img src="//img.alicdn.com/imgextra/i4/814413924/O1CN01omQpbH1erEktA6qZ4_!!814413924.jpg" width="50px" height="80px">
                    <img src="//img.alicdn.com/imgextra/i4/814413924/O1CN01omQpbH1erEktA6qZ4_!!814413924.jpg" width="50px" height="80px">
                </div>
            </div>
            {{-- 内容区 --}}
            <div class="content-area">
                {{-- 按钮区 --}}
                <div class="g-item">
                    多元好货
                </div>
                <div class="content-detail">
                    <div class="d-flex justify-content-between">
                        <div class="title">
                            <input type="text" value="" name="title" class="title"/>
                            <div class="num-title">
                                <span>22/19</span>
                            </div>
                        </div>
                        <span class="save-content">保存内容</span>
                    </div>
                    <textarea class="textarea" name="model_1" id=""></textarea>
                    <textarea class="textarea" name="model_2" id=""></textarea>
                    <textarea class="textarea" name="model_3" id=""></textarea>
                </div>
            </div>
            {{-- 筛选区 --}}
            <div class="filter-area">
                <div class="filter-1 d-flex">
                    <input type="text" class="search" name="search">
                    <div class="page-num">
                        <input type="text" value="1">
                        <div class="change-num">
                            <span class="glyphicon glyphicon-chevron-up"></span>
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </div>
                    </div>
                    <input type="text" style="width: 50%;">
                </div>
                <div class="filter-2 d-flex">
                    <button v-on:click = "niceGoods" {{--onclick="niceGoods()"--}}>好货生成</button>
                </div>
                <div class="filter-3 d-flex flex-wrap justify-content-between">
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox1" value="option1"> 草稿
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox2" value="option2"> 选品
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox3" value="option3"> 推送
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox4" value="option1"> 优秀
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox5" value="option2"> 查库
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox6" value="option3"> 详情
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox7" value="option3"> 片尾
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox8" value="option3"> 水印
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox9" value="option3"> 加速
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox10" value="option3"> 原创
                    </label>
                </div>
            </div>
        </div>
        <div class="part-two" id="part-two">

            {{-- 数据列表 --}}
            {{--<div class="data-item">
                --}}{{-- 表格 --}}{{--
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <td>序号</td>
                            <td>商品链接</td>
                            <td>好货标题</td>
                            <td>模块一</td>
                            <td>模块二</td>
                            <td>模块三</td>
                            <td>模块图片</td>
                            <td>白底图片</td>
                            <td>封面图片</td>
                            <td>好货编号</td>
                            <td>当前状态</td>
                            <td>预览</td>
                            <td>文案</td>
                            <td>生成</td>
                            <td>发布</td>
                    </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                        </tr>
                        <tr v-for="li in list">
                            <td>1</td>
                            <td>@{{ li['detail_url'] }}</td>
                            <td>@{{ li['raw_title'] }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>图片</td>
                            <td></td>
                            <td></td>
                            <td>dy-@{{ li['nid'] }}</td>
                            <td>好货待发布</td>
                            <td>预览</td>
                            <td>文案</td>
                            <td>生成</td>
                            <td>发布</td>
                        </tr>

                    </tbody>
                </table>
            </div>--}}
            <data-list></data-list>
        </div>
    </div>
    @endsection

@section('script')
    <script>

        function niceGoods()
        {
            $.ajax({
                url: '{{ route('t.getListData') }}',
                type: 'get',
                headers: {
                    "csrf-token": "{{ csrf_token() }}"
                },
                success: function(data){
                    vm.list = data.auctions;
                    for (var i=0; i<vm.list.length; i++){
                        console.log(vm.list[i]['nid']);
                    }
                }
            });
        }
    </script>
    @endsection
