<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @if(Auth::user()->role === 'admin')
    <div class="container">
        <div class="card text-center mt-4 shadow">
            <div class="card-body bg-success">
              <img src="{{ asset('..\..\assests\img\laporan.png')}}" class="w-50 float-start" alt="">
              <span class="card-title fs-2 fw-bold text-white d-flex mt-5 ms-4 pt-4">Halo {{Auth::user()->name}} Mari lihat &nbsp
              <a href="dataPengaduan" class="btn btn-warning fw-bold">Daftar Laporan</a>
              </span>
            </div>
          </div>
    </div>
    @endif
    @if(Auth::user()->role === 'masyarakat')
    <div class="container">
        <div class="card text-center mt-4 shadow">
            <div class="card-body bg-success">
              <img src="{{ asset('..\..\assests\img\masyarakat.png')}}" class="w-50 float-start" alt="">
              <span class="card-title fs-2 fw-bold text-white d-flex mt-5 ms-4 pt-4">Halo {{Auth::user()->name}} &nbsp
              <a href="riwayat" class="btn btn-outline-warning fw-bold">Laporkan</a>&nbsp Keluhan Anda
              </span>
            </div>
          </div>
    </div>
    @endif
    @if(Auth::user()->role === 'petugas')
    <div class="container">
        <div class="card text-center mt-4 shadow">
            <div class="card-body bg-success">
              <img src="{{ asset('..\..\assests\img\petugas.png')}}" class="w-50 float-start" alt="">
              <span class="card-title fs-2 fw-bold text-white d-flex mt-5 ms-4 pt-4">Halo {{Auth::user()->name}} Mari lihat &nbsp
              <a href="dataPengaduan" class="btn btn-outline-warning fw-bold">Daftar Pegaduan</a>
              </span>
            </div>
          </div>
    </div>
    @endif
</x-app-layout>
