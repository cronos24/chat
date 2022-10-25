<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                CHAT EN VIVO
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <strong>Integrantes:</strong> 
                        <ul class="fa-ul">
                            <li> <i class="fa-li fa fa-check"></i>Katherin Vera Osma</li>
                            <li> <i class="fa-li fa fa-check"></i>Miguel Angel Niño</li>
                            <li> <i class="fa-li fa fa-check"></i>Erick Dayan Martínez Gómez</li>
                        </ul>
                        <br>
                        <p>
                            <strong>Tecnologias</strong>
                            <ul class="fa-ul">
                                <li> <i class="fa-li fab fa-laravel"></i> <a href="https://laravel.com/docs/9.x"> Laravel 9</a> </li>
                                <li> <i class="fa-li fab fa-vuejs"></i> <a href="https://vuejs.org/guide/introduction.html"> Vue 3</a></li>
                                <li> <i class="fa-li fab fa-bootstrap"></i> <a href="https://getbootstrap.com/docs/5.0/getting-started/introduction/"> Bootstrap 5</a></li>
                                <li> <i class="fa-li far fa-flag"></i> <a href="https://fontawesome.com/v5/search"> Fontawesome 5</a></li>
                                <li> <i class="fa-li fab fa-php"></i> <a href="https://www.php.net/manual/es/intro-whatis.php"> PHP 8</a></li>
                                <li> <i class="fa-li fab fa-js"></i> <a href="https://www.javascript.com/"> JavaScript </a></li>
                            </ul>
                        </p>
                        <br>
                        <p>
                            <strong>Descripción</strong>
                        </p>
                        <p class="text-justify">
                            El proyecto consiste en crear un chat web online, abordando temas tratados en clase tales como programación orientada a objetos(POO), polimorfismo, herencia, estructura de datos, diagramas uml,  entre otros. También se realizo una ardua investigación para poder trabajar el tema online usando websockets; con ello logramos emitir eventos en el lado del servidor (Laravel) y escucharlos permanentemente del lado del cliente (Vue Js) de esta forma logrando una comunicación 100% en línea entre las dos partes.
                        </p>
                        <p class="text-justify">
                            Si bien el uso de websockets es el plus de esta app cabe también recalcar que los mensajes funcionan gracias a un pequeño CRUD programado dentro del backend (Laravel) el cual permite emitir eventos con resultados acordes a lo solicitado por el frontend (Vue JS). Se manejo un sistema de usuarios basico, con un registro sencillo con login y logout con sus respectivas validaciones y middleware.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
