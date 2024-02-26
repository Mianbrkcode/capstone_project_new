@extends('layouts.app')


@section('header')

@section('title')
    E-ligtas | Hotlines
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
                        <li class="breadcrumb-item text-muted "><a class="text-muted" href="{{ route('admin_dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Hotlines</li>
                    </ol>
                </nav>
            </div>

            <div class="container-fluid">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center mb-5">
                        <h3 class="m-0">HOTLINES</h3>
                        <button type="button" class="btn btn-success m-0" data-bs-toggle="modal" data-bs-target="#contactModal">
                            <i class="bi bi-plus-square-fill"></i> ADD
                        </button>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered" id="hotline-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Hotlines No.</th>
                                    <th>User From</th>
                                    <th>Posted By</th>
                                    <th class="no-export text-center">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        
<!-- Modal -->
@include('layouts.modals.contactsmodals')
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

<script>
    $(document).ready(function() {
        var hotlinesTable = $('#hotline-table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: "{{ route('hotlines.index') }}",
                "data": function(d) {
                    if (d.buttons) {
                        d.action = 'export';
                    }
                }
            },
            "columns": [{
                    data: 'hotlines_id',
                    name: 'hotlines_id'
                },
                {
                    data: 'hotlines_number',
                    name: 'hotlines_number'
                },
                {
                    data: 'userfrom',
                    name: 'userfrom'
                },
                {
                    data: 'responder_name',
                    name: 'responder_name'
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
                                <a href="#" class="text-success dropdown-item edit-hotline" data-bs-toggle="modal" data-bs-target="#updateContactModal" data-id="${row.hotlines_id}">
                                    <i class="bi bi-pencil-square w-2"></i>
                                    Edit
                                </a>
                                <a href="#" class="text-danger dropdown-item delete-hotline" data-id="${row.hotlines_id}">
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
            "scrollY": "400px",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            "paging": true,
            "lengthChange": true,
            "dom": '<"d-flex justify-content-between align-items-center mb-5"lB<"d-flex align-items-center">f>t<"d-flex justify-content-end mt-3">p',
        });

        $('#hotline-table').on('click', '.edit-hotline', function() {
            var hotlineId = $(this).data('id');

            $.ajax({
                type: 'GET',
                url: "{{ url('admin/hotlines') }}/" + hotlineId + "/edit",
                success: function(response) {
                    var hotline = response.data;
                    $('#updateContactModal #hotline_id').val(hotline.hotlines_id);
                    $('#updateContactModal #hotline_number').val(hotline.hotlines_number);
                    $('#updateContactModal #user_from').val(hotline.userfrom);
                    $('#updateContactModal #responder_name').val(hotline.responder_name);
                    $('#updateContactModal #responder_id').val(hotline.responder_id);

                    $('#updateContactModal').modal('show');
                },
                error: function(error) {
                    console.log('Error fetching hotline details:', error);
                }
            });
        });


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#hotline-table').on('click', '.delete-hotline', function(e) {
            e.preventDefault();

            var hotlineId = $(this).data('id');

            // Use SweetAlert for confirmation
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
                    // Perform the delete operation
                    $.ajax({
                        type: 'DELETE',
                        url: '{{ route("hotlines.destroy", ["hotline" => "_hotlineId_"]) }}'.replace('_hotlineId_', hotlineId),
                        success: function(response) {
                            Swal.fire(
                                'Deleted!',
                                'Hotline has been deleted.',
                                'success'
                            );

                            var oTable = $('#hotline-table').dataTable();
                            oTable.fnDraw(false);
                        },
                        error: function(error) {
                            Swal.fire(
                                'Error!',
                                'Failed to delete hotline.',
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