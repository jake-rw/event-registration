@extends('adminlte::page')

@section('title', 'Create registration')


@section('content')
    <div class="row">
        <form name="db_form" role="form" action="{{ route('admin.registrations.store') }}" method="POST" enctype="multipart/form-data">
            @if(!empty($errors->all()))
                <div class="col-lg-12">
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <span>{{ $error }}</span><br />
                        @endforeach
                    </div>
                </div>
            @endif
            {{ csrf_field() }}
            <div class="col-md-6">
                <div class="box box-default">
                    <div class="box-body">
                        
                        <div class="form-group{{ $errors->has('cf_fname') ? ' has-error' : '' }}">
                            <label for="cf_fname">First Name</label>
                            <input type="text" class="form-control" name="cf_fname" id="cf_fname" value="{{ ! empty(old('cf_fname')) ? old('cf_fname') : '' }}">
                        </div> 

                        <div class="form-group{{ $errors->has('cf_lname') ? ' has-error' : '' }}">
                            <label for="cf_lname">Last Name</label>
                            <input type="text" class="form-control" name="cf_lname" id="cf_lname" value="{{ ! empty(old('cf_lname')) ? old('cf_lname') : '' }}">
                        </div> 
                        <div class="form-group{{ $errors->has('cf_job_title') ? ' has-error' : '' }}">
                            <label for="cf_job_title">Job Title</label>
                            <input type="text" class="form-control" name="cf_job_title" id="cf_job_title" value="{{ ! empty(old('cf_job_title')) ? old('cf_job_title') : '' }}">
                        </div>
                        <div class="form-group{{ $errors->has('cf_email') ? ' has-error' : '' }}">
                            <label for="cf_email">Email</label>
                            <input type="text" class="form-control" name="cf_email" id="cf_email" value="{{ ! empty(old('cf_email')) ? old('cf_email') : '' }}">
                        </div>                         
                        <div class="form-group{{ $errors->has('cf_tel') ? ' has-error' : '' }}">
                            <label for="cf_tel">Telephone</label>
                            <input type="text" class="form-control" name="cf_tel" id="cf_tel" value="{{ ! empty(old('cf_tel')) ? old('cf_tel') : '' }}">
                        </div>   
                        <div class="form-group{{ $errors->has('cf_company') ? ' has-error' : '' }}">
                            <label for="cf_company">Company</label>
                            <input type="text" class="form-control" name="cf_company" id="cf_company" value="{{ ! empty(old('cf_company')) ? old('cf_company') : '' }}">
                        </div>

                        <br>
                        <a href="{{ URL::previous() }}" class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-primary pull-right">Update</button>      
                    </div>
                </div>               
            </div>

           <div class="col-md-6">
                <div class="box box-default">
                    <div class="box-header with-border">
                      <h3 class="box-title">Requirements</h3>
                    </div>
                    <div class="box-body">
                        <div class="checkbox">
                            <label>
                                <input id="cf_consent" name="cf_consent" type="checkbox" value="{{ ! empty(old('cf_consent')) ? old('cf_consent') : '' }}"> I consent to the use of my personal data for the above reasons
                            </label>
                        </div>                        
                    </div>  
                </div>
            </div>

            
        </form>
    </div>

    
@stop

