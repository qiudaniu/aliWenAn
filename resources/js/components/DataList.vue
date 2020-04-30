<template>
    <div class="box box-default" id="DataTable">
        <button v-on:click="request('getListData', '0', '15')">好货生成</button>
        <div class="overlay" v-bind:class="{hidden:!loading}">
            <i class="fa fa-refresh fa-spin"></i>
        </div>
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th style='width:3%;'>序号</th>
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
                    <td></td>
                    <td></td>
                    <td></td>
                    <td v-bind:title="li['nid']" v-html="li['nid']"></td>
                    <td>当前待发布</td>
                    <td>预览</td>
                    <td>文案</td>
                    <td>生成</td>
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
</template>

<script>

    export default {
        name: "DataList",
        /*mounted() {
            this.init();
        },*/
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
                    // $('#DataTable').bootstrapTable({
                    //     columns: [
                    //         {
                    //             formatter: function (value, row, index, field) {
                    //                 var span=document.createElement('span');
                    //                 span.setAttribute('title',value);
                    //                 span.innerHTML = value;
                    //                 return span.outerHTML;
                    //             }
                    //          },
                    //     ]
                    // });
                    $(".table tbody tr td").each(function(){
                        $(this).attr("title",$(this).text());
                    });
                    console.log(data);
                    self.list = data.list;
                    self.labels = data.labels;
                })
            },
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
</style>
