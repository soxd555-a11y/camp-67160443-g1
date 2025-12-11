<!doctype html>
<html lang="th">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>ฟอร์มสมัคร</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600&display=swap');

    body{
      font-family:'Prompt', sans-serif;
      background:linear-gradient(135deg,#dbeafe,#f5d0fe);
      padding:40px;
    }

    .card{
      max-width:820px;
      margin:0 auto;
      background:#ffffffcc;
      backdrop-filter:blur(12px);
      border-radius:22px;
      padding:34px;
      box-shadow:0 12px 32px rgba(0,0,0,0.08);
      animation:fadeIn .5s ease;
    }

    @keyframes fadeIn { from{opacity:0; transform:translateY(10px);} to{opacity:1; transform:none;} }

    h1{
      font-size:28px;
      font-weight:600;
      color:#1e293b;
      margin-bottom:4px;
    }

    p.lead{
      margin-top:0;
      margin-bottom:24px;
      color:#475569;
      font-size:15px;
    }

    form{
      display:grid;
      grid-template-columns:repeat(auto-fit, minmax(260px, 1fr));
      gap:18px;
    }

    label{
      font-size:14px;
      font-weight:500;
      margin-bottom:6px;
      display:block;
      color:#334155;
    }

    input[type="text"], input[type="date"], input[type="file"], select, textarea, input[type="color"]{
      width:100%;
      padding:10px 14px;
      border:1px solid #cbd5e1;
      border-radius:12px;
      background:#f8fafc;
      transition:0.25s;
      font-size:15px;
    }

    input:focus, textarea:focus{
      border-color:#6366f1;
      background:white;
      box-shadow:0 0 0 3px #c7d2fe;
      outline:none;
    }

    textarea{
      min-height:90px;
      resize:vertical;
    }

    .full{ grid-column:1/-1; }

    .gender, .genres{
      display:flex;
      gap:14px;
      flex-wrap:wrap;
      font-size:15px;
    }

    .consent{
      display:flex;
      align-items:center;
      gap:12px;
      padding:14px;
      background:#f1f5f9;
      border-radius:14px;
      border:1px solid #e2e8f0;
    }

    .preview img{
      width:90px;
      height:90px;
      border-radius:14px;
      object-fit:cover;
      border:1px solid #cbd5e1;
      box-shadow:0 3px 6px rgba(0,0,0,0.1);
    }

    .actions{
      grid-column:1/-1;
      display:flex;
      justify-content:flex-end;
      gap:14px;
      margin-top:10px;
    }

    button{
      padding:12px 20px;
      border-radius:14px;
      border:none;
      cursor:pointer;
      font-size:15px;
      font-weight:600;
      transition:0.25s;
    }

    button.reset{
      background:#e2e8f0;
      color:#475569;
    }
    button.reset:hover{
      background:#cbd5e1;
    }

    button.save{
      background:#6366f1;
      color:white;
      box-shadow:0 4px 12px rgba(99,102,241,0.4);
    }
    button.save:hover{
      background:#4f46e5;
      box-shadow:0 6px 16px rgba(99,102,241,0.55);
    }

  </style>
</head>
<body>
  <div class="card">
    <h1>Workshop #HTML - FORM</h1>

    <form id="regForm">
      <div>
        <label for="fname">ชื่อ</label>
        <input id="fname" name="fname" type="text">
      </div>

      <div>
        <label for="lname">สกุล</label>
        <input id="lname" name="lname" type="text" >
      </div>

      <div>
        <label for="dob">วัน/เดือน/ปีเกิด</label>
        <input id="dob" name="dob" type="date" >
      </div>

      <div>
        <label>เพศ</label>
        <div class="gender">
          <label><input type="radio" name="gender" value="ชาย" required> ชาย</label>
          <label><input type="radio" name="gender" value="หญิง"> หญิง</label>
          <label><input type="radio" name="gender" value="อื่นๆ"> อื่นๆ</label>
        </div>
      </div>

      <div class="full">
        <label for="photo">รูป (อัพโหลด)</label>
        <input id="photo" name="photo" type="file" accept="image/*">
        <div class="preview small" id="photoPreview" style="margin-top:8px;display:none"><img id="photoImg" alt="preview"><div class="small">ตัวอย่างรูป</div></div>
      </div>

      <div class="full">
        <label for="address">ที่อยู่</label>
        <textarea id="address" name="address" ></textarea>
      </div>

      <div>
        <label for="color">สีที่ชอบ</label>
        <input id="color" name="color" type="color" value="#2563eb">
      </div>

      <div>
        <label>แนวเพลงที่ชอบ</label>
        <div class="genres">
          <label><input type="checkbox" name="genre" value="ป๊อป"> ป๊อป</label>
          <label><input type="checkbox" name="genre" value="ร็อก"> ร็อก</label>
          <label><input type="checkbox" name="genre" value="แจ๊ส"> แจ๊ส</label>
          <label><input type="checkbox" name="genre" value="คลาสสิก"> คลาสสิก</label>
          <label><input type="checkbox" name="genre" value="ฮิปฮอป"> ฮิปฮอป</label>
        </div>
      </div>

      <div class="full consent">
        <label style="display:flex;align-items:center;gap:8px"><input id="agree" name="agree" type="checkbox" required> ยินยอมให้เก็บข้อมูล </label>
      </div>

      <div class="full actions">
        <button type="reset" class="reset" id="btnReset">Reset</button>
        <button type="submit" class="save" id="btnSave">Submit</button>
      </div>
    </form>

    <div id="message" class="small" style="margin-top:12px;color:green;display:none"></div>
  </div>

  <script>
    const photoInput = document.getElementById('photo');
    const photoPreview = document.getElementById('photoPreview');
    const photoImg = document.getElementById('photoImg');
    const form = document.getElementById('regForm');
    const message = document.getElementById('message');

    photoInput.addEventListener('change', () => {
      const file = photoInput.files && photoInput.files[0];
      if (!file) { photoPreview.style.display = 'none'; return; }
      const reader = new FileReader();
      reader.onload = e => {
        photoImg.src = e.target.result;
        photoPreview.style.display = 'flex';
      };
      reader.readAsDataURL(file);
    });

    form.addEventListener('submit', e => {
      e.preventDefault();
      // เก็บข้อมูลเป็น object
      const data = new FormData(form);
      const obj = {
        fname: data.get('fname') || '',
        lname: data.get('lname') || '',
        dob: data.get('dob') || '',
        gender: data.get('gender') || '',
        address: data.get('address') || '',
        color: data.get('color') || '',
        genres: data.getAll('genre') || [],
        agreed: data.get('agree') === 'on'
      };

      // รูปเก็บเป็น data URL ถ้ามี
      const file = photoInput.files && photoInput.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = ev => {
          obj.photo = ev.target.result; // data URL
          saveToLocal(obj);
        };
        reader.readAsDataURL(file);
      } else {
        saveToLocal(obj);
      }
    });

    function saveToLocal(obj) {
      // ตัวอย่าง: เก็บไว้ใน localStorage (สำหรับเดโมเท่านั้น)
      const all = JSON.parse(localStorage.getItem('registrations') || '[]');
      all.push(Object.assign({savedAt: new Date().toISOString()}, obj));
      localStorage.setItem('registrations', JSON.stringify(all));
      message.style.display = 'block';
      message.textContent = 'บันทึกเรียบร้อย (เก็บไว้ใน localStorage)';
      form.reset();
      photoPreview.style.display = 'none';
      setTimeout(()=>{ message.style.display='none'; }, 4000);
    }

    // ปุ่มรีเซ็ต: ซ่อน preview
    document.getElementById('btnReset').addEventListener('click', () => {
      photoPreview.style.display = 'none';
    });
  </script>
</body>
</html>
