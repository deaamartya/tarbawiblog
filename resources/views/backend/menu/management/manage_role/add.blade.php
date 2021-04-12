@extends('backend.template.master')

@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        <i class="nav-icon fas fa-tasks"></i> Manage Role
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fa fa-tasks"></i> Form Add Role</h3>
                    </div>

                    <form role="form" method="post" action="{{route('role.store')}}">
                        {{ csrf_field()}}
                        <div class="card-body">

                            <div class="form-group">
                                <label for="Name">Role Name</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                            </div>
                            <div class="row">
                                @foreach($data as $value)

                                <div class="col-3">
                                    <div class="form-group">
                                        <label>
                                            {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                        </label>
                                        {{ $value->name }}
                                    </div>
                                </div>
                                @endforeach

                            </div>


                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-save"></i> Save</button>
                            <a href="{{ route('role.index')}}" class="btn btn-sm btn-danger"><i class="fa fa-backspace"></i> Cancel </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

@stop