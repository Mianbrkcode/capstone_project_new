<div class="modal fade" id="addModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" id="EmployeeForm" name="EmployeeForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
                        <div class="row g-3 ">
                            <div class="col">
                                <label for="" class="form-label">First Name</label>
                                <input type="text" class="form-control" name="" id="">
                            </div>
                            <div class="col">
                                <label for="" class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="" id="">
                            </div>
                            <div class="col">
                                <label for="" class="form-label">Role</label>
                                <select name="" id="" class="form-select">
                                    <option value="">Select Role</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Sector">Sector</option>
                                </select>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col">
                                <label for="" class="form-label">Email</label>
                                <input type="text" class="form-control" name="" id="">
                            </div>
                            <div class="col">
                                <label for="" class="form-label">Password</label>
                                <input type="password" class="form-control" name="" id="">
                            </div>
                            <div class="col">
                                <label for="" class="form-label">User From</label>
                                    <select name="" id="" class="form-select ">
                                        <option value="">Select Barangay</option>
                                        <option value="Cay Pombo">Cay Pombo</option>
                                        <option value="Guyong">Guyong</option>
                                        <option value="Caysio">Caysio</option>
                                    </select>
                            </div>
                        </div>
                    <div class="col-sm-offset-2 col-sm-10 align-items-end"><br/>
                        <button type="submit" class="btn btn-primary" id="btn-save">Save changes</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
  </div>