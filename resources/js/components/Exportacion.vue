<template>
    <span>
        <button type="button" class="btn btn-success btn-xs">
        <i class="fa fa-file-excel-o"></i>
        Descargar Excel
        </button>
        <!-- ./Descargar excel -->

        <!-- Descargar PDF -->
        <button type="button" :disabled="pdf.download" class="btn btn-danger btn-xs" @click="startDownloadPDF()">
            <span v-if="pdf.download">
                <i class="fa fa-refresh fa-spin"></i>
                Espere Por Favor...
            </span>
            <span v-if="!pdf.download">
                <i class="fa fa-file-pdf-o"></i>        
                Descargar PDF
            </span>
        </button>
    </span>
</template>

<script>
    import axios from 'axios'
    export default {
        props:['query'],
        mounted() {
            console.log('Exportación a Excel y PDF Montada!');
        },
        data(){
            return {
                response:[],
                excel: {
                    download: false,
                    error: false,
                    error_message: false,
                    snackbar: false
                },
                pdf: {
                    download: false,
                    error: false,
                    error_message: false,
                    snackbar: false
                },
                apigw: process.env.SIEP_API_GW_INGRESS || 'http://localhost:7777',
            }
        },
        watch:{
            page: function() {
                this.query.page = this.page;
                this.getData();
            },
            query: {
                handler() {
                // Cada vez que cambia la query, retorno a la primer pagina
                this.page = 1;
                this.getData();
                },
                deep: true
            }
        },
        methods:{
            startDownloadExcel() {
                let vm = this;
                vm.excel.download = true;
                vm.excel.error= false;

                let download = JSON.parse(JSON.stringify(query));
                download.export = 1;
                download.por_pagina = 'all';
                download.estado_inscripcion = 'NO CONFIRMADA';

                axios.get(vm.apigw+'/api/public/siep_admin/v1/matriculas/v1/matriculas_por_seccion',{
                    params: download,
                    responseType: 'blob'
                })
                .then(function (response) {
                    vm.excel.download= false;
                    vm.excel.error= false;

                    // Descarga EXCEL con AJAX (permite crear loading)
                    const url = window.URL.createObjectURL(new Blob([response.data]));
                    const link = document.createElement('a');
                    link.href = url;
                    link.setAttribute('download', 'Matriculas_cuantitativas_por_seccion.xls');
                    document.body.appendChild(link);
                link.click();
                })
                .catch(function (error) {
                    vm.excel.download= false;
                    vm.excel.error= true;
                    vm.excel.error_message= error.message;
                    vm.excel.snackbar = true;
                });
            },
            startDownloadPDF() {
                let vm = this;
                vm.pdf.download = true;
                vm.pdf.error= false;
                let download = JSON.parse(JSON.stringify(this.query));
                download.export = 2;
                download.por_pagina = 'all';

                axios.get(vm.apigw+'/api/public/siep_admin/v1/matriculas/v1/matriculas_por_seccion',{
                    params: download,
                    responseType: 'blob'
                }).then(function (response) {
                    vm.pdf.download= false;
                    vm.pdf.error= false;

                    // Descarga EXCEL con AJAX (permite crear loading)
                    const url = window.URL.createObjectURL(new Blob([response.data]));
                    const link = document.createElement('a');
                    link.href = url;
                    link.setAttribute('download', 'ddjj__secciones.pdf');
                    document.body.appendChild(link);
                    link.click();
                })
                .catch(function (error) {
                    vm.pdf.download= false;
                    vm.pdf.error= true;
                    vm.pdf.error_message= error.message;
                    vm.pdf.snackbar = true;
                });
            },
        }
    }
</script>
