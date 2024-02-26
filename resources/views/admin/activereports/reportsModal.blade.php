<div class="modal fade static-modal" id="viewReportsModal" tabindex="-1" aria-labelledby="viewGuidelinesModal" aria-hidden="true">
    <div class="modal-dialog modal-xs modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">View Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3 border rounded p-3">
                    <label class="fw-bold">Resident Profile:</label>
                    <div class="mb-3 d-flex justify-content-center">
                        <div id="profile_image"></div>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Report ID:</label>
                        <span id="report_id"></span>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Resident Name:</label>
                        <div id="resident_name"></div>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Date and Time:</label>
                        <span id="date_time"></span>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Emergency Type:</label>
                        <span id="emergency_type"></span>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Location:</label>
                        <span id="location"></span>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Location Link:</label>
                        <div id="location_link"></div>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Phone Number:</label>
                        <span id="phone_number"></span>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Message:</label>
                        <span id="message"></span>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Image Evidence:</label>
                        <div id="image_evidence"></div>
                    </div>
                    
                </div>
                <button type="button" id="acceptReportBtn" class="btn btn-primary">Accept</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade static-modal" id="viewAcceptedReportsModal" tabindex="-1" aria-labelledby="viewGuidelinesModal" aria-hidden="true">
    <div class="modal-dialog modal-xs modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">View Accepted Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3 border rounded p-3">
                    <label class="fw-bold">Resident Profile:</label>
                    <div class="mb-3 d-flex justify-content-center">
                        <div id="profile_image"></div>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Report ID:</label>
                        <span id="report_id"></span>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Resident Name:</label>
                        <div id="resident_name"></div>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Date and Time:</label>
                        <span id="date_time"></span>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Emergency Type:</label>
                        <span id="emergency_type"></span>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Location:</label>
                        <span id="location"></span>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Location Link:</label>
                        <div id="location_link"></div>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Phone Number:</label>
                        <span id="phone_number"></span>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Message:</label>
                        <span id="message"></span>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Accepted By:</label>
                        <div id="responder_name"></div>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Accepted from:</label>
                        <div id="accepted_from"></div>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Image Evidence:</label>
                        <div id="image_evidence"></div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>


{{-- view  Rejected_report modal --}}
<div class="modal fade static-modal" id="viewRejectedReportsModal" tabindex="-1" aria-labelledby="viewGuidelinesModal" aria-hidden="true">
    <div class="modal-dialog modal-xs modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">View Rejected Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3 border rounded p-3">
                    <label class="fw-bold">Resident Profile:</label>
                    <div class="mb-3 d-flex justify-content-center">
                        <div id="profile_image"></div>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Report ID:</label>
                        <span id="report_id"></span>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Resident Name:</label>
                        <div id="resident_name"></div>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Date and Time:</label>
                        <span id="date_time"></span>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Emergency Type:</label>
                        <span id="emergency_type"></span>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Location:</label>
                        <span id="location"></span>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Location Link:</label>
                        <div id="location_link"></div>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Phone Number:</label>
                        <span id="phone_number"></span>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Message:</label>
                        <span id="message"></span>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Rejected By:</label>
                        <div id="responder_name"></div>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Rejected from:</label>
                        <div id="accepted_from"></div>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Image Evidence:</label>
                        <div id="image_evidence"></div>
                    </div>
                    
                </div>
            </div>
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

    
        $('#acceptReportBtn').on('click', function() {
            var reportsId = $("#viewReportsModal #report_id").text();
        
            $.ajax({
                type: 'PATCH',
                url: "{{ url('admin/reports') }}/" + reportsId,
                // data: updateFormData,
                success: function(response) {
                    toastr.success('Report Accepted!');
                    $('#viewReportsModal').modal('hide');
                    var oTable = $('#report-table').dataTable();
                    oTable.fnDraw(false);
                },
                error: function(error) {
                    var errors = error.responseJSON.errors;
                }
            });
        });
    });
</script>



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

    
        $('#acceptReportBtn').on('click', function() {
            var reportsId = $("#viewReportsModal #report_id").text();
        
            $.ajax({
                type: 'PATCH',
                url: "{{ url('sector/reports') }}/" + reportsId,
                // data: updateFormData,
                success: function(response) {
                    toastr.success('Report Accepted!');
                    $('#viewReportsModal').modal('hide');
                    var oTable = $('#report-table').dataTable();
                    oTable.fnDraw(false);
                },
                error: function(error) {
                    var errors = error.responseJSON.errors;
                }
            });
        });
    });
</script>