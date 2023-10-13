
<form action="" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="modal fade" id="profile_info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="bx bx-x"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>First Name *</label>
                        <input type="text" name="first_name" id="first_name"
                               value="{{ auth()->user()->first_name }}"
                               class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Last Name *</label>
                        <input type="text" id="last_name" name="last_name"
                               value="{{ auth()->user()->last_name }}"
                               class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Email *</label>
                        <input type="text" name="email" class="form-control"
                               value="{{  auth()->user()->email }}">
                    </div>
                    @if(auth()->user()->user_type != 'admin')
                        <div class="form-group">
                            <label>Phone *</label>
                            <input type="text" name="phone" class="form-control"
                                   value="{{  auth()->user()->phone }}">
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="">Profile Image</label>
                        <div class="form-group">
                            <input type="file" class="custom-file-input image_pick file-select" accept="image/*" data-image-for="profile"
                                   name="image" id="customFile"/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>
