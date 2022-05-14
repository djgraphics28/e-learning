@extends('admin.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800"><b>Update</b></h1>

<div class="form-group">
    <a href="{{ url('/admin/browse') }}" class="btn btn-custom btn-outline-primary"><i class="fa fa-arrow-circle-left"></i> <b>BACK</b></a>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="#" enctype="multipart/form-data" id="updateForm">
            <input type="text" name="id" value="{{ $data['browse']->id }}" hidden>
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Image</label>
                                <img id="browseImg" src="{{ asset('storage/browse').'/'.$data['browse']->image }}" alt="img" class="img-cursor img-thumbnail">
                                <input type="file" name="image" accept="image/*" hidden>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Other Images</label>
                                <br>
                                <input type="file" name="other_images[]" id="other_images" accept="image/*" multiple>
                            </div>
                            <div class="row" id="otherImages">
                                @php
                                    $images = [];
                                    if ($data['browse']->other_images != null || $data['browse']->other_images != '') {
                                        $str = str_replace('[', '', $data['browse']->other_images);
                                        $str = str_replace(']', '', $str);
                                        $str = str_replace('"', '', $str);

                                        $images = explode(',', $str);
                                    }
                                @endphp

                                @foreach ($images as $item)
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <img src="{{ asset('storage/browse').'/'.$item }}" class="img-thumbnail">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Youtube Link (Video)</label>
                                <input type="text" class="form-control" name="video" value="{{ $data['browse']->video }}">
                            </div>
                            <div id="youtubeVid">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        @if (Auth::user()->user_type == 1)
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Posted By <span class="text-danger">*</span></label>
                                    <select name="posted_by" class="form-control" required>
                                        @foreach ($data['user'] as $item)
                                            <option value="{{ $item->id }}" {{ $data['browse']->created_by == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endif
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Country <span class="text-danger">*</span></label>
                                <select class="form-control" name="country" required>
                                    <option value="">Choose</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->nicename }}" {{ $data['browse']->country == $country->nicename ? 'selected' : '' }} >{{ $country->nicename }}</option>
                                    @endforeach
                                </select>
                                {{-- <select class="form-control" name="country" required>
                                    <option value="Brunei" {{ $data['browse']->country == 'Brunei' ? 'selected' : '' }}>Brunei</option>
                                    <option value="Burma (Myanmar)" {{ $data['browse']->country == 'Burma (Myanmar)' ? 'selected' : '' }}>Burma (Myanmar)</option>
                                    <option value="Cambodia" {{ $data['browse']->country == 'Cambodia' ? 'selected' : '' }}>Cambodia</option>
                                    <option value="Indonesia" {{ $data['browse']->country == 'Indonesia' ? 'selected' : '' }}>Indonesia</option>
                                    <option value="Laos" {{ $data['browse']->country == 'Laos' ? 'selected' : '' }}>Laos</option>
                                    <option value="Malaysia" {{ $data['browse']->country == 'Malaysia' ? 'selected' : '' }}>Malaysia</option>
                                    <option value="Philippines" {{ $data['browse']->country == 'Philippines' ? 'selected' : '' }}>Philippines</option>
                                    <option value="Singapore" {{ $data['browse']->country == 'Singapore' ? 'selected' : '' }}>Singapore</option>
                                    <option value="Thailand" {{ $data['browse']->country == 'Thailand' ? 'selected' : '' }}>Thailand</option>
                                    <option value="Timor-Leste" {{ $data['browse']->country == 'Timor-Leste' ? 'selected' : '' }}>Timor-Leste</option>
                                    <option value="Vietnam" {{ $data['browse']->country == 'Vietnam' ? 'selected' : '' }}>Vietnam</option>
                                </select> --}}
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="title" value="{{ $data['browse']->title }}" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Context <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="context" rows="10" required>{{ $data['browse']->context }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <hr>
                    <div class="form-group">
                        <button type="submit" class="btn btn-custom btn-primary"><i class="fa fa-save"></i> <b>SAVE</b></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@section('js')
<script>

    function validURL(str) {
        var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
            '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name
            '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
            '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
            '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
            '(\\#[-a-z\\d_]*)?$','i'); // fragment locator
        return !!pattern.test(str);
    }

    $(document).ready(function() {
        var url_string = $('[name=video]').val();

        if (validURL(url_string) == true) {
            let url = new URL(url_string);
            let v = url.searchParams.get("v");

            $('#youtubeVid').html(
                '<div class="embed-responsive embed-responsive-16by9">'+
                    '<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/'+v+'" allowfullscreen></iframe>'+
                '</div>'
            );
        }

        $('.img-cursor').on('click', function() {
            $('[name=image]').click();
        });

        $('[name=image]').on('change', function() {
                var reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById("browseImg").src = e.target.result;
                };
                reader.readAsDataURL(this.files[0]);
        });

        $('#other_images').on('change', function() {
            $('#otherImages').empty();
            for (i = 0; i < this.files.length; i++) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#otherImages').append(
                        '<div class="col-lg-3">'+
                            '<div class="form-group">'+
                                '<img src="'+e.target.result+'" class="img-thumbnail">'+
                            '</div>'+
                        '</div>'
                    );
                }
                reader.readAsDataURL(this.files[i]);
            }
        });

        $('[name=video]').on('change', function() {
            $('#youtubeVid').empty();
            if (this.value != null || this.value != '') {

                if (validURL(this.value) == true) {
                    url_string = this.value;
                    url = new URL(url_string);
                    v = url.searchParams.get("v");

                    $('#youtubeVid').html(
                        '<div class="embed-responsive embed-responsive-16by9">'+
                            '<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/'+v+'" allowfullscreen></iframe>'+
                        '</div>'
                    );
                }
            }
        });

        $('#updateForm').on('submit', function(e) {
            e.preventDefault();

            var uf = $('#updateForm');
            var fd = new FormData(uf[0]);

            $.confirm({
                animation: 'none',
                theme: 'light',
                title: 'Update',
                content: 'This item will be updated, continue?',
                buttons: {
                    No: function () {

                    },
                    Yes: {
                        btnClass: 'btn-primary',
                        action: function(){
                            $.ajax({
                                url: '{{ url("admin/browse/update/save") }}',
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
                                            content: 'Item has been updated.',
                                            buttons: {
                                                OK: function () {
                                                    window.location.href = "{{ url('admin/browse') }}";
                                                },
                                            }
                                        });
                                    }
                                    else {
                                        $.alert({
                                            animation: 'none',
                                            theme: 'light',
                                            title: 'Failed!',
                                            content: 'Item has failed to update.'
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
