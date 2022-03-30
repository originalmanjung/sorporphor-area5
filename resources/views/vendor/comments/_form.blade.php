<div class="card col-md-12 mx-auto mt-4">
    <div class="card-body">
        <div class="text-center mb-3">
            <h5 class="card-title">เขียนข้อความแสดงความคิดเห็นโพสนี้</h5>
        </div>
        @if($errors->has('commentable_type'))
            <div class="alert alert-danger" role="alert">
                {{ $errors->first('commentable_type') }}
            </div>
        @endif
        @if($errors->has('commentable_id'))
            <div class="alert alert-danger" role="alert">
                {{ $errors->first('commentable_id') }}
            </div>
        @endif
        <form method="POST" action="{{ route('comments.store') }}">
            @csrf
            @honeypot
            <input type="hidden" name="commentable_type" value="\{{ get_class($model) }}" />
            <input type="hidden" name="commentable_id" value="{{ $model->getKey() }}" />

            {{-- Guest commenting --}}
            @if(isset($guest_commenting) and $guest_commenting == true)
                <div class="mb-3">
                    <label for="message" class="form-label form-label-sm">@lang('comments::comments.enter_your_name_here')</label>
                    <input type="text" class="form-control form-control-sm @if($errors->has('guest_name')) is-invalid @endif" name="guest_name" value="{{ old('guest_name') }}" />
                    @error('guest_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label form-label-sm">@lang('comments::comments.enter_your_email_here')</label>
                    <input type="email" class="form-control form-control-sm @if($errors->has('guest_email')) is-invalid @endif" name="guest_email" value="{{ old('guest_email') }}" />
                    @error('guest_email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            @endif

            <div class="mb-3">
                <label for="message" class="form-label form-label-sm">@lang('comments::comments.enter_your_message_here')</label>
                <textarea class="form-control form-control-sm @if($errors->has('message')) is-invalid @endif" name="message" rows="3">{{ old('message') }}</textarea>
                <div class="invalid-feedback">
                    @lang('comments::comments.your_message_is_required')
                </div>
                {{-- <small class="form-text text-muted">@lang('comments::comments.markdown_cheatsheet', ['url' => 'https://help.github.com/articles/basic-writing-and-formatting-syntax'])</small> --}}
            </div>
            {{-- Guest commenting --}}
            @if(isset($guest_commenting) and $guest_commenting == true)
                <div style="margin-top:0px;" class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                    <label class="form-label">Captcha:</label>
                    <div class="mb-3">
                        {!! app('captcha')->display() !!}
                        @if ($errors->has('g-recaptcha-response'))
                        <span class="help-block" role="alert">
                            <strong class="text-danger">{{ $errors->first('g-recaptcha-response') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            @endif
            <button type="submit" class="btn btn-danger text-uppercase text-white">@lang('comments::comments.submit')</button>
        </form>
    </div>
</div>
<br />
