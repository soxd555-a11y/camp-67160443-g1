@extends('template.default')

@section('title','Workshop Form')

@section('content')
<h1 class="mb-4">WORKSHOP # HTML - FORM</h1>

<form id="workshopForm" novalidate>

    <!-- ชื่อ / สกุล -->
    <div class="row mb-3">
        <div class="col-md-6">
            <label class="form-label">ชื่อ</label>
            <input type="text" id="fname" class="form-control">
            <div class="invalid-feedback">กรุณากรอกชื่อ</div>
        </div>

        <div class="col-md-6">
            <label class="form-label">สกุล</label>
            <input type="text" id="lname" class="form-control">
            <div class="invalid-feedback">กรุณากรอกสกุล</div>
        </div>
    </div>

    <!-- วันเกิด -->
    <div class="mb-3">
        <label class="form-label">วัน/เดือน/ปีเกิด</label>
        <input type="date" id="dob" class="form-control">
        <div class="invalid-feedback">กรุณาเลือกวันเกิด</div>
    </div>

    <!-- เพศ -->
    <div class="mb-3">
        <label class="form-label">เพศ</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="gender_male" value="ชาย">
            <label class="form-check-label">ชาย</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="gender_female" value="หญิง">
            <label class="form-check-label">หญิง</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="gender_other" value="อื่นๆ">
            <label class="form-check-label">อื่นๆ</label>
        </div>
        <div class="text-danger small d-none" id="genderError">กรุณาเลือกเพศ</div>
    </div>

    <!-- รูป -->
    <div class="mb-3">
        <label class="form-label">รูป (อัพโหลด)</label>
        <input type="file" id="photo" class="form-control" accept="image/*">
        <div class="invalid-feedback">กรุณาเลือกรูปภาพ</div>

        <div id="photoPreview" class="mt-2 d-none">
            <img id="photoImg" class="img-thumbnail" style="max-width:150px">
            <div class="small text-muted">ตัวอย่างรูป</div>
        </div>
    </div>

    <!-- ที่อยู่ -->
    <div class="mb-3">
        <label class="form-label">ที่อยู่</label>
        <textarea id="address" class="form-control" rows="3"></textarea>
        <div class="invalid-feedback">กรุณากรอกที่อยู่</div>
    </div>

    <!-- สี -->
    <div class="mb-3">
        <label class="form-label">สีที่ชอบ</label>
        <input type="color" id="color" class="form-control form-control-color" value="#2563eb">
    </div>

    <!-- แนวเพลง -->
    <div class="mb-3">
        <label class="form-label">แนวเพลงที่ชอบ</label>
        <div class="row">
            <div class="col-6 form-check">
                <input class="form-check-input genre" type="checkbox" value="ป๊อป">
                <label class="form-check-label">ป๊อป</label>
            </div>
            <div class="col-6 form-check">
                <input class="form-check-input genre" type="checkbox" value="ร็อก">
                <label class="form-check-label">ร็อก</label>
            </div>
            <div class="col-6 form-check">
                <input class="form-check-input genre" type="checkbox" value="แจ๊ส">
                <label class="form-check-label">แจ๊ส</label>
            </div>
            <div class="col-6 form-check">
                <input class="form-check-input genre" type="checkbox" value="คลาสสิก">
                <label class="form-check-label">คลาสสิก</label>
            </div>
            <div class="col-6 form-check">
                <input class="form-check-input genre" type="checkbox" value="ฮิปฮอป">
                <label class="form-check-label">ฮิปฮอป</label>
            </div>
        </div>
        <div class="text-danger small d-none" id="genreError">กรุณาเลือกแนวเพลงอย่างน้อย 1 รายการ</div>
    </div>

    <!-- ยินยอม -->
    <div class="mb-3 form-check">
        <input type="checkbox" id="agree" class="form-check-input">
        <label class="form-check-label">ยินยอมให้เก็บข้อมูล</label>
        <div class="text-danger small d-none" id="agreeError">กรุณายินยอมก่อนส่งข้อมูล</div>
    </div>

    <!-- ปุ่ม -->
    <div class="d-flex justify-content-between">
        <button type="reset" class="btn btn-secondary">Reset</button>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</form>
@endsection

@push('scripts')
<script>
document.getElementById('workshopForm').addEventListener('submit', function (e) {
    e.preventDefault();

    let isValid = true;

    const fname = document.getElementById('fname');
    const lname = document.getElementById('lname');
    const dob = document.getElementById('dob');
    const address = document.getElementById('address');
    const photo = document.getElementById('photo');
    const agree = document.getElementById('agree');

    // function ตรวจช่อง text
    function checkInput(input) {
        if (input.value.trim() === '') {
            input.classList.add('is-invalid');
            input.classList.remove('is-valid');
            isValid = false;
        } else {
            input.classList.add('is-valid');
            input.classList.remove('is-invalid');
        }
    }

    checkInput(fname);
    checkInput(lname);
    checkInput(address);

    // วันเกิด
    if (dob.value === '') {
        dob.classList.add('is-invalid');
        isValid = false;
    } else {
        dob.classList.remove('is-invalid');
    }

    // เพศ
    const genderChecked = document.querySelector('input[name="gender"]:checked');
    document.getElementById('genderError').classList.toggle('d-none', genderChecked);
    if (!genderChecked) isValid = false;

    // แนวเพลง
    const genres = document.querySelectorAll('.genre:checked');
    document.getElementById('genreError').classList.toggle('d-none', genres.length > 0);
    if (genres.length === 0) isValid = false;

    // ยินยอม
    document.getElementById('agreeError').classList.toggle('d-none', agree.checked);
    if (!agree.checked) isValid = false;

    if (isValid) {
        alert('ส่งข้อมูลเรียบร้อยแล้ว 🎉');
        // this.submit();
    }
});

// preview รูป
document.getElementById('photo').addEventListener('change', function () {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('photoImg').src = e.target.result;
            document.getElementById('photoPreview').classList.remove('d-none');
        }
        reader.readAsDataURL(file);
    }
});
</script>
@endpush
