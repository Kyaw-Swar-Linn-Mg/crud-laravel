@extends('layout/template')

@section('title')
    Dashboard | CRUD Laravel
    @stop

@section('body')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @if(Session('info'))<div class="alert alert-success">{{Session('info')}}</div>@endif
            <table id="jTable" class="table table-bordered table-responsive">
               <thead>
               <tr>
                   <th>Id</th>
                   <th>Name</th>
                   <th>Roll_No</th>
                   <th>Class</th>
                   <th>Address</th>
                   <th>Action</th>
               </tr>
               </thead>
                <tbody>
                @foreach($studs as $row)
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->roll_no}}</td>
                    <td>{{$row->class}}</td>
                    <td>{{$row->address}}</td>
                    <td><button class="btn btn-sm" data-toggle="modal" data-target="#{{$row->id}}"><span class="fa fa-edit"></span> </button> |
                        <button class="btn btn-primary" data-toggle="modal" data-target="#btnDelete">Delete</button> </td>
                </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <div class="col-md-2 col-md-offset-1">
            <button class="btn btn-primary" style="margin-top: 10px;" data-toggle="modal" data-target="#newStudent">New Student</button>
        </div>
    </div>
    <div class="modal fade" id="newStudent" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <form method="post" action="{{route('newStudent')}}">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">
                                X
                            </span> </button>
                        <h4 class="modal-title" id="myModalLabel">New Student</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Enter Student Name">
                        </div>
                        <div class="form-group">
                            <input type="number" name="roll_no" class="form-control" placeholder="Enter Roll Number">
                        </div>
                        <div class="form-group">
                            <select name="class" class="form-control">
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea name="address" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary pull-left">Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    {{csrf_field()}}
                </form>
            </div>
        </div>
    </div>
    @foreach($studs as $row)
        <div class="modal fade" id="{{$row->id}}" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <form method="post" action="{{route('editStudent')}}">
                        <input type="hidden" value="{{$row->id}}" name="id">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">
                                X
                            </span> </button>
                            <h4 class="modal-title" id="myModalLabel">New Student</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" value="{{$row->name}}" name="name" class="form-control" placeholder="Enter Student Name">
                            </div>
                            <div class="form-group">
                                <input type="number" value="{{$row->roll_no}}" name="roll_no" class="form-control" placeholder="Enter Roll Number">
                            </div>
                            <div class="form-group">
                                <select name="class" class="form-control">
                                    <option value="A" @if($row->class == 'A') {{'selected'}} @endif>A</option>
                                    <option value="B" @if($row->class == 'B') {{'selected'}} @endif>B</option>
                                    <option value="C" @if($row->class == 'C') {{'selected'}} @endif>C</option>
                                    <option value="D" @if($row->class == 'D') {{'selected'}} @endif>D</option>
                                    <option value="E" @if($row->class == 'E') {{'selected'}} @endif>E</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <textarea name="address" class="form-control">{{$row->address}}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary pull-left">Save</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    @foreach($studs as $row)
    <div class="fade modal" id="btnDelete" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">
                                X
                            </span> </button>
                        <h4 class="modal-title" id="myModalLabel">Delete Record</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="warning" class="control-label text-center">ဖ်က္မွာေသခ်ာလား?</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <div class="form-group">
                        <a href="{{route('delete',['id'=>$row->id])}}"  class="btn btn-primary pull-left">Ok</a>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancle</button>
                    </div>
                    </div>

            </div>
        </div>
    </div>
    @endforeach
    @stop