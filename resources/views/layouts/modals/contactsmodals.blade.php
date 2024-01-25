<!-- Insert Modal -->
<div class="modal fade static-modal" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="contactModalLabel">ADD HOTLINE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <form id="contactForm">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Hotline Number</label>
                        <input type="text" class="form-control" id="hotline_number" name="hotline_number">
                        <span class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label>User From</label>
                        <select class="form-control" id="user_from" name="user_from">
                            <option value="">Select Sectors</option>
                            <option value="MDRRMO">MDRRMO</option>
                            <option value="BFP">BFP</option>
                            <option value="PNP">PNP</option>
                            <option value="CAY POMBO">CAY POMBO</option>
                            <option value="CAYSIO">CAAYSIO</option>
                            <option value="GUYONG">GUYONG</option>
                        </select>
                        <span class="text-danger"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveContactBtn">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade static-modal" id="updateContactModal" tabindex="-1" aria-labelledby="updateContactModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateContactModalLabel">EDIT HOTLINE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateContactForm">
                @csrf
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="hotline_id" name="hotline_id">

                    <div class="mb-3">
                        <label>Hotline Number</label>
                        <input type="text" class="form-control" id="hotline_number" name="hotline_number">
                        <span class="text-danger" id="edit_hotline_number"></span>
                    </div>
                    <div class="mb-3">
                        <label>User From</label>
                        <select class="form-control" id="user_from" name="user_from">
                            <option value="">Select Sectors</option>
                            <option value="MDRRMO">MDRRMO</option>
                            <option value="BFP">BFP</option>
                            <option value="PNP">PNP</option>
                            <option value="CAY POMBO">CAY POMBO</option>
                            <option value="CAYSIO">CAAYSIO</option>
                            <option value="GUYONG">GUYONG</option>
                        </select>
                        <span class="text-danger" id="edit_user_from"></span>
                    </div>
                    <div class="mb-3">
                        <label>Responder Name</label>
                        <input type="text" class="form-control" id="responder_name" disabled>
                        <span class="text-danger" id="edit_responder_name"></span>
                    </div>
                  
                    <input type="hidden" class="form-control" id="responder_id" disabled>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="updateContactBtn">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        function resetForm(formId) {
            $(formId)[0].reset();
            $(formId + ' .text-danger').text('');
        }
        $('.static-modal').modal({
            backdrop: 'static',
            keyboard: false
        });

        $('#contactModal').on('hidden.bs.modal', function() {
            resetForm('#contactForm');
        });

        $('#updateContactModal').on('hidden.bs.modal', function() {
            resetForm('#updateContactForm');
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#saveContactBtn').on('click', function() {
            var formData = $('#contactForm').serialize();
            $.ajax({
                type: 'POST',
                url: '{{ route("hotlines.store") }}',
                data: formData,
                success: function(response) {
                    toastr.success('Hotline added successfully');
                    $('#contactModal').modal('hide');
                    var oTable = $('#hotline-table').dataTable();
                    oTable.fnDraw(false);
                },
                error: function(error) {
                    var errors = error.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        $('#' + key).next('.text-danger').text(value[0]);
                    });
                }
            });
        });

        $('#updateContactBtn').on('click', function() {
            var hotlineId = $("#updateContactModal #hotline_id").val();
            var updateFormData = $('#updateContactForm').serialize();
            $.ajax({
                type: 'PATCH',
                url: "{{ url('admin/hotlines') }}/" + hotlineId,
                data: updateFormData,
                success: function(response) {
                    toastr.success('Hotline updated successfully');
                    $('#updateContactModal').modal('hide');
                    var oTable = $('#hotline-table').dataTable();
                    oTable.fnDraw(false);
                },
                error: function(error) {
                    var errors = error.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        $('#edit_' + key).text(value[0]);
                    });
                }
            });
        });
    });
</script>