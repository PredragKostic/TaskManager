
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="{{ url('admin/css/all.min.css') }}" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="{{ url('admin/css/dataTables.bootstrap4.css') }}" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ url('admin/css/sb-admin.css') }}" rel="stylesheet">
  @yield('css')
</head>

<body id="page-top">

 @include('admin.partials.topmanu')
  <div id="wrapper">

    @include('admin.partials.sidemenu')
    <div id="content-wrapper">

      <div class="container-fluid">

        @yield('content')

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  

  <!-- Bootstrap core JavaScript-->
  <script src="{{ url('admin/js/jquery.min.js') }}"></script> 
  <script src="{{ url('admin/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ url('admin/js/jquery.easing.min.js') }}"></script>

  <!-- Page level plugin JavaScript-->
  <script src="{{ url('admin/js/Chart.min.js') }}"></script>
  <!-- <script src="{{ url('admin/js/jquery.dataTables.js') }}"></script> -->
  <!-- <script src="{{ url('admin/js/dataTables.bootstrap4.js') }}"></script> -->

  <!-- Custom scripts for all pages-->
  <script src="{{ url('admin/js/sb-admin.min.js') }}"></script>

  <!-- Demo scripts for this page-->
  <script src="{{ url('admin/js/datatables-demo.js') }}"></script>
  <script src="{{ url('admin/js/chart-area.js') }}"></script>

   @yield('js')

</body>

</html>
