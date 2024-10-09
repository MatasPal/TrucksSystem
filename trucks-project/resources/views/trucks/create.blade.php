@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Truck</h1>
    <form action="{{ route('trucks.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="unit_number" class="form-label">Unit Number:</label>
            <input type="text" name="unit_number" id="unit_number" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">Year:</label>
            <input type="number" name="year" id="year" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="notes" class="form-label">Notes:</label>
            <textarea name="notes" id="notes" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection

