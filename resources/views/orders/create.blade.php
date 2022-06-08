@extends('layouts.app')

@section('content')
    <h1>Create Post</h1>
        <form action="/orders" method="POST">
            @csrf
            <div class="block">
                <input 
                    type="text"
                    class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                    name="contract_number"
                    placeholder="Contract Number">
                <input 
                    type="text"
                    class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                    name="bl_number"
                    placeholder="BL Number">
            </div>
            <div class="btn-holder">
                <button type="submit" class="btn btn-success btn-block text-center" >Submit</a> </p>
            </div>
        </form>
@endsection