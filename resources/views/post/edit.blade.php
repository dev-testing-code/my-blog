@extends('admin.main')
@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">
                Edit Post
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/post">View All Post</a></li>
                <li class="breadcrumb-item active"><a href="post/create">Create Post</a></li>
            </ol>
            <div>
                {{-- It Show the form/input error --}}
                @include('common.errors')
                {!! Form::model( $posts , array('route' => array('post.update', $posts->id), 'method'=>'PUT')) !!}
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

                {!! Form::submit('Update Post', array('class'=>'secondary-card-btn')) !!}
                {!! Form::close() !!}

            </div>
        </div>
    </main>
@endsection
