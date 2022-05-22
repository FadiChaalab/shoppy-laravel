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
                                <h4 class="font-size-18">Dashboard</h4>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item active">Welcome to Shoppy Dashboard</li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card mini-stat bg-primary text-white">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <div class="float-left mini-stat-img mr-4">
                                            <img src="{{asset('images/services-icon/01.png')}}" alt="">
                                        </div>
                                        <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Orders</h5>
                                        <h4 class="font-weight-medium font-size-24">{{$total_orders}} <i
                                                class="mdi mdi-arrow-up text-success ml-2"></i></h4>
                                        <div class="mini-stat-label bg-success">
                                            <p class="mb-0">+ {{$average_orders}}%</p>
                                        </div>
                                    </div>
                                    <div class="pt-2">
                                        <div class="float-right">
                                            <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                        </div>

                                        <p class="text-white-50 mb-0 mt-1">Since last month</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card mini-stat bg-primary text-white">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <div class="float-left mini-stat-img mr-4">
                                            <img src="{{asset('images/services-icon/02.png')}}" alt="">
                                        </div>
                                        <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Revenue</h5>
                                        <h4 class="font-weight-medium font-size-24">{{$total_revenue}} <i
                                                class="mdi mdi-arrow-up text-success ml-2"></i></h4>
                                        <div class="mini-stat-label bg-success">
                                            <p class="mb-0">+ {{$average_revenue}}%</p>
                                        </div>
                                    </div>
                                    <div class="pt-2">
                                        <div class="float-right">
                                            <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                        </div>

                                        <p class="text-white-50 mb-0 mt-1">Since last month</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card mini-stat bg-primary text-white">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <div class="float-left mini-stat-img mr-4">
                                            <img src="{{asset('images/services-icon/03.png')}}" alt="">
                                        </div>
                                        <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Average Price</h5>
                                        <h4 class="font-weight-medium font-size-24">{{$average_price}} <i
                                                class="mdi mdi-arrow-up text-success ml-2"></i></h4>
                                        <div class="mini-stat-label bg-info">
                                            <p class="mb-0"> 00%</p>
                                        </div>
                                    </div>
                                    <div class="pt-2">
                                        <div class="float-right">
                                            <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                        </div>

                                        <p class="text-white-50 mb-0 mt-1">Since last month</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card mini-stat bg-primary text-white">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <div class="float-left mini-stat-img mr-4">
                                            <img src="{{asset('images/services-icon/04.png')}}" alt="">
                                        </div>
                                        <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Product Sold</h5>
                                        <h4 class="font-weight-medium font-size-24">{{$total_products}} <i
                                                class="mdi mdi-arrow-up text-success ml-2"></i></h4>
                                        <div class="mini-stat-label bg-success">
                                            <p class="mb-0">+ {{$average_products}}%</p>
                                        </div>
                                    </div>
                                    <div class="pt-2">
                                        <div class="float-right">
                                            <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                        </div>

                                        <p class="text-white-50 mb-0 mt-1">Since last month</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-xl-9">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Monthly Earning</h4>
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <div>
                                                <div id="chart-with-area" class="ct-chart earning ct-golden-section">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="text-center">
                                                        <p class="text-muted mb-4">This month</p>
                                                        <h3>$34,252</h3>
                                                        <p class="text-muted mb-5">It will be as simple as in fact it
                                                            will be occidental.</p>
                                                        <span class="peity-donut"
                                                            data-peity='{ "fill": ["#02a499", "#f2f2f2"], "innerRadius": 28, "radius": 32 }'
                                                            data-width="72" data-height="72">4/5</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="text-center">
                                                        <p class="text-muted mb-4">Last month</p>
                                                        <h3>$36,253</h3>
                                                        <p class="text-muted mb-5">It will be as simple as in fact it
                                                            will be occidental.</p>
                                                        <span class="peity-donut"
                                                            data-peity='{ "fill": ["#02a499", "#f2f2f2"], "innerRadius": 28, "radius": 32 }'
                                                            data-width="72" data-height="72">3/5</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div>
                            </div>
                            <!-- end card -->
                        </div>

                        <div class="col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div>
                                        <h4 class="card-title mb-4">Sales Analytics</h4>
                                    </div>
                                    <div class="wid-peity mb-4">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div>
                                                    <p class="text-muted">Online</p>
                                                    <h5 class="mb-4">1,542</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-4">
                                                    <span class="peity-line" data-width="100%"
                                                        data-peity='{ "fill": ["rgba(2, 164, 153,0.3)"],"stroke": ["rgba(2, 164, 153,0.8)"]}'
                                                        data-height="60">6,2,8,4,3,8,1,3,6,5,9,2,8,1,4,8,9,8,2,1</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wid-peity mb-4">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div>
                                                    <p class="text-muted">Offline</p>
                                                    <h5 class="mb-4">6,451</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-4">
                                                    <span class="peity-line" data-width="100%"
                                                        data-peity='{ "fill": ["rgba(2, 164, 153,0.3)"],"stroke": ["rgba(2, 164, 153,0.8)"]}'
                                                        data-height="60">6,2,8,4,-3,8,1,-3,6,-5,9,2,-8,1,4,8,9,8,2,1</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div>
                                                    <p class="text-muted">Marketing</p>
                                                    <h5>84,574</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-4">
                                                    <span class="peity-line" data-width="100%"
                                                        data-peity='{ "fill": ["rgba(2, 164, 153,0.3)"],"stroke": ["rgba(2, 164, 153,0.8)"]}'
                                                        data-height="60">6,2,8,4,3,8,1,3,6,5,9,2,8,1,4,8,9,8,2,1</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Latest Products</h4>
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
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
</x-layout>