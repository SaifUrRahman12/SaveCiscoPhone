@if (session()->has('errors'))

    <div class="alert alert-dismissable alert-danger">
        <strong>
            {!! session()->get('errors') !!}
        </strong>

        <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

@endif
