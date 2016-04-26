<!DOCTYPE html>
<html>
<head>
    @include('home.includes.load')
    <meta name="description" content="">
    <meta name="author" content="">

    <title>排队列表 - {{$l_web['web_name']}}</title>
    
</head>

<body>
    <div id="wrapper">
        <!-- Navigation -->
        
        @include('home.includes.nav')

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">排队列表</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                                                                        我的排队列表
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body" id="table_div">
                            @include('home.outQueue.li')
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

    $("#pagination").on('click','li',function(){
        var url = $(this).attr('href');
        $.ajax({
            url:url,
            data:{},
            type:'get',
            success:function(r){
                if(r.error == 0){
                	$("#table_div").html(r.data.html);
                }else{
                    alert('获取失败');
                }
            }
        });

        //阻止a的href 跳转
        return false;
    })
    
    </script>
    
</body>

</html>
