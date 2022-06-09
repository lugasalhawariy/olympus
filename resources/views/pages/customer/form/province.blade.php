<select name="provinsi" onchange="getRegency()" class="form-control">
    <option selected>Pilih Provinsi</option>
    @foreach ($provinces as $item)
      <option data-id="{{ $item->id }}" value="{{ $item->name }}">{{ $item->name }}</option>
    @endforeach
</select>