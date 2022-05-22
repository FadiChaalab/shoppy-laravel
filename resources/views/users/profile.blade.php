<x-layout>
    @include('layouts.navbar')
    <section class="page-title"
        style="background-image: url({{asset('images/gallery/work-2.jpg')}}); padding: 120px; background-size: cover; background-position: center;">
        <div class="auto-container">
            <div class="content-box">
                <div class="content-wrapper text-center">
                    <div class="title text-white">
                        <h1>{{$user->name}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="profile-information" style="padding: 120px 0;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mt-3">
                                <div class="col-xl-3 col-md-4">
                                    <div class="text-center">
                                        <form action="{{route('profile.update.image', $user->id)}}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="image-wrapper text-center" style="position: relative;">
                                                <img src="{{ $user->avatar ? asset('storage/images/avatars/'.$user->avatar) : asset('images/users/user-4.jpg')}}"
                                                    alt="" class="rounded-circle mb-3" width="120" height="120">
                                                <div class="profile-edit shadow"
                                                    style="position: absolute; bottom: 36px; right: 40px; padding: 8px; background-color: white; border-radius: 20px; width: 34px; height: 34px;">
                                                    <label for="avatar" class="d-inline-block" style="cursor: pointer;">
                                                        <i class="mdi mdi-camera"></i>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <input type="file" name="avatar" id="avatar" class="d-none">
                                                <button class="btn btn-primary btn-sm" type="submit">Change
                                                    Photo</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-xl-9 col-md-8">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <h4 class="mt-0 header-title">Personal Information</h4>
                                            <p class="text-muted mb-4">Your personal details are safe with us.
                                            </p>
                                            <div class="table-responsive">
                                                <table class="table table-centered table
                                                        table-borderless mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td>Username</td>
                                                            <td class="font-weight-bold">{{$user->name}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Email</td>
                                                            <td class="font-weight-bold">{{$user->email}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Phone</td>
                                                            <td class="font-weight-bold">{{$user->phone
                                                                ?? 'Not specified'}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Age</td>
                                                            <td class="font-weight-bold">{{$user->age ??
                                                                'Not specified'}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Address</td>
                                                            <td class="font-weight-bold">{{$user->address
                                                                ?? 'Not specified'}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <h4 class="mt-0 header-title">Account Settings</h4>
                                            <p class="text-muted mb-4">Change your account settings.</p>
                                            <form action="{{route('profile.update', $user->id)}}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" class="form-control" id="name" name="name"
                                                        value="{{$user->name}}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email"
                                                        value="{{$user->email}}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone">Phone</label>
                                                    <input type="text" class="form-control" id="phone" name="phone"
                                                        value="{{$user->phone}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="age">Age</label>
                                                    <input type="text" class="form-control" id="age" name="age"
                                                        value="{{$user->age}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <input type="text" class="form-control" id="address" name="address"
                                                        value="{{$user->address}}">
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Update
                                                        Profile</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('layouts.footer')
</x-layout>