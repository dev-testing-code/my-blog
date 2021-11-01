@extends('admin.main')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Create Post</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/post">View All Post</a></li>
            <li class="breadcrumb-item active"><a href="post/create">Create Post</a></li>
        </ol>
        <div class="card mb-4">

            @if(Session::has('post_create'))
                    <div class="alert alert-success"><em>{!! session('post_create') !!}</em>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times</span>
                        </button>
                    </div>
                @endif
                {{-- It Show the form/input error --}}
                @include('common.errors')

            <div class="card-body">
                {!! Form::open(array('url'=>'post', 'file'=>'true', 'enctype' => 'multipart/form-data')) !!}

                {!! Form::label('category_id', 'Category:') !!}
                {!! Form::select('category_id',$categories, array('class'=>'form-control')) !!}
                <br>
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title',null,array('class'=>'form-control')) !!}

                {!! Form::label('author', 'Author:') !!}
                {!! Form::text('author',null,array('class'=>'form-control')) !!}

                {!! Form::label('image', 'Image:') !!}
                {!! Form::file('image',null, array('class'=>'form-control')) !!}
                <br>
                {!! Form::label('short_desc', 'Short Desc:') !!}
                {!! Form::text('short_desc',null,array('class'=>'form-control')) !!}

                {!! Form::label('description', 'Description:') !!}
                {!! Form::textarea('description',null,array('class'=>'form-control')) !!}

                {!! Form::submit('Create Post',array('class'=>'secondary-cart-btn')) !!}
                {!! Form::close() !!}
            </div>
        </div>
        {{-- <div style="height: 100vh"></div>
        <div class="card mb-4">
            <div class="card-body">
                When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.
            </div>
        </div> --}}
    </div>
</main>
@endsection

