@extends('admin.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800"><b>Add</b></h1>

<div class="form-group">
    <a href="{{ url('/admin/teacher') }}" class="btn btn-custom btn-outline-success"><i class="fa fa-arrow-circle-left"></i> <b>BACK</b></a>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="#"  id="addForm">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <h4>Profile</h4>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>First Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="first_name" required>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>Middle Name</label>
                        <input type="text" class="form-control" name="middle_name">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>Last Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="last_name" required>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label>Sex <span class="text-danger">*</span></label>
                        <select name="sex" class="form-control" required>
                            <option value="" selected disabled></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label>Date of Birth <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="date_birth" required>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="form-group">
                        <label>Address <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="address" required>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label>Nationality <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nationality" required>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label>Civil Status <span class="text-danger">*</span></label>
                        <select name="civil_status" class="form-control" required>
                            <option value="" selected disabled></option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Separated">Separated</option>
                            <option value="Widowed">Widowed</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label>Contact # <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="contact_no" required>
                    </div>
                </div>
                <div class="col-lg-12 mt-3">
                    <div class="form-group">
                        <h4>User Credential</h4>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>E-mail Address <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <hr>
                    <div class="form-group">
                        <button type="submit" class="btn btn-custom btn-success"><i class="fa fa-save"></i> <b>SAVE</b></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('#addForm').on('submit', function(e) {
            e.preventDefault();

            var uf = $('#addForm');
            var fd = new FormData(uf[0]);

            $.confirm({
                animation: 'none',
                theme: 'light', 
                title: 'Add',
                content: 'This teacher will be added, continue?',
                buttons: {
                    No: function () {

                    },
                    Yes: {
                        btnClass: 'btn-success',
                        action: function(){
                            $.ajax({
                                url: '{{ url("admin/teacher/add/save") }}',
                                method: 'post',
                                data: fd,
                                processData:false,
                                contentType: false,
                                success: function(result){
                                    if (result  == 'success') {
                                        $.alert({
                                            animation: 'none',
                                            theme: 'light',
                                            title: 'Success!',
                                            content: 'Teacher has been added.',
                                            buttons: {
                                                OK: function () {
                                                    window.location.href = "{{ url('admin/teacher') }}";
                                                },
                                            }
                                        });
                                    }
                                    else if (result  == 'email_error') {
                                        $.alert({
                                            animation: 'none',
                                            theme: 'light',
                                            title: 'Failed!',
                                            content: 'The E-mail address has already been used. Try something else.',
                                            buttons: {
                                                OK: function () {
                                                    $('[name=email]').focus();
                                                },
                                            }
                                        });
                                    }
                                    else {
                                        $.alert({
                                            animation: 'none',
                                            theme: 'light',
                                            title: 'Failed!',
                                            content: 'Teacher has failed to add.'
                                        });
                                        console.log(result);
                                    }
                                }
                            });
                        }
                    },
                }
            });
        });
    });
</script>
@endsection