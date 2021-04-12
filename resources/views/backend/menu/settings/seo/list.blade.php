@extends('backend.template.master')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">
                        <i class="fa fa-cog"></i> Setting Management - <i class="fa fa-wrench"></i> Seo Setting
                    </h5>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-one-logo-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Tab Seo Settings </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                <div class="box-body">
                                    <form role="form" method="post" action="{{route('seo.update', $Seo->id)}}">
                                        {{ csrf_field() }}
                                        {{ method_field('put') }}
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="Name">Google Analytics Code</label>
                                                        <div class="input-group mb-3">
                                                            <textarea type="text" class="form-control" name="code_analytics" rows="8"> {{$Seo->code_analytics}} </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Metakeyword</label>
                                                <textarea id="textarea" type="text" name="metakeyword">{{ $Seo->metakeyword}}</textarea>
                                            </div>

                                        </div>
                                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@stop