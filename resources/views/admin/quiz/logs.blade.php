@extends('admin.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800"><b>Logs</b></h1>

<div class="form-group">
    <a href="{{ url('/admin/quiz') }}" class="btn btn-custom btn-outline-secondary"><i class="fa fa-arrow-circle-left"></i> <b>BACK</b></a>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Student</th>
                        <th>Score</th>
                        <th>Date & Time Taken</th>
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
                url: "{{ url('/admin/quiz/logs/table') }}/" + "{{ $id }}",
                dataSrc: ""
            },
            columns: [
                { data: 'name' },
                { data: 'score' },
                { data: 'created_at' },
            ],
        });
    }
</script>
@endsection