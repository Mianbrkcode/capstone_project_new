{{-- @foreach ( $hotlines as $number )
<div class="modal fade" id="editContacts" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
            <form action="{{ route('hotlines.edit',$number->hotlines_id) }}" id="EmployeeForm" method="POST" class="form-horizontal"  enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row g-3 ">
                        <div class="col">
                            <label for="emergencyNumber" class="form-label">Emergency Number</label>
                            <input type="text" class="form-control" name="hotlines_number" id="emergencyNumber"  value="{{ $number->hotlines_number}}" required>
                        </div>
                        <div class="col">
                            <label for="userfrom" class="form-label">User From</label>
                            <select name="userfrom" id="userFrom" class="form-select" required>
                                <option value="{{ $number->userfrom}}">{{ $number->userfrom}}</option>
                                <option value="MDRRMO">MDRRMO</option>
                                <option value="PNP">PNP</option>
                                <option value="BFP">BFP</option>
                                <option value="CAY POMBO">CAY POMBO</option>
                                <option value="CAYSIO">CAYSIO</option>
                            </select>
                        </div>
                    </div> 
            
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" >Save changes</button>
                </div>
            </form>
      </div>
    </div>
  </div>
@endforeach --}}