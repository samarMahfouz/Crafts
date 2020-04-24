@extends('master')
@section('content')
<!-- Start header -->
<header>
  <div class="overlay">
    <div class="container">
      <section>
        <h1 class="">welcome to my website</h1>
        <p>crafts, miniature and more</p>
      </section>
    </div>
  </div>
</header>
<!-- End header -->
<section id="recipes" class="most-lovely">
    <div class="container">
      <h2>The latest designs</h2>
      <div class="row">
        <section class="col-md-9">
          <article class="firsarti">
            <div class="row">
              @if($last->url)
              <img class=" col-md-6 img-responsive" src="upload/{{$last->url}}">
              @endif
              <div class="article-content-one col-md-6">
                <h3>{{$last->name}}</h3>
                <p>{{$last->body}}</p>
                <a class="aspecial" href="/posts/{{$last->id}}">read more</a>
              </div>
            </div>
          </article>
          <div class="clearfix"></div>
          <div class="row">
            @foreach($latestposts as $post)
              <article class="col-md-4">
                @if($post->url)
                <img class="image" src="upload/{{$post->url}}">
                @endif
                <div class="article-content">
                  <h3>{{$post->name}}</h3>
                  <p>{{$post->body}}
                      </p>
                  <a class="aspecial"  href="/posts/{{$post->id}}">read more</a>
                </div>
              </article>
            @endforeach

          </div>
        </section>
        <aside class="col-md-3 text-center">
          <h4>take care of your body it's the only <br>place you have to live in.</h4>
        </aside>
      </div>
      </div>
  </section>
<!-- Start my designs -->
<section class="my-design" id="design">
  <div class="container">
    <h2>all designs</h2>
    <ul class="link">
      <li class="selected filter" data-filter="all">all</li>
      @foreach($cat_name as $result)
      <li  class="filter" data-filter=".{{ $result->name }}">{{ $result->name }}</li>
      @endforeach
    </ul>
    <section id="gallery" class="gallery">

      <div class="row">

        @foreach($posts as $post)
        <div class="col-md-3 plus">
          <div class="mix {{$post->category->name}}">
            <a href="/posts/{{$post->id}}"><h4>{{$post->name}} </h4>
            @if($post->url)
            <img src="upload/{{$post->url}}">
            @endif
          </a>
          <a class="m-a spe-s" href="/posts/{{$post->id}}">  view more </a>
          </div>
        </div>
            @endforeach
      </div>
    </section>

<!-- End my designs -->

  </div>
</section>
<section class="last-reg text-center">
  @if(Auth::check())

  @else
  <a href="/register"> <span> become my friend </span>register</a>
  @endif

</section>
@stop
