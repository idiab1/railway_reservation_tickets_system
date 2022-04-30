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
                    <div class="depature-station">
                        <ul class="list-unstyled">
                            <li>
                                {{$train->depature_at}}
                            </li>
                            <li>
                                {{$train->depature_station}}
                            </li>
                        </ul>
                    </div>

                    <!-- Icon -->
                    <div class="icon">
                        <i class="fas fa-angle-double-right"></i>
                    </div>

                    <!-- Depature station info -->
                    <div class="arrival-station">
                        <ul class="list-unstyled">
                            <li>
                                {{$train->arrival_at}}
                            </li>
                            <li>
                                {{$train->arrival_station}}
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
                <a class="btn btn-primary crayons-btn btn-buy-ticket"
                    href="{{route("reserve.index", ["train" => $train->id])}}">
                    Buy Ticket
                </a>
            </div>
            <!-- End of card footer -->
        </div>
        <!-- End of Ticket card -->
    @endforeach
@else

@endif
