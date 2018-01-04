@extends('layout/template')

@section('title') Login @stop

@section('body')

    <div class="row">
        <div class="col-md-4 col-md-offset-6">
            @if(Session('err'))<div class="alert alert-danger">{{Session('err')}}</div> @endif
            <div class="panel panel-primary">
                <div class="panel-heading">User Login</div>
                <div class="panel-body">
                    <form method="post" action="{{route('postLogin')}}">
                        <div class="form-group @if($errors->has('name')) has-error @endif">
                            @if($errors->has('name'))<span class="help-block">{{$errors->first('name')}}</span> @endif
                            <input type="text" name="name" class="form-control" placeholder="Enter User Name">
                        </div>
                        <div class="form-group @if($errors->has('password')) has-error @endif">
                            @if($errors->has('password'))<span class="help-block">{{$errors->first('name')}}</span> @endif
                            <input type="password" name="password" class="form-control" placeholder="Enter User Password">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    </div>

    @stop