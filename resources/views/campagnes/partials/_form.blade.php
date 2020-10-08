<div class="form-group row {{ $errors->has('name') ? ' has-danger' : '' }}">
    <label class="col-md-3 form-control-label text-md-right" for="input-ref">{{ __('Campagne') }}</label>
    <div class="col-md-9" align="left">
        <input type="text"  name="name" id="input-name" class="form-control form-control-md{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Entrer une campagne') }}" value="{{ old('name') }}"  autofocus>

        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
        @endif
    </div>
</div>


{{--<div class="form-group row {{ $errors->has('lnumero') ? ' has-danger' : '' }}">
    <label class="col-md-3 form-control-label text-md-right" for="input-ref">{{ __('Liste numéro') }}</label>
    <div class="col-md-9">
        <select class="lnumero" name="states[]" multiple="multiple">
            <option value="AL">Alabama</option>
            <option value="WY">Wyoming</option>
        </select>

        @if ($errors->has('lnumero'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('lnumero') }}</strong>
        </span>
        @endif
    </div>
</div>--}}

<!-- Form select client -->
<div class="form-group row {{ $errors->has('lnumero') ? ' has-danger' : '' }}">
    <label class="col-md-3 col-form-label-md text-md-right" for="input-lnumero">{{ __('Liste numéro') }}</label>
    <div class="col-md-9">
        <select name="lnumero[]" multiple="multiple" id="input-lnumero" class="form-control form-control-md {{ $errors->has('lnumero') ? ' is-invalid' : '' }}"  {{--value="{{ old('lnumero[]') }}"--}}  autofocus>
            @if($enrolements->count())
                {{--<option value="">-- Selectionner le numéro --</option>--}}
                @foreach ($enrolements as $enrolement)
                    <option value="{{$enrolement->phone}}" {{--{{ (old("lnumero") == $enrolement ? "selected":"") }}--}} >{{$enrolement->phone}}</option>
                @endforeach
            @endif
            {{--<option value="AL">Alabama</option>
            <option value="WY">Wyoming</option>--}}
        </select>
        @if ($errors->has('lnumero'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('lnumero') }}</strong>
        </span>
        @endif
    </div>
</div>



<div class="form-group row {{ $errors->has('message') ? ' has-danger' : '' }}">
    <label class="col-md-3 form-control-label text-md-right" for="input-message">{{ __('Message') }}</label>
    <div class="col-md-9" align="left">
        <textarea   name="message" rows="5" id="input-message" class="form-control form-control-md{{ $errors->has('message') ? ' is-invalid' : '' }}"  value="{{ old('message') }}"  >
        </textarea>

        @if ($errors->has('message'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('message') }}</strong>
        </span>
        @endif
    </div>

</div>


<div class="form-group row">
    <label class="col-md-3 form-control-label text-md-right" for="input-message">{{ __('') }}</label>
    <div class="col-md-9">
        <span id="remaining">160 caractères restants | </span>
        <span id="messages">| 1 message(s)</span>
    </div>
</div>
