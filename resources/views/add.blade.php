<form action="add" method="get">
    <input type="text" id="fno" name="fno">
    <input type="text" id="sno" name="sno">
    <button type="submit">Add</button>
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <p>{{isset($result)?$result:'0'}}</p>
</form>