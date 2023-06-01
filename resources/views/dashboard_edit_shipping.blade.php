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
                        <h2>Edit Ongkir</h2>
                        <div class="container">
                            <form action="{{route('shippingcost.update', $edit->id)}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="form-group row align-items-center mb-4">
                                    <div class="col">
                                        <label for="nama_edit">Nama Ongkir</label>
                                    </div>
                                    <div class="col-12 col-md">
                                        <input type="text" required class="form-control" id="nama_edit" name="nama_edit" value="{{ $edit->nama_shipping }}" />
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-4">
                                    <div class="col">
                                        <label for="telp_edit">Harga</label>
                                    </div>
                                    <div class="col-12 col-md">
                                        <input type="number" required class="form-control" id="harga_edit" name="harga_edit" value="{{ $edit->harga }}" />
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

    
    <script>
        document.getElementById('harga_edit').addEventListener('blur', function() {
            menghilangkanAngkaKoma(this);
        });
    
        function menghilangkanAngkaKoma(input) {
            if (input.value.includes('.')) {
                // Menghapus angka nol di belakang koma desimal
                input.value = parseFloat(input.value).toString();
            }
        }
    </script>
</x-app-layout>
