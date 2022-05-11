<div class="col-lg-12">
    <div class="row">
        <div class="col-md-4">
            <button class="btn btn-sm btn-primary" type='button' id="new_pg"><i class='fa fa-plus'> Agregar categoria de producto</i></button>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-8">
            <div id="tbl_holder">

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#new_pg').click(function(){
            AjaxUniModal(40,'<?php echo base_url().'popup/show_data/product/manage_pgroup/add' ?>','Agregar categoria de producto');
        })

        load_tbl();
    })
    function load_tbl(){
        $('#tbl_holder').html("<center><p>Loading data.</p></center>");

        var html = '';
        html +='<table class="table table-bordered table-striped" id="pg_tbl">'
        html +='<colgroup>'
        html +='<col width="10%">'
        html +='<col width="40%">'
        html +='<col width="30%">'
        html +='<col width="20%">'
        html +='</colgroup>'
        html +='<thead>'
        html +='<tr>'
        html +='<th>#</th>'
        html +='<th>Categoria</th>'
        html +='<th>Estado</th>'
        html +='<th>Opciónes</th>'
        html +='</tr>'
        html +='</thead>'
        html +='<tbody>'

       html+= '<tr><td colspan="4"><center>Loading data.</center></td></tr>'

        html +='</tbody>'
        html +='</table>'
        $('#tbl_holder').html(html)
        $.ajax({
            url:'<?php echo base_url().'products/get_pg' ?>',
            method:'POST',
            data:{},
            error:(err)=>{
                console.log(err)

            },
            success:(resp)=>{
                if(resp){
                    var data = JSON.parse(resp);
                     var i = 1;
                     var html = '';
                     if(typeof data.rows != undefined){
                         if(Object.keys(data.list).length >0){
                             Object.keys(data.list).map(k=>{
                                 console.log(data.list[k])
                                 html += '<tr>'
                                 html += '<td>'+(i++)+'<t/d>'
                                 html += '<td>'+(data.list[k].name)+'</td>'
                                 if(data.list[k].status == 1)
                                  html += '<td><center><span class="badge badge-success">Disponible</span></center></td>'
                                  else
                                  html += '<td><center><span class="badge badge-warning">No disponible</span></center></td>'
                                  html +='<td><center>'
                                  
                                  html += '<div class="dropdown">'+
                                    '<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acción</button>'+
                                        '<span class="sr-only">Toggle Dropdown</span>'+
                                    '</button>'+
                                    '<div class="dropdown-menu">'+
                                        '<a class="dropdown-item edit_pg" href="javascript:void(0)" data-id="'+data.list[k].id+'">Editar</a>'+
                                        '<div class="dropdown-divider"></div>'+
                                        '<a class="dropdown-item remove_pg" href="javascript:void(0)" data-id="'+data.list[k].id+'" data-name="'+data.list[k].name+'">Eliminar</a>'+
                                    '</div>'+
                                    '</div>';

                                  html += '</center></td>';
                                 html += '</tr>'
                             })
                             $('#pg_tbl tbody').html(html)

                         }else{
                            $('#pg_tbl tbody').html('')

                         }
                     }else{
                        $('#pg_tbl tbody').html('')
                     }
                     
                     $('.edit_pg').each(function(){
                        $(this).click(function(){
                            var url = '<?php echo base_url().'popup/show_data/product/manage_pgroup/edir/' ?>'+$(this).attr('data-id');
                            AjaxUniModal(40,url,'Editar categoria de producto')
                        })
                    })

                    $('.remove_pg').each(function(){
                        $(this).click(function(){
                            delete_data('Estás seguro de eliminar <b>'+($(this).attr('data-name'))+'</b> de esta lista? Está operación no se podrá revertir.','delete_pg',[$(this).attr('data-id')]);
                        })
                    })

                }
            },
            complete:function(){
                             $('#pg_tbl').dataTable();
              
            }
        })
        // $('#pg_tbl').dataTable();

        
    }
    function delete_pg($id){
        start_loader();
        $.ajax({
            url:'<?php echo base_url().'products/delete_pg/' ?>',
            method:'POST',
            data:{id:$id},
            error:(err)=>{
                console.log(err)
                Dtoast('An error occured.')
                end_loader()
            },
            success:function(resp){
                if(resp == 1){
                    Dtoast('Data successfully deleted');
                    $('.modal').modal('hide');
                    setTimeout(()=>{
                        location.reload()
                    },1500)
                }else{
                    Dtoast('An error occured.')
                    end_loader()
                }
            }
        })
    }
</script>