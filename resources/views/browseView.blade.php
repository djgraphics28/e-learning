@extends('layouts.app')

@section('content')
<section id="browse">
    <div class="container mt-10 mb-5" data-aos="fade-up">

        <header class="section-header mb-5">
            <h3 class="section-title">Browse</h3>
        </header>
        <div class="text-center mb-5">
            <a href="{{ url('browse') }}"><b>Return</b></a>
        </div>

        <div class="row browse-cols">
            <div class="col-md-12" data-aos="fade-up" data-aos-delay="300">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <div class="browse-col">
                            <div class="img">
                                <img src="{{ asset('storage/browse').'/'.$data->image }}" alt="img" class="imgBrowse img-fluid">
                            </div>
                            <h2 class="title"><a href="#">{{ $data->title }}</a></h2>
                            <div class="text-center mb-3">
                                <small>Country: {{ $data->country }}</small>
                                <br>
                                <small>Posted By: {{ App\User::find($data->created_by)->name }}</small>
                                <br>
                                <small>Date Posted: {{ date('m/d/Y', strtotime($data->created_at)) }}</small>
                            </div>
                            <p class="context">{!! nl2br($data->context) !!}</p>
                            <div class="row mx-auto">
                                @php
                                    $images = [];
                                    if ($data->other_images != null || $data->other_images != '') {
                                        $str = str_replace('[', '', $data->other_images);
                                        $str = str_replace(']', '', $str);
                                        $str = str_replace('"', '', $str);

                                        $images = explode(',', $str);
                                    }
                                @endphp

                                @if (count($images) > 0)
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label><small>More Image/s</small></label>
                                    </div>
                                </div>
                                @endif
                                @foreach ($images as $item)
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <img src="{{ asset('storage/browse').'/'.$item }}" class="img-thumbnail">
                                    </div>
                                </div>
                                @endforeach

                                <div class="col-lg-12 mb-3" id="youtubeVid">
                                    <input type="text" name="video" value="{{ $data->video }}" hidden>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <a href="{{ url('browse') }}"><b>Return</b></a>
        </div>

    </div>

</section>

@endsection

@section('js')
<script>
    $(document).ready(function() {
        var url_string = $('[name=video]').val();
        var url = new URL(url_string);
        var v = url.searchParams.get("v");

        $('#youtubeVid').html(
            '<div class="form-group">'+
                '<label><small>Youtube Video</small></label>'+
            '</div>'+
            '<div class="embed-responsive embed-responsive-16by9">'+
                '<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/'+v+'" allowfullscreen></iframe>'+
            '</div>'
        );

    })
</script>
@endsection
