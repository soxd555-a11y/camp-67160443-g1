@extends('template.default')

@section('title','ผลลัพธ์ข้อมูล')

@section('content')
@php
// Mapping สี hex => ชื่อสีไทย
$colorNames = [
    '#2563eb' => 'ฟ้า',
    '#ff0000' => 'แดง',
    '#00ff00' => 'เขียว',
    '#ffff00' => 'เหลือง',
    '#000000' => 'ดำ',
    '#ff00ff' => 'ชมพู',
    '#ffa500' => 'ส้ม',
    '#800080' => 'ม่วง',
    '#808080' => 'เทา',
];
$colorHex = $data['color'] ?? '';
$colorName = $colorNames[$colorHex] ?? $colorHex; // ถ้าไม่อยู่ใน mapping ใช้ hex เดิม
@endphp

<div class="card shadow p-4">
    <h2 class="text-center mb-4">ข้อมูลที่คุณกรอก</h2>

    <p><strong>ชื่อ :</strong> {{ $data['fname'] ?? '' }}</p>
    <p><strong>นามสกุล :</strong> {{ $data['lname'] ?? '' }}</p>
    <p><strong>วันเกิด :</strong> {{ $data['dob'] ?? '' }}</p>
    <p><strong>เพศ :</strong> {{ $data['gender'] ?? '' }}</p>
    <p><strong>ที่อยู่ :</strong> {{ $data['address'] ?? '' }}</p>

    <p><strong>สีที่ชอบ :</strong>
        <span style="background:{{ $colorHex }};
            padding:5px 15px;
            color:white;
            border-radius:5px;">
            {{ $colorName }}
        </span>
    </p>

    <p><strong>เพลงที่ชอบ :</strong>
        {{ is_array($data['genres'] ?? null) ? implode(', ', $data['genres']) : '' }}
    </p>

    <div class="text-center mt-4">
        <a href="http://camp-67160443-g1.test/" class="btn btn-primary">
            กลับไปหน้าแบบฟอร์ม
        </a>
    </div>
</div>
@endsection
