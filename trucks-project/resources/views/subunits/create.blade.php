@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Subunit</h1>
    <form action="{{ route('subunits.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="main_truck" class="form-label">Main Truck:</label>
            <select name="main_truck" id="main_truck" class="form-control" required>
                <option value="">Select a Truck</option>
                @foreach ($trucks as $truck)
                <option value="{{ $truck->id }}">{{ $truck->unit_number }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="subunit" class="form-label">Subunit:</label>
            <select name="subunit" id="subunit" class="form-control" required>
                <option value="">Select a Truck</option>
                @foreach ($trucks as $truck)
                <option value="{{ $truck->id }}">{{ $truck->unit_number }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date:</label>
            <input type="date" name="start_date" id="start_date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="end_date" class="form-label">End Date:</label>
            <input type="date" name="end_date" id="end_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
