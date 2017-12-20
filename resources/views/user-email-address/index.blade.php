@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-4 text-left panel-title">Email Addresses</div>
                        <div class="col-md-3 col-md-offset-5 text-right">
                            <a href="{{ route('createUserEmailAddress') }}">Add Email Address</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Email Address</th>
                                <th>Default Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($userEmailAddresses)>0)
                                @foreach($userEmailAddresses as $userEmailAddress)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $userEmailAddress['email_address'] }}</td>
                                        <td>{{ $userEmailAddress['is_default'] }}</td>
                                        <td>
                                            {{ Form::open(['route' => ['deleteUserEmailAddress', $userEmailAddress['id']], 'method' => 'delete','onsubmit' => 'return ConfirmDelete()']) }}
                                                <a href="{{ route('editUserEmailAddress',['id'=> $userEmailAddress['id']]) }}" class="btn btn-warning">Edit</a> &nbsp; 
                                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                            {{ Form::close() }}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7"> No record found</td>
                                </tr>
                            @endif
                        </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function ConfirmDelete()
    {
        return confirm("Do you want to delete this item?");
    }
</script>
@endsection