<!DOCTYPE html>
<html>
<head>
    @include('home.includes.load')
    <link href="{{ asset('/plus/bootstrap/dist/css/bootstrapValidator.min.css') }}" rel="stylesheet" />
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
                        <div class="panel-body" id="table_div">
                            @include('home.user.li')
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
