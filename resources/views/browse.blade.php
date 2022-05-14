@extends('layouts.app')

@section('content')
<section id="browse">
    <div class="container mt-10 mb-5" data-aos="fade-up">

        <header class="section-header mb-5">
            <h3 class="section-title">Browse</h3>
        </header>

        <div class="row browse-cols">

            @if (App\Browse::count() == 0)
                <div class="col-12 mt-10">
                    <h2 class="text-center">There are no items to browse yet</h2>
                </div>
            @else
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="browse-col" style="padding: 20px">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="search" placeholder="Search Title . . .">
                            <div class="input-group-append">
                                <button id="btnSearch" class="btn btn-outline-secondary" onclick="window.location.href = '{{ url('browse?search=') }}' + $('[name=search]').val();">all</button>
                            </div>
                        </div>
                        <div class="mt-5">
                            <h2 class="text-left">Recently Posted</h2>
                            <ul class="list-group list-group-flush">
                                @foreach ($data['rp'] as $item)
                                    <li class="list-group-item" onclick="window.location.href = '{{ url('browse') . '/' . $item->id  }}'">{{ $item->title }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="mt-5">
                            <h2 class="text-left">Countries</h2>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item" onclick="window.location.href = '{{ url('browse-country/Brunei')  }}'">Brunei</li>
                                <li class="list-group-item" onclick="window.location.href = '{{ url('browse-country/Burma')  }}'">Burma (Myanmar)</li>
                                <li class="list-group-item" onclick="window.location.href = '{{ url('browse-country/Cambodia')  }}'">Cambodia</li>
                                <li class="list-group-item" onclick="window.location.href = '{{ url('browse-country/Indonesia')  }}'">Indonesia</li>
                                <li class="list-group-item" onclick="window.location.href = '{{ url('browse-country/Laos')  }}'">Laos</li>
                                <li class="list-group-item" onclick="window.location.href = '{{ url('browse-country/Malaysia')  }}'">Malaysia</li>
                                <li class="list-group-item" onclick="window.location.href = '{{ url('browse-country/Philippines')  }}'">Philippines</li>
                                <li class="list-group-item" onclick="window.location.href = '{{ url('browse-country/Singapore')  }}'">Singapore</li>
                                <li class="list-group-item" onclick="window.location.href = '{{ url('browse-country/Thailand')  }}'">Thailand</li>
                                <li class="list-group-item" onclick="window.location.href = '{{ url('browse-country/Timor-leste')  }}'">Timor-Leste</li>
                                <li class="list-group-item" onclick="window.location.href = '{{ url('browse-country/Vietnam')  }}'">Vietnam</li>
                            </ul>-country
                        </div>
                    </div>
                </div>

                <div class="col-md-8" data-aos="fade-up" data-aos-delay="300">
                    <div class="row">
                        @if ($data['items']->count() > 0)
                            @foreach ($data['items'] as $item)
                                <div class="col-md-12">
                                    <div class="browse-col" onclick="window.location.href = '{{ url('browse').'/'.$item->id  }}'">
                                        <div class="img">
                                            <img src="{{ asset('storage/browse').'/'.$item->image }}" alt="img" class="imgBrowse img-fluid">
                                        </div>
                                        <h2 class="title"><a href="#">{{ $item->title }}</a></h2>

                                        <div class="text-center mb-3">
                                            <small>Country: {{ $item->country }}</small>
                                            <br>
                                            <small>Posted By: {{ App\User::find($item->created_by)->name }}</small>
                                            <br>
                                            <small>Date Posted: {{ date('m/d/Y', strtotime($item->created_at)) }}</small>
                                        </div>
                                        <p class="context">{{  Str::limit($item->context, 500) }}</p>
                                    </div>
                                </div>
                            @endforeach
                            {{ $data['items']->onEachSide(5)->links() }}
                        @else
                            <div class="col-12 mt-10">
                                <h2 class="text-center">No item found</h2>
                            </div>
                        @endif

                    </div>
                </div>
            @endif
        </div>

    </div>

</section>

@endsection

@section('js')
<script>
    $('[name=search]').on('keyup', function() {
        if ($(this).val().length > 0)
            $('#btnSearch').html('go');
        else
            $('#btnSearch').html('all');
    });
</script>
@endsection
