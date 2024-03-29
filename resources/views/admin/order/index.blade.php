@extends('admin.app')

@section('headSection')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.css') }}">
<!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="{{ asset('admin/dist/css/skins/_all-skins.min.css') }}">
@endsection
@section('main-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-ticket" aria-hidden="true"></i>Orders
      <small>Create, Read, Update, Delete</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="">Order Table</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
        <h3 class="box-title">Post</h3>
        <a class='pull-right btn btn-success' href="">Add New</a>
      </div>
      @include('includes.messages')
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>OrderID</th>
                      <th>PizzaID</th>
                      <th>edit</th>

                  </tr>
                </thead>
                <tbody>
                @foreach($orders as $o)
                <tr>
                    <td>{{$o->id}}</td>
                    <td>{{$o->address}}</td>
                    <td>{{$o->phone}}</td>
                    <td>{{$o->email}}</td>
                    <td>{{$o->pizza_id}}</td>
                    <td>{{$o->order_id}}</td>
{{--                    <td><a href="  {{route('pizza.edit')}}?id={{$p->id}}"><span class="glyphicon glyphicon-edit"></span></a></td>--}}
                <td>
{{--                      <form id="delete-form-" method="post" action="{{ route('post.destroy',$post->id) }}" style="display: none">--}}
{{--                        {{ csrf_field() }}--}}
{{--                        {{ method_field('DELETE') }}--}}
{{--                      </form>--}}
                      <a href="" onclick="
                        if(confirm('Are you sure, You Want to delete this?'))
                          {
                            event.preventDefault();
                            document.getElementById('delete-form-').submit();
                          }
                          else{
                            event.preventDefault();
                          }" ><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                </tr>
                @endforeach
                          </tr>

                </tbody>
                <tfoot>
                <tr>
                    <th>S.No</th>
                    <th>Title</th>
                    <th>Sub Title</th>
                    <th>Slug</th>
                    <th>Creatd At</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
@section('footerSection')
<!-- jQuery 3 -->
<script src="{{ asset('admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('admin/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('admin/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin/dist/js/demo.js') }}"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@endsection
