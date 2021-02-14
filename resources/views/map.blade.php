@extends('layouts.main')

@section('content')

<div>
  <div class="card">
    <div class="card card-header">
    <div class="float-right">
      <form style="float:right" method="GET" action="{{route('map')}}">
       <input type="text" id="searchTextField" name="loc"></input>
       <input type="submit" class="btn btn-info" value="Search"></input>
       </form>
       </div>
    </div>
    <div class="card card-body" style="width: 100%; height: 800px;">
      {!! Mapper::render() !!}
    </div>
  </div>
</div>
{{Mapper::renderJavascript()}}
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgoTOOBVzNu0toyH6ifDHZy9hS6WJEElI&v=3.exp&sensor=false&libraries=places"></script>
<script>
function initialize() {
  var input = document.getElementById('searchTextField');
  new google.maps.places.Autocomplete(input);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
@endsection
