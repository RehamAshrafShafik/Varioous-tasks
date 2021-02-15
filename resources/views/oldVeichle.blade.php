@extends('layouts.main')

@section('content')
<div class="container-fluid">
@if($errors->any())
  <div class="alert alert-danger">
     <p style="text-align:center;">{{$errors->first()}}</p>
  </div>
    @endif
 <form id="veichle" class="" method="GET" action="{{route('attach')}}"  >
  
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
        <label for="veichle" class="col-md-4 col-form-label">Veichle</label>
        
        <div class="col-md-6">
            <select name="veichle" id="veichle" class="form-control" required autofocus>
               <option value="">..</option>
               @foreach($veichles as $v)
                <option value="{{$v->id}}">{{$v->color}} , {{$v->number}}</option>
                @endforeach
               
            </select>     
        </div>
    </div>


    <div class="row form-group">
      <div class="col-md-4 col-md-offset-3">
          <button type="submit" href="" class="btn btn-primary btn-block desabled" >
              Attach
          </button>
    </div>
     
     
  </div>
      
  


    </div>
   
    </div>

</form>
</div>
@endsection