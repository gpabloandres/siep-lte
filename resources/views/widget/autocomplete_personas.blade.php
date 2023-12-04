@php
    $widget_id = rand(0,100000);
@endphp
<select id="{{ $widget_id }}" class="form-control autocomplete-personas" name="persona_id" style="width: 300px;"></select>

@section('endcss')
    <style>
        .select2-result-repository{padding-top:4px;padding-bottom:3px}
        .select2-result-repository__avatar img{width:100%;height:auto;border-radius:2px}
        .select2-result-repository__title{color:black;font-weight:700;word-wrap:break-word;line-height:1.1;margin-bottom:4px}
        .select2-result-repository__forks {margin-right:1em}
        .select2-result-repository__forks {display:inline-block;color:#aaa;font-size:11px}
        .select2-result-repository__description{font-size:13px;color:#777;margin-top:4px}
        .select2-results__option--highlighted .select2-result-repository__title{color:white}
        .select2-results__option--highlighted .select2-result-repository__forks,.select2-results__option--highlighted .select2-result-repository__description {color:#c6dcef}
    </style>
@append

@section('endjs')
    <script>
        $(function () {
            $('.autocomplete-personas').select2({
                ajax: {
                    language: "es",
                    url: "http://localhost:7777/api/v1/personas",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            nombres: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function (response, params) {
                        // parse the results into the format expected by Select2
                        // since we are using custom formatting functions we do not need to
                        // alter the remote JSON data, except to indicate that infinite
                        // scrolling can be used
                        params.page = params.page || 1;

                        return {
                            results: response.data,
                            pagination: {
                                more: (params.page * response.per_page) < response.total
                            }
                        };
                    },
                    cache: true
                },
                placeholder: 'Ingresar nombre de persona',
                minimumInputLength: 4,
                templateResult: formatResult,
                templateSelection: formatSelection
            });
        });
        function formatResult (repo) {
            if (repo.loading) {
                return repo.nombre_completo;
            }

            var $container = $(
                    "<div class='select2-result-repository clearfix'>" +
                    "<div class='select2-result-repository__title'></div>" +
                    "<div class='select2-result-repository__description'></div>" +
                    "<div class='select2-result-repository__forks'><i class='fa fa-user'></i> </div>" +
                    "</div>" +
                    "</div>" +
                    "</div>"
            );

            $container.find(".select2-result-repository__title").text(repo.nombre_completo);
            $container.find(".select2-result-repository__description").text(repo.documento_nro);
            $container.find(".select2-result-repository__forks").append(repo.nacionalidad);

            return $container;
        }

        var model_persona_seleccionada = null;

        function formatSelection (persona,container) {
            $(container).css("color", '#000');

            model_persona_seleccionada  = persona;

            return persona.nombre_completo;
        }
    </script>
@append