@extends('backend.template.master')

@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">
                        <i class="nav-icon fas fa-film"></i> Video
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
                        <h3 class="card-title"><i class="fa fa-film"></i> Form Add Video</h3>
                    </div>

                    <form role="form" method="post" action="{{route('video.store')}}" enctype="multipart/form-data">
                        {{ csrf_field()}}
                        <div class="card-body">

                            <div class="form-group">
                                <label>Title Video *</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="title">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Url Video *</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="url">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Thumbnail *</label>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" name="thumbnail">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Embed Video *</label>
                                <div class="input-group mb-3">
                                    <textarea type="text" class="form-control" name="embed" rows="2"></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Description *</label>
                                        <textarea id="textarea" type="text" name="description"></textarea>
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
                                <div class="col-sm-6">
                                    <!--  -->
                                    <div class="form-group">
                                        <label>Ustad*</label>
                                        <select class="select2" required name="penceramah_id" data-placeholder="Select a State" style="width: 100%;">
                                            @foreach($dt_menu_categories as $dt)
                                            <option name="penceramah_id" value="{{$dt->id}}">
                                                {{$dt->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!--  -->
                                </div>
                            </div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-save"></i> Save</button>
                            <a href="{{ route('video.index')}}" class="btn btn-sm btn-danger"><i class="fa fa-backspace"></i> Cancel </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@stop