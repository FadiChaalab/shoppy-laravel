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
                                    <li class="breadcrumb-item active">Add new product</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{url('/add_product_post')}}" method="POST" enctype="multipart/form-data" name="form" id="form">
                                        {{csrf_field()}}
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" class="form-control" id="name" name="name"
                                                        placeholder="Enter name">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="category">Category</label>
                                                    <input type="text" class="form-control" id="category" name="category"
                                                        placeholder="Enter category">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="price">Price</label>
                                                    <input type="text" class="form-control" id="price" name="price"
                                                        placeholder="Enter price">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="quantity">Quantity</label>
                                                    <input type="text" class="form-control" id="quantity"
                                                        name="quantity" placeholder="Enter quantity">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" id="description" name="description"
                                                rows="3"></textarea>
                                        </div>
                                        <div class="mb-5">
                                            <div class="dropzone d-block" id="myDropzone">
                                                <input hidden id="file" name="image"/>
                                                <div class="fallback">                                          
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary" id="add-product">Add product</button>
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