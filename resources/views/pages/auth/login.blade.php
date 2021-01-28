@extends('layouts.login')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-xl-5 col-lg-6 col-md-9 mt-5">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            {{--  Logo Image  --}}
                            <div class="d-flex align-items-center justify-content-center mt-5">
                                <img src="{{ asset('style/img/hk.png') }}" width="180px">
                            </div>
                            {{--  End Logo Image  --}}
                            {{--  Form Input  --}}
                            <div class="p-5">
                                <form method="POST" action="{{ route('login') }}" class="user">
                                    @csrf
                                    {{--  email  --}}
                                    <div class="form-group">
                                        <input id="email" type="email" 
                                            class="form-control form-control-user @error('email') is-invalid @enderror" 
                                            name="email" value="{{ old('email') }}" 
                                            required autocomplete="email" 
                                            autofocus placeholder="Email">
                                        {{--  Error Message  --}}
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        {{--  End Error Message  --}}
                                    </div>
                                    {{--  end email  --}}

                                    {{--  Password  --}}
                                    <div class="form-group">
                                        <input id="password" 
                                            type="password" 
                                            class="form-control form-control-user @error('password') is-invalid @enderror" 
                                            name="password" required 
                                            placeholder="Password"
                                            autocomplete="current-password">
                                        {{--  Error Message  --}}
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        {{--  End Error Message  --}}
                                    </div>
                                    {{--  End Password  --}}

                                    {{--  Remember  --}}
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="custom-control-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                        </div>
                                    </div>
                                    {{--  End Remember  --}}
                                    
                                    {{--  Button Login  --}}
                                    <div class="form-group ">
                                        <div class="">
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                {{ __('Login') }}
                                            </button>
                                        </div>
                                    </div>
                                    {{--  End Button Login  --}}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection