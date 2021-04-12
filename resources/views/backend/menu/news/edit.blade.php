@extends('backend.template.master')

@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">
                        <i class="nav-icon fas fa-newspaper"></i> Data Edit News Post
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
                        <h3 class="card-title"><i class="fa fa-newspaper"></i> Form Edit News Post</h3>
                    </div>

                    <form role="form" method="post" action="{{route('news.update', $data->id)}}" enctype="multipart/form-data">
                        {{ csrf_field()}}
                        {{ method_field('put')}}
                        <div class="card-body">

                            <div class="form-group">
                                <label>News Title *</label>
                                <div class="input-group mb-3">
                                    <textarea type="text" class="form-control" name="title" required>{{$data->title}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>News Sub Title</label>
                                <div class="input-group mb-3">
                                    <textarea type="text" class="form-control" name="sub_title">{{$data->sub_title}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Multiple</label>
                                <select class="select2" required name="menu_categories_id[]" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                                    @foreach($dt_menu_categories as $dt)
                                    <option name="menu_categories_id[]" @foreach($data->news_menu_category as $ditf) {{ ($ditf->id == $dt->id ) ? 'selected' : ''}}@endforeach type="selected" name="menu_categories_id[]" value="{{ $dt->id }}">
                                        {{$dt->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">

                                <label for="exampleInputFile">
                                    <img src="{{asset('public/Images/News/'.$data->img_news)}}" alt="" width="580px" height="220px" >
                                </label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="img_news" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Detail *</label>
                                <textarea id="textarea" type="text" name="detail">{{$data->detail}}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Tag </label>
                                <input type="text" name="tag" class="form-control" data-role="tagsinput" value="{{$data->tag}}"/>
                            </div>

                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group clearfix">
                                        <div class="icheck-success d-inline">
                                            <input type="checkbox" id="checkboxPrimary1" name="schedule" @if(old('schedule',$data->slide)) checked  @endif>
                                            <label for="checkboxPrimary1">
                                                Schedule This News
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group clearfix">
                                        <div class="icheck-success d-inline">
                                            <input type="checkbox" id="checkboxPrimary2" name="breaking" @if(old('breaking',$data->slide)) checked  @endif>
                                            <label for="checkboxPrimary2">
                                                Add To Breaking News
                                            </label>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-3">
                                    <div class="form-group clearfix">
                                        <div class="icheck-success d-inline">
                                            <input type="checkbox" id="checkboxPrimary3" name="featured" @if(old('featured',$data->featured)) checked  @endif>
                                            <label for="checkboxPrimary3">
                                                Add To Latest News
                                            </label>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-3">
                                    <div class="form-group clearfix">
                                        <div class="icheck-success d-inline">
                                            <input type="checkbox" id="checkboxPrimary4" name="slide" @if(old('featured',$data->slide)) checked  @endif>
                                            <label for="checkboxPrimary4">
                                                Add To Home Slide
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group clearfix">
                                        <div class="icheck-success d-inline">
                                            <input type="checkbox" id="checkboxPrimary5" name="status" @if(old('status',$data->status)) checked  @endif>
                                            <label for="checkboxPrimary5">
                                                Published
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-save"></i> Save</button>
                            <a href="{{ route('news.index')}}" class="btn btn-sm btn-danger"><i class="fa fa-backspace"></i> Cancel </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@stop