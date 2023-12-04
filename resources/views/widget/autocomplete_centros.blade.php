<select class="form-control autocomplete-centros" name="{{ $name }}"></select>

@section('endjs')
    <script>
        $(function () {
            $('.autocomplete-centros').select2({
                ajax: {
                    language: "es",
                    url: "http://localhost:7777/api/v1/centros",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            nombre: params.term
                        };
                    },
                    processResults: function (response, params) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                },
                placeholder: 'Ingresar nombre del centro',
                templateResult: formatResult,
                templateSelection: formatSelection
            });
        });

        function formatResult (repo) {
            if (repo.loading) {
                return repo.nombre;
            }

            var $container = $(
                    "<div class='select2-result-centro clearfix'>" +
                    "<div class='select2-result-centro__nombre'></div>" +
                    "<div class='select2-result-centro__nivel'><i class='fa fa-user'></i> </div>" +
                    "<div class='select2-result-centro__ciudad'><i class='fa fa-place'></i> </div>" +
                    "</div>" +
                    "</div>" +
                    "</div>"
            );

            $container.find(".select2-result-centro__nombre").text(repo.nombre);
            $container.find(".select2-result-centro__ciudad").text(repo.ciudad.nombre);
            $container.find(".select2-result-centro__nivel").append(repo.nivel_servicio);

            return $container;
        }

        function formatSelection (item,container) {
            $(container).css("color", '#000');

            return item.nombre;
        }
    </script>
@append