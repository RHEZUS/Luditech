@extends('../layouts.dashboard_layout')
@section('title', 'Dasboard')
@section('sidebar')
    
 
@section('content')

@if(session('success'))
    
    <div class="alert alert-success">
        <strong>Success!&nbsp;&nbsp;</strong>{{session('success')}}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger">
        <strong>Error! &nbsp;&nbsp;</strong>{{session('error')}}
    </div>

@endif

<div class="card mx-3 my-3 p-2 bg-white">
    <div class="card-header">
        <h3 class="card-title">List of causes <span><a href="{{route("cause_form")}}" class="btn btn-primary mx-3">Add New</a></span></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col"># Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Date</th>
                    <th scope="col">Category</th>
                    <th scope="col">Author</th>
                    <th scope="col">Created At</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($cause as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>
                        {{$item->title}}
                        <p class="options"><a href={{"edit/".$item['id']}}>Edit</a> <a href={{"delete/".$item['id']}} class="text-danger">Delete</a> <a href="#">Detail</a></p>
                    </td>
                    <td>{{$item->date}}</td>
                    <td>{{$item->category->title}}</td>
                    <td>{{$item->author->name}}</td>
                    <td>{{$item['created_at']}}</td>
                </tr>
                @endforeach
                
            </tbody>
            <tfoot>
                <tr>
                    <th scope="col"># Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Date</th>
                    <th scope="col">Category</th>
                    <th scope="col">Author</th>
                    <th scope="col">Created At</th>
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
