<select name="category_id">
    @foreach($categories as $categories)
        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
    @endforeach
</select>
