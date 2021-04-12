@extends('backend.template.master')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">Manage User</h5>

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="{{ route('user.create')}}" class="btn btn-sm btn-success"><i class="fas fa-plus-circle"></i> User</a>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="row">
            <div class="col-12">

                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data User</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Active</th>
                                    @can('role-create')
                                    <th>Act</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $index=>$dt)
                                <tr>
                                    <td>{{ ++$index }}</td>
                                    <td>{{ $dt->username}}</td>
                                    <td>{{ $dt->email}}</td>
                                    <td>{{ $dt->status}}</td>
                                    @can('role-create')
                                    <td>
                                        <form action="{{ route('user.destroy', $dt->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('user.edit', $dt->id) }}" class="btn btn-warning btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <button class="btn btn-danger btn-xs" onclick="return confirm('Are You Sure Delete This Data ?')"> 
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                    @endcan
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Active</th>
                                    @can('role-create')
                                    <th>Act</th>
                                    @endcan
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