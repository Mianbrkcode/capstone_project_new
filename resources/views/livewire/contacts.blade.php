<div>
    @include('livewire.contactsmodals')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
                
                @if(session('success'))
                    <script>
                        toastr.success('{{ session('success') }}');
                    </script>
                @endif


                <div class="data_table table-responsive ">
                    <h4 class="text-center">List of Hotlines</h4>
                    <div>     
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#contactModal">
                            + New Hotline Number
                        </button>
                        <input type="search" wire:model="search" class="form-control float-end mx-2" placeholder="Search..." style="width: 230px" />    
                    </div>      
                    <table class="table table-borderd table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Hotlines No.</th>
                                <th>User From</th>
                                <th>Posted By</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->hotlines_id }}</td>
                                    <td>{{ $contact->hotlines_number }}</td>
                                    <td>{{ $contact->userfrom}}</td>
                                    <td>{{ $contact->responder_name }}</td>
                                    <td>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#updateContactModal" wire:click="editContact({{$contact->hotlines_id}})" class="btn btn-primary">
                                            Edit
                                        </button>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#deleteContactModal" wire:click="deleteContact({{$contact->hotlines_id}})" class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No Record Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{ $contacts->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



