<div>
    {{-- <form action="{{ url('report/recommendations') }}" method="post"> --}}
        @csrf

        <table class="table" id="products_table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recommends as $index => $recommend)
                    <tr>
                        <td>
                            <select name="recommends[{{ $index }}][nama_barang]"
                                wire:model="recommends.{{ $index }}.nama_barang"
                                class="form-control"
                            >
                                <option value="">-- choose product --</option>
                                @foreach ($stocks as $stock)
                                    <option value="{{ $stock->nama_barang }}">
                                        {{ $stock->nama_barang }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="number" class="form-control"
                                name="recommends[{{ $index }}][quantity]" 
                                wire:model="recommends.{{ $index }}.quantity"
                            >
                        </td>
                        <td>
                            <a href="#"
                                wire:click.prevent="removeRecommend({{ $index }})">Delete</a>
                        </td>
                    </tr>
                @endforeach
                @foreach ($manualRecommends as $index => $manualRecommend)
                    <tr>
                        <td>
                            <input type="text" class="form-control" 
                                name="manualRecommends[{{ $index }}][nama_barang]" 
                                wire:model.defer="manualRecommends.{{ $index }}.nama_barang">
                        </td>
                        <td>
                            <input type="number" class="form-control"
                                name="manualRecommends[{{ $index }}][quantity]" 
                                wire:model.defer="manualRecommends.{{ $index }}.quantity"
                            >
                        </td>
                        <td>
                            <a href="#"
                                wire:click.prevent="removeManualRecommends({{ $index }})">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-sm btn-secondary" wire:click.prevent="addRecommend">+ Add Another Product</button>
                <button class="btn btn-sm btn-secondary" wire:click.prevent="addManualRecommends">+ Add Manual Product</button>
            </div>
        </div>
        {{-- BUTTON GROUP --}}
        {{-- <div class="d-flex justify-content-end">
            <a type="button" class="btn btn-info" href="{{ url('expert') }}">BACK</a>
            <button type="submit" class="btn btn-primary mx-5">SUBMIT</button>
        </div> --}}
    {{-- </form> --}}
</div>