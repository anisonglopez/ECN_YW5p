//date picker

$(document).ready(function() {

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
  //date picker