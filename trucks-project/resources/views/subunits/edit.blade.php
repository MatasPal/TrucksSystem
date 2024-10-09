@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Subunit</h1>
    <form action="{{ route('subunits.update', $subunit->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="main_truck" class="form-label">Main Truck:</label>
            <select name="main_truck" id="main_truck" class="form-control" required>
                <option value="">Select a Truck</option>
                @foreach ($trucks as $truck)
                <option value="{{ $truck->id }}" {{ $subunit->main_truck == $truck->id ? 'selected' : '' }}>{{ $truck->unit_number }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="subunit" class="form-label">Subunit:</label>
            <select name="subunit" id="subunit" class="form-control" required>
                <option value="">Select a Truck</option>
                @foreach ($trucks as $truck)
                <option value="{{ $truck->id }}" {{ $subunit->subunit == $truck->id ? 'selected' : '' }}>{{ $truck->unit_number }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date:</label>
            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $subunit->start_date }}" required>
        </div>
        <div class="mb-3">
            <label for="end_date" class="form-label">End Date:</label>
            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $subunit->end_date }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
