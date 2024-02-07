<table border="1px " style="border-collapse: collapse;">
    @foreach($getst as $row)
    <tr>
        <td>{{$row->name}}</td>
        <td>{{$row->sname}}</td>
        <td>{{$row->scode}}</td>
    </tr>
    @endforeach
</table>
<br>
<hr><br>

<form action="stateJoinORM" id="state_data" action="state_data" method="get">
    @csrf

    State:<select name="scode" id="scode">
        <option value="" hidden>-select-</option>
        @foreach($st as $s)
        <option value="{{$s->scode}}">{{$s->sname}}</option>
        @endforeach
    </select>
    <button type="submit" id="btnsubmit">Show</button>
</form>

<br>
<hr><br>

@if ($u_s_data)
<table border="1px" style="border-collapse: collapse;">
    <tr>
        <th>SL#</th>
        <th>Name</th>
        <th>State</th>
    </tr>
    <?php $sl = 1; ?>
    @foreach($u_s_data as $val)
    <tr>
        <td>{{ $sl++ }}</td>
        <td>{{ $val->name }}</td>
        <td>{{ $val->sname }}</td>
    </tr>
    @endforeach
</table>
@endif