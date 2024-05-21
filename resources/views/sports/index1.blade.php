<!--<select name="category_id">
    {{-- @foreach($categories as $categories) --}}
        {{-- <option value="{{ $categories->id }}">{{ $categories->category_name }}</option> --}}
    {{-- @endforeach --}}
</select>
-->
@section('content')
<h1>Category: {{ $categories->categoriesname }}</h1>
<table class="table table-hover">
    <thead>
      <tr>
      <th>No.</th>
        <th>Product Name</th>
        <th>price</th>

      </tr>
    </thead>
    <tbody>
    @foreach ($sports as $sports)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $sports->name }}</td>
                                        <td>{{ $sports->price }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
