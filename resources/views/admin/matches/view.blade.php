<script type="text/javascript">
    $(function() {
        $("#dataTables.details tr:even").addClass("stripe1");
        $("#dataTables.details tr:odd").addClass("stripe2");
        $("#dataTables.details tr").hover(
            function() {
                $(this).toggleClass("highlight");
            },
            function() {
                $(this).toggleClass("highlight");
            }
        );
    });

   
  
    </script>

{{-- <script type="text/javascript">
    $(document).ready(function(){
        $.ajaxSetup({
     headers:{
       'X-CSRF-Token' : $("input[name=_token]").val()
     }
   });
 
   $('#dataTables.details').Tabledit({
     url:'{{ route("matches-views") }}',
     columns:{
       identifier:[0, 'id'],
        dataTables.details:[[1, 'gameid']]
     },
     restoreButton:false,
     onSuccess:function(data, textStatus, jqXHR)
     {
       if(data.action == 'delete')
       {
         $('#'+data.id).remove();
       }
     }
   });
    });  
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script> --}}
    <style type="text/css">
    .stripe1{
        background-color: cornsilk;
    }
    .stripe2{
    
    }
    th {
            text-align: center;
            height: 30px;
            background-color:#343a40;
            color: aliceblue;
        }
    
    </style>
        <table id="dataTables" class="table table-inverse table-striped table-bordered" width="100%">
        <tr>
            <th>No</th>
            <th>Player Name</th>
            <th>Members</th>
            <th>Match Name</th>
        </tr>
        @php
            if($data->count() > 0){
                foreach($data as $key =>$db){  
                @endphp    
                <tr>
                    <td align="center">{{ $key+1 }}</td>
                    <td align="center">{{ $db->username }}</td>
                    <td align="center">{{ $db->name }}</td>
                    <td align="center">{{ $db->match_name }}</td>
                </tr>
            @php
                }
            }else{
            @endphp
                <tr>
                    <td colspan="4" align="center" >No data available in table</td>
                </tr>
                @php	
            }
        @endphp
        </table>
    </div>