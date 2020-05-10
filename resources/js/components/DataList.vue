<template>
    <div class="container" id="container">
        <div class="part-one d-flex">
            <div class="pic-area">
                <div class="text-center pic-big">
                    <img class="img-responsive center-block" src="//img.alicdn.com/imgextra/i4/814413924/O1CN01omQpbH1erEktA6qZ4_!!814413924.jpg" width="70px" height="200px;" />
                </div>
                <div class="d-flex justify-content-between align-items-end pic-item">
                    <img src="//img.alicdn.com/imgextra/i4/814413924/O1CN01omQpbH1erEktA6qZ4_!!814413924.jpg" width="50px" height="80px">
                    <img src="//img.alicdn.com/imgextra/i4/814413924/O1CN01omQpbH1erEktA6qZ4_!!814413924.jpg" width="50px" height="80px">
                    <img src="//img.alicdn.com/imgextra/i4/814413924/O1CN01omQpbH1erEktA6qZ4_!!814413924.jpg" width="50px" height="80px">
                    <img src="//img.alicdn.com/imgextra/i4/814413924/O1CN01omQpbH1erEktA6qZ4_!!814413924.jpg" width="50px" height="80px">
                    <img src="//img.alicdn.com/imgextra/i4/814413924/O1CN01omQpbH1erEktA6qZ4_!!814413924.jpg" width="50px" height="80px">
                </div>
            </div>
            <div class="content-area">
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
                    <button v-on:click="request('getListData', '0', '15')">好货生成</button>
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
        <div class="box box-default">
            <div class="overlay" v-bind:class="{hidden:!loading}">
                <i class="fa fa-refresh fa-spin"></i>
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th style='width:3%;'>序</th>
                            <th style='width:10%;'>商品链接</th>
                            <th style='width:10%;'>好货标题</th>
                            <th style='width:7%;'>模块一</th>
                            <th style='width:7%;'>模块二</th>
                            <th style='width:7%;'>模块三</th>
                            <th style='width:8%;'>模块图片</th>
                            <th style='width:8%;'>白底图片</th>
                            <th style='width:8%;'>封面图片</th>
                            <th style='width:8%;'>好货编号</th>
                            <th style='width:8%;'>当前状态</th>
                            <th style='width:4%;'>预览</th>
                            <th style='width:4%;'>文案</th>
                            <th style='width:4%;'>生成</th>
                            <th style='width:4%;'>发布</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(li, i) in list">
                        <td v-html="i+1"></td>
                        <td v-bind:title="li['detail_url']" v-html="li['detail_url']"></td>
                        <td v-bind:title="li['raw_title']" v-html="li['raw_title']"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td v-bind:title="li['images']" v-html="li['images']"></td>
                        <td></td>
                        <td></td>
                        <td v-bind:title="li['nid']" v-html="li['nid']"></td>
                        <td>当前待发布</td>
                        <td>预览</td>
                        <td v-on:click="getContent(li['nid'])">文案</td>
                        <td v-on:click="downloadPicture(li['images'])">生成</td>
                        <td>发布</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-xs"
                                   v-bind:class="operate.class" v-for="operate in operations"
                                   v-bind:title="operate.label"
                                   v-on:click="btnClick(operate,li[operate.bind])">
                                    <span class="fa" v-bind:class="operate.icon" v-if="operate.icon"></span>
                                    <span v-if="!operate.icon"> {{operate.label}}</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                    <li><a href="javascript:" v-on:click="turn('-')">«</a></li>
                    <li v-for="p in maxPage" v-bind:class="{active:p-1==page}"
                        v-if="Math.abs(p-page-1)<10&&(page>=10||page<=maxPage-10)||page<10&&p<20||page>maxPage-10&&p>maxPage-19">
                        <a href="javascript:" v-on:click="turn(p-1)">{{p}}</a></li>
                    <li><a href="javascript:" v-on:click="turn('+')">»</a></li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        data(){
            return {
                url:null,
                storage: {},
                loading: false,
                title: null,
                page: 0,
                perPage: 20,
                maxPage: 1,
                labels: {},
                operations: [],
                list: [],
            }
        },
        methods: {
            request(url, page, perPage){
                var self = this;
                $.get(url, {
                    page: page,
                    perPage: perPage,
                }, function (data, status) {
                    $(".table tbody tr td").each(function(){
                        $(this).attr("title",$(this).text());
                    });
                    console.log(data);
                    self.list = data.list;
                    self.labels = data.labels;
                })
            },
            downloadPicture(images){
                imageArr = images.split(',')
                for(var i=0; i<imageArr.length; i++)
                {
                    // 创建隐藏的可下载链接
                    var eleLink = document.createElement('a');
                    eleLink.download = filename;
                    eleLink.style.display = 'none';
                    // 字符内容转变成blob地址
                    var blob = new Blob([content]);
                    eleLink.href = URL.createObjectURL(blob);
                    // 触发点击
                    document.body.appendChild(eleLink);
                    eleLink.click();
                    // 然后移除
                    document.body.removeChild(eleLink);
                }
            },
            getContent(){

            }
        }
    }
</script>

<style scoped>
    table{
        table-layout:fixed;
    }
    .table tbody tr td{
        overflow: hidden;
        text-overflow:ellipsis;
        white-space: nowrap;
    }
    .part-one{
        height: 352px;
        border: solid 1px;
    }

    .pic-area{
        width: 30%;
        border-right: solid 1px;
    }

    .pic-big{
        height: 250px;
    }

    .pic-item{
        width: auto;
        height: 100px;
    }

    .content-area{
        width: 40%;
        border-right: solid 1px;
    }

    .content-detail{
        margin: 20px;
    }

    .title{
        width: 78%;
        height: 28px;
        font-size: 14px;
        border: 1px solid #ccc;
        position: relative;
    }

    .title input{
        outline-style: none;
        width: 100%;
        height: 26px;
        border: none;
        position: static;
    }

    .num-title{
        position: absolute;
        top: 3px;
        right: 3px;
        background: #fff;
    }

    .save-content{
        font-size: 5px;
        width: 20%;
        text-align: center;
        line-height: 26px;
        background: #f4f5ff ;
        border: solid 1px #ccc;
    }

    .textarea{
        margin-top: 10px;
        width: 100%;
        height: 60px;
        overflow: hidden;
        font-size: 10px;
    }

    .filter-area{
        width: 30%;
        padding: 15px;
    }

    .filter-1{
        /*margin: 10px 10px;*/
        height: 36px;
        width: 100%;
    }

    .search{
        width: 30%;
        margin-right: 5px;
    }

    .page-num{
        width: 15%;
        margin-right: 5px;
        position: relative;
    }

    .filter-3{
        margin-top: 5px;
    }

    .page-num input{
        width: 100%;
        height: 36px;
    }

    .change-num{
        width: 40%;
        position: absolute;
        top: -2px;
        right: 2px;
    }

</style>
