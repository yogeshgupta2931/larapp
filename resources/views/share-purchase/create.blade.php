@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-4 text-left panel-title">
                            @if (empty($sharePurchase)) 
                                Adding Share Purchased
                            @else
                                Editing Share Purchased 
                            @endif
                        </div>
                        <div class="col-md-2 col-md-offset-6 text-right">
                            <a href="{{ route('listSharePurchase') }}">Back</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if (empty($sharePurchase)) 
                        <form class="form-horizontal" method="POST" action="{{ route('storeSharePurchase') }}">
                    @else
                        <form class="form-horizontal" method="POST" action="{{ route('updateSharePurchase',['id'=> $sharePurchase->id ]) }}">
                    @endif

                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('company_name') ? ' has-error' : '' }}">
                            <label for="company_name" class="col-md-4 control-label">Company Name</label>
                            <div class="col-md-6">
                                <input id="company_name" type="text" class="form-control" name="company_name" maxlength=150 value="{{ old('company_name', empty($sharePurchase)? null: $sharePurchase->company_name ) }}" required autofocus>

                                @if ($errors->has('company_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('company_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('instrument_name') ? ' has-error' : '' }}">
                            <label for="instrument_name" class="col-md-4 control-label">Instrument Name</label>

                            <div class="col-md-6">
                                <input id="instrument_name" type="text" class="form-control" name="instrument_name" maxlength=150 value="{{ old('instrument_name',empty($sharePurchase)? null : $sharePurchase->instrument_name) }}" required autofocus>

                                @if ($errors->has('instrument_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('instrument_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                            <label for="quantity" class="col-md-4 control-label">Quantity</label>
                            <div class="col-md-6">
                                <input id="quantity" type="number" class="form-control" name="quantity" value="{{ old('quantity',empty($sharePurchase)? null : $sharePurchase->quantity) }}" required>

                                @if ($errors->has('quantity'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-4 control-label">Price</label>

                            <div class="col-md-6">
                                <input id="price" type="number" class="form-control" name="price" value="{{ old('price',empty($sharePurchase)? null : $sharePurchase->price) }}" required>

                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="total_investment" class="col-md-4 control-label">Total Investment</label>

                            <div class="col-md-6">
                                <input id="total_investment" type="number" class="form-control" name="total_investment" value="{{ old('total_investment',empty($sharePurchase)? null : $sharePurchase->total_investment) }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="certificate_number" class="col-md-4 control-label">Certificate Number</label>

                            <div class="col-md-6">
                                <input id="certificate_number" type="number" class="form-control" name="certificate_number" value="{{ old('certificate_number',empty($sharePurchase)? null : $sharePurchase->certificate_number) }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="transaction_date" class="col-md-4 control-label">Transaction Date</label>

                            <div class="col-md-6">
                                <input id="transaction_date" type="text" class="datepicker form-control" name="transaction_date" value="{{ old('transaction_date',empty($sharePurchase)? null : $sharePurchase->transaction_date) }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save Share Purchase
                                </button> &nbsp;
                                <button type="reset" class="btn btn-default">
                                    Reset
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection