<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             Daftar Laporan
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <button type="button" style="margin:20px; position:static   " class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Buat Pengaduan
              </button>
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Laporkan keluhan Anda</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="{{ route('masyarakat.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        @method('POST')
                        <div class="form-group">
                          <input type="hidden" name="nama_pengadu" value="{{ Auth::user()->name }}" class="">
                          <input type="hidden" name="nik" value="{{ Auth::user()->nik }}" class="">
                          <input type="hidden" name="tgl_pengaduan" value="{{ now()->timestamp }}" class="">
                          <input type="hidden" name="updated_at" value="{{ now()->timestamp }}" class="">
                          <input type="hidden" name="created_at" value="{{ now()->timestamp }}" class="">
                        </div>
                        <div class="form-group">
                          <label>Isi Laporan: </label>
                          <input type="text" name="isi_laporan" class="">
                        </div> &nbsp
                        <div class="form-group">
                          <label>Tanggal Kejadian</label>
                          <input type="date" name="tgl_kejadian" class="">
                        </div> &nbsp
                        <div class="form-group">
                          <label>Foto: </label>
                          <input type="file" name="foto" class="">
                        </div> &nbsp
                        <p>Jenis Laporan</p>
                          <input type="radio" id="privaet" name="akses" value="HTML">
                          <label for="html">Private</label><br>
                          <input type="radio" id="public" name="akses" value="CSS">
                          <label for="css">Public</label><br>
                      
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-outline-primary">Save changes</button>
                    </div>
                  </form>
                  </div>
                </div>
              </div>
            <table class="table table-bordered" style="margin: 20px">
            
            <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Tanggal Pengaduan</th>
                  <th scope="col">Tanggal Kejadian</th>
                  <th scope="col">Isi Laporan</th>
                  <th scope="col">Foto</th>
                  <th scope="col">Tanggapan</th>
                  <th scope="col">Akses Laporan</th>
                  <th scope="col">Status</th>
                  

                </tr>
              </thead>
              <tbody>
                @foreach ($data as $item)
                <tr>
                  <th scope="row">{{ ++$i }}</th>
                  <td>{{ $item->created_at }}</td>
                  <td>{{ $item->tgl_kejadian }}</td>
                  <td>{{ $item->isi_laporan }}</td>
                  <td>
                    @if ($item->foto)
                    <img src="{{ Storage::url($item->foto) }}" height="75" width="75" alt="" />
                    @endif
                </td>
                <td>
                  {{ $item->tanggapan }}
                </td>
                <td>
                  {{ $item->akses }}
                </td>
                <td>
                    @if ($item->status === 'tunggu')
                        <button type="button" class="btn btn-danger" padding: 8px" disabled="disabled" >{{ $item->status }}</button>
                    @elseif ($item->status === 'proses')
                        <button type="button" class="btn btn-primary" padding: 8px" disabled="disabled">{{ $item->status }}</button>
                    @else
                        <button style="background-color: green; color: azure; padding: 8px" disabled="disabled">{{ $item->status }}</button>
                    @endif
                </td>
                </tr>       
            @endforeach
        </table>
          </div>
        </div>
    </div>
</x-app-layout>