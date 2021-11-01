@extends('admin.main')
@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">
                Edit Category
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/category">View All Category</a></li>
                <li class="breadcrumb-item active"><a href="category/create">Create Category</a></li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <p class="mb-0">This page is an example of using static navigation. By removing the</p>
                </div>
            </div>
            <div>
                {{-- It Show the form/input error --}}
                @include('common.errors')
                {!! Form::model( $categories , array('route' => array('category.update', $categories->id), 'method'=>'PUT')) !!}
                {!! Form::label('name','Name:') !!}
                {!! Form::text('name',null,array('class'=>'form-control')) !!}
                {!! Form::submit('Update Category', array('class'=>'secondary-card-btn')) !!}
                {!! Form::close() !!}

            </div>
        </div>
    </main>
@endsection
