@extends('partials.admin-panel.layout')
@section('title', 'المستخدم')
@section('content')

    @push('order-style')
        @livewireStyles()
    @endpush


    @livewire('user-view', ['user_id' => $user->id])


    @push('order-scripts')
        @livewireScripts()
    @endpush
@endsection
