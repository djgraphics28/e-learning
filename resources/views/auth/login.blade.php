@extends('layouts.app')

@section('content')
<section id="browse">
    <div class="container mt-10 mb-5" data-aos="fade-up">

        <header class="section-header mb-5">
            <h3 class="section-title">Login</h3>
        </header>

        <div class="row browse-cols">
            <div class="col-md-6 mx-auto" data-aos="fade-up" data-aos-delay="100">
                <div class="browse-col" style="padding: 50px">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>E-mail Address</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-block btn-primary">Login</button>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-5">
                                <div class="text-center">
                                    <p>Copyright © SEA Countries 2021</p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
    
</section>
@endsection
