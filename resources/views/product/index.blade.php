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
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">All Products</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-centered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Category</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Description</th>
                                                    <th>Image</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($products) == 0)
                                                    <tr>
                                                        <td colspan="7" class="text-center">
                                                            <img src="{{asset('images/no_data.svg')}}" height="124" class="mt-3">
                                                            <p class="text-muted py-3">No products was found, try adding some products.</p>
                                                            <a href="{{url('/add_product')}}" class="btn btn-primary">Add product</a>
                                                        </td>
                                                    </tr>
                                                @else
                                                    @foreach($products as $product)
                                                    <tr>
                                                        <td>{{$product->name}}</td>
                                                        <td>{{$product->category}}</td>
                                                        <td>{{$product->price}}</td>
                                                        <td>{{$product->quantity}}</td>
                                                        <td>{{$product->description}}</td>
                                                        <td><img src="{{asset('storage/images/products/'.$product->image)}}"
                                                                alt="" class="avatar-xs rounded-circle"></td>
                                                        <td>
                                                            <a href="{{route('product.edit',$product->id)}}"
                                                                class="btn btn-primary">Edit</a>
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
                    {{$products->links()}}
                </div>
                @include('layouts.footer')
            </div>
        </div>
    </div>
</x-layout>