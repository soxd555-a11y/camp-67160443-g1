 <table class="table">
        <thead>
            <tr>
            <th>ชื่อ</th>
            <th>ชนิด</th>
            <th>สายพันธุ์</th>
            <th>สูง</th>
            <th>หนัก</th>
            <th>HP</th>
            <th>Atk</th>
            <th>Def</th>
            <th>รูป</th>
            <th>จัดการ</th>
        </tr>
        </thead>
         <?php foreach ($flight as $item) {?>
        <tr>
        <td>{{ $item->name }}</td>
        <td>{{ $item->type }}</td>
        <td>{{ $item->species }}</td>
        <td>{{ $item->height }}</td>
        <td>{{ $item->weight }}</td>
        <td>{{ $item->hp }}</td>
        <td>{{ $item->attack }}</td>
        <td>{{ $item->defense }}</td>
    <td>
    <img src="{{ asset('storage/'.$item->image_url) }}" width="80">
    </td>
            <td>
                <a class="btn btn-warning" href="{{ url('/flights/'.$item->id.'/edit')}}">
                    แก้ไข
                </a>
                <form
                style="display:inline-block"
                action="{{ url('/flights/'.$item->id)}}" method="post" >
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">ลบ</button>

                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
    @endsection

