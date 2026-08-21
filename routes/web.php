<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\EncuestaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NovedadController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas públicas
|--------------------------------------------------------------------------
*/

// Portada pública -> antes index.php
Route::get('/', [HomeController::class, 'index'])->name('home');

// Inicio de sesión -> antes vista/iniciosesion/frminiciosesion.php + controlador/iniciosesion/iniciosesion.php
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Registro de personas -> antes vista/registrarpersonas/registrarpersonas.php + controlador/registrarpersona/registrarpersona.php
Route::get('/registro', [UsuarioController::class, 'create'])->name('usuarios.create');
Route::post('/registro', [UsuarioController::class, 'store'])->name('usuarios.store');

/*
|--------------------------------------------------------------------------
| Rutas privadas (requieren haber iniciado sesión)
|--------------------------------------------------------------------------
*/

Route::middleware('sesion')->group(function () {

    // Página principal tras iniciar sesión -> antes vista/pgprincipal/pgprincipal.php
    Route::get('/principal', [HomeController::class, 'principal'])->name('principal');

    // Consultar usuario por documento -> antes vista/consultarpersona/*.php + controlador/consultarpersonas/consultarpersonas.php
    Route::get('/consultar', [ConsultaController::class, 'create'])->name('consultas.create');
    Route::post('/consultar', [ConsultaController::class, 'buscar'])->name('consultas.buscar');

    // Editar usuarios -> antes vista/editarpersona/editarpersona.php + vista/formeditarpersona/formeditarpersona.php + controlador/editarusuario/editarusuario.php
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/{id}/editar', [UsuarioController::class, 'edit'])->name('usuarios.edit');
    Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');

    // Crear encuestas -> antes vista/crearencuesta/formcrearencuesta.php + controlador/crearencuesta/crearencuesta.php
    Route::get('/encuestas/crear', [EncuestaController::class, 'create'])->name('encuestas.create');
    Route::post('/encuestas', [EncuestaController::class, 'store'])->name('encuestas.store');

    // Gestionar novedades -> antes vista/gestionarnovedades/formgestionarnovedades.php
    Route::get('/novedades/crear', [NovedadController::class, 'create'])->name('novedades.create');
    Route::post('/novedades', [NovedadController::class, 'store'])->name('novedades.store');

    // Reportes -> antes vista/reportessigo/reportesfinales.php + carpeta informes/
    Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes.index');
    Route::get('/reportes/usuarios', [ReporteController::class, 'usuarios'])->name('reportes.usuarios');
    Route::get('/reportes/usuarios/csv', [ReporteController::class, 'usuariosCsv'])->name('reportes.usuarios.csv');
    Route::get('/reportes/encuestas', [ReporteController::class, 'encuestas'])->name('reportes.encuestas');
    Route::get('/reportes/encuestas/csv', [ReporteController::class, 'encuestasCsv'])->name('reportes.encuestas.csv');
    Route::get('/reportes/nucleos', [ReporteController::class, 'nucleos'])->name('reportes.nucleos');
    Route::get('/reportes/nucleos/csv', [ReporteController::class, 'nucleosCsv'])->name('reportes.nucleos.csv');
});
