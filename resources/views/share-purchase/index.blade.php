@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-4 text-left panel-title">Share Purchased</div>
                        <div class="col-md-3 col-md-offset-5 text-right">
                            <a href="{{ route('createSharePurchase') }}">Add Share Purchases</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Company Name</th>
                                <th>Instrument Name</th>
                                <th>Quantity</th>
                                <th>Total Investment</th>
                                <th>Transaction Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($shares)>0)
                                @foreach($shares as $share)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $share['company_name'] }}</td>
                                        <td>{{ $share['instrument_name'] }}</td>
                                        <td>{{ $share['quantity'] }}</td>
                                        <td>{{ $share['total_investment'] }}</td>
                                        <td>{{ $share['transaction_date'] }}</td>
                                        <td>
                                            {{ Form::open(['route' => ['deleteSharePurchase', $share['id']], 'method' => 'delete','onsubmit' => 'return ConfirmDelete()']) }}
                                                <a href="{{ route('editSharePurchase',['id'=> $share['id']]) }}" class="btn btn-warning">Edit</a> &nbsp; 
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
                        {{ $shares->links() }}
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