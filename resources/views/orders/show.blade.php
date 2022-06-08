@extends('layouts.app')

@section('content')
    <h1>Order information</h1>
    <table class="table table-striped">
        <tr>
            <th><strong> ID: </strong></th>
            <td> {{$order->id}} </td>
        </tr>
        <tr>
            <th><strong> BL_Release_Date: </strong></th>
            <td> {{$order->bl_release_date}} </td>
        </tr>
        <tr>
            <th><strong> BL_Release_User_ID: </strong></th>
            <td> {{$order->bl_release_user_id}} </td>
        </tr>
        <tr>
            <th><strong> Freight_Payer_Self: </strong></th>
            <td> {{$order->freight_payer_self}} </td>
        </tr>
        <tr>
            <th><strong> Contract_number: </strong></th>
            <td> {{$order->contract_number}} </td>
        </tr>
        <tr>
            <th><strong> BL_Number: </strong></th>
            <td> {{$order->bl_number}} </td>
        </tr>
    </table>
    <div class="btn-holder">
        <a href="/orders/{{$order->id}}/edit" class="btn btn-success btn-block text-center" role="button">Edit/Send Order</a> </p>
    </div>
@endsection