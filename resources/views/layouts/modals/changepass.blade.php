<div class="modal fade" id="changepass-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('userchangepass',$user->id) }}" id="changepassForm" name="RescuerForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    
                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>

                    <input type="hidden" name="id" id="id">
                    <div class="col-md-12 mb-2">
                        <label form="RescuerForm" for="password" class="labels">New Password: </label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter New Password">
                    
                        @error('password')
                            <div class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                        
                    </div>
                    
                    
                    <div class="col-md-12 mb-2">
                        <label for="password_confirmation" class="labels">Confirm Password:</label>
                        <input form="RescuerForm" type="password" id="password_confirmation" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" placeholder="Re-enter New Password">
                        
                        @error('password_confirmation')
                            <div class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    
                    <div class="col-sm-offset-2 col-sm-10"><br/>
                        <button form="changepassForm" type="submit" class="btn btn-primary" id="btn-save">Save changes</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>

