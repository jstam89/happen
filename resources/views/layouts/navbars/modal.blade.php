<div class="modal fade" id="OrderModal" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-left" id="searchModalLabel">{{ __('Zoek een order') }}</h4>
            </div>
            <div class="card-body">
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <input type="text" name="name" id="input-name"
                           class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}"
                           placeholder="Zoek op naam"
                           required autofocus>
                </div>
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <input type="text" name="name" id="input-name"
                           class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}"
                           placeholder="Zoek op menu"
                           required autofocus>
                </div>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-secondary">Sluit</button>
                <button type="button" class="btn btn-primary">Zoeken</button>
            </div>
        </div>
    </div>
</div>
