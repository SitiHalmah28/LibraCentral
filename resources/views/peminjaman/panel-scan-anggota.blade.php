<div class="row mb-3">
  <div class="col-sm-12">
    <input type="text" class="form-control" id="scanner-anggota" onkeyup="return anggotaEnterKeyPressed(event)">
  </div>
</div>
<script>
    $(document).ready(function() {
    document.getElementById("scanner-anggota").focus();});
    function anggotaEnterKeyPressed(event) {
        if (event.keyCode == 13) {
        var act = "/cari/anggota";
        var code = $('#scanner-anggota').val(); 
        $.post(act, {
          _token: $('#token').val(),
          status:status,
          code:code,
        }, function (data){
            if(data.status === 'error'){
            alert(data.message);
            }else{
              document.getElementById("id-anggota").value = data;
               //$('#table-data').html(data); 
           }
        });
        refreshScanAnggota();
      }
   }
</script>