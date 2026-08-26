<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\EncuestaController;
use App\Http\Controllers\EncuestadoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NovedadController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\UsuarioController;
use App\Http\Middleware\VerificarSesion;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas públicas
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/registro', [UsuarioController::class, 'create'])->name('usuarios.create');
Route::post('/registro', [UsuarioController::class, 'store'])->name('usuarios.store');

/*
|--------------------------------------------------------------------------
| Rutas privadas (requieren haber iniciado sesión)
|--------------------------------------------------------------------------
*/

Route::middleware('sesion')->group(function () {

    // Punto de entrada tras el login con redirección por Rol
    Route::get('/principal', function () {
        $rol = session('usuario_rol');

        if ($rol === 'encuestado') {
            return redirect()->route('encuestado.mi_puntaje');
        }

        // Carga la vista principal dentro de la carpeta resources/views/home/
        return view('home.principal');
    })->name('principal');

    // ==========================================
    // RUTAS PARA EL ASESOR
    // ==========================================
    Route::middleware([VerificarSesion::class . ':asesor'])->group(function () {

        // Consultar usuario por documento
        Route::get('/consultar', [ConsultaController::class, 'create'])->name('consultas.create');
        Route::post('/consultar', [ConsultaController::class, 'buscar'])->name('consultas.buscar');

        // Editar usuarios
        Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
        Route::get('/usuarios/{id}/editar', [UsuarioController::class, 'edit'])->name('usuarios.edit');
        Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');

        // Crear encuestas
        Route::get('/encuestas/crear', [EncuestaController::class, 'create'])->name('encuestas.create');
        Route::post('/encuestas', [EncuestaController::class, 'store'])->name('encuestas.store');

        // Gestionar novedades
        Route::get('/novedades/crear', [NovedadController::class, 'create'])->name('novedades.create');
        Route::post('/novedades', [NovedadController::class, 'store'])->name('novedades.store');

        // Reportes
        Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes.index');
        Route::get('/reportes/usuarios', [ReporteController::class, 'usuarios'])->name('reportes.usuarios');
        Route::get('/reportes/usuarios/csv', [ReporteController::class, 'usuariosCsv'])->name('reportes.usuarios.csv');
        Route::get('/reportes/encuestas', [ReporteController::class, 'encuestas'])->name('reportes.encuestas');
        Route::get('/reportes/encuestas/csv', [ReporteController::class, 'encuestasCsv'])->name('reportes.encuestas.csv');
        Route::get('/reportes/nucleos', [ReporteController::class, 'nucleos'])->name('reportes.nucleos');
        Route::get('/reportes/nucleos/csv', [ReporteController::class, 'nucleosCsv'])->name('reportes.nucleos.csv');
    });

    // ==========================================
    // RUTA EXCLUSIVA PARA EL ENCUESTADO
    // ==========================================
    Route::middleware([VerificarSesion::class . ':encuestado'])->group(function () {
        Route::get('/mi-puntaje', [EncuestadoController::class, 'miPuntaje'])->name('encuestado.mi_puntaje');
    });




// Consultas
Route::get('/consultar', [ConsultaController::class, 'create'])->name('consultas.create');
Route::post('/consultar', [ConsultaController::class, 'buscar'])->name('consultas.buscar');

// Encuestas
Route::get('/encuestas/crear', [EncuestaController::class, 'create'])->name('encuestas.create');
Route::post('/encuestas/guardar', [EncuestaController::class, 'store'])->name('encuestas.store');



Route::get('/principal', function () {
    $rol = session('usuario_rol');

    // Si es encuestado, muestra su vista de inicio (en vez de redirigir a mi_puntaje)
    if ($rol === 'encuestado') {
        return view('encuestado.inicio');
    }

    return view('home.principal');
})->name('principal');

Route::middleware([VerificarSesion::class . ':encuestado'])->group(function () {
    Route::get('/mi-puntaje', [EncuestadoController::class, 'miPuntaje'])->name('encuestado.mi_puntaje');
    
    // Ruta para PQRS
    Route::get('/pqrs', function () {
        return view('encuestado.pqrs');
    })->name('pqrs.index');
});

// Ruta para mostrar el formulario de novedades con el ID del usuario
Route::get('/novedades/crear/{usuario_id?}', [NovedadController::class, 'create'])->name('novedades.crear');

});