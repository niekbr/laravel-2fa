@extends(config('laravel-2fa.blade-extends', 'layouts.app'))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Set-up Two Factor Authentication') }}</div>

                <div class="card-body">
                    <form role="form" method="POST" action="{{ route('2fa.store') }}">
                        @csrf

                        <div class="text-center col-md-12 mb-4">
                            <img src="data:image/png;base64,{{ $base64QrCode }}">
                        </div>

                        <div class="form-group row">
                            <label for="2fa_token" class="col-md-4 col-form-label text-md-right">{{ __('Verify token') }}</label>

                            <div class="col-md-6">
                                <input id="2fa_token" type="text" class="form-control @error('2fa_token') is-invalid @enderror" name="2fa_token" required autocomplete="off" autofocus>

                                @error('2fa_token')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Validate') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
