<style>
  * {
      
       font-family: Nunito, san-serif;
       
    }
  .card-header {
    background-color: green;
    padding: 30px 40px;
    color: black;
    text-align: center;
  }
  
  .card-body {
    text-align: center;
  }
  .container {
    background-color: #BDB76B;
  }
</style>
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        @if (Auth::check())
            <div class="card-header"><h2>My To Do List</h2></div>
                <div class="card-body">
                  @if (Session::has('success'))
                  <div class="alert alert-success" role="alert">
                      {{Session::get('success')}}
                  </div>
                 
                  @endif
@if ($errors->any())
    <!-- Form Error List -->
    <div class="alert alert-danger">
        <strong>Error! Something went wrong!</strong>

        <br><br>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                 
        
                <a href="/task" class="btn btn-dark btn-lg btn-block">Add new Task</a>
                <table class="table mt-4">
                   
                <tbody>
                @foreach($user->tasks as $task)
                    <tr>
                        <td>
                            {{$task->characteristic}}
                        </td>
                        <td>
                            
                            <form action="/task/{{$task->id}}">
                                <button type="submit" name="edit" class="btn btn-outline-secondary">Edit</button>
                                <button type="submit" name="delete" formmethod="POST" class="btn btn-outline-danger btn-lg">Delete</button>
                                {{ csrf_field() }}
                            </form>
                        </td>
                    </tr>
                    

                @endforeach
                </tbody>
                </table>
                
            </div>
        @else
            <div class="card-body">
                <h1>My to do list</h1>
                <h3>If you already have account, please login <a href="/login">VIA LINK </a></h3>
                
            </div>
        @endif
    </div>                         
</div>
@endsection