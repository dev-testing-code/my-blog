<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Blog Home - Start Bootstrap Template</title>
        <!-- Favicon-->
        {{-- <link rel="icon" type="image/x-icon" href="assets/favicon.ico" /> --}}
        <!-- Core theme CSS (includes Bootstrap)-->
        <!-- <link href="css/styles.css" rel="stylesheet" /> -->
        {{Html::style('favicon.ico')}}
        {{Html::style('css/styles.css')}}
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="/">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Blog</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page header with logo and tagline-->
        <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Welcome to Blog Home!</h1>
                    <p class="lead mb-0">A Bootstrap 5 starter layout for your next blog homepage</p>
                </div>
            </div>
        </header>
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->
                @foreach ($posts as $post)
                    <div class="card mb-4">
                        
                            {!! Html::image("/img/posts/". $post->image, $post->title, array('width'=>'850')) !!}
                       
                        <div class="card-body">
                            <div class="small text-muted">Octorber 1, 2021</div>
                            <h2 class="card-title">{!! $post->title!!}</h2>
                            <p class="card-text">{!! $post->short_desc!!}</p>
                            <a class="btn btn-primary" href="/show/{{$post->id}}">Read more →</a>
                        </div>
                        <div class="card-footer text-muted">
                            Posted on Octorber 1, 2021 by {!! $post->author!!}
                            
                        </div>
                    </div>
                @endforeach
                    
                    {!! $posts->appends(request()->input())->links(); !!}
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                                {!! Form::open(array('url'=>'frontend/search', 'method'=>'get')) !!}
                                    <div class="input-group">
                                        {!! Form::text('keyword',null, array('placeholder'=>'Search', 'class'=>'form-control')) !!}
                                        <span class="input-group-btn">
                                            {!! Form::submit('search',array('class'=>'btn btn-primary')) !!}
                                        </span>
                                    </div>
                                {!! Form::close() !!}
                        </div>
                    </div>
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <ul class="list-unstyled mb-0">
                                        @foreach($categories as $category)
                                        <li><a href="/frontend/category/{{ $category->id }}">{!! $category->name !!}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                    <div class="card mb-4">
                        <div class="card-header">Side Widget</div>
                        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <!-- <script src="js/scripts.js"></script> -->
        {{-- {{Html::script('js/scripts.js')}} --}}
        {{Html::script('js/scripts.js')}}
    </body>
</html>
