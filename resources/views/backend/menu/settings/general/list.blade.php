@extends('backend.template.master')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">
                         <i class="fa fa-cog"></i> Setting Management - <i class="fa fa-globe"></i> General Setting
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
                                <a class="nav-link active" id="custom-tabs-one-logo-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Logo</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-content-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Website Content</a>
                            </li>

                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                <div class="box-body">
                                    <form role="form" method="post" action="{{route('general.update', $Gsetting->id)}}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        {{ method_field('put') }}
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <fieldset class="form-group">
                                                        <label for="basicInputFile">Image Logo</label>
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="card-content">
                                                                    <div class="item-img text-center">
                                                                        <img class="img-fluid" src="{{ asset('public/Images/Logo/'.$Gsetting->logo) }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="custom-file">
                                                            <input type="file" name="logo" class="custom-file-input" id="inputGroupFile01">
                                                            <label class="custom-file-label" for="inputGroupFile01">Change Logo</label>
                                                        </div>
                                                    </fieldset>
                                                </div>

                                                <div class="col-lg-6 col-md-6">
                                                    <fieldset class="form-group">
                                                        <label for="basicInputFile">Image Favicon</label>
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="card-content">
                                                                    <div class="item-img text-center">
                                                                        <img class="img-fluid" src="{{ asset('public/Images/Favicon/'.$Gsetting->favicon) }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="custom-file">
                                                            <input type="file" name="favicon" class="custom-file-input" id="inputGroupFile01">
                                                            <label class="custom-file-label" for="inputGroupFile01">Change Favicon</label>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save</button>
                                    </form>
                                </div>
                            </div>


                            <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                                <form role="form" method="post" action="{{route('general.update', $Gsetting->id)}}">
                                    {{ csrf_field() }}
                                    {{ method_field('put') }}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Name">Website Title</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="title" value="{{$Gsetting->title}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Name">Tag </label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="populartag" value="{{$Gsetting->populartag}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="Name">Address </label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="address" value="{{$Gsetting->address}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="Name">Phone </label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
                                                    </div>
                                                    <input type="number" class="form-control" name="phone" value="{{$Gsetting->phone}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="Name">Email </label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
                                                    </div>
                                                    <input type="email" class="form-control" name="email" value="{{$Gsetting->email}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="Name">Fax </label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
                                                    </div>
                                                    <input type="number" class="form-control" name="fax" value="{{$Gsetting->fax}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="Name">Footer Website</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="footer" value="{{$Gsetting->footer}}">
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                    <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save</button>
                                </form>

                            </div>

                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>
@stop