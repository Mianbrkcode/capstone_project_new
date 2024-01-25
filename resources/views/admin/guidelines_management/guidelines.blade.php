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
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mt-3">
                        <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Disaster Guidelines</li>
                    </ol>
                </nav>
            </div>

            <div class="container-fluid">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center mb-5">
                        <h4 class="m-0">DISASTER GUIDELINES</h4>
                        <button type="button" class="btn btn-success m-0" data-bs-toggle="modal" data-bs-target="#addGuidelinesModal">
                            <i class="bi bi-plus-square-fill"></i> ADD
                        </button>

                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-striped table-bordered" id="guidelines-table">
                            <thead>
                                <tr>
                                    <th>Guidelines No.</th>
                                    <th>Guidelines Name</th>
                                    <th>Created_at</th>
                                    <th class="no-export text-center">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </main>

        {{-- modals --}}
        @include('admin.guidelines_management.guidelinesModal')


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
            "ajax": "{{ route('guidelines.index') }}",
            "columns": [{
                    data: 'guidelines_id',
                    name: 'guidelines_id'
                },
                {
                    data: 'guidelines_name',
                    name: 'guidelines_name'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
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
                            <a href="#" class="text-success dropdown-item edit-guidelines" data-bs-toggle="modal" data-bs-target="#editGuidelinesModal" data-id="${row.guidelines_id}">
                                <i class="bi bi-pencil-square w-2"></i>
                                Edit
                            </a>
                            <a href="#" class="text-dark dropdown-item view-guidelines" data-bs-toggle="modal" data-bs-target="#viewGuidelinesModal" data-id="${row.guidelines_id}">
                                <i class="bi bi-eye w-2"></i>
                                View
                            </a>
                            <a href="#" class="text-danger dropdown-item delete-guidelines" data-id="${row.guidelines_id}">
                                <i class="bi bi-trash3 w-2"></i>
                                Delete
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



        $('#guidelines-table').on('click', '.edit-guidelines', function() {
            var guidelinesId = $(this).data('id');
            $.ajax({
                type: 'GET',
                url: "{{ url('admin/guidelines') }}/" + guidelinesId + "/edit",
                success: function(response) {
                    var guideline = response.data;
                    $('#editGuidelinesModal #guidelines_id').val(guideline.guidelines_id);
                    $('#editGuidelinesModal #guidelines_title').val(guideline.guidelines_name);
                    $('#editGuidelinesModal #disaster_type').val(guideline.disaster_type);
                    $('#editGuidelinesModal #before_headings').val(guideline.before.headings);
                    $('#editGuidelinesModal #before_description').val(guideline.before.description);
                    $('#editGuidelinesModal #during_headings').val(guideline.during.headings);
                    $('#editGuidelinesModal #during_description').val(guideline.during.description);
                    $('#editGuidelinesModal #after_headings').val(guideline.after.headings);
                    $('#editGuidelinesModal #after_description').val(guideline.after.description);
                },
                error: function(error) {
                    console.error(error.responseText);
                }
            });
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
            var guidelinesId = $(this).data('id');
            $.ajax({
                type: 'GET',
                url: "{{ url('admin/guidelines') }}/" + guidelinesId + "/edit",
                success: function(response) {
                    var guideline = response.data;
                    var thmbnailURL = "{{ asset('storage/') }}" + '/' + guideline.thumbnail;
                    var beforeURL = "{{ asset('storage/') }}" + '/' + guideline.before.image;
                    var duringURL = "{{ asset('storage/') }}" + '/' + guideline.during.image;
                    var afterURL = "{{ asset('storage/') }}" + '/' + guideline.after.image;
                    $('#viewGuidelinesModal #guidelines_title').text(guideline.guidelines_name);
                    appendMediaElement('viewGuidelinesModal #thumbnail', thmbnailURL);
                    $('#viewGuidelinesModal #disaster_type').text(guideline.disaster_type);

                    $('#viewGuidelinesModal #before_headings').text(guideline.before.headings);
                    appendMediaElement('viewGuidelinesModal #before_file', beforeURL);
                    $('#viewGuidelinesModal #before_description').text(guideline.before.description);

                    $('#viewGuidelinesModal #during_headings').text(guideline.during.headings);
                    appendMediaElement('viewGuidelinesModal #during_file', duringURL);
                    $('#viewGuidelinesModal #during_description').text(guideline.during.description);

                    $('#viewGuidelinesModal #after_headings').text(guideline.after.headings);
                    appendMediaElement('viewGuidelinesModal #after_file', afterURL);
                    $('#viewGuidelinesModal #after_description').text(guideline.after.description);
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

        $('#guidelines-table').on('click', '.delete-guidelines', function(e) {
            e.preventDefault();

            var guidelinesId = $(this).data('id');

            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'DELETE',
                        url: '{{ route("guidelines.destroy", ["guidelinesID" => "_guidelinesId_"]) }}'.replace('_guidelinesId_', guidelinesId),
                        success: function(response) {
                            Swal.fire(
                                'Deleted!',
                                'Guidelines have been deleted.',
                                'success'
                            );

                            var guidelinesTable = $('#guidelines-table').dataTable();
                            guidelinesTable.fnDraw(false);
                        },
                        error: function(error) {
                            Swal.fire(
                                'Error!',
                                'Failed to delete guidelines.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    });
</script>

@endsection