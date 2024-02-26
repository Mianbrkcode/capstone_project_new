@extends('layouts.app')


@section('header')

    @section('title')
        E-ligtas | Guidelines Management
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
                        <li class="breadcrumb-item active" aria-current="page">Completed Reports</li>
                    </ol>
                </nav>
            </div>

            <div class="container-fluid">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center mb-5">
                        <h3 class="m-0">COMPLETED REPORTS</h3>
                        {{-- <button type="button" class="btn btn-success m-0" data-bs-toggle="modal" data-bs-target="#addGuidelinesModal">
                            <i class="bi bi-plus-square-fill"></i> ADD
                        </button> --}}

                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered" id="guidelines-table">
                            <thead>
                                <tr>
                                    <th>Report ID</th>
                                    <th>Date and Time</th>
                                    <th>emergency_type</th>
                                    <th>resident_name</th>
                                    <th>locationName</th>
                                    <th>Responded By</th>
                                    <th>status</th>
                                    <th class="no-export text-center">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </main>

        {{-- modals --}}
        @include('admin.completedreport.creportmodals')


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

    
<script>
    $(document).ready(function() {
        var guidelinesTable = $('#guidelines-table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route('completed.index') }}",
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
                    data: 'status',
                    name: 'status',
                    render: function (data, type, row){
                        if(data ==='3'){
                            return '<span class=" text-success">Verified</span>';
                        }else if (data ==='4'){
                            return '<span class="text-danger">Incorrect</span>';
                        }
                    }
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
                            <a href="#" class="text-dark dropdown-item view-guidelines" data-bs-toggle="modal" data-bs-target="#viewCompletedReportModals" data-id="${row.report_id}">
                                <i class="bi bi-eye w-2"></i>
                                View
                            </a>
                            <a href="#" class="text-primary dropdown-item delete-guidelines" data-id="${row.report_id}">
                                <i class="bi bi-trash3 w-2"></i>
                                Dowload
                            </a>
                        </div>
                    </li>
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
            "scrollY": "400px",
            "paging": true,
            "lengthChange": true,
            "dom": '<"d-flex justify-content-between align-items-center mb-5"lB<"d-flex align-items-center">f>t<"d-flex justify-content-end">p',
        });

        guidelinesTable.on('xhr.dt', function(e, settings, json, xhr) {
            console.log(json);
        });

       


        function appendMediaElement(containerId, fileUrl) {
            var fileExtension = fileUrl.split('.').pop().toLowerCase();
            var container = $('#' + containerId);

            if (['mp4', 'webm', 'ogg'].includes(fileExtension)) {
                container.html('<video class="video-guidelines-view" controls><source src="' + fileUrl + '" type="video/' + fileExtension + '">Your browser does not support the video tag.</video>');
            } else if (['jpg', 'jpeg', 'png', 'gif', 'ico'].includes(fileExtension)) {
                container.html('<img class="image-guidlines-view" src="' + fileUrl + '" alt="Media">');
            } else {
                console.error('Unsupported file type: ' + fileExtension);
            }
        }


        $('#guidelines-table').on('click', '.view-guidelines', function() {
            var reportsId = $(this).data('id');
            $.ajax({
                type: 'GET',
                url: "{{ url('admin/completed') }}/" + reportsId + "/edit",
                success: function(response) {
                    var report = response.data;
                    var profileURL = "{{ asset('storage/') }}" + '/' + report.residentProfile;
                    var InitialEvidenceURL = "{{ asset('storage/') }}" + '/' + report.imageEvidence;
                    var SpotEvidenceURL = "{{ asset('storage/') }}" + '/' + report.SpotReport.imageEvidence;


                    appendMediaElement('viewCompletedReportModals #profile', profileURL);
                    $('#viewCompletedReportModals #residentName').text(report.resident_name);
                    $('#viewCompletedReportModals #locationame').text(report.locationName);
                    $('#viewCompletedReportModals #reportStatus').text(report.status);
                    $('#viewCompletedReportModals #phonenumber').text(report.phoneNumber);
                    $('#viewCompletedReportModals #emergencytype').text(report.emergency_type);
                    $('#viewCompletedReportModals #message').text(report.message);
                    $('#viewCompletedReportModals #userfrom').text(report.userfrom);
                    appendMediaElement('viewCompletedReportModals #initialEvidence', InitialEvidenceURL);

                    $('#viewCompletedReportModals #spotdescription').text(report.SpotReport.description);
                    appendMediaElement('viewCompletedReportModals #spotEvidence', SpotEvidenceURL);

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
        
    });
</script>

@endsection