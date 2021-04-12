@extends('backend.template.master')

@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">
                        <i class="nav-icon fas fa-paper-plane"></i> Social Media
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
                        <h3 class="card-title"><i class="fa fa-paper-plane"></i> Form Add Social Media</h3>
                    </div>

                    <form role="form" method="post" action="{{route('social.store')}}">
                        {{ csrf_field()}}
                        <div class="card-body">

                            <div class="form-group">
                                <label>Name *</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Code *</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="code">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Link *</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="link">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Position*</label>
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" name="position">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Status*</label>
                                        <div class="input-group mb-3">
                                            <select  name="status"  class="form-control">
                                                <option >Select Status</option>
                                                <option value="1">Published / Active</option>
                                                <option value="0">Unpublished / Un-Active</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-save"></i> Save</button>
                            <a href="{{ route('social.index')}}" class="btn btn-sm btn-danger"><i class="fa fa-backspace"></i> Cancel </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@stop