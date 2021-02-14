@extends('layouts.main')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Requests</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Tables</li>
              <li class="breadcrumb-item active">Request</li>

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
                <h3 class="card-title">Request details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="float-right">
                <form method="GET" action="{{route('table_request')}}">
                
                  <input type="submit" value="Filter" class="btn btn-info " role="button"></input>
                  <select class="select" name="filter_status">
                      <option value="">Status</option>
                      <option value="searching">Searching</option>
                      <option value="completed">Completed</option>
                      <option value="onboard">Onboard</option>


                  </select>
                </form>
              </div>
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Booking ID</th>
                    <th>User ID</th>
                    <th>Type</th>
                    <th>Payment mode</th>
                    <th>Status</th>
                    <th>Provider ID</th>
                    <th>Car ID</th>
                    <th>Remaining Distance</th>
                    <th>Accept time</th>


                  </tr>
                  </thead>
                  <tbody>
                  @foreach($requests as $r)
                  <tr>
                    <td>{{$r->id}}</td>
                    <td>{{$r->booking_id}}
                    </td>
                    <td>{{$r->user_id}}</td>
                    <td> {{$r->type}}</td>
                    <td>{{$r->payment_mode}}</td>
                    <td>{{$r->request_status->status}}</td>

                     <td>{{$r->request_info->provider_id}}
                    </td>
                    <td>{{$r->request_info->car_id}}</td>
                    <td>{{$r->request_info->remaining_distance}}</td>
                    <td>{{$r->request_info->accept_time}}</td>
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