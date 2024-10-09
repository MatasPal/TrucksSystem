<!DOCTYPE html>
<form action="{{ route('trucks.store') }}" method="POST">
    @csrf
    <label for="unit_number">Unit Number:</label>
    <input type="text" name="unit_number" id="unit_number" required>

    <label for="year">Year:</label>
    <input type="number" name="year" id="year" required>

    <label for="notes">Notes:</label>
    <textarea name="notes" id="notes"></textarea>

    <button type="submit">Save</button>
</form>
<html>
