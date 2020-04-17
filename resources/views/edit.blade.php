@extends('layouts.app')

@section('content')
	<div class="container">
    
	<h2 style="text-align: center; color:white;" class="bg-dark">Edit the Task</h2>

<form method="POST" action="/task/{{ $task->id }}">

	<div class="form-group" id="textArea">
		<textarea name="characteristic" class="form-control">{{$task->characteristic }}</textarea>	
	</div>


	<div class="form-group">
		<button type="submit" name="update" class="btn btn-success btn-lg btn-block" id="updateButton"><i class="fa fa-trash"></i>Update task</button>
	</div>
{{ csrf_field() }}
</form>



</div>

@stop