@extends('main')
@section('title','| HomePage')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1>The Bare Foot Nomad!</h1>
                <p class="lead">Thank you so much for visiting. Its the capsule of best story about a place that captures its essence and reveals its attractions, making the reader want to go there</p>
                <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p>
                </div>
            </div>
        </div><!--end of header .row-->
        <div class="col-md-8">
             @foreach($posts as $post)
            <div class="post">
               
                <h3>{{ $post->title }}</h3>
                <p>{{substr($post->body,0,300) }}{{strlen( $post->body)>300?"...":""}}</p>
                <a href="#" class="btn btn-primary">Read More</a>
            </div>
            <hr>
           @endforeach
        </div>

        <div class="col-md-3 col-md-offset-1">
            <h2>Side Bar</h2>
        </div>
    </div>
@endsection                            