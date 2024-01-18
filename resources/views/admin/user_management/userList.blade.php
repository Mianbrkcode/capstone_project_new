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
                                <a href="{{ route('admin_dashboard') }}" class="text-muted"> Dashboard > </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ route('users.index') }}" class="text-muted"> User Management </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            @if ($message = Session::get('success'))
            <script>
                Swal.fire({
                    title: "Success",
                    text: "{{ $message }}",
                    icon: "success"
                });
            </script>
            @endif

            <div class="container-fluid ">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="data_table table-responsive ">
                                <!-- <div class="card-header">
                                    <h3>User Management</h3>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 margin-tb">
                                        <div class="pull-right mb-2">
                                            <a class="btn btn-primary" href="{{ route('users.create') }}">Add User</a>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="card-header row align-items-center justify-content-between mb-4">
                                    <h3 class="m-0 col-6">User Management</h3>
                                    <div class="m-0 col-6">
                                        <a class="btn btn-primary m-0 float-end" href="{{ route('users.create') }}"><i class="bi bi-plus-square-fill"></i> ADD</a>
                                    </div>
                                </div>
                                <table id="customtable" class="table table-striped table-bordered " style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>User from</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
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

<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        var table = $('#customtable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('admin/users')}}",
            columns: [

                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'responder_name',
                    name: 'responder_name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'userfrom',
                    name: 'userfrom'
                },
                {
                    data: 'role',
                    name: 'role'
                },
                {
                    data: 'verified',
                    name: 'verified'
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

                    var id = $(this).data('id');

                    // ajax
                    $.ajax({
                        type: "POST",
                        url: "{{ url('admin/delete-user') }}",
                        data: {
                            id: id
                        },
                        dataType: 'json',
                        success: function(res) {

                            var oTable = $('#customtable').dataTable();
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