<select name="kecamatan" onchange="getVillage()" class="form-control">
  <option selected>Pilih Kecamatan</option>
    @foreach ($district as $item)
      <option data-id="{{ $item->id }}" value="{{ $item->name }}">{{ $item->name }}</option>
    @endforeach
</select>