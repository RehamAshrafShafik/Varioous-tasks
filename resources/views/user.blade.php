@extends('layouts.main')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Tables</li>
              <li class="breadcrumb-item active">Users</li>

            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="float-right">
              <form method="GET" action="{{route('table_user')}}">
                      @csrf
                  <input type="submit" value="Filter" class="btn btn-info " role="button"></input>
                  <select class="select" name="mode_status">
                      <option value="">Mode Status</option>
                      <option value="online">Online</option>
                      <option value="offline">offline</option>

                  </select>
                  <select class="select" name="account_status">
                      <option value="">Account status</option>
                      <option value="approaved">Approaved</option>
                      <option value="block">Block</option>


                  </select>
                </form>
              </div>
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                   <th>Photo</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>gender</th>
                    <th>Request Booking ID</th>
                    <th>Mode status</th>
                    <th>Account status</th>



                    <!-- <th>Status</th>
                    <th>Provider ID</th>
                    <th>Car ID</th>
                    <th>Remaining Distance</th>
                    <th>Accept time</th> -->


                  </tr>
                  </thead>
                  <tbody>
                  @foreach($users as $u)
                  <tr>
                
                    <td style="width:150px;">
                    <img style="width:30%; padding-right:-20%"src="{{$u->user_picture->picture}}"/>
                    </td>

                    <td>{{$u->full_name}}</td>
                    <td> {{$u->mobile}}</td>
                    <td>{{$u->email}}</td>
                    <td>{{$u->gender}}</td>
                    @if ($u->user_request !=null)
                       
                      <td>@foreach($u->user_request as $r)
                      {{$r->booking_id}}, @endforeach</td>
                      @else
                      <td></td>
                    @endif
                    <td>{{$u->client_mode->status}}</td>
                    <td>{{$u->client_account_status->status}}</td>


                    <!-- <td>Trident</td>
                    <td>Internet
                      Explorer 5.0
                    </td>
                    <td>Win 95+</td>
                    <td>5</td>
                    <td>C</td> -->
                  </tr>
                  @endforeach
         
   
  
       
            
                
                  </tbody>
                  <tfoot>
             
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
@section('scripts')
<!-- DataTables  & Plugins -->
<script src="{{asset('css/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('css/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('css/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('css/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('css/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('css/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('css/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('css/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('css/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('css/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('css/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('css/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
@endsection