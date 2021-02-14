@extends('layouts.main')

@section('content')
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

   <div class="float-right">
   <button type="button" class="btn btn-info" id="move" value="Move">Move</button>
   </div>
  <form id="addUser" class="" method="POST" onsubmit="writeUserData(event);">
   <div class="container">
    <div class="form-group row">
        <label for="u_id" class="col-md-4 col-form-label">User ID</label>
        
        <div class="col-md-6">
            <input id="u_id" type="text" class="form-control" name="userid" value="" required autofocus>
        </div>
    </div>

    <div class="form-group row">
      <label for="latitude" class="col-md-4 col-form-label">latitude</label>
      
          <div class="col-md-6">
              <input id="latitude" type="text" class="form-control" name="latitude" value="" required autofocus>
          </div>
    </div>
    <div class="form-group row">
        <label for="longitude" class="col-md-4 col-form-label">longitude</label>
        
        <div class="col-md-6">
            <input id="longitude" type="text" class="form-control" name="longitude" value="" required autofocus>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-4 col-md-offset-3">
            <button type="button" onclick="writeUserData(event);" class="btn btn-primary btn-block desabled" id="submitUser">
              Submit
            </button>
          </div>
          <div class="col-md-4 col-md-offset-3">
            <button type="button" onclick="updateUserData(event);" class="btn btn-primary btn-block desabled" id="submitUser">
              update
            </button>
            </div>
          <div class="col-md-4 col-md-offset-3">
            <button type="button" onclick="deleteUserData(event);" class="btn btn-primary btn-block desabled" id="submitUser">
              Delete
            </button>
           </div>
    </div>
    <!-- <div class="card card-body" style="width: 100%; height: 800px;">
      {!! Mapper::render() !!}
    </div> -->
    </div>

  </form>
  <div id="map" style="width: 100%; height:250px;padding:10px"></div>




 

@endsection


@section('scripts')
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-analytics.js"></script>

<script src="https://www.gstatic.com/firebasejs/7.6.1/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.6.1/firebase-database.js"></script>
<script src="{{asset('js/mapfirebase.js')}}"></script>
  <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
  <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgoTOOBVzNu0toyH6ifDHZy9hS6WJEElI&callback=initMap&libraries=&v=weekly"
      async
    ></script>
 
@endsection