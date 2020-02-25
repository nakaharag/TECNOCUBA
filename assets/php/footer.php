    <footer class="footer">
      <div class="footer__copyright">
        <div class="container">
          <div class="row">
            <div class="col-md-8">
              <small>Copyright © 2017 TECNOCUBA - Todos os direitos Reservados - As fotos aqui veiculadas, logo e marca são de propriedade da TECNOCUBA</small>
            </div>
            <div class="col-md-4">
              <small class="credit pull-right">Desenvolvido por Agência KMC</small>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- Javascript files-->
    <script src="./assets/js/jquery-1.11.3.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
    <script src="./assets/js/moment.min.js"></script>
    <script src="./assets/js/maskedinput.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="./assets/js/jquery-ui.min.js"></script>
    <script src="./assets/js/jquery.dataTables.min.js"></script>
    <script src="./assets/js/script.js"></script>
    <script src="./assets/js/chosen.jquery.min.js"></script>
    <script src="./assets/js/jquery.form.min.js"></script>


    <!--<script src="http://code.jquery.com/jquery-1.9.1.js"></script>

    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID.-->
    <!---->
    <script>
      // (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
      // function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
      // e=o.createElement(i);r=o.getElementsByTagName(i)[0];
      // e.src='//www.google-analytics.com/analytics.js';
      // r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
      // ga('create','UA-51713035-10');ga('send','pageview');
      jQuery(function($){
        $.datepicker.regional['pt-BR'] = {
                closeText: 'Fechar',
                prevText: '&#x3c;Anterior',
                nextText: 'Pr&oacute;ximo&#x3e;',
                currentText: 'Hoje',
                monthNames: ['Janeiro','Fevereiro','Mar&ccedil;o','Abril','Maio','Junho',
                'Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun',
                'Jul','Ago','Set','Out','Nov','Dez'],
                dayNames: ['Domingo','Segunda-feira','Ter&ccedil;a-feira','Quarta-feira','Quinta-feira','Sexta-feira','Sabado'],
                dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sab'],
                dayNamesMin: ['Dom','Seg','Ter','Qua','Qui','Sex','Sab'],
                weekHeader: 'Sm',
                dateFormat: 'dd/mm/yy',
                firstDay: 0,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ''};
        $.datepicker.setDefaults($.datepicker.regional['pt-BR']);
});
     $(document).ready(function () {
        $('.data').datepicker({
            format: "dd/mm/yyyy",
            language: "pt-BR",
                beforeShow: function (input, inst) {
        var rect = input.getBoundingClientRect();
        setTimeout(function () {
          inst.dpDiv.css({ top: rect.top + 40, left: rect.left + 0 });
        }, 0);
    }
        });
      });

    $(".select-chosen").chosen({
    no_results_text: "Nenhum resultado encontrado!",
    width: "100%"
  });
    </script>
  </body>
</php>