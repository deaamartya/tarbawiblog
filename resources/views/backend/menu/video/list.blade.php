@extends('backend.template.master')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">
                        <i class="fa fa-film"></i> Video
                    </h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="{{ route('video.create')}}" class="btn btn-sm btn-success">
                            <i class="fas fa-plus-circle"></i> Video </a>
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
                        <h3 class="card-title">                        
                            <i class="fa fa-film"></i> 
                            Table List Video
                        </h3>
                    </div>

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title Video </th>
                                    <th>Thumbnail Video</th>
                                    <th>Status</th>
                                    <th>Act</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $index=>$dt)
                                <tr>
                                    <td>{{ ++$index }}</td>
                                    <td>{{ $dt->title}}</td>

                                    @if($dt->thumbnail == null)
                                    <td>
                                        <div class="videoWrapper">
                                            {!! $dt->embed !!}
                                        </div>
                                    </td>
                                    @else
                                    <td>
                                        {{ $dt->thumbnail}}
                                    </td>
                                    @endif

                                    <td>
                                        <?php if ($dt->status == 1) { ?>
                                            <span class="badge badge-success"> Published</span>
                                        <?php } else { ?>
                                            <span class="badge badge-danger"> Un-Published</span>
                                        <?php } ?>
                                    </td>
                                    <td width='15%'>


                                        <form action="{{ route('video.destroy', $dt->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <?php if ($dt->status == 1) { ?>
                                                <a class="btn btn-dark btn-xs" href="{{url('/admin/upb-video/'.$dt->id)}}">
                                                    <i class="fa fa-times"></i>  Hide
                                                </a>
                                            <?php } else { ?>
                                                <a class="btn btn-success btn-xs" href="{{url('/admin/pb-video/'.$dt->id)}}">
                                                    <i class="fa fa-check"></i> Show
                                                </a>
                                            <?php } ?>

                                            <a href="{{ route('video.edit', $dt->id) }}" class="btn btn-warning btn-xs">
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
                                    <th>Title Video </th>
                                    <th>Thumbnail Video</th>
                                    <th>Status</th>
                                    <th>Act</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@stop