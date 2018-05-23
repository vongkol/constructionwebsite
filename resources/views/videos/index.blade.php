@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Video List&nbsp;&nbsp;
                    <a href="{{url('/video/create')}}" class="btn btn-link btn-sm">New</a>
                </div>
                <div class="card-block">
                    <table class="tbl">
                        <thead>
                            <tr>
                                <th>&numero;</th>
                                <th>URL</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $pagex = @$_GET['page'];
                                if(!$pagex)
                                $pagex = 1;
                                $i = 18 * ($pagex - 1) + 1;
                            ?>
                            @foreach($video_trainings as $vid)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>
                                        <object data="{{$vid->url}}" width="150" height="90"></object>
                                    </td>
                                    <td>{{$vid->title}}</td>
                                    <td>
                                        <a class="btn btn-xs btn-info"  href="{{url('/video/edit/'.$vid->id)}}" title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-xs btn-danger"  href="{{url('/video/delete/'.$vid->id)}}" onclick="return confirm('Do you want to delete?')" title="Delete"><i class="fa fa-remove"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table><br>
                    {{$video_trainings->links()}}
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection