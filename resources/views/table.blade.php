<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             Data Pengaduan
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="p-6 text-gray-900">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">id</th>
                                <th scope="col">Tanggal Pengaduan</th>
                                <th scope="col">Tanggal Kejadian</th>
                                <th scope="col">Nik</th>
                                <th scope="col">Laporan</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $datas)
                              <tr>
                                <td> {{ ++$i }} </td>
                                <td> {{ $datas->id }} </td>
                                <td> {{ $datas->created_at }} </td>
                                <td> {{ $datas->tgl_kejadian }} </td>
                                <td> {{ $datas->nik }} </td>
                                <td> {{ $datas->isi_laporan }} </td>
                                <td>
                                  @if ($datas->foto)
                                  <img src="{{ Storage::url($datas->foto) }}" height="75" width="75" alt="" />
                                  @endif
                              </td>
                                <td> {{ $datas->status }} </td>
                                <td>

                                    <form action="{{ route('admin.update', $datas->id) }}" method="POST">
                                      @csrf
                                      @method('PUT')
                                      @if ($datas->status === 'tunggu')
                                      <button type="submit" class="btn btn-outline-info">Validasi</button>
                                    </form>   
                                    @endif

                                      @if ($datas->status === 'selesai')
                                      <button class="btn btn-outline-info" disabled>Validasi</button>
                                      <br>
                                      <button class="btn btn-outline-success" disabled>Tanggapan</button>
                                      <br>
                                      <button class="btn btn-outline-danger" disabled>Hapus</button>

                                      @else
                                      <a class="btn btn-outline-success" href="{{ route('masyarakat.edit', $datas->id) }}">Tanggapan</a> 
                                      @endif
                                      <br>
                                      @if($datas->status != 'selesai')
                                      <form action="{{ route('admin.destroy',$datas->id) }}" method="POST">
                         
                                        @csrf
                                        @method('DELETE')
                            
                                        <button type="submit" class="btn btn-outline-danger;">Hapus</button>
                                    </form>
                                </td>
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
</x-app-layout>