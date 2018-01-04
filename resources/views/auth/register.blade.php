@extends('layout/template')

@section('title')
    Register
    @stop

@section('body')
    <div class="row">
        <div class="col-md-4 col-md-offset-6">
            @if(Session('info')) <div class="alert alert-success">{{Session('info')}}</div> @endif
            <div class="panel panel-primary">
                <div class="panel-heading">Register Form</div>
                <div class="panel-body ">
                    <form method="post" action="{{route('postReg')}}">
                        <div class="form-group @if($errors->has('name')) has-error @endif">
                            @if($errors->has('name')) <span class="help-block">{{$errors->first('name')}}</span>@endif
                            <input type="text" name="name" class="form-control" placeholder="Enter Name">
                        </div>
                        <div class="form-group @if($errors->has('email')) has-error @endif">
                            @if($errors->has('email'))<span class="help-block">{{$errors->first('email')}}</span>@endif
                            <input type="email" name="email" class="form-control" placeholder="Enter Email">
                        </div>
                        <div class="form-group @if($errors->has('password')) has-error @endif">
                            @if($errors->has('password'))<span class="help-block">{{$errors->first('password')}}</span>@endif
                            <input type="password" name="password" class="form-control" placeholder="Enter Password">
                        </div>
                        <div class="form-group @if($errors->has('confirm_password')) has-error @endif">
                            @if($errors->has('confirm_password'))<span class="help-block">{{$errors->first('confirm_password')}}</span> @endif
                            <input type="password" name="confirm_password" class="form-control" placeholder="Enter Confirm_Password">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="btnCreate" class="btn btn-primary">Create</button>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    </div>
    @stop