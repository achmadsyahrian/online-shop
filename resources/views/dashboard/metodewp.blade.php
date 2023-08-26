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
                    <thead>
                        <tr>
                            <th>Kriteria</th>
                            <th>Skala</th>
                            <th>Bobot</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="5">Kemasan</td>
                            <td>100ml</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>60ml</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td>50ml</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>30ml</td>
                            <td>4</td>
                        </tr>
                        <tr>
                            <td>20ml</td>
                            <td>5</td>
                        </tr>

                        <tr>
                            <td rowspan="5">Ketahanan</td>
                            <td>3 Jam</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>6 Jam</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td>9 Jam</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>12 Jam</td>
                            <td>4</td>
                        </tr>
                        <tr>
                            <td>15 Jam</td>
                            <td>5</td>
                        </tr>

                        <tr>
                            <td rowspan="5">Harga</td>
                            <td>80.000</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>75.000</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td>70.000</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>65.000</td>
                            <td>4</td>
                        </tr>
                        <tr>
                            <td>60.000</td>
                            <td>5</td>
                        </tr>

                        <tr>
                            <td rowspan="5">Jumlah Beli</td>
                            <td>0-40</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>41-80</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td>81-120</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>121-160</td>
                            <td>4</td>
                        </tr>
                        <tr>
                            <td>161-200</td>
                            <td>5</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <br>
            <h1>Langkah 2</h1>
            <span>Menentukan Tingkat Priotias bobot setiap kriteria</span>
            <div class="row">


                <table class="table text-nowrap mb-0 align-middle">
                    <thead>
                        <tr>
                            <th rowspan="2">No</th>
                            <th rowspan="2">Nama Produk</th>
                            <th colspan="4" align="center">Spesifikasi</th>
                            <th rowspan="2">Simbol</th>
                        </tr>
                        <tr>
                            <th>Kemasan</th>
                            <th>Ketahanan</th>
                            <th>Harga</th>
                            <th>Jumlah Beli</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $abjad = range('a', 'z');
                        @endphp
                        @foreach ($product as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ '30ml' }}</td>
                                <td>{{ $item->ketahanan }} Jam</td>
                                <td>{{ $item->harga }}</td>
                                <td>{{ $item->transaction_item_sum_quantity }}</td>
                                <td>{{ strtoupper($abjad[$loop->iteration - 1]) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <br>
            <h1>Langkah 3</h1>
            {{-- <span>Menentukan Tingkat Priotias bobot setiap kriteria</span> --}}
            <div class="row">


                <table class="table text-nowrap mb-0 align-middle">
                    <thead>
                        <tr>
                            <th rowspan="2">Alternatif</th>
                            <th colspan="4">Kriteria</th>
                        </tr>
                        <tr>
                            <th>Kemasan</th>
                            <th>Ketahanan</th>
                            <th>Harga</th>
                            <th>Jumlah Beli</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $abjad = range('a', 'z');
                        @endphp
                        @foreach ($product as $item)
                            <tr>
                                <td>{{ strtoupper($abjad[$loop->iteration - 1]) }}</td>
                                <td>{{ "4" }}</td>
                                <td>{{ ketahanan($item->ketahanan) }}</td>
                                <td>{{ wpHarga($item->harga) }}</td>
                                <td>{{ jumlahBeli($item->transaction_item_sum_quantity) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <br>
            <h1>Langkah 4</h1>
            {{-- <span>Menentukan Tingkat Priotias bobot setiap kriteria</span> --}}
            <div class="row">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead>
                        <tr>
                            <th>Kriteria</th>
                            <th>Bobot</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $abjad = range('a', 'z');
                        @endphp
                        @foreach ($bobot as $bobotItem)
                            <tr>
                                <td>{{ $bobotItem->nama }}</td>
                                <td>{{ $bobotItem->bobot }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <br>
            <h1>Langkah 5</h1>
            <span>Perbaikan Bobot</span>
            <div class="row">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead>
                        <tr>
                            <th>Kriteria</th>
                            <th>Skala Kepentingan</th>
                            <th>Bobot</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $bobotVald = [];
                        @endphp
                        @foreach ($bobot as $bobotItem)
                            <tr>
                                <td>{{ $bobotItem->nama }}</td>
                                <td>{{ $bobotItem->bobot }}</td>
                                <td>{{ number_format($bobotItem->bobot / $sumBobot, 3) }}</td>
                            </tr>

                            @php
                                array_push($bobotVald, $bobotItem->bobot / $sumBobot);
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>

            <br>

            <h1>Langkah 6</h1>
            <span>Vektor S</span>
            <div class="row">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead>
                        <tr>
                            <th >Alternatif</th>
                            <th >Vektor S</th>
                        </tr>
                    </thead>
                    <tbody>

                        @php
                            $abjad = range('a', 'z');
                            $vektorS = 0;
                            $vektorV = [];
                        @endphp
                        @foreach ($product as $item)
                            <tr>
                                <td>{{ strtoupper($abjad[$loop->iteration - 1]) }}</td>
                                <td>{{ number_format((4**$bobotVald[0]) * (ketahanan($item->ketahanan) ** $bobotVald[1]) * (wpHarga($item->harga) ** (-$bobotVald[2])) * (jumlahBeli($item->transaction_item_sum_quantity) ** $bobotVald[3]),3)  }}</td>

                                @php
                                    array_push($vektorV, (4**$bobotVald[0]) * (ketahanan($item->ketahanan) ** $bobotVald[1]) * (wpHarga($item->harga) ** (-$bobotVald[2])) * (jumlahBeli($item->transaction_item_sum_quantity) ** $bobotVald[3]));
                                @endphp
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <br>
            <h1>Langkah 7</h1>
            <span>Vektor V</span>
            <div class="row">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead>
                        <tr>
                            <th >Alternatif</th>
                            <th >Vektor v</th>
                        </tr>
                    </thead>
                    <tbody>

                        @php
                            $abjad = range('a', 'z');
                            $result = [];
                        @endphp
                        @foreach ($product as $item => $valcount)
                            <tr>
                                <td>{{ strtoupper($abjad[$loop->iteration - 1]) }}</td>
                                <td>{{ number_format($vektorV[$item]/array_sum($vektorV),3) }}</td>
                            </tr>

                            @php
                                $result[$loop->iteration - 1] = [
                                    'product' => $valcount,
                                    'vektor_v' => $vektorV[$item]/array_sum($vektorV)
                                ];
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>

            <br>
            <h1>Kesimpulan</h1>
            <span>Hasil</span>
            <div class="row">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead>
                        <tr>
                            <th >Peringkat</th>
                            <th >Alternatif</th>
                            <th >Hasil</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            //collect($result)->sortByDesc('vektor_v')->values()->all();
                            $result = collect($result)->sortByDesc('vektor_v')->values()->all();
                        @endphp
                        @foreach ($result as $resItem => $resCount)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$resCount['product']->name}}</td>
                                <td>{{number_format($resCount['vektor_v'],3)}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


        </div>
    </div>
@endsection
