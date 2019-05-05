<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Pibook Clone">
    <meta name="author" content="">
    <title>Admin - Pibook</title>
    <base href="{{ asset('') }}">
    <!-- Bootstrap Core CSS -->
    <link href="admin_assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="admin_assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin_assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="admin_assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="admin_assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="admin_assets/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Check editor -->
    <script type="text/javascript" language="javascript" src="admin_assets/ckeditor/ckeditor.js" ></script>

    <!-- tiny editor -->
    <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
</head>

<body>

    <div id="wrapper">

        @include('admin.layout.header');


        @yield('content');

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="admin_assets/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="admin_assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="admin_assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="admin_assets/dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="admin_assets/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="admin_assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script src="admin_assets/js/truncatetext.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script type="text/javascript">
        // function displaymenu(th)
        // {   
        //     $(th).addClass("fav");
        //     th.nextSibling.nextSibling.addClass("in");
        //     alert(th.nextSibling.nextSibling.innerHTML);
        // }
        // $(document).ready(function(){
        //     alert("asdasd");
        //     $("ul#side-menu li a").click(function(){
        //         alert("asdasdasd");   
        //     });
        // });
        $(document).ready(function(){
            $("ul#side-menu li ul").css("display","none");
            $("ul#side-menu li a").click(function(){
                
                if($(this).hasClass("selected")){
                    $(this).removeClass("selected");
                    // $(this).next().removeClass("in");
                    $(this).next().animate({
                        height: "hide"
                    })
                }
                else{
                    $(this).addClass("selected");
                    // $(this).next().addClass("in");
                    $(this).next().animate({
                        height: "show"
                    })
                }
            });
        });

        
</script>
    @yield('script');
    
</body>

</html>
