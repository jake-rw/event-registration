@extends('template')

@section('content')

<section class="banner">
	<div class="container">
		<div class="banner--text">
			<p class="sub-heading">Attend Future Focused to gain Microsoft’s early insight on Bett 2020 and create a better future for education</p>
			<h1>FUTURE FOCUSED <span class="br"></span>EVENT</h1>
			<h3>REGISTRATION FORM</h3>
			<p class="dates">19th Nov 2019 <span class="br"></span> 09:30 - 16:00</p>
		</div>
        <div class="logos">
        	<div class="logo">
        		<img src="{{ asset('img/microsoft-logo.png') }}" alt="Microsoft">
        	</div><!--
        	--><div class="logo">
        		<img src="{{ asset('img/windows-pro-logo.png') }}" alt="Windows pro">
        	</div><!--
        	--><div class="logo">
                <img src="{{ asset('img/hp-logo.png') }}" alt="HP">
            </div><!--
            --><div class="logo">
                <img src="{{ asset('img/lenovo-logo.png') }}" alt="Lenovo pro">
            </div><!--
            --><div class="logo">
        		<img src="{{ asset('img/dynabook-logo.png') }}" alt="Windows pro">
        	</div>
        </div>  
	</div>
</section>

<section class="registration-form">
    <div class="container">

    	
    		<!-- Check if registration is open otherwise show message -->
			@if( $registration->status === true )	    			
				@include('frontend.partials.registration-form')    				
			@else
				<p>Thanks for your interest in Future Focused.</p>
				<br>
				<p>Registration for this event is now closed. If you have any queries, please get in touch with the team over at <a href="mailto:support@futurefocusedevent.co.uk">support@futurefocusedevent.co.uk.</a></p>
			@endif
    </div>
</section>


@endsection