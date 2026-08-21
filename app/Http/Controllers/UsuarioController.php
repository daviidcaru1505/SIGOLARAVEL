<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Formulario de registro.
     * Reemplaza a vista/registrarpersonas/registrarpersonas.php
     */
    public function create()
    {
        return view('usuarios.registrar');
    }

    /**
     * Guarda un nuevo usuario.
     * Reemplaza a controlador/registrarpersona/registrarpersona.php
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'idrol' => 'required|integer',
            'nombre' => 'required|string|max:45',
            'apellido' => 'required|string|max:45',
            'telefono' => 'required|string|max:45',
            'dire' => 'required|string|max:45',
            'correo' => 'required|email|max:45',
            'contrasena' => 'required|string|min:4',
            'tipodoc' => 'required|string',
            'numdocumento' => 'required|string|max:10',
        ]);

        Usuario::create([
            'idRol' => $datos['idrol'],
            'Tipo' => $datos['idrol'] == 1 ? 'Asesor' : 'Encuestado',
            'TipoDocumento' => $datos['tipodoc'],
            'NumDocumento' => $datos['numdocumento'],
            'Nombre' => $datos['nombre'],
            'Apellido' => $datos['apellido'],
            'Telefono' => $datos['telefono'],
            'Correo' => $datos['correo'],
            'Direccion' => $datos['dire'],
            'Estado' => 'Activo',
            'Contrasena' => Hash::make($datos['contrasena']),
        ]);

        return redirect()->route('principal')->with('exito', 'Usuario registrado correctamente.');
    }

    /**
     * Listado de personas registradas (con enlace a editar).
     * Reemplaza a vista/editarpersona/editarpersona.php
     */
    public function index()
    {
        $usuarios = Usuario::orderBy('Nombre')->get();

        return view('usuarios.listado', compact('usuarios'));
    }

    /**
     * Formulario de edición de un usuario.
     * Reemplaza a vista/formeditarpersona/formeditarpersona.php
     */
    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);

        return view('usuarios.editar', compact('usuario'));
    }

    /**
     * Actualiza un usuario existente.
     * Reemplaza a controlador/editarusuario/editarusuario.php
     */
    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        $datos = $request->validate([
            'idrol' => 'required|integer',
            'nombre' => 'required|string|max:45',
            'apellido' => 'required|string|max:45',
            'telefono' => 'required|string|max:45',
            'dire' => 'required|string|max:45',
            'correo' => 'required|email|max:45',
            'contrasena' => 'nullable|string|min:4',
            'tipodoc' => 'required|string',
        ]);

        $usuario->idRol = $datos['idrol'];
        $usuario->TipoDocumento = $datos['tipodoc'];
        $usuario->Nombre = $datos['nombre'];
        $usuario->Apellido = $datos['apellido'];
        $usuario->Telefono = $datos['telefono'];
        $usuario->Correo = $datos['correo'];
        $usuario->Direccion = $datos['dire'];
        $usuario->Estado = 'Activo';

        if (!empty($datos['contrasena'])) {
            $usuario->Contrasena = Hash::make($datos['contrasena']);
        }

        $usuario->save();

        return redirect()->route('usuarios.index')->with('exito', 'Datos actualizados correctamente.');
    }
}
