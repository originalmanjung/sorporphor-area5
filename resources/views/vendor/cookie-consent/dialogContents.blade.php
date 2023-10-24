<style>
    :root {
        --background: #007af7;
        --white-text: #fff;
        --hover-text: #222;
        --button-background: #fff;
        --button-background-hover: #000;
        --button-text: #007af7;

    }

    html,
    body {
        padding: 0;
        margin: 0;
        font-family: Poppins;
        font-size: 100%;
        background: url(https://source.unsplash.com/random);
        background-size: cover;
        background-repeat: no-repeat;
    }

    .cookie-container {
        display: flex;
        align-content: center;
        align-items: center;
        padding: 1rem 2rem;
        background: var(--background);
        color: var(--white-text);
        position: fixed;
        bottom: 0;
        font-size: 1rem;
        gap: 2rem;
        opacity: 1;
        visibility: visible;
        flex-wrap: wrap;
    }

    .cookie-container a {
        color: var(--white-color);
    }

    .cookie-container a:hover {
        color: var(--hover-text);
    }

    .cookie-container .cookie-text {
        flex: 8 768px;
    }

    .cookie-container .agree {
        flex: 1 150px;
        text-align: center;
    }

    .agree button {
        background: var(--button-background);
        color: var(--button-text);
        border: none;
        /* padding: 0.4rem 1.2rem;
        cursor: pointer;
        border-radius: 20px;
        font-size: 1rem; */
    }

    .agree button:hover {
        background: var(--button-background-hover);
        color: var(--white-text);
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



<div class="js-cookie-consent cookie-consent col-md-12 alert alert-primary fixed-bottom m-0" role="alert">
    <h5 class="card-title fw-bolder">{!! trans('cookie-consent::texts.message') !!}</h5>
    <div class="row d-flex justify-content-between align-items-center pb-3 pl-3 pr-3">
        <div>
            <p class="card-text">เราใช้คุกกี้ (Cookies) เพื่อพัฒนาประสิทธิภาพ และประสบการณ์ที่ดีในการใช้เว็บไซต์ของคุณ คุณสามารถศึกษารายละเอียดได้ที่<a href="http://"> นโยบายคุกกี้</a></p>
        </div>
        <div class="cookie-consent-selection d-flex bd-highlight text-center mt-2">
            @if (config('cookie-consent.refuse_enabled'))
                <a type="button" class="js-cookie-consent-refuse cookie-consent__refuse cookie-consent-deny btn btn-dark text-light mr-2">{{ trans('cookie-consent::texts.refuse') }}</a>
            @endif
            <a type="button" class="js-cookie-consent-agree cookie-consent__agree cookie-consent-allow btn btn-primary text-light">{{ trans('cookie-consent::texts.agree') }}</a>
        </div>
    </div>

</div>
