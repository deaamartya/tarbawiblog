@extends('backend.template.master')

@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h5 class="m-0 text-dark">
                        <i class="nav-icon fas fa-cog"></i> Setting Management - <i class="fa fa-random"></i> Footer Setting
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
                        <h3 class="card-title"><i class="fa fa-random"></i> Form Add Footer</h3>
                    </div>

                    <form role="form" method="post" action="{{route('footer.store')}}">
                        {{ csrf_field()}}
                        <div class="card-body">

                            <div class="form-group">
                                <label>Name Footer*</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" required placeholder="name Footer"name="name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Description *</label>
                                <textarea id="textarea" type="text" name="description"></textarea>
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

                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-save"></i> Save</button>
                            <a href="{{ route('footer.index')}}" class="btn btn-sm btn-danger"><i class="fa fa-backspace"></i> Cancel </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@stop