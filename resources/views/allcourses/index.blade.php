@extends('layouts.guest')

@section('content')
<div>
<h1>Všetky kurzy</h1>
<table>
    <thead>
        <tr>
            <th>Názov kurzu</th>
            <th>Vyučujúci</th>
            <th>Typ</th>
            <th>Status</th>
            <th>Aktívny</th>
            <th>Editovať</th>
        </tr>
    </thead>
    <tbody>
        @foreach($allCourses as $record)
            <tr>
                <td>{{$record['name']}}</td>
                <td>{{$record['lecturer']}}</td>
                <td>{{$record['type']}}</td>
                <td>{{$record['status']}}</td>
                <td>{{$record['active']}}</td>
                <td>--</td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection