@extends('layouts.app')


@section('header')

    @section('title')
      Admin | Dashboard
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
                                <a href="{{ route('admin_dashboard') }}" class="text-muted"> Dashboard  > </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ route('users.index') }}" class="text-muted"> User Management </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
        
            <div class="container-fluid ">
                <div class="card">
                    <div class="card-header">
                        <h3>Active Reports</h3>
                    </div>
                    <div class="card-body table-responsive">
                            <table class="table table-striped table-bordered" id="report-table">
                                <thead>
                                    <tr>
                                        <th>Report ID</th>
                                        <th>Timestamp</th>
                                        <th>Emergency Type</th>
                                        <th>Resident Name</th>
                                        <th>Location</th>
                                        <th class="no-export text-center">Action</th>
                                    </tr>
                                </thead>
                            </table>
                    </div>
                </div>
            </div>
            

        </main>
        
        <footer class="footer">
            <div class="container-fluid">
                <div class="row text-muted">
                    <div class="col-6 text-start">
                        <p class="mb-0">
                            <a href="#" class="text-muted">
                                <strong>E-ligtas</strong>
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

<script type="text/javascript">
     $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        var table = $('#report-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('reports') }}",
            columns: [

                {
                    data: 'report_id',
                    name: 'report_id'
                },
                {
                    data: 'dateandTime',
                    name: 'dateandTime'
                },
                {
                    data: 'emergency_type',
                    name: 'emergency_type'
                },
                {
                    data: 'resident_name',
                    name: 'resident_name'
                },
                {
                    data: 'locationName',
                    name: 'locationName'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    className: 'text-center align-middle'
                },
            ],
            order: [
                [0, 'desc']
            ]
        });

        //delete here
        $('body').on('click', '.delete', function() {

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {

                var id = $(this).data('report_id');

                // ajax
                $.ajax({
                    type: "POST",
                    url: "{{ url('admin/reports/delete-report') }}",
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(res) {

                        var oTable = $('#report-table').dataTable();
                        oTable.fnDraw(false);
                    }
                });

                Swal.fire({
                    title: "Deleted!",
                    text: "User has been Deleted",
                    icon: "success"
                });
            }
        });
        //sweet alert message end
        }); //Ajax Delete End

      
    });
</script>

@endsection