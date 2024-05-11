<select name="category_id">
    @foreach($categories as $categories)
        <option value="{{ $categories->id }}">{{ $categories->category_name }}</option>
    @endforeach
</select>

