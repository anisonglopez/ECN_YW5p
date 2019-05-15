//date picker

$(document).ready(function() {
    var progress = $(".loading-progress").progressTimer({
        timeLimit: 5,
        onFinish: function () {
            $('#progressTimer').hide();
        }
    });
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    today = yyyy + '/' + mm + '/' + dd;

    var day30_pass = new Date();
    var dd = String(day30_pass.getDate()).padStart(2, '0');
    var mm = String(day30_pass.getMonth()).padStart(2, '0'); //January is 0!
    var yyyy = day30_pass.getFullYear();
    day30_pass = yyyy + '/' + mm + '/' + dd;

    var cre_date_start =   day30_pass;
    var cre_date_end = today;
//Ready Onload
$.ajax({              
    url: "ajax/ecn_table.php",
    type: 'POST',
    data: {cre_date_start:cre_date_start, cre_date_end:cre_date_end },
    success: function(data) {
        progress.progressTimer('complete');
        $('#detail').html(data);          
    },
    error: function(jqXHR, status, error) {
        progress.progressTimer('error', {
            errorText:'ERROR!',
            onFinish:function(){
            }
        });
    }
});

//enc ajax onload
    $('input[name="daterange"]').daterangepicker({
      opens: 'left',
      locale: {  format: 'DD/MM/YYYY' }  
    }
    , function(start, end, label) {
        var progress = $(".loading-progress").progressTimer({
            timeLimit: 5,
            onFinish: function () {
                $('#progressTimer').hide();
            }
        });
        var cre_date_start = start.format('YYYY-MM-DD') ;
        var cre_date_end = end.format('YYYY-MM-DD');
    $.ajax({              
        url: "ajax/ecn_table.php",
        type: 'POST',
        data: {cre_date_start:cre_date_start, cre_date_end:cre_date_end },
        success: function(data) {
            progress.progressTimer('complete');
            $('#detail').html(data);          
        },
        error: function(jqXHR, status, error) {
            progress.progressTimer('error', {
                errorText:'ERROR!',
                onFinish:function(){
                }
            });
        }
    });
    });

  });
  function export_excel() {
    var cre_date_start = $('input[name="daterange"]').data('daterangepicker').startDate.format('YYYY-MM-DD');
    var cre_date_end = $('input[name="daterange"]').data('daterangepicker').endDate.format('YYYY-MM-DD');
  $.ajax({              
      url: "ajax/ecn_export.php",
      type: 'POST',
      data: {cre_date_start:cre_date_start, cre_date_end:cre_date_end },
      success: function(data) {
            window.location = 'ajax/ecn_export.php';
            //console.log(data);
      }
  });
}
