<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pembayaran Retribusi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .header {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1 class="header">Laporan Pembayaran Retribusi</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pemilik Rekening</th>
                <th>No. Rekening</th>
                <th>Biaya Retribusi</th>
                <th>Tanggal Bayar</th>
                <th>Tindak Lanjut</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembayaran as $index => $data)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $data->nama_pemilik_rekening }}</td>
                    <td>{{ $data->no_rekening }}</td>
                    <td>Rp {{ number_format($data->biaya_retribusi, 2, ',', '.') }}</td>
                    <td>{{ $data->created_at->format('d-m-Y') }}</td>
                    <td>{{ $data->tanggal_tindak_lanjut ?? 'Belum Ditindak' }}</td>
                    <td>
                        @if ($data->status === 'Y')
                            Sesuai
                        @elseif ($data->status === 'N')
                            Tidak Sesuai
                        @else
                            Belum Diverifikasi
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
