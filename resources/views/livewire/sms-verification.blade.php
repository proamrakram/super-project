<div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5" wire:ignore.self>
    <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto" wire:ignore.self>

        <h2 class="card-title fw-bold mb-1">مرحباً بالواعد الجديد 🚀</h2>

        <p class="card-text mb-2">إنضم معنا الآن </p>

        @if (!$user)
            <form class="auth-register-form mt-2" wire:submit.prevent='submit' wire:ignore.self>
                @csrf

                <div class="mb-1" wire:ignore.self>
                    <label class="form-label">الإسم</label>

                    <input type="text" wire:model='name' placeholder="علي التاروتي" class="form-control"
                        aria-describedby="name" autofocus="" tabindex="1" />
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-1">
                    <label class="form-label" for="register-phone">رقم الجوال</label>
                    <input class="form-control" dir="ltr" wire:model='phone' type="text" name="register_phone"
                        placeholder="0591234567" maxlength="10" aria-describedby="register-phone" tabindex="2" />
                    @error('phone')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-1">
                    <label class="form-label" for="register-email">الإيميل</label>
                    <input class="form-control" dir="ltr" wire:model='email' placeholder="example@gmail.com"
                        aria-describedby="email" tabindex="3" />
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-1">
                    <label class="form-label" for="register-password">كلمة المرور</label>

                    <div class="input-group input-group-merge form-password-toggle">

                        <input class="form-control form-control-merge" wire:model='password' type="password"
                            name="password" placeholder="············" aria-describedby="password" tabindex="4" />

                        <span class="input-group-text cursor-pointer">
                            <i data-feather="eye"></i>
                        </span>

                    </div>

                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button class="btn btn-primary w-100" tabindex="5">التسجيل</button>

            </form>
        @endif


        @if ($user)
            @if ($user->verification_code)
                <div class="auth-register-form mt-2">
                    @csrf

                    <div class="mb-1">
                        <label class="form-label">كود التفعيل</label>
                        <input type="text" dir="ltr" maxlength="6" wire:model='verification_code'
                            class="form-control" aria-describedby="name" autofocus="" tabindex="1" />

                        @if ($user->verification_code == $verification_code)
                            <small class="text-success">كود التحقق صحيح</small>
                        @else
                            <small class="text-danger">كود التحقق غير صحيح</small>
                        @endif

                    </div>

                    <button class="btn btn-primary w-100 mb-2" tabindex="5" wire:click='sendSms'
                        @if ($user->verification_code != $verification_code) disabled @endif>تفعيل</button>

                    @if ($user->can_recieve_sms)
                        <button class="btn btn-danger w-100" tabindex="5" wire:click='resendSms'>إعادة إرسال كود
                            جديد</button>
                    @endif

                    @if (!$user->email_verified_at && !$user->can_recieve_sms)
                        <span class="text-primary" wire:poll.1000ms='timer'>يمكنك طلب كود جديد بعد مرور
                            {{ $time }}</span>
                    @endif

                </div>
            @endif
        @endif

        <p class="text-center mt-2">
            <span>يوجد لديك حساب بالفعل؟</span>
            <a href="{{ route('login') }}">
                <span>&nbsp;سجل الدخول</span>
            </a>
        </p>

    </div>
</div>
