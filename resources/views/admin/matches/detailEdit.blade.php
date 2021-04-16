@foreach($data as $db1)
    <form role="form" action="{{ url('admin/matches-score-update/'.$db1->id) }}">
        {{ csrf_field() }}
        <div class="box-body">
            <div class="form-group">
                <label for="col-form-label">Match Name</label> 
                <input type="hidden" class="form-control" name="segment_id" value="{{ $db1->match_id}}" readonly>
                <input type="text" class="form-control" name="match_name" value="{{ $db1->match_name}}" readonly>
            </div>
            <div class="form-group">
                <label for="col-form-label">Username</label> 
                <input type="text" class="form-control" name="username" value="{{ $db1->username}}" readonly>
            </div>
            <div class="form-group">
                <label for="col-form-label">Place</label> 
                <input type="text" class="form-control" name="place" id="place" value="{{ $db1->place}}">
            </div>
            <div class="form-group">
                <label for="col-form-label">Place Point</label> 
                <input type="text" class="form-control" name="place_point" id="place_point" value="{{ $db1->place_point}}">
            </div>
            <div class="form-group">
                <label for="col-form-label">Killed</label> 
                <input type="text" class="form-control" name="killed" id="killed" value="{{ $db1->killed}}">
            </div>
            <div class="form-group">
                <label for="col-form-label">Kill Win</label> 
                <input type="hidden" class="form-control" name="perkill" id="perkill" value="{{ $db1->kill}}" readonly>
                <input type="text" class="form-control" name="kill_win" id="kill_win" value="{{ $db1->kill_win}}" readonly>
            </div>
            <div class="form-group">
                <label for="col-form-label">Win Prize</label> 
                <input type="text" class="form-control" name="win_prize" id="win_prize" value="{{ $db1->win_prize}}">
            </div>
            <div class="form-group">
                <label for="col-form-label">Bonus</label> 
                <input type="text" class="form-control" name="bonus" id="bonus" value="{{ $db1->bonus}}" >
            </div>
            <div class="form-group">
                <label for="col-form-label">Total</label> 
                <input type="text" class="form-control" name="total" id="total" value="{{ $db1->total}}" readonly>
            </div>
            <div class="form-group">
                <label for="col-form-label">Refund</label> 
                <input type="text" class="form-control" name="refund" id="refund" value="{{ $db1->refund}}" >
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" id="simpan" class="btn btn-primary"> Update</button>
        </div>
    </form>
@endforeach
<script>
    $("#place").keypress(function(data){
        if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
            return false;
        }
    });
    $("#place_point").keypress(function(data){
        if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
            return false;
        }
    });
    $("#killed").keypress(function(data){
        if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
            return false;
        }
    });
    $("#perkill").keypress(function(data){
        if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
            return false;
        }
    });

    $("#kill_win").keypress(function(data){
        if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
            return false;
        }
    });
    $("#win_prize").keypress(function(data){
        if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
            return false;
        }
    });

    $("#bonus").keypress(function(data){
        if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
            return false;
        }
    });
    $("#total").keypress(function(data){
        if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
            return false;
        }
    });
    $("#refund").keypress(function(data){
        if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
            return false;
        }
    });

    function hitung(){

        var point       = $("#place_point").val();
        var jml_kill    = $("#killed").val();
        var perkill     = $("#perkill").val();
        var winprize    = $("#win_prize").val();
        var bonus       = $("#bonus").val();

        var killwin     = parseInt(jml_kill) * parseInt(perkill);
            if (!isNaN(killwin)) {
            document.getElementById('kill_win').value = killwin;
        }

        var total       = parseInt(point) + parseInt(killwin) + parseInt(winprize) + parseInt(bonus);
            if (!isNaN(total)) {
            document.getElementById('total').value = total;
        }
    }

    $("#place_point").keyup(function(){
        hitung();
    });

    $("#killed").keyup(function(){
        hitung();
    });

    $("#win_prize").keyup(function(){
        hitung();
    });

    $("#bonus").keyup(function(){
        hitung();
    });
    $("#total").keyup(function(){
        hitung();
    });

    $("#simpan").click(function(){
        var place		= $("#place").val();
        var place_point	= $("#place_point").val();
        var killed	    = $("#killed").val();
        var kill_win	= $("#kill_win").val();
        var win_prize   = $("#win_prize").val();
        var bonus		= $("#total").val();
        var refund		= $("#refund").val();

        var string      = $("#form").serialize();

        if(place.length==0){
            alert('Place is required');
            $("#place").focus();
            return false();
        }

        if(place_point.length==0){
            alert('Place Point is required');
            $("#place_point").focus();
            return false();
        }

        if(killed.length==0){
            alert('Killed is required');
            $("#killed").focus();
            return false();
        }

        if(kill_win.length==0){
            alert('Kill Win is required');
            $("#place").focus();
            return false();
        }

        if(win_prize.length==0){
            alert('Win Prize is required');
            $("#win_prize").focus();
            return false();
        }

        if(bonus.length==0){
            alert('Bonus is required');
            $("#bonus").focus();
            return false();
        }

        if(refund.length==0){
            alert('Refund is required');
            $("#refund").focus();
            return false();
        }
	
    });
</script>
