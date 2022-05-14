@extends('admin.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800"><b>Add</b></h1>

<div class="form-group">
    <a href="{{ url('/admin/browse') }}" class="btn btn-custom btn-outline-success"><i class="fa fa-arrow-circle-left"></i> <b>BACK</b></a>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="#" enctype="multipart/form-data" id="addForm">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Main Image</label>
                                <img id="browseImg" src="{{ asset('assets/img/browse/browse.jpg') }}" alt="img" class="img-cursor img-thumbnail">
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

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Youtube Link (Video)</label>
                                <input type="text" class="form-control" name="video">
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
                        @endif
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Country <span class="text-danger">*</span></label>
                                <select class="form-control" name="country" required>
                                    <option value="" selected disabled>-- choose ---</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->nicename }}">{{ $country->nicename }}</option>
                                    @endforeach
                                    {{-- <option value="Brunei">Brunei</option>
                                    <option value="Burma (Myanmar)">Burma (Myanmar)</option>
                                    <option value="Cambodia">Cambodia</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="Laos">Laos</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Philippines">Philippines</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Timor-Leste">Timor-Leste</option>
                                    <option value="Vietnam">Vietnam</option> --}}
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="title" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Context <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="context" rows="10" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
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

                let url_string = this.value;
                let url = new URL(url_string);
                let v = url.searchParams.get("v");

                $('#youtubeVid').html(
                    '<div class="embed-responsive embed-responsive-16by9">'+
                        '<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/'+v+'" allowfullscreen></iframe>'+
                    '</div>'
                );
            }
        });

        $('#addForm').on('submit', function(e) {
            e.preventDefault();

            var uf = $('#addForm');
            var fd = new FormData(uf[0]);

            $.confirm({
                animation: 'none',
                theme: 'light',
                title: 'Add',
                content: 'This item will be added, continue?',
                buttons: {
                    No: function () {

                    },
                    Yes: {
                        btnClass: 'btn-success',
                        action: function(){
                            $.ajax({
                                url: '{{ url("admin/browse/add/save") }}',
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
                                            content: 'Item has been added.',
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
                                            content: 'Item has failed to add.'
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
