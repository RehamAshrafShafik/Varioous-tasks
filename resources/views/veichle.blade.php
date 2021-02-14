@extends('layouts.main')

@section('content')
<!-- <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    Left navbar links
    <ul class="navbar-nav">
  
      <li class="nav-item d-none d-sm-inline-block">
        <a href="" class="nav-link">Add</a>
      </li>
    
    </ul>

  </nav> -->


  <div class="container-fluid">
  <form id="veichle" class="" method="GET" action="{{route('add_veichle')}}"  >
   
   <div class="container">
    <div class="form-group row">
        <label for="user_id" class="col-md-4 col-form-label">User</label>
        
        <div class="col-md-6">
            <select name="user_id" id="user_id" class="form-control" required autofocus>
               <option value="">..</option>
               @foreach($users as $u)
                <option value="{{$u->id}}">{{$u->f_name}}</option>
                @endforeach
               
            </select>     
        </div>
    </div>

    <div class="form-group row">
      <label for="color" class="col-md-4 col-form-label">Veichle Color</label>
      
          <div class="col-md-6">
              <input id="color" type="text" class="form-control" name="color" value="" required autofocus>
          </div>
    </div>
    <div class="form-group row">
        <label for="number" class="col-md-4 col-form-label">Veichle Number</label>
        
        <div class="col-md-6">
            <input id="number" type="text" class="form-control" name="number" value="" required autofocus>
        </div>
    </div>
    <div class="form-group row">
        <label for="active" class="col-md-4 col-form-label">active</label>
        
        <div class="col-md-6">
            <input id="active" type="checkbox" class="form-control" name="active" value=""  autofocus>
        </div>
    </div>
    <div class="row form-group">
      <div class="col-md-4 col-md-offset-3">
          <button type="submit" href="" class="btn btn-primary btn-block desabled" >
              Add
          </button>
      </div>
      <div class="col-md-4 col-md-offset-3">
          <button type="submit" formaction="{{route('update_veichle')}}" class="btn btn-primary btn-block desabled" >
            Edit
          </button>
      </div>
      <div class="col-md-4 col-md-offset-3">
        <button type="submit" formaction="{{route('list_active')}}"  class="btn btn-primary btn-block desabled">
          Show active users 
        </button>
      </div>
      </div>
      
  


    </div>
   
    </div>

  </form>


</div>
@endsection