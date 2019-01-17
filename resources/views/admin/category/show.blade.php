@extends('admin.layouts.app')

@section('headSection')
<link rel="stylesheet" href="{{ asset('public/admin/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection
@section('main-content')
  <style>
    #menu-category{
      color:white;
    }
    table.dataTable thead > tr > th{
      padding-right:0;
      padding-left:0;
    }
    td{
      text-align:center;
    }
    td input{
      text-align:center;
    }
  </style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
    {{--<section class="content-header">--}}
        {{--<h1>--}}
            {{--All Categories--}}
        {{--</h1>--}}
        {{--<ol class="breadcrumb">--}}
            {{--<li><a href="#"><i class="fa fa-dashboard"></i>Admin</a></li>--}}
            {{--<li><a href="#">Categories</a></li>--}}

        {{--</ol>--}}
    {{--</section>--}}

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Event Categories</h3>
        <a class='col-lg-offset-5 btn btn-success add-new' href="{{ route('category.create') }}">Add New</a>
        @include('includes.messages')
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div class="box">
                    <div class="box-header">
                      {{--<h3 class="box-title">Data Table With Full Features</h3>--}}
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <table id="example1" class="table table-bordered table-striped" style="width:100%">
                        <thead>
                        <tr>
                          <th>No</th>
                          <th>Category Name</th>
                          <th>Edit</th>
                          <th>Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($categories as $category)
                          <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $category->category_name}}</td>
                              <td><a href="{{ route('category.edit',$category->id) }}"><span class="glyphicon glyphicon-edit"></span></a></td>
                              <td>
                                <form id="delete-form-{{ $category->id }}" method="post" action="{{ route('category.destroy',$category->id) }}" style="display: none">
                                  {{ csrf_field() }}
                                  {{ method_field('DELETE') }}
                                </form>
                                <a href="" onclick="
                                if(confirm('Are you sure, You Want to delete this?'))
                                    {
                                      event.preventDefault();
                                      document.getElementById('delete-form-{{ $category->id }}').submit();
                                    }
                                    else{
                                      event.preventDefault();
                                    }" ><span class="glyphicon glyphicon-trash"></span></a>
                              </td>
                            </tr>
                          </tr>
                        @endforeach
                        </tbody>

                      </table>
                    </div>
                    <!-- /.box-body -->
                  </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        Footer
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('footerSection')
<script src="{{ asset('public/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('public/admin/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
        "ordering": false,
        "info":     false,
        "scrollX": true
    });
  });
</script>
@endsection