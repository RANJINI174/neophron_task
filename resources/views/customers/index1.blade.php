<!--<select name="category_id">
    @foreach($Groups as $Groups)
        <option value="{{ $Groups->id }}">{{ $Groups->category_name }}</option>
    @endforeach
</select>
-->
@section('content')
<h1>Category: {{ $Groups->groupsname }}</h1>
<table class="table table-hover">
    <thead>
      <tr>
      <th>No.</th>
        <th>name</th>
        <th>groups_id</th>

      </tr>
    </thead>
    <tbody>
    @foreach ($Customers as $Customers)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $Customers->name }}</td>
                                        <td>{{ $Customers->groups_id }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
