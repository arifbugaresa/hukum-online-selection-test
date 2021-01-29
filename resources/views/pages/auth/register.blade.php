@extends('layouts.login')

@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6 col-md-9 mt-4">
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
                                <form method="POST" action="{{ route('register') }}" class="user">
                                    @csrf
                                    {{--  name  --}}
                                    <div class="form-group">
                                        <input id="name" type="text" 
                                            class="form-control form-control-user @error('name') is-invalid @enderror" 
                                            name="name" value="{{ old('name') }}" 
                                            required autocomplete="name" 
                                            autofocus placeholder="Name">
                                        {{--  Error Message  --}}
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        {{--  End Error Message  --}}
                                    </div>
                                    {{--  end name  --}}

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
                                            name="password" required autocomplete="new-password"
                                            placeholder="Password">
                                        {{--  Error Message  --}}
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        {{--  End Error Message  --}}
                                    </div>

                                    {{--  Confirm Password  --}}
                                    <div class="form-group">
                                        <input id="password-confirm" 
                                            type="password"
                                            class="form-control form-control-user"
                                            name="password_confirmation" required autocomplete="new-password"
                                            placeholder="Password Confirmation">
                                            
                                    </div>
                                    {{--  End Confirm Password  --}}
                                    
                                    {{--  Button Register  --}}
                                    <div class="form-group ">
                                        <div class="">
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>
                                    {{--  End Button Register  --}}

                                    {{-- Login --}}
                                    <hr>
                                    <div class="text-center">
                                        <h6 class="small">Already have Account, <a href="{{ url('/login') }}">Login!</a></h6>
                                        
                                    </div>
                                    {{-- end login --}}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection