@extends('layouts.app')
@section('content')
<form method="POST" action="{{ route('register') }}">
   @csrf
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-6">
            <div class="card">
               <div class="card-header">{{ __('Register') }}</div>
               <div class="card-body">
                  <div class="row mb-3">
                     <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                     <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>
                        @error('name')
                        <span class="text-danger">
                        {{ $message }}
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="row mb-3">
                     <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                     <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">
                        @error('email')
                        <span class="text-danger">
                        {{ $message }}
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="row mb-3">
                     <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                     <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">
                        @error('password')
                        <span class="text-danger">
                        {{ $message }}
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="row mb-3">
                     <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                     <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                     </div>
                  </div>
                  <div class="row mb-0">
                     <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                        </button>
                     </div>
                  </div>
                  <div class="row mb-0 mt-3">
                     <div class="col-md-8 offset-md-4">
                        <a class="btn btn-lg btn-google btn-block text-uppercase btn-outline" href="{{ route('googleLogin') }}"><img src="https://img.icons8.com/color/16/000000/google-logo.png"> Signup Using Google</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</form>
@endsection
@section('script')
<script>
   $('.date').datepicker({
   showOn: "button",
   // buttonImage: "datepicker_icon.png",
   buttonText: "Date Picker",
   // buttonImageOnly: true,
   locale: "en-US", // sets English -US culture
   dateFormat: "yy-mm-dd" // sets the date format to display in input.
   }); 
   
   $( function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 50000,
      max: 300000,
      values: [ 12000, 180000 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ] );
      }
    });
    $( "#amount" ).val( $( "#slider-range" ).slider( "values", 0 ) +
      " - " + $( "#slider-range" ).slider( "values", 1 ) );
   } );
</script>
@endsection