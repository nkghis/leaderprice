@extends('layouts.app', ['title' => __('User Management')])

@section('title', 'Gestion des campagnes')

@section('css')
    <link href="{{ asset('vendor') }}/DataTables/datatables.css" rel="stylesheet">
    <link href="{{ asset('vendor') }}/DataTables/Buttons-1.5.6/css/buttons.dataTables.css" rel="stylesheet">
    {{--<link href="{{ asset('vendor') }}/DataTables/Buttons-1.5.6/css/buttons.dataTables.css"></link>--}}


@endsection


@section('content')
    @include('layouts.headers.cards')


    @role('Admin')
    <div class="container-fluid mt--7">


        <div class="card">

            @include('flash-message')

            <div class="card-header">

                <div class="row">
                    <div class="col-md-4">
                        <h3 class="modal-title">
                            <button type="button" class="btn btn-primary">
                                <strong>{{ str_plural('Enrôlement', $result->count()) }}</strong> <span class="badge badge-danger">{{ $result->count() }}</span>
                            </button>
                            {{--<span class="badge badge-secondary">{{ $result->total() }}
                            </span> {{ str_plural('Utilisateur', $result->count()) }}--}}
                        </h3>
                    </div>
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-4 page-action text-right">
                        @can('add_enrolements')
                            <a href="{{ route('campagnes.create') }}" class="btn btn-primary btn-sm"> <i class="material-icons">open_in_new</i> <b>Nouveau</b></a>
                        @endcan
                    </div>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm" id="data-table">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nom</th>
                            <th>Message</th>
                            <th>Liste numéro</th>
                            <th>Date Création</th>
                            @can('edit_campagnes', 'delete_campagnes')
                                <th class="text-center">Actions</th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($result as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->message }}</td>
                                <td>{{ $item->lnumero }}</td>
                                <td>{{ $item->created_at->toFormattedDateString() }}</td>

                                @can('edit_campagnes', 'delete_campagnes')
                                    <td class="text-center">
                                        @include('campagnes.shared._action', [
                                            'entity' => 'campagnes',
                                            'id' => $item->id
                                        ])
                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                        </tbody>
                    </table>


                </div>
            </div>

        </div>

        @else
            @include('error-permission')
            @endrole
            @include('layouts.footers.auth')
    </div>
@endsection

@section('script')
    <script src="{{ asset('vendor') }}/DataTables/datatables.js"></script>
    <script src="{{ asset('vendor') }}/DataTables/Buttons-1.5.6/js/dataTables.buttons.js"></script>
    <script src="{{ asset('vendor') }}/DataTables/Buttons-1.5.6/js/buttons.html5.js"></script>
    <script src="{{ asset('vendor') }}/DataTables/Buttons-1.5.6/js/buttons.flash.js"></script>
    <script src="{{ asset('vendor') }}/DataTables/Buttons-1.5.6/js/buttons.print.js"></script>
    <script src="{{ asset('vendor') }}/DataTables/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>--}}


    <script>
        $(document).ready(function() {
            $('#data-table').DataTable({

                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                },

                dom: 'Bfrtip',
                buttons: [
                    {
                        extend : 'excel',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4 ]
                        }
                    }
                ],

                "order": [[ 0, 'desc' ]]


            });
        } );
    </script>


    {{--   DataTable Server Side--}}
    {{--<script>

        $(document).ready( function () {
            var table = $('#data-table').DataTable({

                "sAjaxSource": "{{ route('user.list') }}",
                "sAjaxDataProp": "",
                "order": [ 0, "desc" ],
                "aoColumnDefs": [

                ],
                "aoColumns": [

                    { "mData": "id"},
                    { "mData": "name" },
                    { "mData": "email" },


                    {
                        "mData": null,
                        "bSortable": false,
                        "mRender": function(data, type, full) {
                            return '<div class="dropdown">'+
                                '                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+
                                '                          <i class="fas fa-ellipsis-v"></i>'+
                                '                        </a>'+
                                '                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">'+
                                '                          <a class="dropdown-item" href=/admin/livraisons/distributions/'+ full.id+'>'+'Enlever'+'</a>'+
                                '                        </div>'
                        }
                    }
                ],


                language: {
                    /*url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/French.json'*/
                    sProcessing: "Traitement en cours...",
                    sSearch: "Rechercher&nbsp;:",
                    sLengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments",
                    sInfo: "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                    sInfoEmpty: "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
                    sInfoFiltered: "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                    sInfoPostFix: "",
                    sLoadingRecords: "Chargement en cours...",
                    sZeroRecords: "Aucun &eacute;l&eacute;ment &agrave; afficher",
                    sEmptyTable: "Aucune donn&eacute;e disponible dans le tableau",
                    oPaginate: {
                        sFirst: "Premier",
                        sPrevious: "Pr&eacute;c&eacute;dent",
                        sNext: "Suivant",
                        sLast: "Dernier"
                    },
                    oAria: {
                        sSortAscending: ": activer pour trier la colonne par ordre croissant",
                        sSortDescending: ": activer pour trier la colonne par ordre d&eacute;croissant"
                    }
                },


            })
        });





    </script>--}}
@endsection
