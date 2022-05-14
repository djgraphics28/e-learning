@extends('admin.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800"><b>Student</b></h1>

@if (Auth::user()->user_type != 1)
    <div class="text-center text-danger mt-5">
        <h4>Restricted! Only the administrator can access this point.</h4>
    </div>
@else
    <div class="form-group">
        <a href="{{ url('/admin/student/add') }}" class="btn btn-custom btn-success"><i class="fa fa-plus-square"></i> <b>ADD</b></a>
        <a href="{{ url('/admin/student/bin') }}" class="btn btn-custom btn-secondary float-right"><i class="fa fa-trash"></i> <b>BIN</b></a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Sex</th>
                            <th>Date of Birth</th>
                            <th>Address</th>
                            <th>Nationality</th>
                            <th>Active Status</th>
                            <th>Contact #</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endif
@endsection

@section('js')
<script>
    $(document).ready(function() {
        callDT();
    });

    function callDT() {
        $('#dataTable').DataTable({
            bDestroy: true,
            ajax: {
                url: "{{ url('/admin/student/table') }}",
                dataSrc: ""
            },
            columns: [
                { data: 'first_name' },
                { data: 'sex' },
                { data: 'date_birth' },
                { data: 'address' },
                { data: 'nationality' },
                {
                    data: 'civil_status',
                    render: function (data, type, row) {
                        if (data == 'Active'){
                            return '<span class="badge badge-success">'+data+'</span>';
                        }else{
                            return '<span class="badge badge-danger">'+data+'</span>';
                        }
                    }

                },
                { data: 'contact_no' },
                {
                    data: 'id',
                    orderable: false,
                    render: function (data, type, row) {
                        return '<div class="text-right">'+
                                    '<div class="btn-group">'+
                                        '<a class="btn btn-danger btn-sm" onclick="remove('+data+') "title="Remove"><i class="fa fa-trash"></i></a>'+
                                        '<a class="btn btn-primary btn-sm" href="{{ url('admin/student/update/') }}/'+data+'" title="Update"><i class="fa fa-edit"></i></a>'+
                                    '</div>'+
                                '</div>';
                    }
                }
            ],
        });
    }

    function remove(id) {
        $.confirm({
                animation: 'none',
                theme: 'light',
                title: 'Remove',
                content: 'This student account will be removed, continue?',
                buttons: {
                    No: function () {

                    },
                    Yes: {
                        btnClass: 'btn-danger',
                        action: function(){
                            $.ajax({
                                url: '{{ url("admin/student/remove/") }}/'+id,
                                method: 'post',
                                success: function(result){
                                    if (result  == 'success') {
                                        $.alert({
                                            animation: 'none',
                                            theme: 'light',
                                            title: 'Success!',
                                            content: 'Student account has been removed.',
                                            buttons: {
                                                OK: function () {
                                                    callDT();
                                                },
                                            }
                                        });
                                    }
                                    else {
                                        $.alert({
                                            animation: 'none',
                                            theme: 'light',
                                            title: 'Failed!',
                                            content: 'Student account has failed to remove.'
                                        });
                                        console.log(result);
                                    }
                                }
                            });
                        }
                    },
                }
            });
    }
</script>
@endsection
