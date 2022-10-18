@extends('admin.body.master')
@section('title', 'Role')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Create New Role</h2>
                </div>
            </div>
        </div>
        
        
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Something went wrong.<br><br>
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif
        
        {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Permission:</strong>
                    <br/>
                    @foreach($permission as $value)
                    <div class="d-flex">
                        <label style="margin-left:2rem">
                            {{ $value->name }}</label>
                            {{-- {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }} --}}
                            <input type="checkbox" name="permission[]" value="{{$value->id}}" style="opacity:1 !important;left:1.6rem;margin-top:4px">
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <input type="submit" class="btn btn-primary" value="Add Role"/>
            </div>
        </div>
        {!! Form::close() !!}
        
    </section>
@endsection