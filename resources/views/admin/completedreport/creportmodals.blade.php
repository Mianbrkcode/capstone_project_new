<div class="modal fade static-modal" id="viewCompletedReportModals" tabindex="-1" aria-labelledby="viewGuidelinesModal" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">View Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            {{-- <center> --}}
                <div class="row mb-3">
                    <div class="col">
                        <div class="mb-3">
                            <label class="fw-bold fs-3">INCIDENT REPORT</label>
                        </div>
                    
                        <div class="mb-3">
                            <label class="fw-bold fs-3">INITIAL REPORT</label>
                        </div>

                        <div class="mb-3">
                            <label class="fw-bold">Resident Profile:</label>
                            <span id="profile"></span> 
                        </div>

                        <div class=" mb-3">
                            <label class="fw-bold">Resident Name:</label>
                            <div id="residentName"></div>
                        </div>
                        <div class="mb-3">
                            <label class="fw-bold">Address:</label>
                            <span id="locationame"></span> 
                        </div>

                        <div class=" mb-3">
                            <label class="fw-bold">Report status:</label>
                            <div id="reportStatus"></div>
                        </div>

                        <div class="mb-3">
                            <label class="fw-bold">Phone Number:</label>
                            <span id="phonenumber"></span> 
                        </div>

                        <div class="mb-3">
                            <label class="fw-bold">Type of Emergency:</label>
                            <span id="emergencytype"></span> 
                        </div>

                        <div class="mb-3">
                            <label class="fw-bold">Message:</label>
                            <span id="message"></span> 
                        </div>

                        <div class="mb-3">
                            <label class="fw-bold">what barangay/department did the rescue?</label>
                            <span id="userfrom"></span> 
                        </div>

                        <div class="mb-3">
                            <label class="fw-bold">Image Evidence:</label>
                            <span id="initialEvidence"></span> 
                        </div>
                        
                    </div> 
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="fw-bold fs-3">SPOT REPORT</label>
                        <div class="mb-3">
                            <label class="fw-bold">Description:</label>
                            <div class="text-start" style="white-space: pre-wrap;">
                                <p id="spotdescription"></p>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="fw-bold">Photo Documentation:</label>
                            <div id="spotEvidence"></div>
                        </div>
                    </div>
                </div>
        {{-- </center> --}}
        </div>
    </div>
</div>