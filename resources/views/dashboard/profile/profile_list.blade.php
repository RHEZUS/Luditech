@extends('../layouts.dashboard_layout')
@section('title', 'Dasboard')
@section('sidebar')  
 
@section('content')

@if (session('success'))
    <div class="alert alert-success">{{session('success')}}</div>

@endif
@if (session('error'))
    <div class="alert alert-danger">{{session('danger')}}</div>
@endif

<div class="card mx-3 my-3 p-2 bg-white">
    <div class="card-header">
        <h3 class="card-title">Users list table</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>User_id</th>
                    <th>User_name</th>
                    <th>User_email</th>
                    <th>Created_at</th>
                    <th>Number of post</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($users as $item)
                <tr>
                    <td>{{$item['id']}}</td>
                    <td>{{$item['name']}}
                        
                        <p class="options"><a href={{"/dashboard/user/edit/".$item['id']}}>Edit</a> <a href={{"/dashboard/user/delete/".$item['id']}} class="text-danger">Delete</a> <a href="#">liste</a></p>
                    </td>
                    <td>{{$item['email']}}</td>
                    <td>{{$item['created_at']}}</td>
                    <td>X</td>
                </tr>
                @endforeach
                
            </tbody>
            <tfoot>
                <tr>
                    <th>User_id</th>
                    <th>User_name</th>
                    <th>User_email</th>
                    <th>Created_at</th>
                    <th>Number of post</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>

<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
</script>

@stop