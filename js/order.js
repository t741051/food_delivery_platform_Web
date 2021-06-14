/***********************************************************************
                             結帳清單
 ***********************************************************************/
    var food_id = new Array();
    var food_amount = new Array();

    var trCount = 1;
    var food_name = '';

    //添加行

    


    $('#add-line').click(function(){
    
        /*
        $.ajax({
            type: "GET",
            url: "http://localhost/test_food_order/restaurant_1.html",            
            dataType: "json",
            success: function(Jdata) {
              alert("SUCCESS!!!");
            },
           
            error: function() {
              alert("ERROR!!!");
            }
        });
*/
        var idRecord = 1;
        for(var i = 0;i < 3;i++){
            var trHtml = '<tr id="dynamic-line-'+idRecord+'">'		
            + '<td>'+trCount+'</td>'
            + '<td>'+food_name+'</td>'
            + '<td>'+food_amount[0]+'</td>';   

            $('#dynamic-table').append(trHtml);
            
            idRecord++;
            trCount++;
        }
    });
                                    