<select name="kota" onchange="getDistrict()" class="form-control">
    <option selected>Pilih Kabupaten</option>
    @foreach ($regency as $item)
      <option data-id="{{ $item->id }}" value="{{ $item->name }}">{{ $item->name }}</option>
    @endforeach
</select>