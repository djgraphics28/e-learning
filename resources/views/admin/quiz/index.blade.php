@extends('admin.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800"><b>Quiz</b></h1>

<div class="form-group">
    <a href="{{ url('/admin/quiz/add') }}" class="btn btn-custom btn-success"><i class="fa fa-plus-square"></i> <b>ADD</b></a>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Created At</th>
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
                url: "{{ url('/admin/quiz/table') }}",
                dataSrc: ""
            },
            columns: [
                { data: 'title' },
                { data: 'created_at' },
                {
                    data: 'id',
                    orderable: false,
                    render: function (data, type, row) {
                        if (row['hasHistory'] == 0) {
                            return '<div class="text-right">'+
                                    '<div class="btn-group">'+
                                        '<a class="btn btn-info btn-sm" href="{{ url('admin/quiz/view/') }}/'+data+'" title="View"><i class="fa fa-eye"></i></a>'+
                                        '<a class="btn btn-danger btn-sm" onclick="remove('+data+') "title="Remove"><i class="fa fa-trash"></i></a>'+
                                        '<a class="btn btn-primary btn-sm" href="{{ url('admin/quiz/update/') }}/'+data+'" title="Update"><i class="fa fa-edit"></i></a>'+
                                    '</div>'+
                                '</div>';
                        }
                        else {
                            return '<div class="text-right">'+
                                    '<div class="btn-group">'+
                                        '<a class="btn btn-secondary btn-sm" href="{{ url('admin/quiz/logs') }}/'+data+'" title="Logs"><i class="fa fa-record-vinyl"></i></a>'+
                                        '<a class="btn btn-info btn-sm" href="{{ url('admin/quiz/view/') }}/'+data+'" title="View"><i class="fa fa-eye"></i></a>'+
                                    '</div>'+
                                '</div>';
                        }
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
                content: 'This quiz will be removed, continue?',
                buttons: {
                    No: function () {

                    },
                    Yes: {
                        btnClass: 'btn-danger',
                        action: function(){
                            $.ajax({
                                url: '{{ url("admin/quiz/remove/") }}/'+id,
                                method: 'post',
                                success: function(result){
                                    if (result  == 'success') {
                                        $.alert({
                                            animation: 'none',
                                            theme: 'light',
                                            title: 'Success!',
                                            content: 'Quiz has been removed.',
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
                                            content: 'Quiz has failed to renove.'
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