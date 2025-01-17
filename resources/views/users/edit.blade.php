@extends('base3')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Modifier l'utilisateur</h4>
                            <p class="card-description">

                            </p>
                            <form class="forms-sample" method="POST" action="{{ route('users.update', $user->id) }}"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label for="nom">Nom</label>
                                    <input type="text" name="nom" value="{{ $user->nom }}"
                                        class="form-control @error('nom') is-invalid @enderror"
                                        placeholder="Le nom d'utilisateur" />
                                    @error('nom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="prenom">Prénom</label>
                                    <input type="text" name="prenom" value="{{ $user->prenom }}"
                                        class="form-control @error('prenom') is-invalid @enderror"
                                        placeholder="Le prénom d'utilisateur" />
                                    @error('prenom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nomar">Nom en arabe</label>
                                    <input type="text" name="nomar" value="{{ $user->nomar }}"
                                        class="form-control @error('nomar') is-invalid @enderror"
                                        placeholder="Le nom en arabe d'utilisateur" />
                                    @error('nomar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="prenomar">Prénom en arabe</label>
                                    <input type="text" name="prenomar" value="{{ $user->prenomar }}"
                                        class="form-control @error('prenomar') is-invalid @enderror"
                                        placeholder="Le prénom en arabe d'utilisateur" />
                                    @error('prenomar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="telephone">Téléphone</label>
                                    <input type="text" name="telephone" value="{{ $user->telephone }}"
                                        class="form-control @error('telephone') is-invalid @enderror"
                                        placeholder="Téléphone d'utilisateur" />
                                    @error('telephone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="folder">Service</label>
                                    <select name="folder" class="form-control">
                                        @foreach ($folders as $folder)
                                            <option value="{{ $folder->id }}"
                                                {{ $folder->id === $user->folder->id ? 'selected' : '' }}>
                                                {{ $folder->designation }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="groupe">Groupe</label>
                                    <select name="groupe" class="form-control">
                                        @foreach ($groupes as $groupe)
                                            @if (!empty($user->groupe_id))
                                                <option value="{{ $groupe->id }}"
                                                    {{ $groupe->id === $user->groupe->id ? 'selected' : '' }}>
                                                    {{ $groupe->nom }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select name="role" class="form-control">
                                        <option value="ADMIN" {{ 'ADMIN' === $user->role ? 'selected' : '' }}>ADMIN
                                        </option>
                                        <option value="USER" {{ 'USER' === $user->role ? 'selected' : '' }}>USER
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="ACTIVE" {{ 'ACTIVE' === $user->status ? 'selected' : '' }}>ACTIVE
                                        </option>
                                        <option value="INACTIVE" {{ 'INACTIVE' === $user->status ? 'selected' : '' }}>
                                            INACTIVE</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Modifier l'utilisateur</button>

                            </form><a href=" {{ Route('users') }}">
                                <br>
                                <button class="btn btn-light">Cancel</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
