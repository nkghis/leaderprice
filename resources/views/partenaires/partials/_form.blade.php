<!-- Form Input Reference -->
<div class="form-group row {{ $errors->has('enrolement_ref') ? ' has-danger' : '' }}">
    <label class="col-md-3 form-control-label text-md-right" for="input-name">{{ __('Référence') }}</label>
    <div class="col-md-9">
        <input type="text" name="enrolement_ref" id="input-refa" class="form-control form-control-sm{{ $errors->has('enrolement_ref') ? ' is-invalid' : '' }}" placeholder="{{ __('001') }}" value="{{ old('enrolement_ref') }}"  autofocus>

        @if ($errors->has('enrolement_ref'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('enrolement_ref') }}</strong>
        </span>
        @endif
    </div>
</div>


<!-- Form Input montant -->
<div class="form-group row {{ $errors->has('montant') ? ' has-danger' : '' }}">
    <label class="col-md-3 form-control-label text-md-right" for="input-name">{{ __('Montant') }}</label>
    <div class="col-md-9">
        <input type="number" min="0" name="montant" id="input-montant" class="form-control form-control-sm{{ $errors->has('montant') ? ' is-invalid' : '' }}" placeholder="{{ __('50000') }}" value="{{ old('montant') }}"  {{--autofocus--}}>

        @if ($errors->has('montant'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('montant') }}</strong>
        </span>
        @endif
    </div>
</div>




<!-- Form Input premise -->
<div class="form-group row {{ $errors->has('premise') ? ' has-danger' : '' }}">
    <label class="col-md-3 form-control-label text-md-right" for="input-name">{{ __('Rémise (%)') }}</label>
    <div class="col-md-9">
        <input type="number" min="1" onblur="calculate()" name="premise" id="input-premise" class="form-control form-control-sm{{ $errors->has('premise') ? ' is-invalid' : '' }}" placeholder="{{ __('10') }}" value="{{ old('premise') }}"  {{--autofocus--}}>

        @if ($errors->has('premise'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('premise') }}</strong>
        </span>
        @endif
    </div>
</div>


<!-- Form Input remise -->
<div class="form-group row {{ $errors->has('remise') ? ' has-danger' : '' }}">
    <label class="col-md-3 form-control-label text-md-right" for="input-name">{{ __('Montant rémise') }}</label>
    <div class="col-md-9">
        <input type="number" min="1" name="remise" id="input-remise" class="form-control form-control-sm{{ $errors->has('remise') ? ' is-invalid' : '' }}"{{--" placeholder="{{ __('1000') }}"--}} value="{{ old('remise') }}" disabled  {{--autofocus--}} >

        @if ($errors->has('remise'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('remise') }}</strong>
        </span>
        @endif
    </div>
</div>



