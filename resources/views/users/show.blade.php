<x-layout>
    <div id="layout-wrapper">
        @include('layouts.header')
        @include('layouts.left-sidebar')
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="page-title-box">
                                <h4 class="font-size-18">Users</h4>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Shoppy</a></li>
                                    <li class="breadcrumb-item active">Users</li>
                                </ol>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="float-right d-none d-md-block">
                                @if(count($users) > 0)
                                    <a href="{{ route('users') }}" class="btn btn-primary">
                                        <i class="mdi mdi-refresh mr-2"></i>
                                        Refresh
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Users</h4>
                                    <div class="table-responsive">
                                        <table class="table table-centered table-striped mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Avatar</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Address</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($users) == 0)
                                                <tr>
                                                    <td colspan="7" class="text-center">
                                                        <img src="{{asset('images/no_data.svg')}}" height="124"
                                                            class="mt-3">
                                                        <p class="text-muted py-3">No other users was found, try again
                                                            later.</p>
                                                        <a href="{{url('/users')}}" class="btn btn-primary">Refresh</a>
                                                    </td>
                                                </tr>
                                                @else
                                                @foreach($users as $user)
                                                <tr>
                                                    <td>
                                                        <img src="{{ $user->avatar ? asset('storage/images/avatars/'.$user->avatar) : asset('images/users/user-4.jpg')}}"
                                                            alt="" class="avatar-sm rounded-circle">
                                                    </td>
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->phone ?? 'Not specified'}}</td>
                                                    <td>{{$user->address ?? 'Not specified'}}</td>
                                                    <td>
                                                        <form action="{{route('user.destroy', $user->id)}}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger waves-effect waves-light">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>