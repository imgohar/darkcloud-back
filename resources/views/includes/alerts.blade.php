@if(count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-custom alert-notice alert-light-danger fade show" role="alert">
            <div class="alert-icon"><i class="flaticon-warning"></i></div>
            <div class="alert-text">{{$error}}</div>
            <div class="alert-close">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="ki ki-close"></i></span>
                </button>
            </div>
        </div>
    @endforeach
@endif


@if(Session::has('error'))
<div class="alert alert-custom alert-notice alert-light-danger fade show" role="alert">
    <div class="alert-icon"><i class="flaticon-warning"></i></div>
    <div class="alert-text">{{Session::get('error')}}</div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="ki ki-close"></i></span>
        </button>
    </div>
</div>

@endif

@if(Session::has('success'))

<div class="alert alert-custom alert-notice alert-light-success fade show" role="alert">
    <div class="alert-icon"><i class="flaticon-alert"></i></div>
    <div class="alert-text">{{Session::get('success')}}</div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="ki ki-close"></i></span>
        </button>
    </div>
</div>
@endif