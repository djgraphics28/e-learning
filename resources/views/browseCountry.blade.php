@extends('layouts.app')

@section('content')
<section id="browse">
    <div class="container mt-10 mb-5" data-aos="fade-up">

        <header class="section-header mb-5">
            <h3 class="section-title">{{ $data['country'] }}</h3>
        </header>
        <div class="text-center mb-5">
            <a href="{{ url('browse') }}"><b>Return</b></a>
        </div>

        <div class="row browse-cols">
            @if (count($data['list']) == 0)
                <div class="col-12 mt-5">
                    <h2 class="text-center">There are no items to browse yet</h2>
                </div>
            @else
                <div class="col-md-8 mx-auto" data-aos="fade-up" data-aos-delay="300">
                    <div class="row">
                        @if ($data['list']->count() > 0)
                            @foreach ($data['list'] as $item)
                                <div class="col-md-12">
                                    <div class="browse-col" onclick="window.location.href = '{{ url('browse').'/'.$item->id  }}'">
                                        <div class="img">
                                            <img src="{{ asset('storage/browse').'/'.$item->image }}" alt="img" class="imgBrowse img-fluid">
                                        </div>
                                        <h2 class="title"><a href="#">{{ $item->title }}</a></h2>
                                        {{-- <div class="text-center mb-3">
                                            <small>Country: {{ $item->country }}</small>
                                            <br>
                                            <small>Posted By: {{ App\User::find($item->created_by)->name }}</small>
                                            <br>
                                            <small>Date Posted: {{ date('m/d/Y', strtotime($item->created_at)) }}</small>
                                        </div> --}}
                                        <p class="context">{{ $item->context }}</p>
                                        {{-- @if ( $item->video != null)
                                            <div class="col-lg-12 mb-3" id="youtubeVid" data-id="{{ $item->id }}">
                                                <input type="text" name="video" value="{{ $item->video }}" hidden>
                                            </div>
                                        @endif --}}

                                    </div>
                                </div>
                            @endforeach
                            {{ $data['list']->onEachSide(5)->links() }}
                        @else
                            <div class="col-12 mt-10">
                                <h2 class="text-center">No item found</h2>
                            </div>
                        @endif

                    </div>
                </div>
            @endif
        </div>

        <div class="text-center mt-5">
            <a href="{{ url('browse') }}"><b>Return</b></a>
        </div>

    </div>

</section>

@endsection

@section('js')
    <script>
        //  $(document).ready(function() {
        //     var url_string = $('[name=video]').val();
        //     var url = new URL(url_string);
        //     var v = url.searchParams.get("v");

        //     var youtubeDiv = document.getElementById('youtubeVid');
        //     var data_id = youtubeDiv.getAttribute('data-id')
        //     $(data_id).html(
        //         '<div class="form-group">'+
        //             '<label><small>Youtube Video</small></label>'+
        //         '</div>'+
        //         '<div class="embed-responsive embed-responsive-16by9">'+
        //             '<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/'+v+'" allowfullscreen></iframe>'+
        //         '</div>'
        //     );

        // })
    </script>
@endsection
