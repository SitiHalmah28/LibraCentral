<div class="row mb-3">
  <div class="col-sm-12">
    <input type="text" class="form-control" id="scanner" autofocus onkeyup="return enterKeyPressed(event)">
  </div>
</div>
<script>
    $(document).ready(function() {
    document.getElementById("scanner").focus();});
    function enterKeyPressed(event) {
        if (event.keyCode == 13) {
        var act = "/simpan/buku";
        var code = $('#scanner').val(); 
        $.post(act, {
          _token: $('#token').val(),
          status:status,
          code:code,
        }, function (data){
            if(data.status === 'error'){
                alert(data.message);
            }else{
               $('#table-data').html(data); 
           }
        });
        refreshScanRelokasi();
      }
   }
</script>