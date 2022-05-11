<div class="col-md-12">
    <div class="row">
        <div class="col-md-6">
            <button type="button" id="new_prod" class='btn btn-sm btn-primary'><i class='fa fa-plus'></i> Agregar Nuevo Producto </button>
        </div>
        <hr>
    </div>
    <div id="sticky_pg">
    <hr>
    <div class="row" style="margin:0">
    <div class="col-md-12" style="display:contents" id="pg-field">
    </div>
    </div>
    <hr>
    </div>
    <div class="row">
        <div class="col-md-4 text-right"><label for="filter" class="control-label">Buscar producto:</label></div>
        <div class="col-md-4">
        <div class="form-group has-search">
            <span class="fa fa-search form-control-feedback"></span>
            <input type="text" class="form-control" placeholder="Buscar" id="filter">
        </div>
        </div>
    </div>
    <br>
    <div class="row">
    <div class="div col-md-12" id="list_holder">
        
    </div>
    </div>
    <div class="row" id="no_result" style='display:none'>
        <div class="col-md-12">
            <center><i>Sin resultados.</i></center>
        </div>
    </div>
</div>
<div id="card_holder_clone" style="display: none">
	<div class="col-md-3 card-data">
         <div class="card mb-4 text-white bg-dark">
            <img class="card-img-top" src="" alt="Card image cap" style="height:145px">
            <div class="price-field"></div>
            <div class="avail-status"></div>
            <div class="card-body">
               <h5 class="card-title"> titulo</h5>
               <p class="card-text"></p>
               <div class="pull-right">
              	<a href="javascript:void(0)" class="btn btn-outline-light btn-sm edit_prod">Editar</a>
              	<a href="javascript:void(0)" class="btn btn-outline-light btn-sm remove_prod">Eliminar</a>
               </div>
            </div>
         </div>
    </div>
</div>
<style>
    .card-data{
        float:left
    }
    #list_holder{
        display:contents;
    }
    .pg-btns {
    margin: 0 4px;
    }
</style>
<script>
    $(document).ready(function(){
        $('#new_prod').click(function(){
            AjaxUniModal(50,'<?php echo base_url().'popup/show_data/product/manage_product/add' ?>','Agregar Nuevo Producto')
        })
        load_pg();

        load_cards();
    })
    window.load_pg = function(){
        $.ajax({
            url:'<?php echo base_url().'products/load_pg' ?>',
            type:'POST',
            data:{},
            error:(err)=>{
                console.log(err)
            },
            success:(resp)=>{
                if(resp){
                    var data = JSON.parse(resp)
                    $('#pg-field').html('<button class="btn btn-info pg-btns pull-left" data-id="all">Todos</button>')
                    if(typeof data != undefined && Object.keys(data).length > 0){
                        data.map(row=>{
                            $('#pg-field').append('<button class="btn btn-primary pg-btns pull-left" data-id="'+row.id+'">'+row.name+'</button>')

                        })


                    }
                    $('.pg-btns').each(function(){
                        $(this).click(function(){
                            $('.pg-btns.btn-info').removeClass('btn-info').addClass('btn-primary');
                            $(this).removeClass('btn-primary').addClass('btn-info')
                            load_cards($(this).attr('data-id'))
                        })
                    })
                }
            }
        })
    }
    window.load_cards = function($id = 'all'){
        $('#list_holder').html('<center><i>Loading Data...</i></center>')
        $.ajax({
            url:'<?php echo base_url().'products/get_products' ?>',
            method:'POST',
            data:{id:$id},
            error:(err)=>{
                console.log(err)
            },
            success:function(resp){
                if(resp){
                    $('#list_holder').html('')
					var data = JSON.parse(resp);
					// console.log(data)
					data.map(row=>{
						html = $('#card_holder_clone .card-data').clone();
						html.find('.card-title').html(row.name);
						html.find('.price-field').html('&#36; '+(parseFloat(row.price).toLocaleString('en-US',{style:'decimal','maximumFraction' : 2})));
                        if(row.status == 1)
                        html.find('.avail-status').html('<span class="badge badge-success">Disponible</span>');
                        else
                        html.find('.avail-status').html('<span class="badge badge-danger">No disponible</span>');

						html.find('.card-title').html(row.name);
                        html.find('.card-data').attr('data-name',row.name.toLowerCase());
						html.find('.card-text').html(row.description);
						if(row.img_path == '')
							row.img_path = 'uploads/products/logo.png'
						html.find('.card-img-top').attr('src','<?php echo base_url() ?>'+row.img_path);
						html.find('.edit_prod , .remove_prod').attr('data-id',row.id)
						$('#list_holder').append(html)
					})
                    filterable();

                    $('#list_holder .edit_prod').each(function(){
                        $(this).click(function(){
                            AjaxUniModal(50,'<?php echo base_url().'popup/show_data/product/manage_product/edit/' ?>'+$(this).attr('data-id'),'Editar Producto');
                        })
                    });
				
					$('#list_holder .remove_prod').each(function(){
						$(this).click(function(){
							delete_data('Estás seguro de eliminar <b>'+$(this).attr('data-name')+'</b> permanentemente?','delete_product',[$(this).attr('data-id')])
						})
					})
                }
                if($('#list_holder .card-data:visible').length <= 0){
                    $('#no_result').show();
                }else{
                    $('#no_result').hide();
                }
            }
        })
    }
    // $(window).scroll(function(e){ 
    //     var $el = $('#sticky_pg'); 
    //     var isPositionFixed = ($el.css('position') == 'fixed');
    //     if ($(this).scrollTop() > 200 && !isPositionFixed){ 
    //         $el.css({'position': 'fixed', 'top': '0px'}); 
    //     }
    //     if ($(this).scrollTop() < 200 && isPositionFixed){
    //         $el.css({'position': 'static', 'top': '0px'}); 
    //     } 
    //     });



window.delete_product = function($id){
    start_loader()
    $.ajax({

        url:'<?php echo base_url('products/delete_product') ?>',
        method:'POST',
        data:{id:$id},
        error:err=>{
            console.log(err)
            Dtoast('An error occred.','error');
            end_loader()
        },
        success:resp=>{
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

window.filterable = function(){
    $('#filter').keyup(()=>{
        $('.card-data .card-title').each(function(){
            // console.log($(this).html())
            $(this).closest('.card-data').toggle($(this).text().toLowerCase().indexOf($('#filter').val().toLowerCase()) > -1)
        })

       if($('#list_holder .card-data:visible').length <= 0){
           $('#no_result').show();
       }else{
           $('#no_result').hide();
       }
    })
}
</script>