@extends('adminlte::page')

@section('title', 'Edit registration')


@section('content')
    <div class="row">
        <form name="db_form" role="form" action="{{ route('admin.registrations.update', ['registration' => $post->id]) }}" method="POST">           
            @method('PUT')
            @csrf

            @if(!empty($errors->all()))
                <div class="col-lg-12">
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <span>{{ $error }}</span><br />
                        @endforeach
                    </div>
                </div>
            @endif
            
            <div class="col-md-6">
                <div class="box box-default">
                    <div class="box-body">
                        <div class="form-group{{ $errors->has('created_at') ? ' has-error' : '' }}">
                            <label for="created_at">Registerd at</label>
                            <input type="text" class="form-control" name="created_at" id="created_at" value="{{ $post->created_at->format('d-m-Y H:i:s') }}" disabled>
                        </div> 
                        <div class="form-group{{ $errors->has('cf_fname') ? ' has-error' : '' }}">
                            <label for="cf_fname">First Name</label>
                            <input type="text" class="form-control" name="cf_fname" id="cf_fname" value="{{  $post->cf_fname }}">
                        </div> 
                        <div class="form-group{{ $errors->has('cf_lname') ? ' has-error' : '' }}">
                            <label for="cf_lname">Last Name</label>
                            <input type="text" class="form-control" name="cf_lname" id="cf_lname" value="{{ $post->cf_lname }}">
                        </div> 
                        <div class="form-group{{ $errors->has('cf_job_title') ? ' has-error' : '' }}">
                            <label for="cf_job_title">Job Title</label>
                            <input type="text" class="form-control" name="cf_job_title" id="cf_job_title" value="{{ $post->cf_job_title }}">
                        </div> 
                        <div class="form-group{{ $errors->has('cf_email') ? ' has-error' : '' }}">
                            <label for="cf_email">Email</label>
                            <input type="text" class="form-control" name="cf_email" id="cf_email" value="{{ $post->cf_email }}">
                        </div>                         
                        <div class="form-group{{ $errors->has('cf_tel') ? ' has-error' : '' }}">
                            <label for="cf_tel">Telephone</label>
                            <input type="text" class="form-control" name="cf_tel" id="cf_tel" value="{{ $post->cf_tel }}">
                        </div>  
                        <div class="form-group{{ $errors->has('cf_company') ? ' has-error' : '' }}">
                            <label for="cf_company">Company</label>
                            <input type="text" class="form-control" name="cf_company" id="cf_company" value="{{ $post->cf_company }}">
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
                        <label>
                            <input id="cf_consent" name="cf_consent" type="checkbox" value="1" {{ $post->cf_consent == 1 ? ' checked'  : '' }}> I consent to the use of my personal data for the above reasons
                        </label>                        
                    </div>  
                </div>
            </div>

            
        </form>
    </div>

    
@stop

