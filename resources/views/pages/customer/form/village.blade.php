<select name="kelurahan" class="form-control">
    @foreach ($village as $item)
      <option data-id="{{ $item->id }}" value="{{ $item->name }}">{{ $item->name }}</option>
    @endforeach
</select>