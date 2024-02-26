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
                        <input type="tel" value="63"  class="form-control" id="hotline_number" name="hotline_number" maxlength="12" >
                        <span class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label>User From</label>
                        <select class="form-select" id="user_from" name="user_from">
                            <option value="">Select Sectors</option>
                            <option value="BFP">BFP</option>
                                                <option value="PNP">PNP</option>
                                                <option value="BAGBAGUIN">BAGBAGUIN</option>
                                                <option value="BALASING">BALASING</option>
                                                <option value="BUENAVISTA">BUENAVISTA</option>
                                                <option value="BULAC">BULAC</option>
                                                <option value="CAMANGYANAN">CAMANGYANAN</option>
                                                <option value="CATMON">CATMON</option>
                                                <option value="CAY POMBO">CAY POMBO</option>
                                                <option value="CAYSIO">CAYSIO</option>
                                                <option value="GUYONG">GUYONG</option>
                                                <option value="LALAKHAN">LALAKHAN</option>
                                                <option value="MAG ASAWANG SAPA">MAG ASAWANG SAPA</option>
                                                <option value="MAHABANG PARANG">MAHABANG PARANG</option>
                                                <option value="MANGGAHAN">MANGGAHAN</option>
                                                <option value="PARADA">PARADA</option>
                                                <option value="POBLACION">POBLACION</option>
                                                <option value="PULONG BUHANGIN">PULONG BUHANGIN</option>
                                                <option value="SAN GABRIEL">SAN GABRIEL</option>
                                                <option value="SAN JOSE PATAG">SAN JOSE PATAG</option>
                                                <option value="SAN VICENTE">SAN VICENTE</option>
                                                <option value="SANTA CLARA">SANTA CLARA</option>
                                                <option value="SANTA CRUZ">SANTA CRUZ</option>
                                                <option value="SILANGAN">SILANGAN</option>
                                                <option value="STO. TOMAS">STO. TOMAS</option>
                                                <option value="TUMANA">TUMANA</option>
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
                        <input type="tel" class="form-control" id="hotline_number" name="hotline_number" maxlength="12" value="63" pattern="63[0-9]{10}" placeholder="e.g., 639338189234" required>
                        <span class="text-danger" id="edit_hotline_number"></span>
                    </div>
                    <div class="mb-3">
                        <label>User From</label>
                        <select class="form-select" id="user_from" name="user_from">
                            <option value="">Select Sectors</option>
                                                <option value="MDRRMO">MDRRMO</option>
                                                <option value="BFP">BFP</option>
                                                <option value="PNP">PNP</option>
                                                <option value="BAGBAGUIN">BAGBAGUIN</option>
                                                <option value="BALASING">BALASING</option>
                                                <option value="BUENAVISTA">BUENAVISTA</option>
                                                <option value="BULAC">BULAC</option>
                                                <option value="CAMANGYANAN">CAMANGYANAN</option>
                                                <option value="CATMON">CATMON</option>
                                                <option value="CAY POMBO">CAY POMBO</option>
                                                <option value="CAYSIO">CAYSIO</option>
                                                <option value="GUYONG">GUYONG</option>
                                                <option value="LALAKHAN">LALAKHAN</option>
                                                <option value="MAG ASAWANG SAPA">MAG ASAWANG SAPA</option>
                                                <option value="MAHABANG PARANG">MAHABANG PARANG</option>
                                                <option value="MANGGAHAN">MANGGAHAN</option>
                                                <option value="PARADA">PARADA</option>
                                                <option value="POBLACION">POBLACION</option>
                                                <option value="PULONG BUHANGIN">PULONG BUHANGIN</option>
                                                <option value="SAN GABRIEL">SAN GABRIEL</option>
                                                <option value="SAN JOSE PATAG">SAN JOSE PATAG</option>
                                                <option value="SAN VICENTE">SAN VICENTE</option>
                                                <option value="SANTA CLARA">SANTA CLARA</option>
                                                <option value="SANTA CRUZ">SANTA CRUZ</option>
                                                <option value="SILANGAN">SILANGAN</option>
                                                <option value="STO. TOMAS">STO. TOMAS</option>
                                                <option value="TUMANA">TUMANA</option>
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

<script>
    // Get the input element
    var phoneNumberInput = document.getElementById('hotline_number');

    // Set the default value with the prefix
    phoneNumberInput.value = '63';

    // Add an event listener to prevent backspace key after the first two digits
    phoneNumberInput.addEventListener('keydown', function (event) {
        if (event.key === 'Backspace' || event.key === 'Delete') {
            // Allow backspace only for the first two digits
            if (phoneNumberInput.selectionStart <= 2) {
                event.preventDefault();
            }
        }
    });

    // Add an event listener to update the value when typing
    phoneNumberInput.addEventListener('input', function () {
        // Check if the prefix is still there, if not, add it back
        if (!phoneNumberInput.value.startsWith('63')) {
            phoneNumberInput.value = '63' + phoneNumberInput.value.slice(2);
        }
    });
</script>

    
