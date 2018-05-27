@extends('layouts.front')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                &nbsp;
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <h3 class="text-primary">{{$main->name}}</h3>
                <hr>
                <ul>
                    <li><a href="{{url('/category/'.$main->id)}}">All</a></li>
                    @foreach($subs as $s)
                        <li><a href="{{url('/sub-category/'.$main->id.'?sub='.$s->id)}}">{{$s->name}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-sm-9">
                <div class="row">
                    @foreach($posts as $p)
                        <div class="col-sm-4">
                            <p>
                                <a href="{{url('/post/'.$main->id .'?pid='.$p->id)}}">
                                    <img src="{{asset('uploads/posts/250x250/'.$p->featured_image)}}" alt="" width="99%">
                                </a>
                            </p>
                            <p>
                               <strong>
                                    <a href="{{url('/post/'.$main->id.'?pid='.$p->id)}}">{{$p->title}}</a>
                                </strong> 
                            </p>
                            <p>
                                {{$p->short_description}}
                            </p>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        {{$posts->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection