@if(session('message'))

<div class=" col-12 justify-content-center text-center d-inline-flex" id="message">
    <div class="alert alert-success col-8">
        {{ session('message') }}
    </div>
</div>
@endif

@if(session('messageerror'))

<div class=" col-12 justify-content-center text-center d-inline-flex" id="message">
    <div class="alert alert-danger col-8">
        {{ session('messageerror') }}
    </div>
</div>
@endif

@if(session('messageinfo'))

<div class=" col-12 justify-content-center text-center d-inline-flex" id="message">
    <div class="alert alert-warning col-8">
        {{ session('messageinfo') }}
    </div>
</div>
@endif
