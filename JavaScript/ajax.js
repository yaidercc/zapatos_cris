$(document).ready(function(){
    $.ajax({
      type: 'POST',
      url: 'php/llamar_producto.php'
    })
    .done(function(a){
      $('#producto').html(a)
    })
    .fail(function(){
      alert('Hubo un errror al cargar las listas_rep')
    })
  
    $(function() {
        $(document).on('change','#producto',function(){
            var id= $("#producto").val();
            $.ajax({
                type:'POST',
                url:'llamar_atributos.php',
                data:{'id':id}
            })
            .done(function(a){
                $('#nombre').val(a)
            })
            .fail(function(){
                alert('error')
            })
         });
    });
})
