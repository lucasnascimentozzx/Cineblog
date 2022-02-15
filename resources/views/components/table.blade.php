<table class="table">
    <thead>
      <tr>
        @foreach ($collumns as $col)
            <th scope="col">{{$col}}</th>
        @endforeach
      </tr>
    </thead>
    <tbody>
    {{$slot}}

    </tbody>
  </table>