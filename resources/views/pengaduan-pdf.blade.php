<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             Daftar Laporan
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
 
	<div class="container">
		<br/>
		<a href="{{ url('/cetak_pdf') }}" class="btn btn-primary" target="_blank">CETAK PDF</a> 
	</br>&nbsp
		
		<table class='table table-bordered'>
			<thead>
				<tr>
					<th>Id</th>
					<th>Nama</th>
					<th>Tanggal Pengaduan</th>
					<th>Nik</th>
					<th>Isi Laporan</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $p)
				<tr>
					<td>{{$p->id}}</td>
					<td>{{$p->nama_pengadu}}</td>
					<td>{{$p->created_at}}</td>
					<td>{{$p->nik}}</td>
					<td>{{$p->isi_laporan}}</td>
					<td>{{$p->status}}</td>
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
