<!--<select name="category_id">
    @foreach($groups as $groups)
        <option value="{{ $groups->id }}">{{ $groups->category_name }}</option>
    @endforeach
</select>
-->
@section('content')
<h1>Category: {{ $groups->groupsname }}</h1>
<table class="table table-hover">
    <thead>
      <tr>
      <th>No.</th>
        <th>name</th>
        <th>email</th>

      </tr>
    </thead>
    <tbody>
    @foreach ($sports as $sports)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $sports->name }}</td>
                                        <td>{{ $sports->email }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
