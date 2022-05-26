@extends('layouts.app')
@section('content')
<h2 class="text-center">
   Welecome {{ auth()->user()->name ?? "" }}
</h2>
@if (!auth()->user()->is_admin && !auth()->user()->is_profile_complete ) 
   @include('editProfile')
@else
   @includeWhen(!auth()->user()->is_admin, 'profile')
@endif


@if (auth()->user()->is_admin)
   @include('userFilter')
@endif

@if (!auth()->user()->is_admin && auth()->user()->is_profile_complete )

 @include('partnerPreferences',['users'=>$users])

@endif
@endsection
@section('script')
<script>
   $(document).ready(function(){
     getAdminAll();
   });
   
   function getAdminAll(){ 
         var url = "{{ route('adminAll') }}";
         $.ajax({
            method:'POST',
            url:url,
            data : $("#createForm").serialize(),
            success:function(data){
               $("#all").html(data); 
            }
         });
   } 
   
   $.datepicker.setDefaults({
      showOn: "button", 
      buttonText: "Date Picker", 
      locale: "en-US", // sets English -US culture
      dateFormat: "yy-mm-dd" // sets the date format to display in input.
   });
   
   
   $(function() {
       $( ".date" ).datepicker();
   });
   
   $( function() {
       $( "#slider-range" ).slider({
         range: true,
         min: 50000,
         max: 300000,
         values: [ 50000, 300000 ],
         slide: function( event, ui ) {
           $( "#amount" ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ] );
         }
       });
       $( "#amount" ).val( $( "#slider-range" ).slider( "values", 0 ) +
         " - " + $( "#slider-range" ).slider( "values", 1 ) );
   });
</script>
@endsection