$(document).ready(function(){
   /* #imagem é o id do input, ao alterar o conteudo do input execurará a função baixo */
   $('#image').live('change',function(){
       $('#img').html('<img src="ajax-loader.gif" alt="Enviando..."/> Enviando...');
      /* Efetua o Upload sem dar refresh na pagina */
      $('#input-form').ajaxForm({
          target:'#view' // o callback será no elemento com o id #visualizar
       }).submit();
   });
})