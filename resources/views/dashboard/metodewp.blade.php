@extends('dashboard.layouts.main')
@section('container')
    <h1>Metode WP</h1>
    @if (session()->has('success'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-lg-12">
            <br>
            <h1>Langkah 1</h1>
            <span>Menentukan Kriteria dan besaran nilai bobot nya</span>
            <div class="row">


                <table class="table text-nowrap mb-0 align-middle">
                    <tr>
                        <td>Id</td>
                        <td>Kode</td>
                        <td>Nama Bobot</td>
                        <td>Bobot</td>
                    </tr>
                    @foreach ($bobot as $bobots)
                        <tr>
                            <td>{{ $bobots->id }}</td>
                            <td>A{{ $bobots->id }}</td>
                            <td>{{ $bobots->nama }}</td>
                            <td>{{ $bobots->bobot }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <br>
            <h1>Langkah 2</h1>
            <span>Menentukan Tingkat Priotias bobot setiap kriteria</span>
            <div class="row">


                <table class="table text-nowrap mb-0 align-middle">
                    <tr>
                        @foreach ($bobot as $bobotItem)
                            <td>A{{ $bobotItem->id }}</td>
                        @endforeach
                    </tr>
                    @foreach ($bobot as $bobotItem)
                        <td>{{ number_format($bobotItem->bobot / $sumBobot, 3)}} </td>
                    @endforeach
                </table>
            </div>

            <br>
            <h1>Langkah 3</h1>
            <span>Menghitung Vektor S</span>
            <div class="row">


                <table class="table text-nowrap mb-0 align-middle">
                    <tr>
                        <td>Kode</td>
                        <td>Nama</td>
                        @foreach ($bobot as $bobotItem)
                            <td>{{ $bobotItem->nama }}</td>
                        @endforeach
                        <td>Hasil Vektor S</td>
                    </tr>
                    @php
                        $totalS = 0;
                    @endphp
                    @foreach ($product as $products)
                        <tr>
                            <td>{{ $products->id }}</td>
                            <td>{{ $products->name }}</td>
                            <td>
                                @php
                                    $trItemQuality = collect($products->transactionItem);
                                    $trItemQualityAvg = 4;
                                @endphp
                                {{ number_format($trItemQualityAvg, 2)  }}
                            </td>
                            <td>
                                @php
                                    $trItem = collect($products->transactionItem);
                                    $trItemAvg = $products->ketahanan;
                                @endphp
                                {{ number_format($trItemAvg, 2)  }}
                            </td>
                            <td>{{ $products->harga }}</td>
                            <td>{{$products->transaction_item_sum_quantity ?? 0}}</td>
                            <td>
                                @foreach ($bobot as $bobotItem)
                                    @php
                                        $nilai = $bobotItem->bobot / $sumBobot;
                                        $hasil = ($trItemQualityAvg ** $nilai) * ($trItemAvg ** $nilai) * ($products->harga ** $nilai) * ($products->transaction_item_sum_quantity ** $nilai);
                                    @endphp

                                @endforeach
                                {{ number_format($hasil, 4)  }}
                                @php
                                    $totalS+=$hasil
                                @endphp
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <br>
            <h1>Langkah 4</h1>
            <span>Menghitung Vektor V</span>
            <div class="row">
            @php
                $kesimpulan = collect([]);
            @endphp

                <table class="table text-nowrap mb-0 align-middle">
                    <tr>
                        <td>Kode</td>
                        <td>Nama</td>
                        @foreach ($bobot as $bobotItem)
                            <td>{{ $bobotItem->nama }}</td>
                        @endforeach
                        <td>Hasil Vektor S</td>
                        <td>Hasil Vektor V</td>
                    </tr>

                    @foreach ($product as $products)

                        <tr>
                            <td>{{ $products->id }}</td>
                            <td>{{ $products->name }}</td>
                            <td>
                                @php
                                    $trItemQuality = collect($products->transactionItem);
                                    $trItemQualityAvg = 4;
                                @endphp
                                 {{ number_format($trItemQualityAvg, 2)  }}
                            </td>
                            <td>
                                @php
                                    $trItem = collect($products->transactionItem);
                                    $trItemAvg = $products->ketahanan;
                                @endphp
                               {{ number_format($trItemAvg, 2)  }}
                            </td>
                            <td>{{ $products->harga }}</td>
                            <td>{{$products->transaction_item_sum_quantity ?? 0}}</td>
                            <td>
                                @foreach ($bobot as $bobotItem)
                                    @php
                                        $nilai = $bobotItem->bobot / $sumBobot;
                                        $hasil = ($trItemQualityAvg ** $nilai) * ($trItemAvg ** $nilai) * ($products->harga ** $nilai) * ($products->transaction_item_sum_quantity ** $nilai);
                                    @endphp

                                @endforeach

                               {{ number_format($hasil, 4)  }}

                            </td>
                            <td>
                                {{  number_format($hasil/$totalS, 4) }}
                            </td>
                        </tr>
                        @php
                            $kesimpulan->push([
                                'id' => $products->id,
                                'name' => $products->name,
                                'hasil' => $hasil/$totalS
                            ]);
                        @endphp
                    @endforeach
                </table>
            </div>

            <br>
            <h1>Kesimpulan</h1>
            <span>Hasil dan kesimpulan</span>
            <div class="row">


                <table class="table text-nowrap mb-0 align-middle">
                    <tr>
                        <td>Ranking</td>
                        <td>Nama Barang</td>
                        <td>Hasil </td>
                    </tr>
                    @php
                        $kesimpulan = $kesimpulan->sortByDesc('hasil');
                        $ranking = 1;
                    @endphp

                    @foreach ($kesimpulan as $item)
                        <tr>
                            <td>{{ $ranking++ }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ number_format( $item['hasil'], 4)  }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
