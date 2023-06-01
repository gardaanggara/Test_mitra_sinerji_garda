<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight d-flex justify-content-center">
            <button type="button" class="btn btn-primary flex-fill" data-bs-toggle="modal" data-bs-target="#modal1" data-bs-whatever="@mdo">Tambah Data Barang</button>
            <button type="button" class="mx-2 btn btn-success flex-fill" data-bs-toggle="modal" data-bs-target="#modal2" data-bs-whatever="@fat">Tambah Data Pembeli</button>
            <button type="button" class="mx-2 btn btn-secondary flex-fill" data-bs-toggle="modal" data-bs-target="#modal4" data-bs-whatever="@fat">Tambah Data Diskon</button>
            <button type="button" class="mx-2 btn btn-info flex-fill" data-bs-toggle="modal" data-bs-target="#modal5" data-bs-whatever="@fat">Tambah Data Ongkir</button>
        </h2>
    </x-slot>
        
     <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="d-flex">                 
                        <button type="button" class="btn btn-warning flex-fill" data-bs-toggle="modal" data-bs-target="#modal3" data-bs-whatever="@getbootstrap">Pilih Barang</button>          
                    </div>      
                            <div class="card-body">
                                <h2>Transaksi</h2>
                                <div class="container">
                                    {{-- <form action="{{route('transaction.store')}}" method="POST"> --}}
                                        @csrf
                                        <div class="form-group row align-items-center mb-4">
                                            <div class="col">
                                                <label>No</label>
                                            </div>
                                            <div class="col-12 col-md">
                                                <input type="text" required class="form-control" name="code_transaction" id="randomNumber" readonly />
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center mb-4">
                                            <div class="col">
                                                <label>Tanggal</label>
                                            </div>
                                            <div class="col-12 col-md">
                                                <input type="date" required class="form-control" name="date_transaction" id="date_transaction"/>
                                            </div>
                                        </div>
                                        <h2 class="mt-3">Customer</h2>
                                        <div class="form-group row align-items-center mb-4">
                                            <div class="col">
                                                <label>Kode</label>
                                            </div>
                                            <div class="col-12 col-md">
                                                <select class="form-control" name="code_cust" id="kodepembeli" oninput="onSelectCustomer(event)">
                                                    <option data-id='null' >Pilih Pembeli</option>
                                                    @foreach($datacustomer as $kd)
                                                        <option value="{{$kd->id}}" 
                                                            data-kode='{{$kd->kode}}' 
                                                            data-name='{{$kd->name}}'
                                                            data-telp='{{$kd->telp}}'
                                                            >Kode {{$kd->kode}} - {{$kd->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center mb-4">
                                            <div class="col">
                                                <label>Nama</label>
                                            </div>
                                            <div class="col-12 col-md">
                                                <input type="text" required class="form-control" id="customer_name" name="customer_name" readonly/>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center mb-4">
                                            <div class="col">
                                                <label>Nomor Telepon</label>
                                            </div>
                                            <div class="col-12 col-md">
                                                <input type="text" required class="form-control" id="customer_telp" name="customer_telp" readonly/>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table mt-3">
                                                <thead>
                                                    <form action="{{ route('delete-cart') }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Batal</button>
                                                </form>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Aksi</th>
                                                    <th scope="col">Kode Barang</th>
                                                    <th scope="col">Jumlah</th>
                                                    <th scope="col">Nama Barang</th>
                                                    <th scope="col">Harga Bandrol</th>
                                                    <th scope="col">Diskon (%)</th>
                                                    <th scope="col">Diskon (Rp.)</th>
                                                    <th scope="col">Harga Diskon</th>
                                                    <th scope="col">Total Bayar</th>
                                                </tr>
                                                </thead>
                                                <tbody id="body-cart">
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="flex flex-column align-items-end">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <label>Subtotal</label>
                                                </div>
                                                <div class="col">
                                                    <input type="text" class="mt-1 mb-1 form-control" id="subtotal" name="subtotal" readonly/>
                                                </div>
                                            </div>
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <label>Diskon</label>
                                                </div>
                                                <div class="col">
                                                    <input type="text" class="mt-1 mb-1 form-control" id="diskon" name="diskon" readonly/>
                                                </div>
                                            </div>
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <label>Ongkir</label>
                                                </div>
                                                <div class="col">
                                                    <input type="text" class="mt-1 mb-1 form-control" id="ongkir" name="ongkir" readonly/>
                                                </div>
                                            </div>
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <label>Total Bayar</label>
                                                </div>
                                                <div class="col">
                                                    <input type="text" class="mt-1 mb-1 form-control" id="total_bayar" name="total_bayar" readonly/>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="text-end">
                                        <button class="mt-1 mb-1 btn btn-primary" onclick="addTransaction(event)">Simpan Data</button>
                                    </form>
                                    </div>
                                </form>
                                </div>
                            </div>

                            <div class="modal fade" id="modal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Masukan Data Pembeli</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('item.store')}}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label">Kode</label>
                                                <input type="text" class="form-control" name="kode">
                                                <div id="emailHelp" class="form-text">Isi sesuai data yang akan dimasukkan</div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Nama</label>
                                                <input type="text" class="form-control" name="nama">
                                                <div id="emailHelp" class="form-text">Isi sesuai data yang akan dimasukkan</div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Harga</label>
                                                <input type="text" class="form-control" name="harga">
                                                <div id="emailHelp" class="form-text">Isi sesuai data yang akan dimasukkan</div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Tambah Data</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Masukan Data Pembeli</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/customer" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label">Kode</label>
                                                <input type="text" class="form-control" name="kode">
                                                <div id="emailHelp" class="form-text">Isi sesuai data yang akan dimasukkan</div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Nama</label>
                                                <input type="text" class="form-control" name="name">
                                                <div id="emailHelp" class="form-text">Isi sesuai data yang akan dimasukkan</div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Nomor Telepon</label>
                                                <input type="text" class="form-control" name="telp">
                                                <div id="emailHelp" class="form-text">Isi sesuai data yang akan dimasukkan</div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Tambah Data</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="modal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Pilih Barang</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                @foreach ($dataitem as $di)
                                                <div class="col-4">
                                                    <div>Kode: {{$di->kode}}</div>
                                                    <h4>{{$di->nama}}</h4>
                                                    <p>Rp {{$di->harga}}</p>
                                                    <select class="form-control mb-2" name="voucher-{{$di->kode}}">
                                                        <option data-id='null' value="{{null}}" >Pilih Diskon</option>
                                                        @foreach($datavoucher as $kd)
                                                        <option value="{{$kd->harga}}" 
                                                            data-id='{{$kd->id}}' 
                                                            data-nama_vouher='{{$kd->nama_voucher}}'
                                                            >Kode {{$kd->id}} - {{$kd->nama_voucher}} Rp.{{$kd->harga}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    <select class="form-control mt-2 mb-2" name="shipping-{{$di->kode}}">
                                                        <option data-id='null' value="{{null}}" >Pilih Pengiriman</option>
                                                        @foreach($datashipping as $kd)
                                                        <option value="{{$kd->harga}}" 
                                                            data-id='{{$kd->id}}' 
                                                            data-nama_shipping='{{$kd->nama_shipping}}'
                                                            >Kode {{$kd->id}} - {{$kd->nama_shipping}} Rp.{{$kd->harga}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    <input type="number" id="{{$di->kode}}" name="qty-{{$di->kode}}" class="form-control" oninput="checkQty({{$di->kode}})" />
                                                    <button class="btn btn-primary d-none" id="btn-qty-{{$di->kode}}" onclick="addToCart('{{$di->kode}}', '{{$di->nama}}', '{{$di->harga}}')">Tambah ke keranjang</button>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            </div>
                            <div class="modal fade" id="modal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Masukan Data Pembeli</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('voucher.store')}}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label">Nama Diskon</label>
                                                <input type="text" class="form-control" name="nama_diskon">
                                                <div id="emailHelp" class="form-text">Isi sesuai data yang akan dimasukkan</div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Harga Diskon</label>
                                                <input type="text" class="form-control" name="harga_diskon">
                                                <div id="emailHelp" class="form-text">Isi sesuai data yang akan dimasukkan</div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Tambah Data</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="modal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Masukan Data Pembeli</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('shippingcost.store')}}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label">Nama Ongkir</label>
                                                <input type="text" class="form-control" name="nama_ongkir">
                                                <div id="emailHelp" class="form-text">Isi sesuai data yang akan dimasukkan</div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Harga Ongkir</label>
                                                <input type="text" class="form-control" name="harga_ongkir">
                                                <div id="emailHelp" class="form-text">Isi sesuai data yang akan dimasukkan</div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Tambah Data</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let order = 1;
        let arrKodeBarang = []
        
        function generateRandomNumber() {
            const currentDate = new Date();
            const yearMonth = `${currentDate.getFullYear()}${(currentDate.getMonth() + 1)
                .toString()
                .padStart(2, "0")}`;
            const randomNumber = order.toString().padStart(2, "0");
            order++;
            return `${yearMonth}-${randomNumber}`;
        }
    
        const inputNumber = document.getElementById("randomNumber");

        function formatRowCart(item) {
                const serializeObj = {}

                serializeObj.kode_barang = item.kode_barang
                serializeObj.jumlah = item.qty
                serializeObj.nama_barang = item.nama_barang
                serializeObj.harga_bandrol = item.hargabandrol
                serializeObj.diskon_percent = Math.floor(100 * item.diskon_voucher / parseFloat(item.hargabandrol)) 
                serializeObj.diskon_price = item.diskon_voucher
                serializeObj.harga_diskon = item.harga_diskon
                serializeObj.total_bayar = item.total_bayar

            return serializeObj
        }

        async function getCartList() {
        const tbodyElm = document.getElementById('body-cart')
            while (tbodyElm.firstChild) {
                tbodyElm.removeChild(tbodyElm.firstChild);
            }

            try {
                const response = await fetch('/api/cart-list');
                const result = await response.json()
                const {data} = result
                const tbody = document.getElementById('body-cart')
                const serializeData = []

                data.map(item => {
                    const serializeObj = formatRowCart(item)
                    serializeData.push(serializeObj)
                })


                serializeData.map((item, key) => {
                    const tr = document.createElement('tr')
                    const td1 = document.createElement('td')
                    const td2 = document.createElement('td')
                    const button = document.createElement('button')

                    button.classList.add('btn')
                    button.classList.add('btn-success')
                    button.textContent = 'Edit'

                    td1.textContent = key + 1
                    
                    td2.appendChild(button)

                    tr.appendChild(td1)
                    tr.appendChild(td2)
                    
                    for (const idx in item) {
                        const td2 = document.createElement('td')
                        td2.textContent = item[idx]
                        tr.appendChild(td2)
                    }

                    tbody.appendChild(tr)
                })
            } catch (e) {
                console.error(e)
            }
        }

        async function addToCart(kode, nama, harga) {
                const formData = {
                    kode,
                    nama_barang: nama,
                    hargabandrol: harga,
                    diskon_voucher: document.querySelector(`[name="voucher-${kode}"]`).value,
                    diskon_shipping: document.querySelector(`[name="shipping-${kode}"]`).value,
                    qty: document.querySelector(`[name="qty-${kode}"]`).value,
                }

                const response = await fetch('/api/cart', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(formData)
                })
                const data = await response.json()

                if (data) {
                    getCartList()
                }
        }

        async function addTransaction(kode, tgl, cust_id, subtotal, diskon, ongkir, total_bayar) {
                const formData = {
                    code_transaction: document.getElementById(`randomNumber`).value,
                    date_transaction: document.getElementById(`date_transaction`).value,
                    code_cust: document.getElementById(`kodepembeli`).value,
                    subtotal: document.getElementById(`subtotal`).value,
                    diskon: document.getElementById(`diskon`).value,
                    ongkir: document.getElementById(`ongkir`).value,
                    total_bayar: document.getElementById(`total_bayar`).value,
                }

                const response = await fetch('/api/transaction', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(formData)
                })
                
        }

        function checkQty(kode) {
            if (document.querySelector(`input[name="qty-${kode}"]`).value !== "" && document.querySelector(`input[name="qty-${kode}"]`).value != 0) {
                document.getElementById(`btn-qty-${kode}`).classList.remove('d-none'); // Remove the 'd-none' class to show the button
            } else {
                const arrKodeBarangIdx = arrKodeBarang.findIndex(item => item.kode == kode)
                arrKodeBarang.splice(arrKodeBarangIdx, 1)
                document.getElementById(`btn-qty-${kode}`).classList.add('d-none'); // Add the 'd-none' class to hide the button
            }
        }

        async function onSelectCustomer(e) {
            const response = await fetch('/api/customer/' + e.target.value)
            const result = await response.json();
            const {data} = result
            const {name, telp} = data
            
            document.getElementById('customer_name').value = name
            document.getElementById('customer_telp').value = telp
        } 
        window.addEventListener("DOMContentLoaded", function() {
            const randomNum = generateRandomNumber();
            inputNumber.value = randomNum;

            getCartList()
        });


    </script>
</x-app-layout>
