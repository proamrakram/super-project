<div>
    <li class="nav-item dropdown dropdown-notification me-25" wire:ignore.self>
        <a class="nav-link" href="#" data-bs-toggle="dropdown" wire:ignore.self>

            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-bell ficon">
                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
            </svg>

            <span class="badge rounded-pill bg-danger badge-up"
                wire:ignore.self>{{ $unreadNotifications->count() }}</span>
        </a>

        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end" wire:ignore.self>

            <li class="dropdown-menu-header" wire:ignore.self>
                <div class="dropdown-header d-flex" wire:ignore.self>
                    <h4 class="notification-title mb-0 me-auto" wire:ignore.self>الاشعارات</h4>
                    <div class="badge rounded-pill badge-light-primary" wire:ignore.self>
                        {{ $unreadNotifications->count() }} جديد</div>
                </div>
            </li>

            <li class="scrollable-container media-list" wire:ignore.self>

                @foreach ($unreadNotifications as $notification)
                    <a class="d-flex" href="#" wire:ignore.self wire:click='read({{ $notification }})'>
                        <div class="list-item d-flex align-items-start" wire:ignore.self>
                            <div class="me-1" wire:ignore>
                                <div class="avatar bg-light-success">
                                    <div class="avatar-content">
                                        {{-- <i class="avatar-icon" data-feather="star"> --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-star avatar-icon">
                                            <polygon
                                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                            </polygon>
                                        </svg>

                                        </i>
                                    </div>
                                </div>
                            </div>
                            <div class="list-item-body flex-grow-1" wire:ignore.self>
                                <p class="media-heading">
                                    <span class="fw-bolder">
                                        {{ $notification->data['body'] }}
                                </p>
                                {{--
                                <small class="notification-text"> اسم العميل :
                                    {{ getCustomerName($notification->data['customer_id']) }}</small> --}}
                            </div>
                        </div>
                    </a>
                @endforeach
            </li>

            @if ($unreadNotifications->count())
                <li class="dropdown-menu-footer">
                    <a class="btn btn-primary w-100" wire:click='readAll'>
                        قراءة جميع الاشعارات
                    </a>
                </li>
            @else
                <li class="dropdown-menu-footer">
                    <a class="btn btn-sm btn-danger w-100">
                        لا يوجد إشعارات في الوقت الحالي
                    </a>
                </li>
            @endif

        </ul>
    </li>

    <audio class="sound" src="{{ asset('assets/sound.wav') }}" allow="autoplay 'src'"></audio>

    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('a0da3f00df97c738161f', {
            cluster: 'us2'
        });

        var channel = pusher.subscribe('new-order');
        // window.Livewire.emit('notifyNewOrder', data);

        channel.bind('new-order', function(data) {


            window.livewire.emit('updateNotifications');
            window.livewire.emit('updateOrderMarketer');
            let id = "{{ auth()->user()->id }}";
            console.log(data);
            console.log(data.user);
            console.log(data.user.id);
            console.log(id);

            if (data.user) {
                if (id == data.user.id) {
                    // let audio = document.querySelector("audio");
                    let audio = new Audio("{{ asset('assets/sound.wav') }}");

                    audio.play().catch(e => {
                        window.addEventListener('click', () => {
                            audio.play()
                        }, {
                            once: true
                        })
                    });
                }
            }

        });
    </script>

</div>
