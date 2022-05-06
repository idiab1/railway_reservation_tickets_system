@if ($trains->count() > 0)
    @foreach ($trains as $train)
        <!-- Ticket card -->
        <div class="card ticket">

            <!-- Ticket name -->
            <div class="card-header ticket-name text-center">
                <div class="icon">
                    <i class="fas fa-train fa-2x"></i>
                </div>
                <p class="m-0">{{$train->name}}</p>
            </div>
            <!-- End of Ticket name -->

            <!-- card body -->
            <div class="card-body">
                <!-- Ticket details -->
                <div class="ticket-details">
                    <!-- Depature station info -->
                    <div class="depature-station text-center">
                        <div class="from facades">
                            <span class="font-weight-bold">From</span>
                        </div>
                        <ul class="list-unstyled">
                            <li>
                                <span class="d-block">
                                    {{date('h:m A', strtotime($train->depature_at))}}
                                </span>
                                <span class="d-block">
                                    {{date('d M, Y', strtotime($train->depature_at))}}
                                </span>
                                {{-- {{}} --}}
                            </li>
                            <li>
                                <span class="d-block font-weight-bold">
                                    {{$train->depature_station}}
                                </span>
                            </li>
                        </ul>
                    </div>

                    <!-- Icon -->
                    <div class="icon">
                        <i class="fas fa-angle-double-right"></i>
                    </div>

                    <!-- Depature station info -->
                    <div class="arrival-station text-center">
                        <div class="to distination">
                            <span class="font-weight-bold">To</span>
                        </div>
                        <ul class="list-unstyled">
                            <li>
                                <span class="d-block">
                                    {{date('h:m A', strtotime($train->arrival_at))}}
                                </span>
                                <span class="d-block">
                                    {{date('d M, Y', strtotime($train->arrival_at))}}
                                </span>
                                {{-- {{}} --}}
                            </li>
                            <li>
                                <span class="d-block font-weight-bold">
                                    {{$train->arrival_station}}
                                </span>
                            </li>

                        </ul>
                    </div>
                </div>
                <!-- End of Ticket details -->

                <!-- Ticket details -->
                <div class="ticket-details">
                    <!-- Ticket price -->
                    <div class="ticket-price text-center">
                        <p class="m-0">{{$train->price}} {{ trans('site.currency') }} / Person</p>
                    </div>
                    <!-- End of Ticket price -->

                    <!-- Ticket price -->
                    <div class="ticket-price text-center">
                        <p class="m-0">{{$train->type->name}}</p>
                    </div>
                    <!-- End of Ticket price -->
                </div>
                <!-- End of Ticket details -->

            </div>
            <!-- End of card body -->

            <!-- card footer -->
            <div class="card-footer">
                {{-- <a class="btn btn-primary crayons-btn btn-buy-ticket"
                    href="{{route("reserve.index", ["train" => $train->id])}}">
                    Buy Ticket
                </a> --}}
                <form action="{{route('credit', ["train" => $train->id])}}" method="POST">
                    @csrf
                    <input style="width: fit-content" type="submit" value="Buy Ticket" class="btn btn-primary crayons-btn btn-buy-ticket">
                </form>
            </div>
            <!-- End of card footer -->
        </div>
        <!-- End of Ticket card -->
    @endforeach
@else

    <div class="row">
        <div class="col-12">
            <div class="empty">
                <img src="{{asset("images/empty.svg")}}" alt="">
                <div class="info py-4">
                    <p>No data recorded</p>
                </div>
            </div>
        </div>
    </div>

@endif
