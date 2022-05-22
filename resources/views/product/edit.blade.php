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
                                <h4 class="font-size-18">Product</h4>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Shoppy</a></li>
                                    <li class="breadcrumb-item active">Product</li>
                                </ol>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="float-right">
                                <form action="{{route('product.destroy',$product->id)}}" method="POST" enctype="multipart/form-data" name="form" id="form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{route('product.update',$product->id)}}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" class="form-control" id="name" name="name"
                                                        placeholder="Enter name" value="{{$product->name}}">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="price">Price</label>
                                                    <input type="text" class="form-control" id="price" name="price"
                                                        placeholder="Enter price" value="{{$product->price}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="quantity">Quantity</label>
                                                    <input type="text" class="form-control" id="quantity"
                                                        name="quantity" placeholder="Enter quantity"
                                                        value="{{$product->quantity}}">
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="category">Category</label>
                                                    <input type="text" class="form-control" id="category"
                                                        name="category" placeholder="Enter category"
                                                        value="{{$product->category}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" id="description" name="description"
                                                placeholder="Enter description">{{$product->description}}</textarea>
                                        </div>
                                        {{-- <div class="dropzone d-block" id="myDropzone">
                                            <input hidden id="file" name="image" />
                                            <div class="fallback">

                                            </div>
                                        </div> --}}
                                        <button type="submit" class="btn btn-primary">Update product</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
</x-layout>