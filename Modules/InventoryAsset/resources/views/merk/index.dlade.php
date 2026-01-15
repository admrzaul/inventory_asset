@extends('layouts.app')

@section('content')
<h2>Data merk</h2>

<form method="GET" action="{{route ('merk') }}">
    <input
    type="text"
    name="cari"
    value="{{ $merk }}"
    placeholder="Cari nama / deskripsi..."
    >
    <button type="submit">Cari</button>
    @if ($merk)
    <a href="{{ route('merk') }}">Reset</a>
    @endif
</form>

<br>
    <table>
       <thead>
            <tr>
                <th>No</th>
                <th>Kode merk</th>
                <th>Nama merk</th>
                <th>Tipe merk</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($nean as $ega)
            <tr>
                <td>{{ $loop->iteration + ($filter->currentPage() -1)* $filter->perPage() }}</td>
                <td>{{ $ega->kode_merk }}</td>
                <td>{{ $ega->nama_merk }}</td>
                <td>{{ $ega->tipe_merk }}</td>
                <td>{{ $ega->keterangan }}</td>
                <td>{{ $ega->created_at?->format('d m y') }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4" align="center">Data tidak ditemukan</td>
            </tr>
        @endforelse
    </tbody>
</table>

<br>

{{ $filter->withQueryString()->links() }}
@endsection