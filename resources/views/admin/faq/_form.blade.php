<div class="mb-3">

<label>

Pertanyaan

</label>

<input
type="text"
name="pertanyaan"
class="form-control"
value="{{ old('pertanyaan',$faq->pertanyaan ?? '') }}"
required>

</div>

<div class="mb-3">

<label>

Jawaban

</label>

<textarea
name="jawaban"
rows="5"
class="form-control"
required>{{ old('jawaban',$faq->jawaban ?? '') }}</textarea>

</div>

<div class="mb-3">

<label>

Status

</label>

<select
name="status"
class="form-select">

<option
value="Aktif"
{{ old('status',$faq->status ?? '')=="Aktif" ? 'selected' : '' }}>

Aktif

</option>

<option
value="Nonaktif"
{{ old('status',$faq->status ?? '')=="Nonaktif" ? 'selected' : '' }}>

Nonaktif

</option>

</select>

</div>

<button class="btn btn-sumi">

Simpan

</button>

<a
href="{{ route('faq.index') }}"
class="btn btn-secondary">

Kembali

</a>