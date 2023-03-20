<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @if(Auth::user()->role === 'admin')
    <div class="container">
        <div class="card text-center mt-4 shadow">
            <div class="card-body bg-success style=width: 18rem;">
              <span class="card-title fs-2 fw-bold text-white d-flex mt-5 ms-4 pt-4">Halo {{Auth::user()->name}}</span>
              <span class="card-title fs-3 fw-bold align-right text-white d-flex">Mari lihat &nbsp
              <a href="laporan" class="btn btn-outline-warning fw-bold">Daftar Laporan</a>
              </span>
              <span class="card-title fs-3 fw-bold align-right text-white d-flex">Akhir akhir ini</span>
            </div> 
          </div>
    </div>
    @endif
</x-app-layout>
