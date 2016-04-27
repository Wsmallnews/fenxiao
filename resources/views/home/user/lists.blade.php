<!DOCTYPE html>
<html>
<head>
    @include('home.includes.load')
    <meta name="description" content="">
    <meta name="author" content="">

    <title>用户列表 - {{$l_web['web_name']}}</title>
    
</head>

<body>
    <div id="wrapper">
        <!-- Navigation -->
        
        @include('home.includes.nav')

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">会员列表</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                                                                        我的会员列表
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body" id="list_div">
                            <div id="search_div">
                                <form class="form-inline" id="search_form">
                                    <div class="form-group">
                                        <label>用户名</label>
                                        <input type="text" class="form-control" name="keyword" placeholder="关键字">
                                    </div>
                                    <button type="button" class="btn btn-primary" id="search">搜索</button>
                                </form>
                            </div>
                            <div id="table_div">
                                @include('home.user.li')
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    @include('home.includes.loadjs')
    <script type="text/javascript" >
list.page("id",'');
//     $("#table_div").on('click','li.page_num',function(){
//         var url = $(this).find('a').attr('href');

//         $.ajax({
//             url:url,
//             data:{},
//             type:'get',
//             success:function(r){
//                 if(r.error == 0){
//                 	$("#table_div").html(r.data.html);
//                 }else{
//                     alert('获取失败');
//                 }
//             }
//         });

//         //阻止a的href 跳转
//         return false;
//     })
    
//     $("#search").on('click',function(){
//         var search_data = l.parseFormJson("#search_form");

        
//     })
    
    </script>
    
</body>

</html>
