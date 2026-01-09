@extends('template.default')

@section('content')
<h1>Flight Create</h1>

<form action="{{ url('/flights') }}" method="post" enctype="multipart/form-data">
    @csrf

    <input type="text" name="name" placeholder="ชื่อ">
    <input type="text" name="type" placeholder="ชนิด">
    <input type="text" name="species" placeholder="สายพันธุ์">
    <input type="number" step="0.01" name="height" placeholder="ความสูง">
    <input type="number" step="0.01" name="weight" placeholder="น้ำหนัก">
    <input type="number" name="hp" placeholder="HP">
    <input type="number" name="attack" placeholder="การโจมตี">
    <input type="number" name="defense" placeholder="การป้องกัน">

    <input type="file" name="image">

    <button class="btn btn-primary" type="submit">บันทึก</button>
</form>

@include('flights.table')
@endsection
