@extends('partials.admin-panel.layout')
@section('title', 'الطلبات')
@section('content')

    @livewire('order-view', ['order_id' => $order->id])

@endsection
