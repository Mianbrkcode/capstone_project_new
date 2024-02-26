@extends('layouts.app')


@section('header')

@section('title')
    E-ligtas | Accepted Reports
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
                        <li class="breadcrumb-item active" aria-current="page">Accepted Reports</li>
                    </ol>
                </nav>
            </div>

            <div class="container-fluid">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center mb-5">
                        <h4 class="m-0">ACCEPTED REPORTS</h4>
                        <div class="row justify-content-end">
                            <div class="col-md-6">
                                <label for="filter_date_start">Start Date:</label>
                                <input type="date" class="form-control" id="filter_date_start" name="filter_date_start" />
                            </div>
                            <div class="col-md-6">
                                <label for="filter_date_end">End Date:</label>
                                <input type="date" class="form-control" id="filter_date_end" name="filter_date_end" />
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-striped table-bordered" id="accptreport-table">
                            <thead style="width: 100%;">
                                <tr>
                                    <th>Report ID</th>
                                    <th>Date & Time</th>
                                    <th>Emergency Type</th>
                                    <th>Resident Name</th>
                                    <th>Location</th>
                                    <th>Barangay/Department</th>
                                    <th class="no-export text-center">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </main>

        <!-- Modal -->

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

    @include('admin.activereports.reportsModal')
</div>
@endsection

@section('scripts')

<script>
    $(document).ready(function() {
        var acceptedTable = $('#accptreport-table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: "{{ route('accepted_reports') }}",
                data: function(d) {
                    if (d.buttons) {
                        d.action = 'export';
                    }
                    d.filter_date_start = $('#filter_date_start').val();
                    d.filter_date_end = $('#filter_date_end').val();
                }
            },
            "columns": [{
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
                    data: 'userfrom',
                    name: 'userfrom'
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return `
                        <a href="#" class="text-dark text-center dropdown-item view-accepted-reports" data-bs-toggle="modal" data-bs-target="#viewAcceptedReportsModal" data-id="${row.report_id}">
                                    <i class="bi bi-eye w-2"></i>
                                    View
                                </a>
                    `;
                    },
                    orderable: false
                }
            ],
            buttons: [{
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: ':not(.no-export)'
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: ':not(.no-export)'
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: ':not(.no-export)'
                    }
                }
            ],
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            "paging": true,
            "lengthChange": true,
            "dom": '<"d-flex justify-content-between align-items-center mb-5"lB<"d-flex align-items-center">f>t<"d-flex justify-content-between mt-3"ip>',
        });

        $('#filter_date_start, #filter_date_end').on('input', function() {
            acceptedTable.ajax.reload();
        });


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('#accptreport-table').on('click', '.view-accepted-reports', function() {
            var reportsID = $(this).data('id');
            $.ajax({
                type: 'GET',
                url: "{{ url('admin/reports') }}/" + reportsID + "/show",
                success: function(response) {
                    var report = response.data;
                    var profilePicture = "{{ asset('storage/') }}" + '/' + report.residentProfile;
                    var imgEvidence = "{{ asset('storage/') }}" + '/' + report.imageEvidence;
                    $('#viewAcceptedReportsModal #report_id').text(report.report_id);
                    $('#viewAcceptedReportsModal #resident_name').text(report.resident_name);
                    $('#viewAcceptedReportsModal #date_time').text(report.dateandTime);
                    $('#viewAcceptedReportsModal #emergency_type').text(report.emergency_type);
                    $('#viewAcceptedReportsModal #location').text(report.locationName);
                    $('#viewAcceptedReportsModal #location_link').html('<a href="' + report.locationLink + '" target="_blank">' + report.locationLink + '</a');
                    $('#viewAcceptedReportsModal #phone_number').text(report.phoneNumber);
                    $('#viewAcceptedReportsModal #message').text(report.message);
                    $('#viewAcceptedReportsModal #responder_name').text(report.responder_name);
                    $('#viewAcceptedReportsModal #accepted_from').text(report.userfrom);
                    $('#viewAcceptedReportsModal #profile_image').html('<img style="width: 200px;height:200px;" class="rounded" src="' + profilePicture + '">');
                    $('#viewAcceptedReportsModal #image_evidence').html('<img style="width:100%;height:200px" src="' + imgEvidence + '">');
                    
                },
                error: function(error) {
                    console.error(error.responseText);
                }
            });
        });

    });
</script>
@endsection