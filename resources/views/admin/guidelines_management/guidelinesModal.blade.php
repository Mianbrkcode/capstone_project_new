<div class="modal fade static-modal" id="addGuidelinesModal" tabindex="-1" aria-labelledby="addGuidelinesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addGuidelinesModalLabel">Add New Guidelines</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addGuidelinesForm">
                    @csrf
                    <div class="mb-3">
                        <label for="guidelines_title" class="form-label">Guidelines Title</label>
                        <input type="text" class="form-control" id="guidelines_title" name="guidelines_title" placeholder="Write guidelines title">
                        <span class="text-danger"></span>
                    </div>

                    <div class="mb-3">
                        <label for="thumbnail" class="form-label">Thumbnail</label>
                        <div id="thumbnailPreview" class="mb-3"></div>
                        <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                        <span class="text-danger"></span>
                    </div>

                    <div class="mb-3">
                        <label for="disaster_type" class="form-label">Disaster Type</label>
                        <select class="form-select" name="disaster_type" id="disaster_type">
                            <option value="">Type of Disaster</option>
                            <option value="Man Made Disaster">Man Made Disaster</option>
                            <option value="Natural Disaster">Natural Disaster</option>
                        </select>
                        <span class="text-danger"></span>
                    </div>

                    <div class="mb-3">
                        <h3 class="text-center">Before</h3>

                        <div class="mb-3">
                            <label for="before_headings" class="form-label">Headings</label>
                            <input type="text" class="form-control" id="before_headings" name="before_headings" placeholder="Headings for Before Guidelines">
                            <span class="text-danger"></span>
                        </div>

                        <div class="mb-3">
                            <label for="before_file" class="form-label">File</label>
                            <div id="beforeVideoPreview" class="mb-3"></div>
                            <input type="file" class="form-control" id="before_file" name="before_file">
                            <span class="text-danger"></span>
                        </div>

                        <div class="mb-3">
                            <label for="before_description" class="form-label">Description</label>
                            <textarea class="form-control" id="before_description" name="before_description" cols="40" rows="5"></textarea>
                            <span class="text-danger"></span>
                        </div>
                    </div>

                    <div class="mb-3">
                        <h3 class="text-center">During</h3>

                        <div class="mb-3">
                            <label for="during_headings" class="form-label">Headings</label>
                            <input type="text" class="form-control" id="during_headings" name="during_headings" placeholder="Headings for During Guidelines">
                            <span class="text-danger"></span>
                        </div>

                        <div class="mb-3">
                            <label for="during_file" class="form-label">File</label>
                            <div id="duringVideoPreview" class="mb-3"></div>
                            <input type="file" class="form-control" id="during_file" name="during_file">
                            <span class="text-danger"></span>
                        </div>

                        <div class="mb-3">
                            <label for="during_description" class="form-label">Description</label>
                            <textarea class="form-control" id="during_description" name="during_description" cols="40" rows="5"></textarea>
                            <span class="text-danger"></span>
                        </div>
                    </div>


                    <div class="mb-3">
                        <h3 class="text-center">After</h3>

                        <div class="mb-3">
                            <label for="after_headings" class="form-label">Headings</label>
                            <input type="text" class="form-control" id="after_headings" name="after_headings" placeholder="Headings for After Guidelines">
                            <span class="text-danger"></span>
                        </div>

                        <div class="mb-3">
                            <label for="after_file" class="form-label">File</label>
                            <div id="afterVideoPreview" class="mb-3"></div>
                            <input type="file" class="form-control" id="after_file" name="after_file">
                            <span class="text-danger"></span>
                        </div>

                        <div class="mb-3">
                            <label for="after_description" class="form-label">Description</label>
                            <textarea class="form-control" id="after_description" name="after_description" cols="40" rows="5"></textarea>
                            <span class="text-danger"></span>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade static-modal" id="editGuidelinesModal" tabindex="-1" aria-labelledby="editGuidelinesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editGuidelinesModalLabel">Edit Guidelines</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editGuidelinesForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" class="form-control" id="guidelines_id" name="guidelines_id">
                    <div class="mb-3">
                        <label for="guidelines_title" class="form-label">Guidelines Title</label>
                        <input type="text" class="form-control" id="guidelines_title" name="guidelines_title" placeholder="Write guidelines title">
                        <span class="text-danger" id="edit_guidelines_title"></span>
                    </div>

                    <div class="mb-3">
                        <label for="thumbnail" class="form-label">Thumbnail</label>
                        <div id="editThumbnailPreview" class="mb-3"></div>
                        <input type="file" class="form-control" id="edit_thumbnail" name="thumbnail">
                        <span class="text-danger" id="edit_thumbnail"></span>
                    </div>

                    <div class="mb-3">
                        <label for="disaster_type" class="form-label">Disaster Type</label>
                        <select class="form-select" name="disaster_type" id="disaster_type">
                            <option value="">Type of Disaster</option>
                            <option value="Man Made Disaster">Man Made Disaster</option>
                            <option value="Natural Disaster">Natural Disaster</option>
                        </select>
                        <span class="text-danger"></span>
                    </div>

                    <div class="mb-3">
                        <h3 class="text-center">Before</h3>
                        <div class="mb-3">
                            <label for="before_headings" class="form-label">Headings</label>
                            <input type="text" class="form-control" id="before_headings" name="before_headings" placeholder="Headings for Before Guidelines">
                            <span class="text-danger" id="edit_before_headings"></span>
                        </div>
                        <div class="mb-3">
                            <label for="before_file" class="form-label">File</label>
                            <div id="editBeforeVideoPreview" class="mb-3"></div>
                            <input type="file" class="form-control" id="edit_before_file" name="before_file">
                        </div>
                        <div class="mb-3">
                            <label for="before_description" class="form-label">Description</label>
                            <textarea class="form-control" id="before_description" name="before_description" cols="40" rows="5"></textarea>
                            <span class="text-danger" id="edit_before_description"></span>
                        </div>
                    </div>

                    <div class="mb-3">
                        <h3 class="text-center">During</h3>
                        <div class="mb-3">
                            <label for="during_headings" class="form-label">Headings</label>
                            <input type="text" class="form-control" id="during_headings" name="during_headings" placeholder="Headings for During Guidelines">
                            <span class="text-danger" id="edit_during_headings"></span>
                        </div>
                        <div class="mb-3">
                            <label for="during_file" class="form-label">File</label>
                            <div id="editDuringVideoPreview" class="mb-3"></div>
                            <input type="file" class="form-control" id="edit_during_file" name="during_file">
                        </div>
                        <div class="mb-3">
                            <label for="during_description" class="form-label">Description</label>
                            <textarea class="form-control" id="during_description" name="during_description" cols="40" rows="5"></textarea>
                            <span class="text-danger" id="edit_during_description"></span>
                        </div>
                    </div>

                    <div class="mb-3">
                        <h3 class="text-center">After</h3>
                        <div class="mb-3">
                            <label for="after_headings" class="form-label">Headings</label>
                            <input type="text" class="form-control" id="after_headings" name="after_headings" placeholder="Headings for After Guidelines">
                            <span class="text-danger" id="edit_after_headings"></span>
                        </div>
                        <div class="mb-3">
                            <label for="after_file" class="form-label">File</label>
                            <div id="editAfterVideoPreview" class="mb-3"></div>
                            <input type="file" class="form-control" id="edit_after_file" name="after_file">
                        </div>
                        <div class="mb-3">
                            <label for="after_description" class="form-label">Description</label>
                            <textarea class="form-control" id="after_description" name="after_description" cols="40" rows="5"></textarea>
                            <span class="text-danger" id="edit_after_description"></span>
                        </div>
                    </div>

                    <button type="button" id="updateGuidelinesBtn" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade static-modal" id="viewGuidelinesModal" tabindex="-1" aria-labelledby="viewGuidelinesModal" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">View Guidelines</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            {{-- <center> --}}
                <div class="row mb-3">
                    <div class="col-lg-6 mx-auto">
                        <div class="mb-3">
                            <label class="fw-bold">Guidelines title:</label>
                            <span id="guidelines_title"></span>
                        </div>
                        <div class=" mb-3">
                            <label class="fw-bold">Thumbnail:</label>
                            <div id="thumbnail"></div>
                        </div>
                        <div class="mb-3">
                            <label class="fw-bold">Disaster type:</label>
                            <span id="disaster_type"></span> 
                        </div>
                    </div> 
                </div>
                <div class="row mb-3 border rounded p-3">
                    <div class="col-lg-6 mx-auto">
                        <label class="fw-bold fs-3">BEFORE</label>
                        <div class="mb-3">
                            <label class="fw-bold">Headings:</label>
                            <span id="before_headings"></span>
                        </div>
                        <div class="mb-3">
                            <label class="fw-bold">File:</label>
                            <div id="before_file"></div>
                        </div>
                        <div class="mb-3">
                            <label class="fw-bold">Description:</label>
                            <div class="text-start" style="white-space: pre-wrap;">
                                <p id="before_description"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" row mb-3 border rounded p-3">
                    <div class="col-lg-6 mx-auto">
                        <label class="fw-bold fs-3">DURING</label>
                        <div class="mb-3">
                            <label class="fw-bold">Headings:</label>
                            <span id="during_headings"></span>
                        </div>
                        <div class="mb-3">
                            <label class="fw-bold">File:</label>
                            <div id="during_file"></div>
                        </div>
                        <div class="mb-3">
                            <label class="fw-bold">Description:</label>
                            <div class="text-start" style="white-space: pre-wrap;">
                                <p id="during_description"></p>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="row mb-3 border rounded p-3">
                    <div class="col-md-6 mx-auto">
                        <label class="fw-bold fs-3">AFTER</label>
                        <div class="mb-3">
                            <label class="fw-bold">Headings:</label>
                            <span id="after_headings"></span>
                        </div>
                        <div class="mb-3">
                            <label class="fw-bold">File:</label>
                            <div id="after_file"></div>
                        </div>
                        <div class="mb-3">
                            <label class="fw-bold">Description:</label>
                            <div class="text-start" style="white-space: pre-wrap;">
                                <p id="after_description"> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {{-- </center> --}}
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

        $('#addGuidelinesModal').on('hidden.bs.modal', function() {
            resetForm('#addGuidelinesForm');
            clearPreviews();
        });

        $('#editGuidelinesModal').on('hidden.bs.modal', function() {
            resetForm('#editGuidelinesForm');
            editClearPreviews();
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#addGuidelinesForm').submit(function(e) {
            e.preventDefault();

            var formData = new FormData($(this)[0]);

            $.ajax({
                type: 'POST',
                url: '{{ route("guidelines.store") }}',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    toastr.success('Guidelines added successfully');
                    $('#addGuidelinesModal').modal('hide');
                    var guidelinesTable = $('#guidelines-table').dataTable();
                    guidelinesTable.fnDraw(false);
                },
                error: function(error) {
                    var errors = error.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        $('#' + key).next('.text-danger').text(value[0]);
                    });
                }
            });
        });

        $('#updateGuidelinesBtn').on('click', function() {
            var guidelinesId = $("#editGuidelinesModal #guidelines_id").val();
            var updateFormData = new FormData($("#editGuidelinesForm")[0]);

            $.ajax({
                type: 'POST',
                url: "{{ url('admin/guidelines') }}/" + guidelinesId,
                data: updateFormData,
                contentType: false,
                processData: false,
                success: function(response) {
                    toastr.success('Guidelines updated successfully');
                    $('#editGuidelinesModal').modal('hide');
                    var guidelinesTable = $('#guidelines-table').dataTable();
                    guidelinesTable.fnDraw(false);
                },
                error: function(error) {
                    var errors = error.responseJSON.errors;
                    console.log("ERRORS", errors);

                    $.each(errors, function(key, value) {
                        $('#' + "edit_" + key).text(value[0]);
                    });
                }
            });
        });

        $('#thumbnail, #edit_thumbnail, #before_file, #edit_before_file, #during_file, #edit_during_file, #after_file, #edit_after_file').change(function() {
            displayDynamicPreview(this);
        });
    });


    function displayDynamicPreview(input) {
        var previewElement;
        switch (input.id) {
            case 'thumbnail':
                previewElement = '#thumbnailPreview';
                break;
            case 'edit_thumbnail':
                previewElement = '#editThumbnailPreview';
                break;
            case 'before_file':
                previewElement = '#beforeVideoPreview';
                break;
            case 'edit_before_file':
                previewElement = '#editBeforeVideoPreview';
                break;
            case 'during_file':
                previewElement = '#duringVideoPreview';
                break;
            case 'edit_during_file':
                previewElement = '#editDuringVideoPreview';
                break;
            case 'after_file':
                previewElement = '#afterVideoPreview';
                break;
            case 'edit_after_file':
                previewElement = '#editAfterVideoPreview';
                break;
            default:
                break;
        }

        clearPreview(previewElement);

        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var fileType = input.files[0].type;

                if (fileType.startsWith('image/')) {
                    $(previewElement).html('<img src="' + e.target.result + '" class="img-thumbnail" alt="Image Preview">');
                } else if (fileType.startsWith('video/')) {
                    $(previewElement).html('<video controls width="200" ><source src="' + e.target.result + '" type="' + fileType + '"></video>');
                } else {
                    $(previewElement).html('<p class="text-danger">Unsupported file type</p>');
                }
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function clearPreviews() {
        clearPreview('#thumbnailPreview');
        clearPreview('#beforeVideoPreview');
        clearPreview('#duringVideoPreview');
        clearPreview('#afterVideoPreview');
    }

    function editClearPreviews() {
        clearPreview('#editThumbnailPreview');
        clearPreview('#editBeforeVideoPreview');
        clearPreview('#editDuringVideoPreview');
        clearPreview('#editAfterVideoPreview');
    }

    function clearPreview(previewElement) {
        $(previewElement).empty();
    }
</script>