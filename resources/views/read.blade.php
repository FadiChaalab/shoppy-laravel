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
                                    <h4 class="font-size-18">Email Read</h4>
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Shoppy</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Email</a></li>
                                        <li class="breadcrumb-item active">Email Read</li>
                                    </ol>
                                </div>
                            </div>
                        </div>     

                        <div class="row">
                            <div class="col-12">
                                <div class="email-leftbar card">
                                    <a href="email-compose.html" class="btn btn-danger rounded btn-custom btn-block waves-effect waves-light">Compose</a>
        
                                    <div class="mail-list mt-4">
                                        <a href="{{route('contact')}}" class="active">Inbox <span class="ml-1">({{count($contacts)}})</span></a>
                                        <a href="#">Starred</a>
                                        <a href="#">Important</a>
                                        <a href="#">Draft</a>
                                        <a href="#">Sent Mail</a>
                                        <a href="#">Trash</a>
                                    </div>
        
                                    <h5 class="mt-4">Labels</h5>
        
                                    <div class="mail-list mt-4">
                                        <a href="#"><span class="mdi mdi-arrow-right-drop-circle text-info float-right"></span>Theme Support</a>
                                        <a href="#"><span class="mdi mdi-arrow-right-drop-circle text-warning float-right"></span>Freelance</a>
                                        <a href="#"><span class="mdi mdi-arrow-right-drop-circle text-primary float-right"></span>Social</a>
                                        <a href="#"><span class="mdi mdi-arrow-right-drop-circle text-danger float-right"></span>Friends</a>
                                        <a href="#"><span class="mdi mdi-arrow-right-drop-circle text-success float-right"></span>Family</a>
                                    </div>
                                </div>
                                <div class="email-rightbar mb-3">
                                    <div class="card">
                                        <div class="btn-toolbar p-3" role="toolbar">
                                            <div class="btn-group mo-mb-2">
                                                <button type="button" class="btn btn-primary waves-light waves-effect"><i class="fa fa-inbox"></i></button>
                                                <button type="button" class="btn btn-primary waves-light waves-effect"><i class="fa fa-exclamation-circle"></i></button>
                                                <button type="button" class="btn btn-primary waves-light waves-effect"><i class="far fa-trash-alt"></i></button>
                                            </div>
                                            <div class="btn-group ml-1 mo-mb-2">
                                                <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-folder"></i>
                                                    <i class="mdi mdi-chevron-down ml-1"></i>
                                                </button>
                                                <div class="dropdown-menu mo-mb-2">
                                                    <a class="dropdown-item" href="#">Updates</a>
                                                    <a class="dropdown-item" href="#">Social</a>
                                                    <a class="dropdown-item" href="#">Team Manage</a>
                                                </div>
                                            </div>
                                            <div class="btn-group ml-1 mo-mb-2">
                                                <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-tag"></i>
                                                    <i class="mdi mdi-chevron-down ml-1"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Updates</a>
                                                    <a class="dropdown-item" href="#">Social</a>
                                                    <a class="dropdown-item" href="#">Team Manage</a>
                                                </div>
                                            </div>
            
                                            <div class="btn-group ml-1 mo-mb-2">
                                                <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    More <i class="mdi mdi-chevron-down ml-1"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Mark as Unread</a>
                                                    <a class="dropdown-item" href="#">Mark as Important</a>
                                                    <a class="dropdown-item" href="#">Add to Tasks</a>
                                                    <a class="dropdown-item" href="#">Add Star</a>
                                                    <a class="dropdown-item" href="#">Mute</a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="card-body">
        
                                            <div class="media mb-4">
                                                <img class="d-flex mr-3 rounded-circle avatar-sm" src="{{ $user->avatar ? asset('storage/images/avatars/'.$user->avatar) : asset('images/users/user-4.jpg')}}" alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h4 class="font-size-15 m-0">{{$contact->name}}</h4>
                                                    <small class="text-muted">{{$contact->email}}</small>
                                                </div>
                                            </div>
        
                                            <p>{{$contact->message}}</p>
                                            <hr/>
                                            <a href="#" class="btn btn-secondary waves-effect mt-4"><i class="mdi mdi-reply"></i> Reply</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        @include('layouts.footer')
    </div>
</x-layout>