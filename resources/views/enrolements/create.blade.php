{{--for use change your "modelName" ain plural to "marques"--}}
@extends('layouts.app', ['title' => __('CRM LEADERPRICE')])
@section('title', 'Gestion des enrolements | Création')
@section('css')
    {{--<link href="{{ asset('vendor') }}/select2/css/select2.min.css" rel="stylesheet">--}}
@endsection
@section('content')

    @include('layouts.headers.cards')

    @hasanyrole('Admin|Agent')
    <div class="container-fluid mt--7">


        <div class="col-xl-6 order-xl-1 mx-auto">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Nouvel enrôlement') }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('enrolements.index') }}" class="btn btn-sm btn-primary">{{ __('Retour à la liste') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('enrolements.store') }}" autocomplete="off">
                        @csrf

                        {{--<h6 class="heading-small text-muted mb-4">{{ __('Informations de l\'utilisateur') }}</h6>--}}
                        <div class="pl-lg-4">
                            @include('enrolements.partials._form')

                            @can('add_enrolements')
                                <div class="text-right">
                                    <button type="submit" class="btn btn-success mt-1">{{ __('Enregistrer') }}</button>
                                </div>
                            @endcan
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @else
            @include('error-permission')
            @endhasanyrole

            @include('layouts.footers.auth')
    </div>
@endsection

@section('script')
    {{--<script src="{{ asset('vendor') }}/select2/js/select2.min.js"></script>--}}

    <script type="text/javascript">
        $(document).ready(function(){

            $('#input-ref').focus();
        });
    </script>
@endsection
