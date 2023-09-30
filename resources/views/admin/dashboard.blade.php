@extends('admin.layout.master')


@section('content')
    <style>
        .dashboard-i {
            font-size: 50px !important;
        }
    </style>
    <div class="row">
        <div class="col-3">
            <div class="card bg-primary p-3">
                <div class="d-flex">
                    <div class="p-3 d-flex align-items-center justify-content-center">
                        <i class="fa fa-money text-white dashboard-i"></i>
                    </div>
                    <div class="p-3 d-flex align-items-center flex-column justify-content-center">
                        <h5 class="text-white">Today Income</h5>
                        <h2 class="text-white">{{ $todayIncome }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card bg-primary p-3">
                <div class="d-flex">
                    <div class="p-3 d-flex align-items-center justify-content-center">
                        <i class="fa fa-money text-white dashboard-i"></i>
                    </div>
                    <div class="p-3 d-flex align-items-center flex-column justify-content-center">
                        <h5 class="text-white">Today Outcome</h5>
                        <h2 class="text-white">{{ $todayOutcome }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card bg-primary p-3">
                <div class="d-flex">
                    <div class="p-3 d-flex align-items-center justify-content-center">
                        <i class="fa fa-user text-white dashboard-i"></i>
                    </div>
                    <div class="p-3 d-flex align-items-center flex-column justify-content-center">
                        <h5 class="text-white">User</h5>
                        <h2 class="text-white">{{ $userCount }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card bg-primary p-3">
                <div class="d-flex">
                    <div class="p-3 d-flex align-items-center justify-content-center">
                        <i class="fa fa-heart text-white dashboard-i"></i>
                    </div>
                    <div class="p-3 d-flex align-items-center flex-column justify-content-center">
                        <h5 class="text-white">Product</h5>
                        <h2 class="text-white">{{ $productCount }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- chart --}}
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4>လစဉ်အရောင်းပြဇယား</h4>
                    <canvas id="saleChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4>နေ့စဉ်ဝင်ငွေထွက်ငွေ</h4>
                    <canvas id="dailyInOut"></canvas>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($latestUser as $u)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <img src="{{ $u->image_url }}" width="50" class="rounded-circle"
                                    alt="{{ $u->name }}">
                                <span>{{ $u->name }}</span>
                                <small>{{ $u->email }}</small>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>

        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <table class="table table-border">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Total Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $p)
                                <tr key={{ $p->id }}>
                                    <td scope="row"><img src="{{ $p->image_url }}" width="50" class="rounded-circle"
                                            alt=""></td>
                                    <td>{{ $p->name }}</td>
                                    <td class="text-danger">{{ $p->total_quantity }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    @endsection

    @section('script')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('saleChart');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json($months),
                    datasets: [{
                        label: 'လစဉ်အရောင်း',
                        data: @json($saleData),
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            suggestedMin: 5,

                        }
                    }
                }
            });
            // for daily incomea and outcome chart
            const inout = document.getElementById('dailyInOut');

            new Chart(inout, {
                type: 'line',
                data: {
                    labels: @json($dayMonths),
                    datasets: [{
                        label: 'ဝင်ငွေ',
                        data: @json($dailyIncome),
                        borderColor: 'green',
                        borderWidth: 1
                    }, {
                        label: 'ထွက်ငွေ',
                        data: @json($dailyOutcome),
                        borderColor: 'red',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            suggestedMin: 5,

                        }
                    }
                }
            });
        </script>
    @endsection
