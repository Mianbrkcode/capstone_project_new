@extends('layouts.app')


@section('header')

@section('title')
E-ligtas | Active Reports
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
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mt-3">
                        <li class="breadcrumb-item"><a class="text-muted" href="{{ route('admin_dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Active Reports</li>
                    </ol>
                </nav>
            </div>

            <div class="container-fluid">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center mb-5">
                        <h4 class="m-0">ACTIVE REPORTS</h4>
                        <a class="btn btn-success m-0 float-end" href="{{ route('initial_report') }}"><i class="bi bi-plus-square-fill"></i> 
                            Make initial report</a>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-striped table-bordered" id="report-table">
                            <thead style="width: 100%;">
                                <tr>
                                    <th>Report ID</th>
                                    <th>Date & Time</th>
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

    @include('admin.activereports.reportsModal')
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
                    data: null,
                    render: function(data, type, row) {
                        return `
                        <li class="nav-item dropdown text-center">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <i class="bi bi-three-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="text-dark dropdown-item view-reports" data-bs-toggle="modal" data-bs-target="#viewReportsModal" data-id="${row.report_id}">
                                    <i class="bi bi-eye w-2"></i>
                                    View
                                </a>
                                <a href="#" class="text-danger dropdown-item delete-reports" data-id="${row.report_id}">
                                    <i class="bi bi-trash3 w-2"></i>
                                    Reject
                                </a>
                            </div>
                        </li>
                    `;
                    },
                    orderable: false
                }
            ],
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            order: [
                [0, 'desc']
            ]

        });

        function fetchReportData(){
            table.ajax.reload(null, false);
        }
        
        //Dynamic refetch every 20 secs
        var staleTime = 20000;
        setInterval(fetchReportData , staleTime);

        //Refresh the page every 5 minutes
        setInterval(function(){
            location.reload();
        }, 300000);


        $('#report-table').on('click', '.view-reports', function() {
            var reportsID = $(this).data('id');
            $.ajax({
                type: 'GET',
                url: "{{ url('admin/reports') }}/" + reportsID + "/show",
                success: function(response) {
                    var report = response.data;
                    var profilePicture = "{{ asset('storage/') }}" + '/' + report.residentProfile;
                    var imgEvidence = "{{ asset('storage/') }}" + '/' + report.imageEvidence;
                    $('#viewReportsModal #report_id').text(report.report_id);
                    $('#viewReportsModal #resident_name').text(report.resident_name);
                    $('#viewReportsModal #date_time').text(report.dateandTime);
                    $('#viewReportsModal #emergency_type').text(report.emergency_type);
                    $('#viewReportsModal #location').text(report.locationName);
                    $('#viewReportsModal #location_link').html('<a href="' + report.locationLink + '" target="_blank">' + report.locationLink + '</a');
                    $('#viewReportsModal #phone_number').text(report.phoneNumber);
                    $('#viewReportsModal #message').text(report.message);
                    // $('#viewReportsModal #image_evidence').text(report.imageEvidence);
                    $('#viewReportsModal #profile_image').html('<img style="width: 200px;height:200px;" class="rounded" src="' + profilePicture + '">');
                    $('#viewReportsModal #image_evidence').html('<img style="width:100%;height:200px" src="' + imgEvidence + '">')
                },
                error: function(error) {
                    console.error(error.responseText);
                }
            });
        });


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#report-table').on('click', '.delete-reports', function(e) {
            e.preventDefault();

            var reportsID = $(this).data('id');

            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'PATCH',
                        url: '{{ route("reports.reject", ["report" => "_reportsID_"]) }}'.replace('_reportsID_', reportsID),
                        success: function(response) {
                            Swal.fire(
                                'Rejected!',
                                'Report have been rejected.',
                                'success'
                            );

                            var reportsTable = $('#report-table').dataTable();
                            reportsTable.fnDraw(false);
                        },
                        error: function(error) {
                            Swal.fire(
                                'Error!',
                                'Failed to reject report.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    });
</script>

    @if (Session::has('success'))
        <script>
            toastr.options.closeButton = true;
            toastr.options.closeDuration = 300;
            toastr.options.progressBar = true;
            toastr.success("{{Session::get('success')}}");
        </script>
    @endif

@endsection