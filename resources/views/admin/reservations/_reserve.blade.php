<!-- Ticket card -->
<div class="card ticket">

    <!-- Ticket name -->
    <div class="card-header ticket-name text-center">
        <div class="icon">
            <i class="fas fa-train fa-2x"></i>
        </div>
        <p class="m-0">{{$reservation->train->name}}</p>
    </div>
    <!-- End of Ticket name -->

    <!-- card body -->
    <div class="card-body">
        <!-- Ticket details -->
        <div class="ticket-details">
            <!-- Depature station info -->
            <div class="depature-station text-center">
                <div class="from facades">
                    <span class="font-weight-bold">{{ trans('site.from') }}</span>
                </div>
                <ul class="list-unstyled">
                    <li>
                        <span class="d-block">
                            {{date('h:m A', strtotime($reservation->train->depature_at))}}
                        </span>
                        <span class="d-block">
                            {{date('d M, Y', strtotime($reservation->train->depature_at))}}
                        </span>
                        {{-- {{}} --}}
                    </li>
                    <li>
                        <span class="d-block font-weight-bold">
                            {{$reservation->train->depature_station}}
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
                    <span class="font-weight-bold">{{ trans('site.to') }}</span>
                </div>
                <ul class="list-unstyled">
                    <li>
                        <span class="d-block">
                            {{date('h:m A', strtotime($reservation->train->arrival_at))}}
                        </span>
                        <span class="d-block">
                            {{date('d M, Y', strtotime($reservation->train->arrival_at))}}
                        </span>
                        {{-- {{}} --}}
                    </li>
                    <li>
                        <span class="d-block font-weight-bold">
                            {{$reservation->train->arrival_station}}
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
                <p class="m-0">{{$reservation->train->price}} {{ trans('site.currency') }} / Person</p>
            </div>
            <!-- End of Ticket price -->

            <!-- Ticket price -->
            <div class="ticket-price text-center">
                <p class="m-0">{{$reservation->train->type->name}}</p>
            </div>
            <!-- End of Ticket price -->
        </div>
        <!-- End of Ticket details -->

    </div>
    <!-- End of card body -->

</div>
<!-- End of Ticket card -->

{{-- {{$reservation}} --}}
