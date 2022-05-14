@extends('layouts.app')

@section('content')
<section id="quiz">
    <div class="container mt-10 mb-5" data-aos="fade-up">

        <header class="section-header mb-5">
            <h3 class="section-title">Quiz</h3>
        </header>
        <div class="text-center mb-5">
            <a href="{{ url('quiz') }}"><b>Return</b></a>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <h4 class="card-title">Quiz #1</h4>
                                </div>
                            </div>
                        </div>
                        <form action="#" id="saveForm">
                            <input type="text" name="id" value="{{ $data->id }}" hidden>
                            {{-- 1 --}}
                            <div class="row mb-5">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label><b>1.</b> {{ $data['1_question'] }}</label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-1">
                                                        <input type="radio" class="mr-1" name="1_answer" value="A" required> <b>A.</b>
                                                    </div>
                                                    <div class="col-11">
                                                        {{ $data['1_answerA'] }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-1">
                                                        <input type="radio" class="mr-1" name="1_answer" value="B"> <b>B.</b>
                                                    </div>
                                                    <div class="col-11">
                                                        {{ $data['1_answerB'] }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-1">
                                                        <input type="radio" class="mr-1" name="1_answer" value="C"> <b>C.</b>
                                                    </div>
                                                    <div class="col-11">
                                                        {{ $data['1_answerC'] }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-1">
                                                        <input type="radio" class="mr-1" name="1_answer" value="D"> <b>D.</b>
                                                    </div>
                                                    <div class="col-11">
                                                        {{ $data['1_answerD'] }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div id="status1">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- 2 --}}
                            <div class="row mb-5">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label><b>2.</b> {{ $data['2_question'] }}</label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-1">
                                                        <input type="radio" class="mr-1" name="2_answer" value="A" required> <b>A.</b>
                                                    </div>
                                                    <div class="col-11">
                                                        {{ $data['2_answerA'] }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-1">
                                                        <input type="radio" class="mr-1" name="2_answer" value="B"> <b>B.</b>
                                                    </div>
                                                    <div class="col-11">
                                                        {{ $data['2_answerB'] }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-1">
                                                        <input type="radio" class="mr-1" name="2_answer" value="C"> <b>C.</b>
                                                    </div>
                                                    <div class="col-11">
                                                        {{ $data['2_answerC'] }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-1">
                                                        <input type="radio" class="mr-1" name="2_answer" value="D"> <b>D.</b>
                                                    </div>
                                                    <div class="col-11">
                                                        {{ $data['2_answerD'] }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div id="status2">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- 3 --}}
                            <div class="row mb-5">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label><b>3.</b> {{ $data['3_question'] }}</label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-1">
                                                        <input type="radio" class="mr-1" name="3_answer" value="A" required> <b>A.</b>
                                                    </div>
                                                    <div class="col-11">
                                                        {{ $data['3_answerA'] }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-1">
                                                        <input type="radio" class="mr-1" name="3_answer" value="B"> <b>B.</b>
                                                    </div>
                                                    <div class="col-11">
                                                        {{ $data['3_answerB'] }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-1">
                                                        <input type="radio" class="mr-1" name="3_answer" value="C"> <b>C.</b>
                                                    </div>
                                                    <div class="col-11">
                                                        {{ $data['3_answerC'] }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-1">
                                                        <input type="radio" class="mr-1" name="3_answer" value="D"> <b>D.</b>
                                                    </div>
                                                    <div class="col-11">
                                                        {{ $data['3_answerD'] }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div id="status3">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- 4 --}}
                            <div class="row mb-5">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label><b>4.</b> {{ $data['4_question'] }}</label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-1">
                                                        <input type="radio" class="mr-1" name="4_answer" value="A" required> <b>A.</b>
                                                    </div>
                                                    <div class="col-11">
                                                        {{ $data['4_answerA'] }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-1">
                                                        <input type="radio" class="mr-1" name="4_answer" value="B"> <b>B.</b>
                                                    </div>
                                                    <div class="col-11">
                                                        {{ $data['4_answerB'] }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-1">
                                                        <input type="radio" class="mr-1" name="4_answer" value="C"> <b>C.</b>
                                                    </div>
                                                    <div class="col-11">
                                                        {{ $data['4_answerC'] }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-1">
                                                        <input type="radio" class="mr-1" name="4_answer" value="D"> <b>D.</b>
                                                    </div>
                                                    <div class="col-11">
                                                        {{ $data['4_answerD'] }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div id="status4">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- 5 --}}
                            <div class="row mb-5">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label><b>5.</b> {{ $data['5_question'] }}</label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-1">
                                                        <input type="radio" class="mr-1" name="5_answer" value="A" required> <b>A.</b>
                                                    </div>
                                                    <div class="col-11">
                                                        {{ $data['5_answerA'] }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-1">
                                                        <input type="radio" class="mr-1" name="5_answer" value="B"> <b>B.</b>
                                                    </div>
                                                    <div class="col-11">
                                                        {{ $data['5_answerB'] }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-1">
                                                        <input type="radio" class="mr-1" name="5_answer" value="C"> <b>C.</b>
                                                    </div>
                                                    <div class="col-11">
                                                        {{ $data['5_answerC'] }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-1">
                                                        <input type="radio" class="mr-1" name="5_answer" value="D"> <b>D.</b>
                                                    </div>
                                                    <div class="col-11">
                                                        {{ $data['5_answerD'] }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div id="status5">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- end --}}

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-block btn-success" value="Submit">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <a href="{{ url('quiz') }}"><b>Return</b></a>
        </div>


    </div>
</section>

@endsection

@section('js')
<script>
    $(document).ready(function(){
        $('#saveForm').on('submit', function(e) {
            e.preventDefault();

            var uf = $('#saveForm');
            var fd = new FormData(uf[0]);

            $.confirm({
                animation: 'none',
                theme: 'light', 
                title: 'Submit',
                content: 'Your quiz will be submitted, continue?',
                buttons: {
                    No: function () {

                    },
                    Yes: {
                        btnClass: 'btn-success',
                        action: function(){
                            $.ajax({
                                url: '{{ url("quiz/take/submit") }}',
                                method: 'post',
                                data: fd,
                                processData:false,
                                contentType: false,
                                success: function(result){
                                    if (result.status  == 'success') {
                                        $.alert({
                                            animation: 'none',
                                            theme: 'light',
                                            title: 'Submitted!',
                                            content: 'Quiz has been submitted. Your score is ' + result.score + '/5.',
                                            buttons: {
                                                OK: function () {
                                                    //
                                                },
                                            }
                                        });
                                        $('#status1').html(result.status1);
                                        $('#status2').html(result.status2);
                                        $('#status3').html(result.status3);
                                        $('#status4').html(result.status4);
                                        $('#status5').html(result.status5);
                                        $('input').prop('disabled', true);
                                    }
                                    else {
                                        $.alert({
                                            animation: 'none',
                                            theme: 'light',
                                            title: 'Failed!',
                                            content: 'Quiz has failed to submit.'
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
