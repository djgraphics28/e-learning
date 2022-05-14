@extends('admin.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800"><b>Add</b></h1>

<div class="form-group">
    <a href="{{ url('/admin/quiz') }}" class="btn btn-custom btn-outline-success"><i class="fa fa-arrow-circle-left"></i> <b>BACK</b></a>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="#" enctype="multipart/form-data" id="addForm">
            @if (Auth::user()->user_type == 1)
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Posted By</label>
                            <select name="posted_by" class="form-control" required>
                                @if ($data->count() == 0)
                                    <option value="" selected disabled></option>
                                    <option value="" disabled><i>Please create a teacher's account first.</i></option>
                                @else
                                    <option value="" selected disabled></option>
                                @endif
                                @foreach ($data as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Quiz Title</label>
                        <textarea class="form-control" name="title" rows="2" required></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                {{-- 1 --}}
                <div class="col-lg-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label><b>1.</b> Question</label>
                                        <input type="text" class="form-control" name="1_question" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label><b>A.</b> Answer</label>
                                                <input type="text" class="form-control" name="1_answerA" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label><b>B.</b> Answer</label>
                                                <input type="text" class="form-control" name="1_answerB" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label><b>C.</b> Answer</label>
                                                <input type="text" class="form-control" name="1_answerC" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label><b>D.</b> Answer</label>
                                                <input type="text" class="form-control" name="1_answerD" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Correct Answer</label>
                                        <br>
                                        A. <input type="radio" class="mr-5" name="1_correctAnswer" value="A" checked>
                                        B. <input type="radio" class="mr-5" name="1_correctAnswer" value="B">
                                        C. <input type="radio" class="mr-5" name="1_correctAnswer" value="C">
                                        D. <input type="radio" class="mr-5" name="1_correctAnswer" value="D">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- 2 --}}
                <div class="col-lg-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label><b>2.</b> Question</label>
                                        <input type="text" class="form-control" name="2_question" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label><b>A.</b> Answer</label>
                                                <input type="text" class="form-control" name="2_answerA" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label><b>B.</b> Answer</label>
                                                <input type="text" class="form-control" name="2_answerB" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label><b>C.</b> Answer</label>
                                                <input type="text" class="form-control" name="2_answerC" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label><b>D.</b> Answer</label>
                                                <input type="text" class="form-control" name="2_answerD" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Correct Answer</label>
                                        <br>
                                        A. <input type="radio" class="mr-5" name="2_correctAnswer" value="A" checked>
                                        B. <input type="radio" class="mr-5" name="2_correctAnswer" value="B">
                                        C. <input type="radio" class="mr-5" name="2_correctAnswer" value="C">
                                        D. <input type="radio" class="mr-5" name="2_correctAnswer" value="D">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- 3 --}}
                <div class="col-lg-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label><b>3.</b> Question</label>
                                        <input type="text" class="form-control" name="3_question" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label><b>A.</b> Answer</label>
                                                <input type="text" class="form-control" name="3_answerA" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label><b>B.</b> Answer</label>
                                                <input type="text" class="form-control" name="3_answerB" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label><b>C.</b> Answer</label>
                                                <input type="text" class="form-control" name="3_answerC" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label><b>D.</b> Answer</label>
                                                <input type="text" class="form-control" name="3_answerD" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Correct Answer</label>
                                        <br>
                                        A. <input type="radio" class="mr-5" name="3_correctAnswer" value="A" checked>
                                        B. <input type="radio" class="mr-5" name="3_correctAnswer" value="B">
                                        C. <input type="radio" class="mr-5" name="3_correctAnswer" value="C">
                                        D. <input type="radio" class="mr-5" name="3_correctAnswer" value="D">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- 4 --}}
                <div class="col-lg-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label><b>4.</b> Question</label>
                                        <input type="text" class="form-control" name="4_question" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label><b>A.</b> Answer</label>
                                                <input type="text" class="form-control" name="4_answerA" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label><b>B.</b> Answer</label>
                                                <input type="text" class="form-control" name="4_answerB" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label><b>C.</b> Answer</label>
                                                <input type="text" class="form-control" name="4_answerC" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label><b>D.</b> Answer</label>
                                                <input type="text" class="form-control" name="4_answerD" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Correct Answer</label>
                                        <br>
                                        A. <input type="radio" class="mr-5" name="4_correctAnswer" value="A" checked>
                                        B. <input type="radio" class="mr-5" name="4_correctAnswer" value="B">
                                        C. <input type="radio" class="mr-5" name="4_correctAnswer" value="C">
                                        D. <input type="radio" class="mr-5" name="4_correctAnswer" value="D">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- 5 --}}
                <div class="col-lg-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label><b>5.</b> Question</label>
                                        <input type="text" class="form-control" name="5_question" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label><b>A.</b> Answer</label>
                                                <input type="text" class="form-control" name="5_answerA" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label><b>B.</b> Answer</label>
                                                <input type="text" class="form-control" name="5_answerB" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label><b>C.</b> Answer</label>
                                                <input type="text" class="form-control" name="5_answerC" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label><b>D.</b> Answer</label>
                                                <input type="text" class="form-control" name="5_answerD" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Correct Answer</label>
                                        <br>
                                        A. <input type="radio" class="mr-5" name="5_correctAnswer" value="A" checked>
                                        B. <input type="radio" class="mr-5" name="5_correctAnswer" value="B">
                                        C. <input type="radio" class="mr-5" name="5_correctAnswer" value="C">
                                        D. <input type="radio" class="mr-5" name="5_correctAnswer" value="D">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
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
                content: 'This quiz will be added, continue?',
                buttons: {
                    No: function () {

                    },
                    Yes: {
                        btnClass: 'btn-success',
                        action: function(){
                            $.ajax({
                                url: '{{ url("admin/quiz/add/save") }}',
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
                                            content: 'Quiz has been added.',
                                            buttons: {
                                                OK: function () {
                                                    window.location.href = "{{ url('admin/quiz') }}";
                                                },
                                            }
                                        });
                                    }
                                    else {
                                        $.alert({
                                            animation: 'none',
                                            theme: 'light',
                                            title: 'Failed!',
                                            content: 'Quiz has failed to add.'
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