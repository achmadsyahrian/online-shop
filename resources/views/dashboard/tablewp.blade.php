@extends('dashboard.layouts.main')
@section('container')
    <h1>Barang Menggunakan WP</h1>
    @if (session()->has('success'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-11 d-flex align-items-stretch">
                    <div class="card w-100">
                        <div class="card-body p-4">
                            <div class="table-responsive">

                                @php
                                    $totalS = 0;
                                    $hasilArr = collect([]);
                                @endphp
                                @foreach ($product as $products)
                                    @php
                                        $trItemQuality = collect($products->transactionItem);
                                        $trItemQualityAvg = $trItemQuality->avg('quality_avg_description');

                                        $trItem = collect($products->transactionItem);
                                        $trItemAvg = $trItem->avg('rate_avg_rating');
                                    @endphp

                                    @foreach ($bobot as $bobotItem)
                                        @php
                                            $nilai = $bobotItem->bobot / $sumBobot;
                                            $hasil = ($trItemQualityAvg ** $nilai) * ($trItemAvg ** $nilai) * ($products->harga ** $nilai) * ($products->transaction_item_sum_quantity ** $nilai);
                                        @endphp

                                    @endforeach
                                    @php
                                        $totalS+=$hasil
                                    @endphp
                                @endforeach

                                @foreach ($product as $item)
                                    @php
                                        $trItemQuality = collect($item->transactionItem);
                                        $trItemQualityAvg = $trItemQuality->avg('quality_avg_description');

                                        $trItem = collect($item->transactionItem);
                                        $trItemAvg = $trItem->avg('rate_avg_rating');
                                    @endphp

                                    @foreach ($bobot as $bobotItem)
                                        @php
                                            $nilai = $bobotItem->bobot / $sumBobot;
                                            $hasil = ($trItemQualityAvg ** $nilai) * ($trItemAvg ** $nilai) * ($item->harga ** $nilai) * ($item->transaction_item_sum_quantity ** $nilai);
                                        @endphp

                                    @endforeach
                                    @php
                                        $totalV = $hasil / $totalS;
                                        $hasilArr->push([
                                            'id' => $item->id,
                                            'name' => $item->name,
                                            'harga' => $item->harga,
                                            'jlh_beli' => $item->transaction_item_sum_quantity,
                                            'totalV' => $totalV,
                                            'totalS' => $hasil,
                                            'itemQuality' => $trItemQualityAvg,
                                            'itemRate' => $trItemAvg,
                                        ]);
                                    @endphp
                                @endforeach

                                <table class="table text-nowrap mb-0 align-middle">
                                    <thead class="text-dark fs-4">
                                        <tr>
                                            <th class="border-bottom-0" rowspan="2">
                                                <h6 class="fw-semibold mb-0">Ranking</h6>
                                            </th>
                                            <th class="border-bottom-0" rowspan="2">
                                                <h6 class="fw-semibold mb-0">Nama Barang</h6>
                                            </th>
                                            <th colspan="{{$countBobot}}">Nilai</th>
                                            <th colspan="2">Nilai Perhitungan</th>
                                        </tr>
                                        <tr>
                                            @foreach ($bobot as $bobotItem)
                                                <td>{{ $bobotItem->nama }}</td>
                                            @endforeach
                                            <td>Hasil Vektor S</td>
                                            <td>Hasil Vektor V</td>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    @php
                                        $ranking = 1;
                                    @endphp
                                    <tbody>

                                        @php
                                            $hasilArr = $hasilArr->sortByDesc('totalV');
                                            $ranking = 1;
                                            // dd($hasilArr);
                                        @endphp

                                        @foreach ($hasilArr as $itemm)
                                            {{-- @dd($itemm) --}}
                                            <tr>
                                                <td>{{ $ranking++ }}</td>
                                                <td>{{ $itemm['name'] }}</td>

                                                <td>{{number_format($itemm['itemQuality'], 2)}}</td>
                                                <td>{{number_format($itemm['itemRate'], 2)}}</td>
                                                <td>{{ $itemm['harga']}}</td>
                                                <td>{{ $itemm['jlh_beli']}}</td>

                                                <td>{{ number_format($itemm['totalS'], 4) }}</td>
                                                <td>{{ number_format($itemm['totalV'], 4) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-start mt-3">
                                {{-- {{ $products->links() }} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
