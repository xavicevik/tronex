<template>
    <AppLayout title="Dispositivos">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Lista de Dispositivos
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
                                    Buscar Dispositivos
                                </h1>
                            </div>
                            <div v-if="$can('ventas-create')" class="pr-2 w-1/3 text-center">
                                <Link :href="route('ventas.create')" class="bg-blue-500 text-xs  hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ">Nuevo Dispositivo</Link>
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
                                                Nombre
                                            </label>
                                        </div>
                                    </div>
                                    <div class="grid xl:grid-cols-2 xl:gap-6">
                                        <div class="relative z-0 w-full mb-4 group">
                                            <input type="text" v-model="form.vendedor" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                            <label class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                                Serial
                                            </label>
                                        </div>
                                        <div class="relative z-0 w-full mb-4 group">
                                            <input type="text" v-model="form.puntoventa" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                            <label class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                                Modelo
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
                                        Nombre
                                    </th>
                                    <th class="px-4 py-2 text-sm font-bold w-2/12 hover:bg-blue-500 hover:text-gray-50 rounded-b">
                                        Modelo
                                    </th>
                                    <th class="px-4 py-2 text-sm font-bold w-2/12 hover:bg-blue-500 hover:text-gray-50 rounded-b">
                                        Serial
                                    </th>
                                    <th class="px-4 py-2 text-sm font-bold w-2/12 hover:bg-blue-500 hover:text-gray-50 rounded-b">
                                        Thing name
                                    </th>
                                    <th class="px-4 py-2 text-sm font-bold w-2/12 hover:bg-blue-500 hover:text-gray-50 rounded-b">
                                        Estado
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr :class="dato.id === selectedRow ? 'bg-blue-200' : ''"  class="text-center hover:bg-blue-400" @click="rowSelect(dato.id); getDetalles(dato.id)" text-sm v-if="existedata > 0" v-for="(dato, id) in arrayData.data" :key="dato.id">
                                    <td class="border px-1 py-2 text-sm truncate" v-text="dato.id"></td>
                                    <td class="border px-1 py-2 text-sm truncate" v-text="dato.nombre"></td>
                                    <td class="border px-1 py-2 text-sm truncate" v-text="dato.serial"></td>
                                    <td class="border px-1 py-2 text-sm truncate" v-text="dato.modelo"></td>
                                    <td class="border px-1 py-2 text-sm truncate" v-text="dato.thingname"></td>
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
                                        <h2 v-text="tituloModal" class="text-sm font-bold text-gray-900 px-4 py-4"></h2>
                                    </div>
                                    <form>
                                        <div class="bg-white px-4 pt-2 pb-4 sm:p-6 sm:pb-4">
                                            <div class="">
                                                <section>
                                                    <div class="my-2 grid pb-4 grid-cols-1 gap-y-6 sm:grid-cols-3 sm:gap-x-4">
                                                        <div>
                                                            <label class="block text-sm font-medium text-gray-700">Nombre</label>
                                                            <div class="mt-1">
                                                                <input type="text" :disabled="verMode" :class="{'bg-blue-100' : verMode}" v-model="detalle.nombre" autocomplete="given-name" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                                <div v-if="$page.props.errors.nombre" class="text-red-500">{{ $page.props.errors.nombre }}</div>
                                                            </div>
                                                        </div>

                                                        <div>
                                                            <label class="block text-sm font-medium text-gray-700">Modelo</label>
                                                            <div class="mt-1">
                                                                <input type="text" :disabled="verMode" :class="{'bg-blue-100' : verMode}" v-model="detalle.modelo" autocomplete="family-name" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                                <div v-if="$page.props.errors.apellido" class="text-red-500">{{ $page.props.errors.apellido }}</div>
                                                            </div>
                                                        </div>

                                                        <div>
                                                            <label class="block text-sm font-medium text-gray-700">Serial</label>
                                                            <div class="mt-1">
                                                                <input type="text" :disabled="verMode" :class="{'bg-blue-100' : verMode}" v-model="detalle.serial" autocomplete="street-address" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                                <div v-if="$page.props.errors.correo" class="text-red-500">{{ $page.props.errors.correo }}</div>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <label class="block text-sm font-medium text-gray-700">Thing Name</label>
                                                            <div class="mt-1">
                                                                <input type="text" :disabled="verMode" :class="{'bg-blue-100' : verMode}" v-model="detalle.thingname" autocomplete="street-address" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                                <div v-if="$page.props.errors.movil" class="text-red-500">{{ $page.props.errors.movil }}</div>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <label class="block text-sm font-medium text-gray-700">Disponibilidad</label>
                                                            <div v-if="detalle.disponibilidad" class="mt-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.636 18.364a9 9 0 010-12.728m12.728 0a9 9 0 010 12.728m-9.9-2.829a5 5 0 010-7.07m7.072 0a5 5 0 010 7.07M13 12a1 1 0 11-2 0 1 1 0 012 0z" />
                                                                </svg>
                                                            </div>
                                                            <div v-else class="mt-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 5.636a9 9 0 010 12.728m0 0l-2.829-2.829m2.829 2.829L21 21M15.536 8.464a5 5 0 010 7.072m0 0l-2.829-2.829m-4.243 2.829a4.978 4.978 0 01-1.414-2.83m-1.414 5.658a9 9 0 01-2.167-9.238m7.824 2.167a1 1 0 111.414 1.414m-1.414-1.414L3 3m8.293 8.293l1.414 1.414" />
                                                                </svg>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <label class="block text-sm font-medium text-gray-700">Estado</label>
                                                            <div v-if="detalle.estado" class="mt-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                                                </svg>
                                                            </div>
                                                            <div v-else class="mt-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex w-full border-t-2 border-gray-300">
                                                        <div class="w-1/2">
                                                            <div class="m-2 px-1">
                                                                <label class="block text-gray-700 text-sm font-bold mb-2">GPIO02</label>
                                                                <div class="mx-auto self-center">
                                                                    <Toggle v-model="detalle.GPIO02" @click="changePort(this.value)"/>
                                                                </div>
                                                            </div>
                                                            <div class="m-2 px-1">
                                                                <label class="block text-gray-700 text-sm font-bold mb-2">GPIO03</label>
                                                                <div class="mx-auto self-center">
                                                                    <Toggle v-model="detalle.GPIO03" @click="changePort(this.value)"/>
                                                                </div>
                                                            </div>
                                                            <div class="m-2 px-1">
                                                                <label class="block text-gray-700 text-sm font-bold mb-2">GPIO04</label>
                                                                <div class="mx-auto self-center">
                                                                    <Toggle v-model="detalle.GPIO04" @click="changePort(this.value)"/>
                                                                </div>
                                                            </div>
                                                            <div class="m-2 px-1">
                                                                <label class="block text-gray-700 text-sm font-bold mb-2">GPIO05</label>
                                                                <div class="mx-auto self-center">
                                                                    <Toggle v-model="detalle.GPIO05" @click="changePort(this.value)"/>
                                                                </div>
                                                            </div>
                                                            <div class="m-2 px-1">
                                                                <label class="block text-gray-700 text-sm font-bold mb-2">GPIO06</label>
                                                                <div class="mx-auto self-center">
                                                                    <Toggle v-model="detalle.GPIO06" @click="changePort(this.value)"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="border-t-2 w-1/2">
                                                            <div class="m-2 px-1">
                                                                <label class="block text-gray-700 text-sm font-bold mb-2">GPIO07</label>
                                                                <div class="mx-auto self-center">
                                                                    <Toggle v-model="detalle.GPIO07" @click="changePort(this.value)"/>
                                                                </div>
                                                            </div>
                                                            <div class="m-2 px-1">
                                                                <label class="block text-gray-700 text-sm font-bold mb-2">GPIO08</label>
                                                                <div class="mx-auto self-center">
                                                                    <Toggle v-model="detalle.GPIO08" @click="changePort(this.value)"/>
                                                                </div>
                                                            </div>
                                                            <div class="m-2 px-1">
                                                                <label class="block text-gray-700 text-sm font-bold mb-2">GPIO09</label>
                                                                <div class="mx-auto self-center">
                                                                    <Toggle v-model="detalle.GPIO09" @click="changePort(this.value)"/>
                                                                </div>
                                                            </div>
                                                            <div class="m-2 px-1">
                                                                <label class="block text-gray-700 text-sm font-bold mb-2">GPIO10</label>
                                                                <div class="mx-auto self-center">
                                                                    <Toggle v-model="detalle.GPIO10" @click="changePort(this.value)"/>
                                                                </div>
                                                            </div>
                                                            <div class="m-2 px-1">
                                                                <label class="block text-gray-700 text-sm font-bold mb-2">GPIO11</label>
                                                                <div class="mx-auto self-center">
                                                                    <Toggle v-model="detalle.GPIO11" @click="changePort(this.value)"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="border-t-2 w-1/2">
                                                            <div class="m-2 px-1">
                                                                <label class="block text-gray-700 text-sm font-bold mb-2">GPIO12</label>
                                                                <div class="mx-auto self-center">
                                                                    <Toggle v-model="detalle.GPIO12" @click="changePort(this.value)"/>
                                                                </div>
                                                            </div>
                                                            <div class="m-2 px-1">
                                                                <label class="block text-gray-700 text-sm font-bold mb-2">GPIO13</label>
                                                                <div class="mx-auto self-center">
                                                                    <Toggle v-model="detalle.GPIO13" @click="changePort(this.value)"/>
                                                                </div>
                                                            </div>
                                                            <div class="m-2 px-1">
                                                                <label class="block text-gray-700 text-sm font-bold mb-2">GPIO14</label>
                                                                <div class="mx-auto self-center">
                                                                    <Toggle v-model="detalle.GPIO14" @click="changePort(this.value)"/>
                                                                </div>
                                                            </div>
                                                            <div class="m-2 px-1">
                                                                <label class="block text-gray-700 text-sm font-bold mb-2">GPIO15</label>
                                                                <div class="mx-auto self-center">
                                                                    <Toggle v-model="detalle.GPIO15" @click="changePort(this.value)"/>
                                                                </div>
                                                            </div>
                                                            <div class="m-2 px-1">
                                                                <label class="block text-gray-700 text-sm font-bold mb-2">GPIO16</label>
                                                                <div class="mx-auto self-center">
                                                                    <Toggle v-model="detalle.GPIO16" @click="changePort(this.value)"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="border-t-2 w-1/2">
                                                            <div class="m-2 px-1">
                                                                <label class="block text-gray-700 text-sm font-bold mb-2">GPIO17</label>
                                                                <div class="mx-auto self-center">
                                                                    <Toggle v-model="detalle.GPIO17" @click="changePort(this.value)"/>
                                                                </div>
                                                            </div>
                                                            <div class="m-2 px-1">
                                                                <label class="block text-gray-700 text-sm font-bold mb-2">GPIO18</label>
                                                                <div class="mx-auto self-center">
                                                                    <Toggle v-model="detalle.GPIO18" @click="changePort(this.value)"/>
                                                                </div>
                                                            </div>
                                                            <div class="m-2 px-1">
                                                                <label class="block text-gray-700 text-sm font-bold mb-2">GPIO19</label>
                                                                <div class="mx-auto self-center">
                                                                    <Toggle v-model="detalle.GPIO19" @click="changePort(this.value)"/>
                                                                </div>
                                                            </div>
                                                            <div class="m-2 px-1">
                                                                <label class="block text-gray-700 text-sm font-bold mb-2">GPIO20</label>
                                                                <div class="mx-auto self-center">
                                                                    <Toggle v-model="detalle.GPIO20" @click="changePort(this.value)"/>
                                                                </div>
                                                            </div>
                                                            <div class="m-2 px-1">
                                                                <label class="block text-gray-700 text-sm font-bold mb-2">GPIO21</label>
                                                                <div class="mx-auto self-center">
                                                                    <Toggle v-model="detalle.GPIO21" @click="changePort(this.value)"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="border-t-2 w-1/2">
                                                            <div class="m-2 px-1">
                                                                <label class="block text-gray-700 text-sm font-bold mb-2">GPIO22</label>
                                                                <div class="mx-auto self-center">
                                                                    <Toggle v-model="detalle.GPIO22" @click="changePort(this.value)"/>
                                                                </div>
                                                            </div>
                                                            <div class="m-2 px-1">
                                                                <label class="block text-gray-700 text-sm font-bold mb-2">GPIO23</label>
                                                                <div class="mx-auto self-center">
                                                                    <Toggle v-model="detalle.GPIO23" @click="changePort(this.value)"/>
                                                                </div>
                                                            </div>
                                                            <div class="m-2 px-1">
                                                                <label class="block text-gray-700 text-sm font-bold mb-2">GPIO24</label>
                                                                <div class="mx-auto self-center">
                                                                    <Toggle v-model="detalle.GPIO24" @click="changePort(this.value)"/>
                                                                </div>
                                                            </div>
                                                            <div class="m-2 px-1">
                                                                <label class="block text-gray-700 text-sm font-bold mb-2">GPIO25</label>
                                                                <div class="mx-auto self-center">
                                                                    <Toggle v-model="detalle.GPIO25" @click="changePort(this.value)"/>
                                                                </div>
                                                            </div>
                                                            <div class="m-2 px-1">
                                                                <label class="block text-gray-700 text-sm font-bold mb-2">GPIO26</label>
                                                                <div class="mx-auto self-center">
                                                                    <Toggle v-model="detalle.GPIO26" @click="changePort(this.value)"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                            </div>
                                        </div>
                                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                              <button v-show="newMode" @click="save(form)" wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5" >
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
            ispage: true,
            tituloModal: '',
            arrayData: {
                data: [],
                links: []
            },
            arrayDetalles: {
                data: [],
                links: []
            },
            detalle: [],
            editMode: false,
            form: {
                venta: null,
                cliente: null,
                vendedor: null,
                comprobante: null,
                puntoventa: null,
                rifa: null,
                fechainicio: null,
                fechafin: null
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
        getState: function (data) {
            const i = setInterval(() => {
                axios.get('/dispositivos/getState?thingname='+ data
                ).then((res) => {
                    this.state = res.data.data;
                    console.log(99);
                });
                if (!this.isOpen) {
                    console.log(88);
                    clearInterval(i);
                }
            }, (2000));
        },
        getStatePorts: function (id) {
            const i = setInterval(() => {
                var url= '/dispositivos/'+id;
                axios.get(url
                ).then((res) => {
                    var respuesta = res.data;
                    this.detalle = respuesta.data;
                    console.log(44);
                    if (!this.isOpen) {
                        console.log(66);
                        clearInterval(i);
                    }
                });
            }, (5000));
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
        //this.openModal('registrar')
    },
    mounted() {
        console.log('Component mounted.');
    },
}
</script>
