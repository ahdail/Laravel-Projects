@extends('app')

    @section('content')
        <div class="container">
            <h1>Create Category</h1>

            @if ($errors->any())
                <ul class="alert">
                    @foreach($errors-> all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif

            {!! Form::open(['url'=>'admin/categories']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name: ', ['class'=> 'control-label']) !!}
                {!! Form::text('name', null, ['class'=> 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('description', 'Description: ', ['class'=> 'control-label']) !!}
                {!! Form::textarea('description', null, ['class'=> 'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::submit('Add Category', ['class'=>'btn btn-primary'])!!}
            </div>


            {!! Form::close() !!}

        </div>
    @endsection

