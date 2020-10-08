<!-- Form Input Reference -->
<div class="form-group row {{ $errors->has('ref') ? ' has-danger' : '' }}">
    <label class="col-md-3 form-control-label text-md-right" for="input-name">{{ __('Ref') }}</label>
    <div class="col-md-9">
        <input type="text" name="ref" id="input-ref" class="form-control form-control-sm{{ $errors->has('ref') ? ' is-invalid' : '' }}" placeholder="{{ __('001') }}" value="{{ old('ref') }}"  autofocus>

        @if ($errors->has('ref'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('ref') }}</strong>
        </span>
        @endif
    </div>
</div>


<!-- Form Input Name -->
<div class="form-group row {{ $errors->has('name') ? ' has-danger' : '' }}">
    <label class="col-md-3 form-control-label text-md-right" for="input-name">{{ __('Nom') }}</label>
    <div class="col-md-9">
        <input type="text" name="name" id="input-name" class="form-control form-control-sm{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('YAO') }}" value="{{ old('name') }}"  {{--autofocus--}}>

        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
        @endif
    </div>
</div>

<!-- Form Input Surname -->
<div class="form-group row {{ $errors->has('surname') ? ' has-danger' : '' }}">
    <label class="col-md-3 form-control-label text-md-right" for="input-name">{{ __('Prénom') }}</label>



    <div class="col-md-9">
        <input type="text" name="surname" id="input-surname" class="form-control form-control-sm{{ $errors->has('surname') ? ' is-invalid' : '' }}" placeholder="{{ __('ALAIN') }}" value="{{ old('surname') }}"  {{--autofocus--}}>

        @if ($errors->has('surname'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('surname') }}</strong>
        </span>
        @endif
    </div>
</div>

<!-- Form Input phone -->
<div class="form-group row {{ $errors->has('phone') ? ' has-danger' : '' }}">
    <label class="col-md-3 form-control-label text-md-right" for="input-name">{{ __('Téléphone') }}</label>
    <div class="col-md-2">
        <select name="indicatif" id="input-indicatif" class="form-control form-control-sm{{ $errors->has('indicatif') ? ' is-invalid' : '' }}"  value="{{ old('indicatif') }}"  autofocus>
            {{-- @if($campagnes->count())--}}
            <option value="+225">+225</option>
            <option value="+33">+33</option>
            <option value="+32">+32</option>

            {{--@foreach ($campagnes as $campagne)
                <option value="{{$campagne->code}}" >{{$campagne->libelle}}</option>
            @endforeach--}}
            {{--  @endif--}}
        </select>
        @if ($errors->has('indicatif'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('indicatif') }}</strong>
        </span>
        @endif
    </div>
    <div class="col-md-7">
        <input type="number" min="0" name="phone" id="input-phone" class="form-control form-control-sm{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="{{ __('05050505') }}" value="{{ old('phone') }}"  {{--autofocus--}}>

        @if ($errors->has('phone'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('phone') }}</strong>
        </span>
        @endif
    </div>
</div>


