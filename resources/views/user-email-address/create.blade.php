@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-4 text-left panel-title">
                            @if (empty($userEmailAddress)) 
                                Adding Email Address
                            @else
                                Editing Email Address
                            @endif
                        </div>
                        <div class="col-md-2 col-md-offset-6 text-right">
                            <a href="{{ route('listUserEmailAddress') }}">Back</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if (empty($userEmailAddress)) 
                        <form class="form-horizontal" method="POST" action="{{ route('storeUserEmailAddress') }}">
                    @else
                        <form class="form-horizontal" method="POST" action="{{ route('updateUserEmailAddress',['id'=> $userEmailAddress->id ]) }}">
                    @endif

                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email_address') ? ' has-error' : '' }}">
                            <label for="email_address" class="col-md-4 control-label">Email Address</label>
                            <div class="col-md-6">
                                <input id="email_address" type="email" maxlength="150" class="form-control" name="email_address" value="{{ old('email_address', empty($userEmailAddress)? null: $userEmailAddress->email_address ) }}" required autofocus>

                                @if ($errors->has('email_address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('is_default') ? ' has-error' : '' }}">
                            <label for="is_default" class="col-md-4 control-label">Default Status</label>

                            <div class="col-md-6">
                                @if (empty($userEmailAddress))
                                    <input name="is_default" type="radio" value="1"> Yes<br>
                                    <input checked="checked" name="is_default" type="radio" value="0"> No
                                @else
                                    <input name="is_default" type="radio" value="1" {{ ($userEmailAddress->is_default)?"checked='checked'":""}} > Yes<br>
                                    <input name="is_default" type="radio" value="0" {{ !($userEmailAddress->is_default)?"checked='checked'":""}} > No
                                @endif
                                @if ($errors->has('is_default'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('is_default') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save Email Address
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