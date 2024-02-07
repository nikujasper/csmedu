<script src="{{URL::asset('js/jQuery.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // alert("Hello");
        $('#c').change(function() {
            $.ajax({
                url: "getState",
                type: "POST",
                data: {
                    c: $(this).val(),
                    _token: "{{csrf_token()}}"
                },
                dataType: "JSON",
                success: function(res) {
                    // alert(res);
                    json_text = JSON.stringify(res);
                    obj = JSON.parse(json_text);
                    op = "";
                    $.each(obj, function(k, v) {
                        op = op + "<option>" + v + "</option>";
                    })
                    $("#s").html(op);
                }
            })
        })
        $('#s').change(function() {
            $.ajax({
                url: "getDistrict",
                type: "POST",
                data: {
                    c: $(this).val(),
                    _token: "{{csrf_token()}}"
                },
                dataType: "JSON",
                success: function(res) {
                    // alert(res);
                    json_text = JSON.stringify(res);
                    obj = JSON.parse(json_text);
                    op = "";
                    $.each(obj, function(k, v) {
                        op = op + "<option>" + v + "</option>";
                    })
                    $("#d").html(op);
                }
            })
        })
    })
</script>
<select name="" id="c">
    <option value="0" hidden>-country-</option>
    <option>India</option>
    <option value="pakistan">Pakistan</option>

</select>
<select name="" id="s">
    <option value="" hidden>-state-</option>
</select>
<select name="" id="d">
    <option value="" hidden>-district-</option>
</select>

<!-- @csrf -->