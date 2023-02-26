@extends('layouts.booking.main')


@section('container')

<div class="container">

        @if(session()->has('success'))
            <div class="alert alert-success mt-5" role="alert">
            {{ session('success') }}
            </div>
        @endif
        <div class="card shadow mt-3">
            <div class="card-body">
                <div class="table-responsive">
                    <a href="/home" class="btn btn-danger mb-3"> Back Home </a>
                    <table class="table table-bordered" id="#" width="100%" cellspacing="0">
                        <thead class="table-dark">
                            <tr>
                                <th>Tanggal Booking</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Lama Sewa</th>
                                <th>Total Harga</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-light">
                            @foreach($bookings as $bk)
                            <tr>
                                <td> {{ date('d-m-Y', strtotime($bk->created_at))  }} </td>
                                <td> {{ date('d-m-Y', strtotime($bk->tgl_pinjam)) }} </td>
                                <td> {{ date('d-m-Y', strtotime('+' . $bk->lama_pinjam . 'days', strtotime($bk->tgl_pinjam))) }} </td>
                                <td> {{ $bk->lama_pinjam }} </td>
                                <td> {{ $bk->total_harga }} </td>
                                @if( $bk->keterangan == 'Lunas' )
                                <td> 
                                    <form action="/bukti-booking/{{ $bk->id }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-success"> Lihat Bukti Booking</button>
                                    </form> 
                                </td>
                                @else
                                <td> <a href="/bayar/{{ $bk->kode_booking }}/konfirmasi" class="btn btn-warning">Lakukan Pembayaran</a> </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection