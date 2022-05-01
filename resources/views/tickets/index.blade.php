@extends('layouts.app')

{{-- Title --}}
@section('title')
    {{ trans('site.tickets') }}
@endsection

{{-- Styles --}}
@section('other-styles')
    <style>
        /* Sub Header */
        .sub-header {
            height: 270px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sub-header .header-box .header-info {
            width: auto;
            margin-top: 0;
            text-align: center;
        }

    </style>
@endsection

{{-- Header --}}
@section('header-info')
    <!-- Header info -->
    <div class="header-info">
        <h1>{{ trans('site.tickets') }}</h1>
    </div>
    <!-- End of Header info -->
@endsection

@section('content')
<!-- Tickets Section -->
<section class="tickets-section section">

    <!-- Container fluid -->
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <!-- Filter Box -->
                <div class="card filter-box">
                    <!-- Filter Box Header -->
                    <div class="card-header filter-box-header">
                        <h4>Filter By</h4>
                    </div>
                    <!-- End of Filter Box Header -->

                    <!-- Filter Box Body -->
                    <div class="card-body filter-box-body">
<<<<<<< HEAD

=======
                        <button class="btn btn-link all-types"
                            data-url="{{route("all.types")}}" data-method="get">
                            All
                        </button>
                        @if ($types->count() > 0)
                            @foreach ($types as $type)
                                {{-- <a href="">{{$type->name}}</a> --}}
                                <button class="btn btn-link d-block type-item"
                                data-url="{{route("type.ticket", ["type" => $type->id])}}"
                                data-method="get">{{$type->name}}</button>
                            @endforeach
                        @endif
                    </div>
                    <!-- End of Filter Box Body -->
                </div>
                <!-- End of Filter Box -->

                <!-- Filter Box -->
                <div class="card filte-box my-4">
                    <!-- Filter Box Header -->
                    <div class="card-header filter-box-header">
                        <h4>Filter By</h4>
                    </div>
                    <!-- End of Filter Box Header -->

                    <!-- Filter Box Body -->
                    <div class="card-body filter-box-body">
                        <button class="btn btn-link all-types"
                            data-url="{{route("all.types")}}" data-method="get">
                            All
                        </button>
                        @if ($types->count() > 0)
                            @foreach ($types as $type)
                                {{-- <a href="">{{$type->name}}</a> --}}
                                <button class="btn btn-link d-block type-item"
                                data-url="{{route("type.ticket", ["type" => $type->id])}}"
                                data-method="get">{{$type->name}}</button>
                            @endforeach
                        @endif
>>>>>>> 56f52ad072d75c54527db97dccd6bc74cb4201b0
                    </div>
                    <!-- End of Filter Box Body -->
                </div>
                <!-- End of Filter Box -->
            </div>
            <div class="col-md-9">
                <!-- Ticktes content -->
                <div class="tickets-content">
                    <div class="loading text-center">
                        <div class="loader"></div>
                        <p class="p-2">Waiting</p>
                    </div>
                    <div class="tickets-content-list">

                    </div>
                </div>
                <!-- End of Ticktes content -->
            </div>
        </div>
    </div>
    <!-- End of Container fluid -->
</section>
<!-- End of Tickets Section -->
@endsection

@section('other-scripts')
<!-- main script -->
<script src="{{asset('js/main.js')}}"></script>
<!--Custom script -->
<script src="{{asset('js/custom.js')}}"></script>

<script>

    window.addEventListener("load", () => {
        document.querySelector(".all-types").click();
    })

    let typeItems = document.querySelectorAll(".type-item");
    typeItems.forEach(typeItem => {
        typeItem.addEventListener("click", (e) => {
        e.preventDefault();

            // Get data-url
            let url = typeItem.getAttribute("data-url");
            let method = typeItem.getAttribute("data-method");

            // Change loading spinner to flex
            document.querySelector(".loading").style.display = "flex";

            $.ajax({
                url: url,
                method: method,
                success: function(data){
                    // console.log(data)

                    // Display none on loading element
                    document.querySelector(".loading").style.display = "none";
                    // Clear data of all elements
                    document.querySelector(".tickets-content-list").innerHTML = "";

                    document.querySelector(".tickets-content-list").insertAdjacentHTML("beforeend", data)

                }
            })

        })
    });

    document.querySelector(".all-types").addEventListener("click", (e) => {
        e.preventDefault();

            // Get data-url
            let url = document.querySelector(".all-types").getAttribute("data-url");
            let method = document.querySelector(".all-types").getAttribute("data-method");

            // Change loading spinner to flex
            document.querySelector(".loading").style.display = "flex";


            $.ajax({
                url: url,
                method: method,
                success: function(data){
                    // console.log(data)

                    // Display none on loading element
                    document.querySelector(".loading").style.display = "none";
                    // Clear data of all elements
                    document.querySelector(".tickets-content-list").innerHTML = "";

                    document.querySelector(".tickets-content-list").insertAdjacentHTML("beforeend", data)

                }
            })

        })
</script>

@endsection
