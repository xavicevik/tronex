<template>
    <AppLayout title="Programas">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Lista de Programas
            </h2>
        </template>
        <div class="py-4 lg:px-8 md:px-6 sm:px-2">
            <div class="mx-auto 2xl:8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <!-- Fin Mensajes Flash -->
                    <!-- Encabezado y titulo -->
                    <section>
                        <div class="flex justify-between mx-auto p-4">
                            <div class="w-1/2">
                                <h1 class="font-bold text-xl text-black-800 leading-tight">
                                    Buscar Programas
                                </h1>
                            </div>
                            <div v-if="$can('ventas-list')" class="pr-2 w-1/3 text-center">
                                <a href="#" @click="crearPrograma()" class="bg-blue-500 text-xs  hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ">Nuevo programa</a>
                            </div>
                        </div>


                        <section>
                            <div class="px-4">
                                <form>
                                    <div class="grid xl:grid-cols-2 xl:gap-6">
                                        <div class="relative z-0 w-full mb-4 group">
                                            <input type="text" v-model="form.venta" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                            <label class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                                # ID
                                            </label>
                                        </div>
                                        <div class="relative z-0 w-full mb-4 group">
                                            <input type="text" v-model="form.cliente" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                            <label class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                                Kamara
                                            </label>
                                        </div>
                                    </div>
                                    <div class="grid xl:grid-cols-2 xl:gap-6">
                                        <div class="relative z-0 w-full mb-4 group">
                                            <input type="text" v-model="form.vendedor" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                            <label class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                                Dispositivo
                                            </label>
                                        </div>
                                        <div class="relative z-0 w-full mb-4 group">
                                            <input type="text" v-model="form.puntoventa" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                            <label class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                                Creador
                                            </label>
                                        </div>
                                    </div>
                                    <div class="grid xl:grid-cols-2 xl:gap-6">
                                        <div class="relative z-0 w-full mb-4 group">
                                            <Datepicker v-model="form.fechainicio" autoApply placeholder="Fecha inicio" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"/>
                                        </div>
                                        <div class="relative z-0 w-full mb-4 group">
                                            <Datepicker v-model="form.fechafin" autoApply placeholder="Fecha fin" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"/>
                                        </div>
                                    </div>
                                    <button type="button" @click="getData(form)" class="mx-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Buscar</button>
                                </form>
                            </div>
                        </section>
                    </section>
                    <!-- Fin Encabezado y titulo -->
                    <!-- Tabla de contenido -->
                    <section>
                        <div class="lg:px-4 md:px-2 sm:px-0 py-2 pb-6 overflow-y-auto h-50">
                            <table class="table-fixed w-full">
                                <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2 w-2/12 text-sm font-bold hover:bg-blue-500 hover:text-gray-50 rounded-b">
                                        Id
                                    </th>
                                    <th class="px-4 py-2 w-2/12 text-sm font-bold hover:bg-blue-500 hover:text-gray-50 rounded-b">
                                        Kamara
                                    </th>
                                    <th class="px-4 py-2 text-sm font-bold w-2/12 hover:bg-blue-500 hover:text-gray-50 rounded-b">
                                        Dispositivo
                                    </th>
                                    <th class="px-4 py-2 text-sm font-bold w-2/12 hover:bg-blue-500 hover:text-gray-50 rounded-b">
                                        Usuario
                                    </th>
                                    <th class="px-4 py-2 text-sm font-bold w-2/12 hover:bg-blue-500 hover:text-gray-50 rounded-b">
                                        Creador
                                    </th>
                                    <th class="px-4 py-2 text-sm font-bold w-2/12 hover:bg-blue-500 hover:text-gray-50 rounded-b">
                                        Estado
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr :class="dato.id === selectedRow ? 'bg-blue-200' : ''"  class="text-center hover:bg-blue-400" @click="rowSelect(dato.id); getDetalles(dato.id)" text-sm v-if="existedata > 0" v-for="(dato, id) in arrayData.data" :key="dato.id">
                                    <td class="border px-1 py-2 text-sm truncate" v-text="dato.id"></td>
                                    <td class="border px-1 py-2 text-sm truncate" v-text="dato.kamara.nombre"></td>
                                    <td class="border px-1 py-2 text-sm truncate" v-text="dato.kamara.iddispositivo"></td>
                                    <td class="border px-1 py-2 text-sm truncate" v-text="dato.usuario.nombre"></td>
                                    <td class="border px-1 py-2 text-sm truncate" v-text="dato.creador.nombre"></td>
                                    <td class="border px-2 py-2 text-sm truncate" v-if="dato.estado">
                                        <span class="inline-flex px-2 text-sm font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                            Activo
                                        </span>
                                    </td>
                                    <td class="border px-2 py-2 text-sm" v-else>
                                        <span class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                            Inactivo
                                        </span>
                                    </td>
                                </tr>
                                <tr v-else>
                                    <td class="border px-4 py-2 text-xs text-center" colspan="7"> La consulta no obtuvo datos</td>
                                </tr>
                                </tbody>
                            </table>
                            <section class="mt-6">
                                <div v-if="arrayData.links.length > 3">
                                    <div class="flex flex-wrap -mb-1">
                                        <template v-for="(link, p) in arrayData.links" :key="p">
                                            <div v-if="link.url === null" class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded"
                                                 v-html="link.label" />
                                            <button  v-else
                                                     class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-white focus:border-indigo-500 focus:text-indigo-500"
                                                     :class="{ 'bg-blue-700 text-white': link.active }"
                                                     v-on:click="cambiarPage(link.url)"
                                                     v-html="link.label" />
                                        </template>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </section>
                    <!-- Fin Tabla de contenido -->

                    <!-- Ventana modal Detalles -->
                    <section> <!-- Ventana modal -->
                        <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400" v-if="isOpen">
                            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

                                <div class="fixed inset-0 transition-opacity">
                                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                </div>
                                <!-- This element is to trick the browser into centering the modal contents. -->
                                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
                                <div class="inline-block lg:w-8/12 align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                                    <div class="">
                                        <h2 v-text="tituloModal" class="text-lg font-bold text-gray-900 px-4 py-4"></h2>
                                    </div>

                                    <section class="mx-auto">
                                        <div class="">
                                            <h2 class="text-xl font-bold text-gray-900 px-4 py-2">Crear Programa</h2>
                                        </div>
                                        <div class="py-1 px-4 flex">
                                            <div class="mb-4 w-1/3 px-4">
                                                <label class="block text-gray-700 text-sm font-bold mb-2">Kamara</label>
                                                <select @change="actTipoSerie()" class="bg-blue-50 block w-full rounded-lg text-gray-700 text-sm"  v-model="tiposerie">
                                                    <option v-for="serie in arraySeries" :key="serie.id" :value="serie" v-text="serie.nombre"></option>
                                                </select>
                                            </div>
                                            <div class="mb-4 w-1/3 px-4">
                                                <label class="block text-gray-700 text-sm font-bold mb-2">Dispositivo</label>
                                                <select @change="actTipoSerie()" class="bg-blue-50 block w-full rounded-lg text-gray-700 text-sm"  v-model="tiposerie">
                                                    <option v-for="serie in arraySeries" :key="serie.id" :value="serie" v-text="serie.nombre"></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="flex py-1 px-4">
                                            <div class="mb-4 w-1/3 px-4">
                                                <label class="block text-gray-700 text-sm font-bold mb-2">Usuario</label>
                                                <select @change="actTipoSerie()" class="bg-blue-50 block w-full rounded-lg text-gray-700 text-sm"  v-model="tiposerie">
                                                    <option v-for="serie in arraySeries" :key="serie.id" :value="serie" v-text="serie.nombre"></option>
                                                </select>                                            </div>
                                            <div class="mb-4 w-1/3 px-4">
                                                <label class="block text-gray-700 text-sm font-bold mb-2">Creador</label>
                                                <select @change="actTipoSerie()" class="bg-blue-50 block w-full rounded-lg text-gray-700 text-sm"  v-model="tiposerie">
                                                    <option v-for="serie in arraySeries" :key="serie.id" :value="serie" v-text="serie.nombre"></option>
                                                </select>                                            </div>
                                        </div>

                                    </section>

                                    <form>
                                        <!-- seccion de promocionales -->
                                        <section class="bg-green-200 rounded-md px-8">
                                            <div class="flex py-1 px-2">
                                                <div class="mb-4 w-1/12">
                                                    <label class="block text-gray-700 text-xs font-bold mb-2">ID</label>
                                                    1
                                                </div>
                                                <div class="mb-4 w-3/12">
                                                    <label class="block text-gray-700 text-xs font-bold mb-2">Puerto</label>
                                                    <select v-show="!verMode" @change="actAccion(this)" class="block w-full rounded-lg text-gray-700 text-sm" :disabled="verMode" v-model="programa.puerto">
                                                        <option value="0" >Seleccione puerto</option>
                                                        <option v-for="puerto in arrayPuertos" :key="puerto.nombre" :value="puerto" v-text="puerto.nombre"></option>
                                                    </select>
                                                </div>
                                                <div class="mb-4 w-3/12 px-2">
                                                    <label class="block text-gray-700 text-xs font-bold mb-2">Acción</label>
                                                    <select v-show="!verMode" class="block w-full rounded-lg text-gray-700 text-sm" :disabled="verMode" v-model="programa.accion">
                                                        <option value="0" >Seleccione acción</option>
                                                        <option v-for="accion in arrayAccion" :key="id" :value="accion" v-text="accion.nombre"></option>
                                                    </select>
                                                </div>
                                                <div class="mb-4 w-3/12 px-2">
                                                    <label class="block text-gray-700 text-xs font-bold mb-2">Duración</label>
                                                    <money3 v-model="programa.duracion" v-bind="configMoney2" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></money3>
                                                </div>
                                                <div class="mx-auto w-1/12 px-2 self-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" @click="agregarPrograma()" class="mx-auto h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </section>

                                        <section v-show="1" class="bg-blue-200 rounded-md px-8">
                                            <div v-for="(programa, index) in form.programas" :key="programa.id" class="flex py-1 px-2">
                                                <div class="mb-4 w-1/12">
                                                    {{ programa.id }}
                                                </div>
                                                <div class="mb-4 w-3/12">
                                                    {{ programa.puerto }}
                                                </div>
                                                <div class="mb-4 w-3/12 px-2">
                                                    {{ programa.accion }}
                                                </div>
                                                <div class="mb-4 w-3/12 px-2">
                                                    {{ programa.duracion }}
                                                </div>
                                                <div class="mx-auto w-1/12 px-2 self-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" @click="eliminarPrograma(index)" class="mx-auto h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </div>
                                            </div>

                                        </section>
                                        <!-- Fin de promocionales -->





                                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                              <button @click="save(form)" wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5" >
                                                Guardar
                                              </button>
                                            </span>
                                            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                              <button v-show="editMode" @click="update(form)" wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5" >
                                                Actualizar
                                              </button>
                                            </span>
                                            <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">

                                          <button @click="closeModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                            Cancelar
                                          </button>
                                        </span>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Fin Ventana modal Detalles -->

                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import Swal from "sweetalert2";
import { Icon } from '@iconify/vue';
import Pagination from '@/Components/Pagination';

import Toggle from '@vueform/toggle';
import '@vueform/toggle/themes/default.css';
import Button from "../../Jetstream/Button";

import moment from 'moment'
import { QuillEditor } from '@vueup/vue-quill';
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import { ref, onMounted } from 'vue';
import { Money3Component } from 'v-money3'

import { Inertia } from '@inertiajs/inertia';
import { Head, Link } from '@inertiajs/inertia-vue3';
import JetNavLink from '@/Jetstream/NavLink.vue';
import NavLink from "../../Jetstream/NavLink";
import Submenu from "../../Components/Submenu";


export default {

    components: {
        Submenu,
        Button,
        AppLayout,
        Icon,
        Pagination,
        Toggle,
        QuillEditor,
        money3: Money3Component,
        Link,
    },
    props:{
        data: [],
        errors: Object,
    },
    computed: {
    },
    data() {
        return {
            selectedRow: null,
            configMoney: {
                masked: false,
                prefix: '$ ',
                suffix: '',
                thousands: ',',
                decimal: '.',
                precision: 0,
                disableNegative: false,
                disabled: false,
                min: null,
                max: null,
                allowBlank: false,
                minimumNumberOfCharacters: 0,
            },
            configMoney2: {
                masked: false,
                prefix: '',
                suffix: ' Seg',
                thousands: ',',
                decimal: '.',
                precision: 0,
                disableNegative: true,
                disabled: false,
                min: 0,
                max: null,
                allowBlank: false,
                minimumNumberOfCharacters: 0,
            },
            ispage: true,
            tituloModal: '',
            arrayPuertos: {
                1: {nombre : 'GPIO02'},
                2: {nombre : 'GPIO16'},
                3: {nombre : 'GPIO20'},
                4: {nombre : 'GPIO21'},
                5: {nombre : 'AUDIO1'},
                6: {nombre : 'AUDIO2'},
                7: {nombre : 'Esperar'}
            },
            arrayAccion: [],
            arrayData: {
                data: [],
                links: []
            },
            arrayDetalles: {
                data: [],
                links: []
            },
            programa: {
                id: 0,
                puerto: 0,
                accion: 0,
                duracion: 0
            },
            detalle: [],
            editMode: false,
            form: {
                id: null,
                idkamara: null,
                estado: null,
                idusuario: null,
                idcreador: null,
                pasos: null,
                programas: []
            },
            verMode: false,
            isOpen: false,
            buscar: '',
            sortOrder: 1,
            sortBy: '',
            errornumerosreservados: 0,
            existedata: 0,
            state: []
        }
    },
    methods: {
        cambiarPage: function (url = '') {
            axios.get(url, {
                params: {
                    paginate: true,
                    ispage: true
                }
            }).then((res) => {
                var respuesta = res.data;
                this.arrayData = respuesta.data;

                if (this.arrayData.data.length > 0) {
                    this.existedata = 1;
                } else {
                    this.existedata = 0;
                }
            })
        },
        formatPrice(value) {
            let val = (value/1).toFixed(0).replace('.', ',')
            return '$ '+ val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
        },
        dateTime(value) {
            return moment(value).format('DD/MM/YYYY');
        },
        dateTimeFull(value) {
            return moment(value).format('YYYY-MM-DD HH:MM:SS');
        },
        ver: function (data) {
            this.verMode = true;
            this.openModal('ver', data);
        },
        getData: function (filtros = [], sortBy = 'ventas.id') {
            if (sortBy == this.sortBy){
                this.sortOrder = !this.sortOrder;
            }
            let sortOrderdesc;
            if (this.sortOrder){
                sortOrderdesc = 'asc';
            } else {
                sortOrderdesc = 'desc';
            }
            this.sortBy = sortBy;
            this.ispage = true;

            var url= '/ventas';
            axios.get(url, {
                params: {
                    filtros: filtros,
                    sortBy: this.sortBy,
                    sortOrder: sortOrderdesc,
                    ispage: this.ispage
                }
            }).then((res) => {
                console.log(res);
                var respuesta = res.data;
                this.arrayData = respuesta.data;
            })
        },
        changePort: function (port){
            var url= '/dispositivos/'+ this.detalle.id;
            axios.put(url, this.detalle
            ).then((res) => {
                console.log(res);
                var respuesta = res.data;
                this.detalle = respuesta.data;
                //this.openModal('ver', this.detalle);
            })
        },
        actAccion: function (puerto) {
            if (this.programa.puerto.nombre.substr(0,4) == 'GPIO') {
                this.arrayAccion = {
                    1: {nombre : 'On'},
                    2: {nombre : 'Off'}
                };
            }  else if (this.programa.puerto.nombre.substr(0,4) == 'AUDI') {
                this.arrayAccion = {
                    3: {nombre : 'Play'},
                    4: {nombre : 'Stop'}
                };
            } else {
                this.arrayAccion = {
                    5: {nombre : 'Esperar'}
                };
            }
            this.programa.accion.value = 0;

        },
        save: function (data) {
            console.log(data);
            this.$inertia.post('/programas', data, {
                onBefore: (visit) => { console.log('onBefore');},
                onStart: (visit) => {console.log('onStart');},
                onProgress: (progress) => {console.log('onProgress');},
                onSuccess: (page) => {
                    Swal.fire({
                        //position: 'top-end',
                        icon: 'success',
                        title: 'El programa se ha creado',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    this.reset();
                    this.closeModal();
                    this.arrayData = this.data;
                    this.editMode = false;
                },
                onError: (errors) => {console.log('onError');},
                onCancel: () => {console.log('onCancel');},
                onFinish: visit => {console.log('onFinish');},
            });

        },
        getDetalles: function (id) {
            var url= '/dispositivos/'+id;
            axios.get(url, {
            }).then((res) => {
                var respuesta = res.data;
                this.detalle = respuesta.data;
                this.openModal('ver', this.detalle);
                //this.getStatePorts(id);
            })
        },
        crearPrograma: function() {
            this.isOpen = true;
        },
        eliminarPrograma(index){
            this.form.programas.splice(index, 1);
        },
        agregarPrograma(){
            //if(this.programa.puerto == 0 || this.programa.accion == 0 || this.programa.duracion == 0){
            //}
            //else{
                let id = this.form.programas.length + 1;
                this.form.programas.push({
                    id: id,
                    puerto: this.programa.puerto.nombre,
                    accion: this.programa.accion.nombre,
                    duracion: this.programa.duracion
                });
                this.programa.id = 0;
                this.programa.puerto.nombre = 0;
                this.programa.accion.nombre = 0;
                this.programa.duracion = 0;
            //}
        },
        openModal: function (accion, data = []) {
            this.isOpen = true;

            switch (accion) {
                case 'registrar':
                {
                    this.tituloModal = 'Crear nuevo Usuario';
                    this.form.idpais = 0;
                    this.form.iddepartamento = 0;
                    this.form.idciudad = 0;
                    this.form.idtipos_documento = 0;
                    this.form.idrol = 0;
                    this.form.idempresa = 0;
                    this.getRoles();
                    this.getPaises();
                    this.getCiudades();
                    this.getDepartamentos();
                    this.getTiposdocumento();
                    this.newMode = true;
                    this.verMode = false;
                    this.editMode = false;
                    break;
                }
                case 'ver': {
                    this.tituloModal = 'Ver Dispositivo ' + data['nombre'];
                    this.form.nombre = data['nombre'];
                    this.form.modelo = data['modelo'];
                    this.form.serial = data['serial'];
                    this.form.thingname = data['thingname'];
                    this.newMode = false;
                    this.verMode = true;
                    this.editMode = false;
                   // this.getState(data['thingname']);
                    break;
                }
                case 'actualizar': {
                    this.form.id = data['id'];
                    this.tituloModal = 'Actualizar Usuario ' + data['username'];
                    this.form.idpais = data['idpais'];
                    this.form.iddepartamento = data['iddepartamento'];
                    this.form.idciudad = data['idciudad'];
                    this.form.idtipos_documento = data['idtipos_documento'];
                    this.form.idrol = data['idrol'];
                    this.form.idempresa = data['idempresa'];
                    this.form.nombre = data['nombre'];
                    this.form.apellido = data['apellido'];
                    this.form.correo = data['correo'];
                    this.form.movil = data['movil'];
                    this.form.documento = data['documento'];
                    this.form.username = data['username'];
                    this.form.direccion = data['direccion'];
                    this.form.telefono = data['telefono'];
                    this.getRoles();
                    this.getPaises();
                    this.getCiudades();
                    this.getDepartamentos();
                    this.getTiposdocumento();
                    this.getEmpresas();
                    this.newMode = false;
                    this.verMode = false;
                    this.editMode = true;
                    break;
                    break;
                }

            }
        },
        getUbicaciones: function () {
            axios.get('/ubicaciones/'+id
            ).then((res) => {
                this.arrayEmpresas = res.data.data;
            })
        },
        closeModal: function () {
            this.isOpen = false;
            this.reset();
            this.editMode = false;
            this.verMode  = false;
            this.$page.props.errors = [];
        },
        reset: function () {
            this.tituloModal = 'Crear nuevo rifa de venta';
            this.form.id = null;
            this.form.titulo = null;
            this.form.resolucion = null;
            this.form.estado = false;
            this.form.nombre = null;
            this.form.descripcion = null;
            this.form.nombre_tecnico = null;
            this.form.resumen = null;
            this.form.url = null;
            this.form.idloteria = 0;
            this.form.idpais = 0;
            this.form.iddepartamento = 0;
            this.form.idciudad = 0;
            this.form.cifras = 0;
            this.form.precio = 0;
            this.form.fechainicio = null;
            this.form.fechafin = null;
            this.form.promocional = null;
            this.form.publicar = null;
            this.form.destacada = null;
            this.form.principal = null;
            this.form.urlimagen2 = null;
            this.form.urlimagen1 = null;
            this.form.idterminos = 0;
            this.form.idcreador = 0;
            this.form.files1 = [];
            this.form.files2 = [];
        },
        rowSelect(idx) {
            console.dir(idx)
            this.selectedRow = idx;
        }
    },
    created: function () {
        //this.getPaises();
        this.arrayData = this.data;
        if (this.arrayData.data.length > 0) {
            this.existedata = 1;
        } else {
            this.existedata = 0;
        }
    },
    mounted() {
        console.log('Component mounted.');
    },
}
</script>
