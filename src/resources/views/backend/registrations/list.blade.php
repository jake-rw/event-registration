@extends('adminlte::page')

@section('title', 'Registrations')

@push('css')
<style>
    .callout .btn {
        text-decoration: none;
    }
    .callout .pagination,
    .callout .table {
        vertical-align: middle;
        margin: 0;
    }
    .callout .table td {
        border: none;
        padding: 0;
    }
</style>
@endpush


@section('content')
    <div class="row">
        <section class="col-xs-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3>Registrations</h3>
                    <a href="{{ url('admin/registrations/export') }}" class="btn bg-light-blue">Export all Registrations</a>
                    <a href="{{ url('admin/registrations/create') }}" class="btn bg-green">Add new </a>
                    
                </div>
            </div>
            @if (Session::has('error'))
                <div class="col-lg-12">
                    <div class="alert alert-danger">
                       {!! Session::get('error') !!}
                    </div>
                </div>
            @endif
        </section>
    </div>
    <div class="row">
        <div class="col-xs-12">
          
            <div class="box">
                <div class="box-body no-padding">
                    <table id="posts" class="table table-hover">
                        <thead>
                            <tr>
                                <th width="5">&nbsp;</th>
                                <th>ID</th>
                                <th>Name</th>                                
                                <th>Email</th>                                
                                <th width="170">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td width="5">&nbsp;</td>
                                    <td>{{ $post->id }}</td>
                                    <td><a href="{{route('admin.registrations.edit', ['registration' => $post->id]) }}">{{ $post->cf_fname }} {{ $post->cf_lname }}</a></td>

                                    <td>
                                        <h5 class="no-margin"><a href="{{route('admin.registrations.edit', ['registration' => $post->id])}}">{{ $post->cf_email }}</a></h5>
                                    </td>                                    
                                    <td width="170">
                                        <ul class="list-unstyled list-inline">
                                            <li><a class="btn btn-default btn-sm" href="{{ route('admin.registrations.edit', ['registration' => $post->id]) }}"><i class="fa fa-pencil-alt"></i></a></li>
                                             <li>
                                                <form method="POST" class="delete-action" action="{{ route('admin.registrations.destroy', ['registration' => $post->id]) }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}

                                                    <button type="submit"  class="btn btn-default"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <script
            src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
            integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
            crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('.delete-item').on('click', function (e) {
                var answer = confirm("Are you sure?");
                if (answer !== true) {
                    e.preventDefault();
                }
            });
        });
    </script>
@endpush