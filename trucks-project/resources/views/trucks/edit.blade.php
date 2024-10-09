@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Truck</h1>
    <form action="{{ route('trucks.update', $truck->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="unit_number" class="form-label">Unit Number:</label>
            <input type="text" name="unit_number" id="unit_number" class="form-control" value="{{ $truck->unit_number }}" required>
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">Year:</label>
            <input type="number" name="year" id="year" class="form-control" value="{{ $truck->year }}" required>
        </div>
        <div class="mb-3">
            <label for="notes" class="form-label">Notes:</label>
            <textarea name="notes" id="notes" class="form-control">{{ $truck->notes }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
