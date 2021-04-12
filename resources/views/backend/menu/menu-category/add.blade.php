@extends('backend.template.master')

@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">
                        <i class="nav-icon fas fa-sitemap"></i> Menu Category
                    </h5>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fa fa-sitemap"></i> Form Add Menu Category</h3>
                    </div>

                    <form role="form" method="post" enctype="multipart/form-data" action="{{route('menu-category.store')}}">
                        {{ csrf_field()}}
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="Name">Menu Name Category</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                </div>

                                <div class="form-group col-sm-6">
                                    {!! Form::label('category_id', 'Parent') !!}
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
                                        </div>

                                        {!! General::selectMultiLevel('category_id', $menus, ['class' => 'form-control', 'selected' => !empty(old('category_id')) ? old('category_id') : (!empty($menus['category_id']) ? $menus['category_id'] : ''), 'placeholder' => '-- Choose Category Menu--']) !!}
                                    </div>
                                </div>

                                <div class="form-group col-sm-6">
                                    {!! Form::label('status', 'Status') !!}
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
                                        </div>
                                        {!! Form::select('status', $statuses , null, ['class' => 'form-control', 'required', 'placeholder' => '-- Set Status --']) !!}
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <input type="file" name="image" style="max-width:200px">
                                </div>
                            </div>
                            <!-- images -->
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-save"></i> Save</button>
                            <a href="{{ route('menu-category.index')}}" class="btn btn-sm btn-danger"><i class="fa fa-backspace"></i> Cancel </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

@stop