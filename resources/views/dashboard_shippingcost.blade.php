<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="card-body">
                        <h2 class="mb-4">List Data Barang</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered dt-responsive nowrap" id="mhs-datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Ongkir</th>
                                        <th>Harga Ongkir</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($datashipping as $key => $d)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $d->nama_shipping }}</td>
                                        <td>{{ $d->harga }}</td>
                                        <td>
                                            <form action="{{ route('shippingcost.destroy', $d->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('shippingcost.edit', $d->id) }}" class="btn btn-success">Edit</a>
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- @if (session('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                        @endif --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>