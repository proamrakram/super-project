<div class="auth-login-form">
    @if (!$user)
        <div class="mb-1">
            <label class="form-label" for="login-phone">رقم الجوال او الايميل</label>
            <input class="form-control" dir="ltr" type="text" wire:model="login_phone_email"
                placeholder="example@gmail.com or 0599916672" autofocus="" tabindex="1" />
            @error('login_phone_email')
                <small class="text-danger">{{ $message }}</small>
            @enderror

        </div>

        <div class="mb-1">

            <div class="d-flex justify-content-between">
                <label class="form-label" for="login-password">كلمة المرور</label>
                <a href="{{ route('forget.password') }}"><small>نسيت كلمة المرور ؟</small></a>
            </div>

            <div class="input-group input-group-merge form-password-toggle">
                <input class="form-control form-control-merge" type="password" wire:model="login_password"
                    placeholder="password" tabindex="2" />
                <span class="input-group-text cursor-pointer">
                    <i data-feather="eye"></i>
                </span>
            </div>
            @error('login_password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{--
    <div class="mb-1">
        <div class="form-check">
            <input class="form-check-input" id="remember-me" name="remember_me" type="checkbox" tabindex="3" />
            <label class="form-check-label" for="remember-me"> تذكرني</label>
        </div>
    </div> --}}

        <button class="btn btn-primary w-100" tabindex="4" wire:click='login'>تسجيل الدخول</button>
    @endif

    @if ($user)
        <div class="auth-register-form mt-2">

            <div class="mb-1">
                <label class="form-label">كود التفعيل</label>
                <input type="text" dir="ltr" maxlength="6" wire:model='verification_code' class="form-control"
                    aria-describedby="name" autofocus="" tabindex="1" />

                @if ($user->verification_code)
                    @if ($user->verification_code == $verification_code)
                        <small class="text-success">كود التحقق صحيح</small>
                    @endif

                    @if (!($user->verification_code == $verification_code))
                        <small class="text-danger">كود التحقق غير صحيح</small>
                    @endif
                @endif

            </div>

            <button class="btn btn-primary w-100 mb-2" tabindex="5" wire:click='sendSms'
                @if ($user->verification_code != $verification_code) disabled @endif>تفعيل</button>

            @if ($user->can_recieve_sms)
                <button class="btn btn-danger w-100" tabindex="5" wire:click='resendSms'>إرسال كود التحقق</button>
            @endif

            @if (!$user->email_verified_at && !$user->can_recieve_sms)
                <span class="text-primary" wire:poll.1000ms='timer'>يمكنك طلب كود جديد بعد مرور
                    {{ $time }}</span>
            @endif

        </div>
    @endif



</div>
