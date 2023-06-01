<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{--  --}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="d-flex">
                    </div>
                    <div class="card-body">
                        <h2>Edit Customer</h2>
                        <div class="container">
                            <form action="{{route('customer.update', $edit->id)}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="form-group row align-items-center mb-4">
                                    <div class="col">
                                        <label for="kode_edit">Kode</label>
                                    </div>
                                    <div class="col-12 col-md">
                                        <input type="text" required class="form-control" id="kode_edit" name="kode_edit" value="{{ $edit->kode }}" />
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-4">
                                    <div class="col">
                                        <label for="nama_edit">Nama</label>
                                    </div>
                                    <div class="col-12 col-md">
                                        <input type="text" required class="form-control" id="nama_edit" name="name_edit" value="{{ $edit->name }}" />
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-4">
                                    <div class="col">
                                        <label for="telp_edit">Nomor Telepon</label>
                                    </div>
                                    <div class="col-12 col-md">
                                        <input type="text" required class="form-control" id="telp_edit" name="telp_edit" value="{{ $edit->telp }}" />
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
