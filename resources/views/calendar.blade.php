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
                                    <h4 class="font-size-18">Calendar</h4>
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Shoppy</a></li>
                                        <li class="breadcrumb-item active">Calendar</li>
                                    </ol>
                                </div>
                            </div>
                        </div>     
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div id='calendar'></div>
        
                                        <div style='clear:both'></div>
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