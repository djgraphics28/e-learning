@extends('admin.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800"><b>View</b></h1>

<div class="form-group">
    <a href="{{ url('/admin/quiz') }}" class="btn btn-custom btn-outline-info"><i class="fa fa-arrow-circle-left"></i> <b>BACK</b></a>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label>Quiz Title</label>
                    <p style="text-indent: 20px;" class="text-dark">{{ $data['quiz']->title }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            {{-- 1 --}}
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label><b>1.</b> Question</label>
                                    <p style="text-indent: 20px;" class="text-dark">{{ $data['quiz']['1_question'] }}</p>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><b>A.</b> Answer</label>
                                            <p style="text-indent: 20px;" class="text-dark">{{ $data['quiz']['1_answerA'] }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><b>B.</b> Answer</label>
                                            <p style="text-indent: 20px;" class="text-dark">{{ $data['quiz']['1_answerB'] }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><b>C.</b> Answer</label>
                                            <p style="text-indent: 20px;" class="text-dark">{{ $data['quiz']['1_answerC'] }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><b>D.</b> Answer</label>
                                            <p style="text-indent: 20px;" class="text-dark">{{ $data['quiz']['1_answerD'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Correct Answer</label>
                                    <br>
                                    <p style="text-indent: 20px;" class="text-dark">{{ $data['quiz']['1_correctAnswer'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- 2 --}}
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label><b>2.</b> Question</label>
                                    <p style="text-indent: 20px;" class="text-dark">{{ $data['quiz']['2_question'] }}</p>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><b>A.</b> Answer</label>
                                            <p style="text-indent: 20px;" class="text-dark">{{ $data['quiz']['2_answerA'] }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><b>B.</b> Answer</label>
                                            <p style="text-indent: 20px;" class="text-dark">{{ $data['quiz']['2_answerB'] }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><b>C.</b> Answer</label>
                                            <p style="text-indent: 20px;" class="text-dark">{{ $data['quiz']['2_answerC'] }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><b>D.</b> Answer</label>
                                            <p style="text-indent: 20px;" class="text-dark">{{ $data['quiz']['2_answerD'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Correct Answer</label>
                                    <br>
                                    <p style="text-indent: 20px;" class="text-dark">{{ $data['quiz']['2_correctAnswer'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- 3 --}}
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label><b>3.</b> Question</label>
                                    <p style="text-indent: 20px;" class="text-dark">{{ $data['quiz']['3_question'] }}</p>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><b>A.</b> Answer</label>
                                            <p style="text-indent: 20px;" class="text-dark">{{ $data['quiz']['3_answerA'] }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><b>B.</b> Answer</label>
                                            <p style="text-indent: 20px;" class="text-dark">{{ $data['quiz']['3_answerB'] }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><b>C.</b> Answer</label>
                                            <p style="text-indent: 20px;" class="text-dark">{{ $data['quiz']['3_answerC'] }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><b>D.</b> Answer</label>
                                            <p style="text-indent: 20px;" class="text-dark">{{ $data['quiz']['3_answerD'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Correct Answer</label>
                                    <br>
                                    <p style="text-indent: 20px;" class="text-dark">{{ $data['quiz']['3_correctAnswer'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- 4 --}}
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label><b>4.</b> Question</label>
                                    <p style="text-indent: 20px;" class="text-dark">{{ $data['quiz']['4_question'] }}</p>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><b>A.</b> Answer</label>
                                            <p style="text-indent: 20px;" class="text-dark">{{ $data['quiz']['4_answerA'] }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><b>B.</b> Answer</label>
                                            <p style="text-indent: 20px;" class="text-dark">{{ $data['quiz']['4_answerB'] }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><b>C.</b> Answer</label>
                                            <p style="text-indent: 20px;" class="text-dark">{{ $data['quiz']['4_answerC'] }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><b>D.</b> Answer</label>
                                            <p style="text-indent: 20px;" class="text-dark">{{ $data['quiz']['4_answerD'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Correct Answer</label>
                                    <br>
                                    <p style="text-indent: 20px;" class="text-dark">{{ $data['quiz']['4_correctAnswer'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- 5 --}}
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label><b>5.</b> Question</label>
                                    <p style="text-indent: 20px;" class="text-dark">{{ $data['quiz']['5_question'] }}</p>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><b>A.</b> Answer</label>
                                            <p style="text-indent: 20px;" class="text-dark">{{ $data['quiz']['5_answerA'] }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><b>B.</b> Answer</label>
                                            <p style="text-indent: 20px;" class="text-dark">{{ $data['quiz']['5_answerB'] }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><b>C.</b> Answer</label>
                                            <p style="text-indent: 20px;" class="text-dark">{{ $data['quiz']['5_answerC'] }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><b>D.</b> Answer</label>
                                            <p style="text-indent: 20px;" class="text-dark">{{ $data['quiz']['5_answerD'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Correct Answer</label>
                                    <br>
                                    <p style="text-indent: 20px;" class="text-dark">{{ $data['quiz']['5_correctAnswer'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection