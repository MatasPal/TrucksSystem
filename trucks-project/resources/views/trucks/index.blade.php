@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Trucks</h1>
    <a href="{{ route('trucks.create') }}" class="btn btn-primary">Add Truck</a>
    <table class="table">
        <thead>
            <tr>
                <th>Unit Number</th>
                <th>Year</th>
                <th>Notes</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
@foreach ($trucks as $truck)
                <tr>
                    <td>{{ $truck->unit_number }}</td>
                    <td>{{ $truck->year }}</td>
                    <td>{{ $truck->notes }}</td>
                    <td>
                        <a href="{{ route('trucks.edit', $truck->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('trucks.destroy', $truck->id) }}" method="POST" style="display:inline;">
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


