<!-- Insert Modal -->
<div wire:ignore.self class="modal fade static-modal" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="contactModalLabel">ADD HOTLINE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="closeModal"></button>

            </div>
            <form wire:submit.prevent="saveContacts">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Hotline Number</label>
                        <input type="text" wire:model="hotlines_number" class="form-control">
                        @error('hotlines_number') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>User From</label>
                        
                        <select class="form-control" wire:model="userfrom"  id="userFrom">
                            <option value="">Select Sectors</option>
                            <option value="MDRRMO">MDRRMO</option>
                            <option value="BFP">BFP</option>
                            <option value="PNP">PNP</option>
                            <option value="CAY POMBO">CAY POMBO</option>
                            <option value="CAYSIO">CAAYSIO</option>
                            <option value="GUYONG">GUYONG</option>
                        </select>
                        @error('userfrom') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
 
<!-- Update Student Modal -->
<div wire:ignore.self class="modal fade static-modal" id="updateContactModal" tabindex="-1" aria-labelledby="updateContactModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateContactModalLabel">EDIT HOTLINE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="updateContacts">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Hotline Number</label>
                        <input type="text" wire:model="hotlines_number" class="form-control">
                        @error('hotlines_number') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>User From</label>
                        <input type="text" wire:model="userfrom" class="form-control">
                        @error('userfrom') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Resident Name</label>
                        <input type="text" wire:model="responder_name" class="form-control">
                        @error('responder_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Responder id</label>
                        <input type="text" wire:model="responder_id" class="form-control">
                        @error('responder_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
 
 
<!-- Delete Student Modal -->
<div wire:ignore.self class="modal fade static-modal" id="deleteContactModal" tabindex="-1" aria-labelledby="deleteContactModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteContactModalLabel">DELETE HOTLINE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyContact">
                <div class="modal-body">
                    <h4>Are you sure you want to delete this data ?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Yes! Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
      $('.static-modal').modal({
        backdrop: 'static',
        keyboard: false
      });
    });
  </script>