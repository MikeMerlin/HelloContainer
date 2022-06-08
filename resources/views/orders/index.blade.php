@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Orders</h1>
            @if(count($orders) > 0)
                @foreach ($orders as $order)
                    <div class="card p-3 mt-3 mb-3">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <h3><a href="/orders/{{$order->id}}">{{$order->contract_number}}</a></h3>
                                <small>Added on {{$order->created_at}}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No Orders found!</p>
            @endif
    </div>
    <div class="btn-holder">
        <a href="{{ url('orders/create') }}" class="btn btn-warning btn-block text-center" role="button">Create Order</a> </p>
    </div>
@endsection