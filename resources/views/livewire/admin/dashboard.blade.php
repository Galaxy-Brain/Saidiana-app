<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __("Admin's Dashboard") }}
        </h2>
    </x-slot>
    <div>
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-11">
                <div class="card">
                    <div class="card-header">
                            <h1 class="text-center text-danger">List of Users</h1>
                        <div class="row">
                            <button class="btn btn-warning float-right" data-bs-toggle="modal" data-bs-target="#modelId"><h1>+</h1></button>


                            <!-- Modal -->
                            <div class="modal fade" wire:ignore.self id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                            <div class="modal-header">
                                                    <h5 class="modal-title">Add New User</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                        <div class="modal-body">
                                            <div class="container-fluid">
                                                <div class="mb-3">
                                                  <label for="name" class="form-label">Name</label>
                                                  <input wire:model="name" type="text" name="name" id="name" class="form-control" placeholder="Enter the name of the new User" aria-describedby="helpId">
                                                  <small id="helpId" class="text-muted">New User Name</small>
                                                </div>
                                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                                <div class="mb-3">
                                                  <label for="email" class="form-label">Email</label>
                                                  <input wire:model="email" type="email" name="email" id="email" class="form-control" placeholder="Enter the email of the new User" aria-describedby="helpId">
                                                  <small id="helpId" class="text-muted">New User Email</small>
                                                </div>
                                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                                <div class="mb-3">
                                                  <label for="password" class="form-label">password</label>
                                                  <input wire:model="password" type="password" name="password" id="password" class="form-control" placeholder="Enter the password of the new User" aria-describedby="helpId">
                                                  <small id="helpId" class="text-muted">New User password</small>
                                                </div>
                                                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                                <div class="mb-3">
                                                    <label for="role" class="form-label">Role</label>
                                                    <select wire:model="role" class="form-select" name="role" id="role">
                                                        <option selected>Select one</option>
                                                        @foreach ($roles as $oldrole)
                                                        <option value="{{ $oldrole->id }}">{{ $oldrole->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('role') <span class="text-danger">{{ $message }}</span> @enderror

                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" wire:click="save()" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-responsive">
                            <thead class="thead-default">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td scope="row">{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role->title }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-6">
                                                    @if (auth()->user()->id != $user->id)
                                                    <button class="btn-primary"><i class="text-white fas fa-edit"></i></button>
                                                    @endif
                                                </div>
                                                <div class="col-6">
                                                    @if (auth()->user()->id != $user->id)
                                                    <button wire:click="deleteUser({{ $user->id }})" class="btn-danger"><i class="text-white fas fa-trash"></i></button>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
