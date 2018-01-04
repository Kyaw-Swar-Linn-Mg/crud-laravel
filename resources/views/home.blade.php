@extends('layout/template')

@section('title')
    C R U D | Laravel
    @stop

@section('body')
<div class="row">
    <div class="col-md-offset-1 col-md-10">
        <table id="jTable" class="table table-bordered table-responsive">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Roll_No</th>
                <th>Class</th>
                <th>Address</th>
            </tr>
            </thead>
            <tbody>
            @foreach($stud as $row)
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->roll_no}}</td>
                    <td>{{$row->class}}</td>
                    <td>{{$row->address}}</td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
    @stop