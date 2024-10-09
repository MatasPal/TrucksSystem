@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Subunits</h1>
    <a href="{{ route('subunits.create') }}" class="btn btn-primary">Add Subunit</a>
    <table class="table">
        <thead>
        <tr>
            <th>Main Truck</th>
            <th>Subunit</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($subunits as $subunit)
        <tr>
            <td>{{ $subunit->mainTruck->unit_number }}</td>
            <td>{{ $subunit->subunitTruck->unit_number }}</td>
            <td>{{ $subunit->start_date }}</td>
            <td>{{ $subunit->end_date }}</td>
            <td>
                <a href="{{ route('subunits.edit', $subunit->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('subunits.destroy', $subunit->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
