@include('partials.auth.header')
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<x-livewire-alert::scripts />
@livewireStyles()
@yield('content')
@livewireScripts()
@include('partials.auth.footer')
