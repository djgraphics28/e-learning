@extends('layouts.app')

@section('content')
<section id="quiz">
    <div class="container mt-10 mb-5" data-aos="fade-up">

        <header class="section-header mb-5">
            <h3 class="section-title">Quiz</h3>
        </header>

        @if (App\Quiz::count() == 0)
            <div class="row browse-cols">
                <div class="col-12 mt-10">
                    <h2 class="text-center">There are no quizzes yet</h2>
                </div>
            </div>
        @else
            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class=" col-lg-12">
                    <ul id="quiz-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-ongoing">Ongoing</li>
                        <li data-filter=".filter-completed">Completed</li>
                    </ul>
                </div>
            </div>

            <div class="row quiz-container" data-aos="fade-up" data-aos-delay="200">
                @foreach ($data as $item)
                    <div class="col-lg-4 col-md-6 quiz-item {{ $item != null ? 'filter-completed' : 'filter-ongoing' }}">
                        <div class="quiz-wrap">
                            <div class="quiz-info">
                                <h4 title="{{ $item->title }}"><a href="{{ $item->score != null ? url('#') : url('quiz/take') . '/' . $item->id }}">{{ strlen($item->title) > 20 ? substr($item->title, 0, 20).'...' : $item->title }}</a></h4>
                                <div class="mt-5 mb-5">
                                    <h1>
                                        {{ $item->score != null ? $item->score . '/5' : '-/-' }}
                                    </h1>
                                </div>
                                <p>Posted By: <b>{{ App\User::find($item->created_by)->name }}</b></p>
                                <p>Date Posted: <b>{{ date('m/d/Y', strtotime($item->created_at)) }}</b></p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        @endif

    </div>
</section>

@endsection
