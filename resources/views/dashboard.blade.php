@extends('layouts.app')

@section('content')
<meta http-equiv="refresh" content="3;url=http://localhost:8000/profile" />
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color: rgba(0,0,0,0.4)">
                <div class="card-header" style="color: #ffffff">Dashboard</div>

                <div class="card-body" style="color: #ffffff">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
