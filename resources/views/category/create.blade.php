@extends('admin.main')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Create Category</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/category">View All Category</a></li>
            {{-- <li class="breadcrumb-item active"><a href="category/create">Category Create</a></li> --}}
        </ol>
        <div class="card mb-4">

            @if(Session::has('category_create'))
                    <div class="alert alert-success"><em>{!! session('category_create') !!}</em>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times</span>
                        </button>
                    </div>
                @endif
                {{-- It Show the form/input error --}}
                @include('common.errors')

            <div class="card-body">
                {!! Form::open(['url' => 'category']) !!}

                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name','',array('class'=>'form-control')) !!}
                {!! Form::submit('Create',array('class'=>'secondary-cart-btn')) !!}

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

