<div class="row mb-3">
  <div class="col-sm-12">
    <input type="text" class="form-control" id="scanner-anggota" autofocus onkeyup="return anggotaEnterKeyPressed(event)">
  </div>
</div>
<script>
    $(document).ready(function() {
    document.getElementById("scanner-anggota").focus();});
    function anggotaEnterKeyPressed(event) {
        if (event.keyCode == 13) {
        var act = "pengunjung-simpan";
        var code = $('#scanner-anggota').val(); 
        $.post(act, {
          _token: $('#token').val(),
          status:status,
          code:code,
        }, function (data){
            if(data.status === 'error'){
            alert(data.message);
            }else{
              alert(data.message);
              //document.getElementById("id-anggota").value = data;
               //$('#table-data').html(data); 
           }
        });
        refreshScanAnggota();
      }
   }
</script>
