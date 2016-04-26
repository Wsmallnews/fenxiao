<!DOCTYPE html>
<html>
<head>
    @include('home.includes.load')
    <meta name="description" content="">
    <meta name="author" content="">

    <title>加入排队  - {{$l_web['web_name']}}</title>
    
</head>

<body>
    <div id="wrapper">
        <!-- Navigation -->
        
        @include('home.includes.nav')

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">加入排队</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="col-lg-12 row">
                <form id="defaultForms" method="post" class="form-horizontal" action="{{url('home/inDoAdd')}}">
                    
                    <div class="form-group">
                        <label class="col-lg-3 control-label">排队金额</label>
                        <div class="col-lg-5">
                            <select name="money" class="form-control">
                                <option value="">请选择</option>
                                <option value="1500">1500元</option>
                                <option value="2500">2500元</option>
                                <option value="3500">3500元</option>
                                <option value="4500">4500元</option>
                                <option value="5500">5500元</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-lg-9 col-lg-offset-3">
                            <button type="submit" class="btn btn-info" id="validateBtn">加入排队</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    @include('home.includes.loadjs')

    <script>

    @if($errors->any())
        alert("{{$errors->first()}}");
    @endif
    
    </script>
    
</body>

</html>
