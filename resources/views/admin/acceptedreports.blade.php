@extends('layouts.app')


@section('header')

@section('title')
@endsection

@endsection

@section('content')
<div class="wrapper">

    {{-- sidebar here --}}

    @include('layouts.admin_sidebar')

    <div class="main">

        @include('layouts.admin_nav')
        {{-- navigation bar --}}

        <main class="content px-3 py-2">

            <div class="container-fluid mt-3">
                <div class="row ">
                    <div class="col-12 text-start">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="{{ route('admin_dashboard') }}" class="text-muted"> Dashboard   > </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ route('users.index') }}" class="text-muted"> Accepted Reports </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="container-fluid ">
                <livewire:accepted-reports/>
            </div>
        </main>

        <!-- Modal -->
        <div class="modal fade" id="addReport">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="#" id="EmployeeForm" name="EmployeeForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
                                <div class="row g-3 ">
                                    <div class="col">
                                        <label for="" class="form-label">Resident Name</label>
                                        <input type="text" class="form-control" name="resident_name" id="">
                                    </div>
                                    <div class="col">
                                        <label for="" class="form-label">Location</label>
                                        <input type="text" class="form-control" name="" id="">
                                    </div>
                                    <div class="col">
                                        <label for="" class="form-label">Role</label>
                                        <select name="" id="" class="form-select">
                                            <option value="">Select Role</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Sector">Sector</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col">
                                        <label for="" class="form-label">Email</label>
                                        <input type="text" class="form-control" name="" id="">
                                    </div>
                                    <div class="col">
                                        <label for="" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="" id="">
                                    </div>
                                    <div class="col">
                                        <label for="" class="form-label">User From</label>
                                            <select name="" id="" class="form-select ">
                                                <option value="">Select Barangay</option>
                                                <option value="Cay Pombo">Cay Pombo</option>
                                                <option value="Guyong">Guyong</option>
                                                <option value="Caysio">Caysio</option>
                                            </select>
                                    </div>
                                </div>
                            <div class="col-sm-offset-2 col-sm-10 align-items-end"><br/>
                                <button type="submit" class="btn btn-primary" id="btn-save">Save changes</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer"></div>
                </div>
            </div>
          </div>
        <!--End modals-->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row text-muted">
                    <div class="col-6 text-start">
                        <p class="mb-0">
                            <a href="#" class="text-muted">
                                <strong>E-Ligtas</strong>
                            </a>
                        </p>
                    </div>
                    <div class="col-6 text-end">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="#" class="text-muted">Contact</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-muted">About Us</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-muted">Terms</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

    </div>
</div>
@endsection

@section('scripts')

{{-- <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script> --}}


{{-- <script type="text/javascript">
    $(function () {
    
      $('input[name="daterange"]').daterangepicker({
          startDate: moment().subtract(1, 'M'),
          endDate: moment()
      });
          
      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: {
              url: "{{ route('accepted_reports') }}",
              data: function (d) {
                  d.from_date = $('input[name="daterange"]').data('daterangepicker').startDate.format('YYYY-MM-DD');
                  d.to_date = $('input[name="daterange"]').data('daterangepicker').endDate.format('YYYY-MM-DD');
              }
          },
          columns: [
              {data: 'reportId', name: 'reportId'},
              {data: 'created_at', name: 'created_at'},
              {data: 'uid', name: 'uid'},
              {data: 'emergency_type', name: 'emergency_type'},
              {data: 'resident_name', name: 'resident_name'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
    
      $(".filter").click(function(){
          table.draw();
      }); 
    });
  </script> --}}
@endsection
