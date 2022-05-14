@extends('admin.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800"><b>Browse</b></h1>

<div class="form-group">
    <a href="{{ url('/admin/browse/add') }}" class="btn btn-custom btn-success"><i class="fa fa-plus-square"></i> <b>ADD</b></a>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Country</th>
                        <th>Title</th>
                        <th>Context</th>
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
                url: "{{ url('/admin/browse/table') }}",
                dataSrc: ""
            },
            columns: [
                {
                    data: 'image',
                    orderable: false,
                    render: function (data, type, row) {
                        return '<img class="img-table img-thumbnail" src="{{ asset('storage/browse') }}/'+data+'"></img>';
                    }
                },
                { data: 'country' },
                { data: 'title' },
                {
                    data: 'context',
                    render: function(data, type, row) {

                        // return data.replace(/\n/g,"<br />");
                        // return data.substr( 0, 500 );
                        return data.length > 500 ?
                            data.substr( 0, 500 ) +' … ' :
                            data;
                    }
                },
                { data: 'created_at' },
                {
                    data: 'id',
                    orderable: false,
                    render: function (data, type, row) {
                        return '<div class="text-right">'+
                                    '<div class="btn-group">'+
                                        '<a class="btn btn-danger btn-sm" onclick="remove('+data+') "title="Remove"><i class="fa fa-trash"></i></a>'+
                                        '<a class="btn btn-primary btn-sm" href="{{ url('admin/browse/update/') }}/'+data+'" title="Update"><i class="fa fa-edit"></i></a>'+
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
                content: 'This item will be removed, continue?',
                buttons: {
                    No: function () {

                    },
                    Yes: {
                        btnClass: 'btn-danger',
                        action: function(){
                            $.ajax({
                                url: '{{ url("admin/browse/remove/") }}/'+id,
                                method: 'post',
                                success: function(result){
                                    if (result  == 'success') {
                                        $.alert({
                                            animation: 'none',
                                            theme: 'light',
                                            title: 'Success!',
                                            content: 'Item has been removed.',
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
                                            content: 'Item has failed to renove.'
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
