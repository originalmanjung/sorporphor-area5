<style>

    .cookie-box {
        background-color: #004b23;
    }
    .card-text {
        font-size: 14px;
    }
    .card-text a {
        color: #04e762;
        font-size: 16px;
    }
    .card-text a:hover {
        text-decoration: underline;
    }
    .cookie-consent-allow {
        background-color: #0a0908 !important;
    }
    .cookie-consent-allow:hover {
        background-color: #000000 !important;
    }
</style>
{{-- <div class="js-cookie-consent cookie-consent fixed bottom-0 inset-x-0 pb-2">
    <div class="max-w-7xl mx-auto px-6">
        <div class="p-2 rounded-lg bg-yellow-100">
            <div class="flex items-center justify-between flex-wrap">
                <div class="w-0 flex-1 items-center hidden md:inline">
                    <p class="ml-3 text-yellow-600 cookie-consent__message">
                        {!! trans('cookie-consent::texts.message') !!}
                    </p>
                </div>
                <div class="mt-2 flex-shrink-0 w-full sm:mt-0 sm:w-auto">
                    <a class="js-cookie-consent-agree cookie-consent__agree flex items-center justify-center px-4 py-2 rounded-md text-sm font-medium text-yellow-800 bg-yellow-400 hover:bg-yellow-300">
                        {{ trans('cookie-consent::texts.agree') }}
                    </a>
                    @if (config('cookie-consent.refuse_enabled'))
                    <a class="js-cookie-consent-refuse mt-1 cookie-consent__refuse flex items-center justify-center px-4 py-2 rounded-md text-sm font-medium text-yellow-800 bg-yellow-400 hover:bg-yellow-300">
                        {{ trans('cookie-consent::texts.refuse') }}
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div> --}}



<div class="cookie-box js-cookie-consent cookie-consent col-md-12 alert alert-primary fixed-bottom m-0" role="alert">
    <h5 class="card-title font-weight-bold text-white">{!! trans('cookie-consent::texts.message') !!}</h5>
    <div class="row d-flex justify-content-between align-items-center pb-3 pl-3 pr-3">
        <div>
            <p class="card-text text-white">เราใช้คุกกี้ (Cookies) เพื่อพัฒนาประสิทธิภาพ และประสบการณ์ที่ดีในการใช้เว็บไซต์ของคุณ คุณสามารถศึกษารายละเอียดได้ที่<a href="{{ route('cookie') }}" class="font-weight-bold"> นโยบายคุกกี้</a></p>
        </div>
        <div class="cookie-consent-selection d-flex bd-highlight text-center mt-2">
            @if (config('cookie-consent.refuse_enabled'))
                <a type="button" class="js-cookie-consent-refuse cookie-consent__refuse cookie-consent-deny btn btn-dark text-light mr-2">{{ trans('cookie-consent::texts.refuse') }}</a>
            @endif
            <a type="button" class="js-cookie-consent-agree cookie-consent__agree cookie-consent-allow btn btn-primary text-light ">{{ trans('cookie-consent::texts.agree') }}</a>
        </div>
    </div>

</div>
