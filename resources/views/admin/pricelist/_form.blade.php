<div class="mb-3">

    <label class="form-label">

        Nama Layanan

    </label>

    <input
        type="text"
        name="nama_layanan"
        class="form-control"
        value="{{ old('nama_layanan', $priceList->nama_layanan ?? '') }}"
        required>

</div>

<div class="mb-3">

    <label class="form-label">

        Harga

    </label>

    <input
        type="number"
        name="harga"
        class="form-control"
        value="{{ old('harga', $priceList->harga ?? '') }}"
        required>

</div>

<div class="mb-3">

    <label class="form-label">

        Deskripsi

    </label>

    <textarea
        name="deskripsi"
        rows="4"
        class="form-control"
        placeholder="Contoh: Tambahan cetak foto ukuran 4R">{{ old('deskripsi', $priceList->deskripsi ?? '') }}</textarea>

</div>

<div class="mb-3">

    <label class="form-label">

        Status

    </label>

    <select
        name="status"
        class="form-select">

        <option
            value="Aktif"
            {{ old('status', $priceList->status ?? '') == 'Aktif' ? 'selected' : '' }}>

            Aktif

        </option>

        <option
            value="Nonaktif"
            {{ old('status', $priceList->status ?? '') == 'Nonaktif' ? 'selected' : '' }}>

            Nonaktif

        </option>

    </select>

</div>

<button class="btn btn-sumi">

    Simpan

</button>

<a
href="{{ route('pricelist.index') }}"
class="btn btn-secondary">

    Kembali

</a>