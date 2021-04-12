@extends('backend.template.master')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark"><i class="fa fa-sitemap"></i> Menu Category</h5>

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="{{ route('menu-category.create')}}" class="btn btn-sm btn-success"><i class="fas fa-plus-circle"></i> Menu Category</a>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Table List Menu Category</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Parent</th>
                                    <th>Status</th>
                                    <th>Act</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $index=>$dt)
                                <tr>
                                    <td>{{ ++$index }}</td>
                                    <td>{{ $dt->name}}</td>
                                    <td>{{ $dt->childrenCategories ? $dt->childrenCategories->name : ''}}</td>
                                    <td>
                                        @if($dt->status==1)
                                        <span class="badge badge-success"> Active </span>
                                        @else
                                        <span class="badge badge-danger"> InActive </span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('menu-category.destroy', $dt->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('menu-category.edit', $dt->id) }}" class="btn btn-warning btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <button class="btn btn-danger btn-xs" onclick="return confirm('Are You Sure Delete This Data ?')"> 
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Parent</th>
                                    <th>Status</th>
                                    <th>Act</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
</div>
@stop