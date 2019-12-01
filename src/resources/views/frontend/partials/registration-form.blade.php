<div class="register-form" id="{{ ( (Session::has('success') || Session::has('error') || !empty($errors->all())) ? 'message':'') }}">
	
	@if (Session::has('success'))
        <div class="message alert-success">
            <div class="alert ">
                {!! Session::get('success') !!}
            </div>
        </div>
    @endif
    @if (Session::has('error'))
        <div class="message alert-danger">
            <div class="alert">
               {!! Session::get('error') !!}
            </div>
        </div>
    @endif

	@if ( !Session::has('success') )
		<div class="reg-intro">	    			
			<p>Welcome to the Future Focused Event Registration page, please fill in all fields below to confirm your attendance.</p>
			<p class="turmeric"><strong>I would like to register for my place at the Future Focused Event</strong></p>
		</div>
		<form action="{{ route('addRegistration') }}" id="registrationform"  method="POST">
			{{ csrf_field() }}
			
	        @if(!empty($errors->all()))
	            <div class="message">
	                <div class="alert alert-danger">
	                    @foreach($errors->all() as $error)
	                        <span>{{ $error }}</span><br />
	                    @endforeach
	                </div>
	            </div>
	        @endif
	       
			<div class="form-group">
				<div class="input input--half">
					<label for="cf_fname">First Name<sup>*</sup></label>
					<input type="text" id="cf_fname" name="cf_fname" placeholder="e.g Sally" value="{{ ! empty(old('cf_fname')) ? old('cf_fname') : '' }}" required>				
				</div><!--
				--><div class="input input--half">
					<label for="cf_lname">Surname/Family Name<sup>*</sup></label>
					<input type="text" id="cf_lname" name="cf_lname" placeholder="e.g Smith" value="{{ ! empty(old('cf_lname')) ? old('cf_lname') : '' }}" required>				
				</div>
			</div>
			<div class="form-group">
				<div class="input input--half">
					<label for="cf_job_title">Job Title<sup>*</sup></label>
					<input type="text" id="cf_job_title" name="cf_job_title" placeholder="e.g Marketing Manager" value="{{ ! empty(old('cf_job_title')) ? old('cf_job_title') : '' }}" required>			
				</div><!--
				--><div class="input input--half">
					<label for="cf_email">Email Address<sup>*</sup></label>
					<input type="email" id="cf_email" name="cf_email"  placeholder="e.g me@company.co.uk" value="{{ ! empty(old('cf_email')) ? old('cf_email') : '' }}" required>
					
				</div>
			</div>
			<div class="form-group">
				<div class="input input--half">
					<label for="cf_company">Company Name<sup>*</sup></label>
					<input type="text" id="cf_company" name="cf_company" placeholder="e.g My Company" value="{{ ! empty(old('cf_company')) ? old('cf_company') : '' }}" required>			
				</div><!--
				--><div class="input input--half">
					<label for="cf_tel">Telephone<sup>*</sup></label>
					<input type="tel" id="cf_tel" name="cf_tel" placeholder="e.g 01234 567890" value="{{ ! empty(old('cf_tel')) ? old('cf_tel') : '' }}" required>				
				</div>
			</div>		

			<h4 class="notice turmeric">Important information</h4>

			<div class="form-group">
				<div class="input">
					<label for="cf_requirements">Dietary Requirements <small class="hint">Please let us know if you have any specific requirements (Dietary).</small></label>
					<textarea id="cf_requirements" name="cf_requirements" required>{{ ! empty(old('cf_requirements')) ? old('cf_requirements') : '' }}</textarea>								
				</div>
			</div>
			<div class="form-group">
				<div class="input">
					<label for="cf_medical">Medical Information</label>
					<textarea id="cf_medical" name="cf_medical" required>{{ ! empty(old('cf_medical')) ? old('cf_medical') : '' }}</textarea>								
				</div>
				<div class="consent">
					<p><strong>Before details are provided to register for an event:</strong></p>
					<p>Thank you for registering and providing your contact details; this information will be used for requested information and administration purposes in relation to this event. We may also contact you after the event to follow up on any relevant products or services deemed applicable to you / your business, as well as to let you know relevant future events and opportunities.</p>
					<p>We may disclose and exchange information relating to you with the account manager for the relevant business unit involved in this event for the above reasons. Full details on how we process and protect your personal data can be found in our <a target="_blank" href="http://cdn.westcoast.co.uk/pdfs/Westcoast%20Ltd%20Privacy%20Notice%20-%20Website%20Facing%20-%20FINAL%20-%202.pdf">Privacy Policy</a></p>
					<p>If you are <strong>not</strong> already a current customer, please tick the box below to let us know if you want to continue to hear from us after the event with details of products and future events:</p>

					<label>
              			<input id="consent" class="checkbox" name="cf_consent" type="checkbox" value="1" >I consent to the use of my personal data for the above reasons.</label>
				</div>
			</div>		

			<div class="input input--submit">
				<button type="submit" id="regsubmit" class="btn btn--secondary"><span>Register</span><i class="icon-arrow-right"></i></button>
			</div>
		</form>
	@endif
</div>