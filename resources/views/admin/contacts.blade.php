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

            <!-- <div class="container-fluid mt-3">
                <div class="row ">
                    <div class="col-12 text-start">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="{{ route('admin_dashboard') }}" class="text-muted">Dashboard/</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ route('hotlines.index') }}" class="text-muted">Manage Hotlines</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> -->
            <div class="container-fluid mt-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Hotlines</li>
                    </ol>
                </nav>
            </div>


            <div class="container-fluid ">
                {{-- <div class="row">
                        <div class="col-4">
                           <div class="card  mr-2 data_table">
                                        <div class=" card-header text-align center">
                                            <h4>Manage Hotlines</h4>
                                        </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <form action="{{ route('hotlinesAdd')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label" for=""><b>Add Mobile Number</b></label>
                    <input type="text" class="form-control" placeholder="e.g +63909.." name="hotlines_number">
                    <input type="hidden" class="form-control" name="responder_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" class="form-control" name="responder_name" value="{{ auth()->user()->responder_name }}">
                    @error('hotlines_number')
                    <div class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label" for="hotlineFrom"><b>Hotline From</b></label>
                    <select class="form-select" name="userfrom" id="hotlineFrom">
                        <option value="MDRRMO">MDRRMO</option>
                        <option value="BFP">BFP</option>
                        <option value="PNP">PNP</option>
                        <option value="CAY POMBO">CAY POMBO</option>
                    </select>
                    <div class="align-items-center">
                        <button type="submit" class="w-full mt-2 btn btn-success">ADD NUMBER</button>
                    </div>
                </div>
                </form>
            </div>
    </div>
</div>
</div>
<div class="col-8">
    <div class="data_table table-responsive ">
        <div>
            <h4>List of Hotlines</h4>
        </div>
        <table id="customtable" class="table table-striped table-bordered " style="width:100%">
            <thead>
                <tr>
                    <th>Hotlines ID</th>
                    <th>Emergency number</th>
                    <th>User From</th>
                    <th>Posted By</th>
                    <th>Created_at</th>
                    <th width="150px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $hotlines as $number )
                <tr>
                    <td>{{ $number->hotlines_id }}</td>
                    <td>{{ $number->hotlines_number }}</td>
                    <td>{{ $number->userfrom }}</td>
                    <td>{{ $number->responder_name }}</td>
                    <td>{{ $number->created_at }}</td>
                    <td>
                        <form action="{{route('hotlinesDelete', $number->hotlines_id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button><a class="text-success" data-bs-toggle="modal" data-bs-target="#editContacts"><i class="bi bi-pencil-square w-2"></i></a></button>
                            <button type="submit" class="text-danger m-0"><i class="bi bi-trash3 w-2"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $hotlines->links('pagination::bootstrap-5') }}
    </div>
</div>
</div> --}}

<div>
    <livewire:contacts>
</div>
</div>
</main>
<!-- Modal -->
@include('layouts.modals.editphone')
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
    window.addEventListener('close-modal', event => {
        $('#contactModal').modal('hide');
        $('#updateContactModal').modal('hide');
        $('#deleteContactModal').modal('hide');
    })
</script>

@endsection