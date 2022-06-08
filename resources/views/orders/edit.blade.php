@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>
    <h2>Do you want to make any changes before submitting?</h2>
        <form action="/orders/{{$order->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="block">
                <input 
                    type="text"
                    class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                    name="contract_number"
                    placeholder="Contract Number"
                    value="{{$order->contract_number}}">
                <input 
                    type="text"
                    class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                    name="bl_number"
                    placeholder="BL Number"
                    value="{{$order->bl_number}}">
            </div>
            <div class="btn-holder">
                <button type="submit" class="btn btn-success btn-block text-center" >Submit</a> </p>
            </div>
        </form>
@endsection