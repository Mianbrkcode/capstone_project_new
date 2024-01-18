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
                <div class="container bg-white">
                <h1 class="text-center">UPLOAD GUIDELINES</h1>    
                
                    <div class="mt-4 p-4">
                        <div class="row">
                            <div class="col-mb-12">
                                    <div class="form-group">
                                        <label for="" class="form-label">Guidelines Title</label>
                                        <input type="text" class="form-control" placeholder="Write guidelines title" >
                                    </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-mb-12">
                                <h3 class="text-center">Before</h3>
                                    <div class="form-group">
                                        <label for="" class="form-label">Headings</label>
                                        <input type="text" class="form-control" placeholder="Headings for Before Guidelines" multiple>
                                        <input type="file" class="form-control" multiple>
                                        <label for="" class="form-label">Description</label>
                                        <textarea class="form-control" name="" id="" cols="40" rows="5"></textarea>
                                    </div>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-mb-12">
                                <h3 class="text-center">During</h3>
                                    <div class="form-group">
                                        <label for="" class="form-label">Headings</label>
                                        <input type="text" class="form-control" placeholder="Headings for Before Guidelines" multiple>
                                        <input type="file" class="form-control" multiple>
                                        <label for="" class="form-label">Description</label>
                                        <div>
                                            <textarea class="form-control" name="" id="" cols="40" rows="5"></textarea>
                                        </div>
                                    </div>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-mb-12">
                                <h3 class="text-center">After</h3>
                                    <div class="form-group">
                                        <label for="" class="form-label">Headings</label>
                                        <input type="text" class="form-control" placeholder="Headings for Before Guidelines">
                                        <input type="file" class="form-control" multiple>
                                        <label for="" class="form-label">Description</label>
                                        <div>
                                            <textarea class="form-control" name="" id="" cols="40" rows="5"></textarea>
                                        </div>
                                    </div>
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

@endsection