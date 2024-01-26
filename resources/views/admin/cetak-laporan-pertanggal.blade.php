<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    <div class="container-fluid">
                <div class="fw-bold">Laporan Keuangan</div>
            </div>
            
            <div class="card-body">
                @php
                    $startDate = now();
                    $endDate = $startDate->copy()->endOfYear()->month(12)->day(31);
                @endphp
                <table class="table table-bordered">
                    <thead>
                        <th>
                            Tanggal
                        </th>
                        @foreach ($meja as $mj)
                            <th>
                                {{ $mj->no_meja }}
                            </th>
                        @endforeach
                        <th>
                            Total Jam
                        </th>
                        <th>
                            Total Harga
                        </th>
                    </thead>
                    <tbody>
                        @php
                            $totalJamPerMeja = array(); // Initialize an array to store total jam per meja
                        @endphp
                        @foreach ($dates as $date)
                            <tr>
                                <td>{{ $date }}</td>
                                @foreach ($meja as $mj)
                                    <td>
                                        @php
                                            $found = false;
                                            $totalJam = 0;
                                        @endphp
                                        @foreach ($laporan as $lp)
                                            @if ($lp['tanggal'] === $date && is_object($lp['meja']) && $lp['meja']->id_meja === $mj->id_meja)
                                                {{ $lp['totalJam'] }}
                                                @php
                                                    $found = true;
                                                    $totalJam = $lp['totalJam'];
                                                @endphp
                                            @endif
                                        @endforeach
                                        @if (!$found)
                                            0
                                        @endif
                                        
                                        @php
                                            // Save total jam per meja in the array
                                            if (isset($totalJamPerMeja[$mj->id_meja])) {
                                                $totalJamPerMeja[$mj->id_meja] += $totalJam;
                                            } else {
                                                $totalJamPerMeja[$mj->id_meja] = $totalJam;
                                            }
                                        @endphp
                                    </td>
                                @endforeach
                                <td>
                                    @php
                                        $totalJamOnDate = 0;
                                        // Calculate total jam per date
                                    @endphp
                                    @foreach ($laporan as $lp)
                                    @if ($lp['tanggal'] === $date)
                                        @php
                                            $totalJamOnDate += $lp['totalJam'];
                                        @endphp
                                    @endif
                                    @endforeach
                                    {{ $totalJamOnDate }}
                                </td>
                                <td>
                                    @php
                                        $totalharga = 0;
                                    @endphp
                                    @foreach ($laporan as $lp)
                                        @if ($lp['tanggal'] === $date)
                                            @php
                                                $totalharga += $lp['totalHarga'];
                                            @endphp
                                        @endif
                                    @endforeach
                                    Rp. {{ number_format($totalharga, 0, ',', '.') }}
                                </td>
                            </tr>
                        @endforeach
                        
                        <tr>
                            <td >Total</td> 
                            @foreach ($meja as $mj)
                                <td>
                                    @php
                                        $totalJamPerMeja[$mj->id_meja] = $totalJamPerMeja[$mj->id_meja] ?? 0;
                                    @endphp
                                    {{ $totalJamPerMeja[$mj->id_meja] }} jam
                                </td>
                            @endforeach
                            <td>
                                @php
                                    $totalJamSemuaMeja = array_sum($totalJamPerMeja); // Calculate total jam semua meja
                                @endphp
                                {{ $totalJamSemuaMeja }} jam
                            </td>
                            <td>Rp.{{ number_format($totalHargaSemuaTanggal, 0, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</html>