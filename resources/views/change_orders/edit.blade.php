@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Change Order</h1>

        <form action="{{ route('change_orders.update', $changeOrder->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="change_order_number">Change Order Number</label>
                <input type="text" name="change_order_number" id="change_order_number" class="form-control" value="{{ $changeOrder->change_order_number }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" required>{{ $changeOrder->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" name="amount" id="amount" class="form-control" value="{{ $changeOrder->amount }}" required>
            </div>

            <div class="form-group">
                <label for="change_order_date">Change Order Date</label>
                <input type="date" name="change_order_date" id="change_order_date" class="form-control" value="{{ $changeOrder->change_order_date }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Change Order</button>
        </form>
    </div>
@endsection