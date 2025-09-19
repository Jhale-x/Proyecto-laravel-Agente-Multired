@extends('layouts.landing')

@section('title', 'Users')

@section('content')
<div>
    <div class="container-fluid d-flex mx-3 shadow-none border-radius-xl bg-light justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Administrar Usuarios</h1>
    </div>
    <section>
        <div>
            <div>
                <button class="btn mx-3 badge badge-sm bg-gradient-info" data-bs-toggle="modal" data-bs-target="#modalAgregarUsuario">Agregar usuario</button>
            </div>
        <div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Tabla de Usuarios</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Foto</th>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Usuario</th>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Nombre</th>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Apellido</th>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Teléfono</th>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Dirección</th>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Fecha Nacimiento</th>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Roles</th>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Último login</th>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Fecha de registro</th>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td><p class="text-xs text-center font-weight-bold mb-0">{{ $user->id }}</p></td>
                                    <td class="align-middle text-center">
                                        <img src="{{ $user->foto }}" class="avatar avatar-sm me-3 file-center" alt="foto usuario">
                                    </td>
                                    <td><p class="text-xs text-center font-weight-bold mb-0">{{ $user->usuario }}</p></td>
                                    <td><p class="text-xs text-center font-weight-bold mb-0">{{ $user->nombre }}</p></td>
                                    <td><p class="text-xs text-center font-weight-bold mb-0">{{ $user->apellido }}</p></td>
                                    <td><p class="text-xs text-center font-weight-bold mb-0">{{ $user->telefono }}</p></td>
                                    <td><p class="text-xs text-center font-weight-bold mb-0">{{ $user->direccion }}</p></td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{ $user->fecha_nacimiento }}</span>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        @if($user->estado == 1)
                                            <span class="badge badge-sm bg-gradient-success">Activo</span>
                                        @else
                                            <span class="badge badge-sm bg-gradient-secondary">Inactivo</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm bg-gradient-info">{{ strtoupper($user->rol) }}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{ $user->ultimo_login }}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{ $user->fecha_reg }}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <button class="btn badge badge-sm bg-gradient-success" data-bs-toggle="modal" data-bs-target="#modalEditarUsuario{{$user->id}}">Editar</button>
                                        <button class="btn badge badge-sm bg-gradient-danger" data-bs-toggle="modal" data-bs-target="#modalEliminarUsuario{{$user->id}}">Eliminar</button>
                                    </td>
                                </tr>

                                {{-- Modal Editar Usuario --}}
                                <div class="modal fade" id="modalEditarUsuario{{$user->id}}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form method="POST" action="{{ route('users.update', $user->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Editar usuario</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                                </div>
                                                <div class="modal-body">
                                                    {{-- Campos del formulario --}}
                                                    <div class="form-group mb-3">
                                                        <label>DNI</label>
                                                        <input type="text" class="form-control" name="dni" value="{{ $user->dni }}" required>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label>Nombre</label>
                                                        <input type="text" class="form-control" name="nombre" value="{{ $user->nombre }}" required>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label>Apellido</label>
                                                        <input type="text" class="form-control" name="apellido" value="{{ $user->apellido }}" required>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label>Teléfono</label>
                                                        <input type="text" class="form-control" name="telefono" value="{{ $user->telefono }}" required>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label>Dirección</label>
                                                        <input type="text" class="form-control" name="direccion" value="{{ $user->direccion }}" required>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label>Fecha de Nacimiento</label>
                                                        <input type="date" class="form-control" name="fecha_nacimiento" value="{{ $user->fecha_nacimiento }}" required>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label>Usuario</label>
                                                        <input type="text" class="form-control" name="usuario" value="{{ $user->usuario }}" required>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label>Contraseña</label>
                                                        <input type="password" class="form-control" name="password" value="{{ $user->password }}" required>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label>Rol</label>
                                                        <select class="form-control" name="rol" required>
                                                            <option value="admin" {{ $user->rol == 'admin' ? 'selected' : '' }}>Admin</option>
                                                            <option value="user" {{ $user->rol == 'user' ? 'selected' : '' }}>User</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label>Foto de Perfil</label>
                                                        <input type="file" class="form-control" name="foto">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
                                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                {{-- Modal Eliminar Usuario --}}
                                <div class="modal fade" id="modalEliminarUsuario{{$user->id}}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Eliminar usuario</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>¿Estás seguro de que deseas eliminar a <strong>{{ $user->nombre }}</strong>?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- MODAL AGREGAR USUARIO NUEVO -->
<div class="modal" id="modalAgregarUsuario" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('users.create') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Agregar usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <!-- Tus campos de formulario aquí -->
                    <div class="form-group, mb-3">
                        <label>DNI</label>
                        <input type="text" class="form-control" name="dni" placeholder="Ingresar DNI" required>
                    </div>
                    <div class="form-group, mb-3">
                        <label>Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Ingresar Nombre" required>
                    </div>
                    <div class="form-group, mb-3">
                        <label>Apellido</label>
                        <input type="text" class="form-control" name="apellido" placeholder="Ingresar Apellido" required>
                    </div>
                    <div class="form-group, mb-3">
                        <label>Teléfono</label>
                        <input type="text" class="form-control" name="telefono" placeholder="Ingresar Teléfono" required>
                    </div>
                    <div class="form-group, mb-3">
                        <label>Dirección</label>
                        <input type="text" class="form-control" name="direccion" placeholder="Ingresar Dirección" required>
                    </div>
                    <div class="form-group, mb-3">
                        <label>Fecha de Nacimiento</label>
                        <input type="date" class="form-control" name="fecha_nacimiento" placeholder="Ingresar Fecha de Nacimiento" required>
                    </div>
                    <div class="form-group, mb-3">
                        <label>Usuario</label>
                        <input type="text" class="form-control" name="usuario" placeholder="Ingresar Usuario" required>
                    </div>
                    <div class="form-group, mb-3">
                        <label>Contraseña</label>
                        <input type="password" class="form-control" name="password" placeholder="Ingresar contraseña" required>
                    </div>
                    <div class="form-group, mb-3">
                        <label>Rol</label>
                        <select class="form-control" name="rol" required>
                            <option value="">Seleccione un rol</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                    <div class="form-group, mb-3">
                        <label>foto de Perfil</label>
                        <input type="file" class="form-control" name="foto" placeholder="Ingresar foto de Perfil">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection