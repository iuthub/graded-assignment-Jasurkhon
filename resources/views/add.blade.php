@extends('layouts.app')

@section('content')
<div class="container">
                <h2 style="text-align: center; color:white;">Add New Task</h2>
               
<form method="POST" action="/task">

    <div class="form-group">
        <textarea name="characteristic" class="form-control"></textarea>  
    </div>


    <div class="form-group">
        <button type="submit" class="btn btn-info btn-lg btn-block"><strong>Add Task</strong></button>
    </div>
{{ csrf_field() }}
</form>


</div>
@endsection