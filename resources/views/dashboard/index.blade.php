@extends('layouts.app')

@section('content')
<h3 class="mb-4">Dashboard Admin</h3>

<div class="row">
    <div class="col-md-3">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body">
                <h5>Total Ruangan</h5>
                <h2>{{ $totalRoom }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-dark mb-3">
            <div class="card-body">
                <h5>Total Booking</h5>
                <h2>{{ $totalBooking }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <h5>Disetujui</h5>
                <h2>{{ $approved }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-warning mb-3">
            <div class="card-body">
                <h5>Pending</h5>
                <h2>{{ $pending }}</h2>
            </div>
        </div>
    </div>
</div>
@endsection
