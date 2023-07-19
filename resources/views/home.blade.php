@extends('layouts.app')
@section('content')
<div class="container alert alert-warning alert-dismissible fade show" role="alert">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card "  style="background: #fff3cd">
                <div class="card-header" style="text-align: center">
                    <h2>
                        {{ __('Dashboard') }}</h2></div>

                <div class="card-body" style="text-align: center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>

        </div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

</div>

@endsection
