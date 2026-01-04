<link href="<?= base_url() ?>/public/css/dynamic-forms.css" rel="stylesheet">
<link href="<?= base_url() ?>/public/css/sistema-global.css" rel="stylesheet">

<div class="panel panel-default panel-enhanced">
  <div class="panel-heading">
    <h4 class="panel-title"><i class="fas fa-database"></i> <b>INFORMACIÓN DE BASE DE DATOS</b></h4>
    <div class="panel-heading-btn">
      <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-expand" data-toggle="tooltip" title="Expandir panel">
        <i class="fa fa-expand"></i>
      </a>
      <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload" onclick="updatetables()" data-toggle="tooltip" title="Recargar datos">
        <i class="fas fa-sync-alt"></i>
      </a>
    </div>
  </div>
  <div class="panel-body border-panel">
    <div class="table-container">
      <table id="data-operadores" class="display nowrap table table-striped table-bordered dataTable no-footer dtr-inline collapsed" cellspacing="0" width="100%" role="grid" aria-describedby="data-operadores_info" style="width: 100%;">
        <thead>
          <tr role="row">
            <th class="sorting text-center" tabindex="0" aria-controls="data-operadores" rowspan="1" colspan="1" data-column-index="1" aria-label="Tablas: Activar para ordenar la columna de manera ascendente">
              <i class="fas fa-table"></i> Tablas
            </th>
            <th class="sorting text-center" tabindex="0" aria-controls="data-operadores" rowspan="1" colspan="1" data-column-index="2" aria-label="Filas: Activar para ordenar la columna de manera ascendente">
              <i class="fas fa-list-ol"></i> Filas
            </th>
            <th class="sorting text-center" tabindex="0" aria-controls="data-operadores" rowspan="1" colspan="1" data-column-index="3" aria-label="Longitud: Activar para ordenar la columna de manera ascendente">
              <i class="fas fa-hdd"></i> Tamaño
            </th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>

</table>

</div>
</div>

<script>
var base_url="<?=base_url();?>"  

$(function(){
App.setPageTitle('Gestión personal');

configtable('#data-operadores','Operadores');
  
var operadores=$('#data-operadores').DataTable({
"ajax": base_url + "bdatabase/view_tables",
"deferRender": true,
"idDataTables": "1",
"aoColumns": [
{ mData: 'table_name'},
{mData: 'table_rows'},
{mData: 'avg_row_length'}
],
initComplete: function(oSettings, json){
      $("#data-operadores_wrapper .dt-buttons")
         .append('<div class="btn-group">\
      <a class="btn btn-success" href="#bdatabase/create_backup"><i class="fa fa-database"></i> Generar Backup</a>\
    </div>');

      } 
}).on( 'draw', function () {
$('img[data-name]').initial({
height:64,
width:64,
charCount:2,
fontSize:24,
fontWeight:600
});
  
});
  
updatetables=function(){
operadores.ajax.reload( null, false );
$($.fn.dataTable.tables(true)).DataTable().columns.adjust().responsive.recalc();
}
  
})
  
</script>
