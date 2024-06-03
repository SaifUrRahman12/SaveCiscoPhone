@if (session()->has('success'))

    <div class="alert alert-dismissable alert-info">
        <strong>
            {!! session()->get('success') !!}
        </strong>

        <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

@endif
