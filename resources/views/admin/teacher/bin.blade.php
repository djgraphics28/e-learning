@extends('admin.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800"><b>Bin</b></h1>

<div class="form-group">
    <a href="{{ url('/admin/teacher') }}" class="btn btn-custom btn-outline-secondary"><i class="fa fa-arrow-circle-left"></i> <b>BACK</b></a>
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
                        <th>Civil Status</th>
                        <th>Contact #</th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
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
                url: "{{ url('/admin/teacher/bin/table') }}",
                dataSrc: ""
            },
            columns: [
                { data: 'first_name' },
                { data: 'sex' },
                { data: 'date_birth' },
                { data: 'address' },
                { data: 'nationality' },
                { data: 'civil_status' },
                { data: 'contact_no' },
                {
                    data: 'id',
                    orderable: false,
                    render: function (data, type, row) {
                        return '<div class="text-right">'+
                                    '<div class="btn-group">'+
                                        '<a class="btn btn-secondary btn-sm" onclick="restore('+data+') "title="Restore"><i class="fa fa-trash-restore"></i></a>'+
                                    '</div>'+
                                '</div>';
                    }
                }
            ],
        });
    }

    function restore(id) {
        $.confirm({
                animation: 'none',
                theme: 'light', 
                title: 'Restore',
                content: 'This teacher account will be restored, continue?',
                buttons: {
                    No: function () {

                    },
                    Yes: {
                        btnClass: 'btn-secondary',
                        action: function(){
                            $.ajax({
                                url: '{{ url("admin/teacher/restore/") }}/'+id,
                                method: 'post',
                                success: function(result){
                                    if (result  == 'success') {
                                        $.alert({
                                            animation: 'none',
                                            theme: 'light',
                                            title: 'Success!',
                                            content: 'Teacher account has been restored.',
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
                                            content: 'Teacher account has failed to restore.'
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