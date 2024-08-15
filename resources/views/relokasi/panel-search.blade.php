<div class="row mb-3">
  <div class="col-sm-12">
    <select class="form-control key" onchange="dropdown(this.value);"></select>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
$('.key').select2({
        placeholder: '',
        ajax: {
        url: '/cari/buku',
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
        return {
            results:  $.map(data, function (item) {
            return {
            text: item.penulis + " - " + item.judul,
            id: item.kode
                }
            })
        };
        },
        cache: true
        }
    });

function dropdown(msg){
    var state=msg;
    var act = "/simpan/detil";
    //alert(status);
    $.post(act, {
        _token: $('#token').val(),
        code:state,
    }, function (data){
        if(data.status === 'error'){
            alert(data.message);
        }else{
           $('#table-data').html(data); 
       }
    });
    refreshSearch();
    refreshScan();
}
</script>
