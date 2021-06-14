/***********************************************************************
                            餐點數量加減按鈕
 ***********************************************************************/
  var count_1 = 0;
  var count_2 = 0;
  var count_3 = 0;
  var count_4 = 0;
  var count_5 = 0;
  var count_6 = 0;
  var count_7 = 0;
  var count_8 = 0;
  var count_9 = 0;
  var count_10 = 0;
  var count_11 = 0;
  var count_12 = 0;
  var count_13 = 0;
  var count_14 = 0;
  var count_15 = 0;
  var count_16 = 0;
  var count_17 = 0;
  var count_18 = 0;

 
  $(document).ready(function()  {
    add_amount('#quantity_add_1',"#count_1",count_1);
    sub_amount('#quantity_sub_1',"#count_1",count_1);

    add_amount('#quantity_add_2',"#count_2",count_2);
    sub_amount('#quantity_sub_2',"#count_2",count_2);

    add_amount('#quantity_add_3',"#count_3",count_3);
    sub_amount('#quantity_sub_3',"#count_3",count_3);

    add_amount('#quantity_add_4',"#count_4",count_4);
    sub_amount('#quantity_sub_4',"#count_4",count_4);

    add_amount('#quantity_add_5',"#count_5",count_5);
    sub_amount('#quantity_sub_5',"#count_5",count_5);

    add_amount('#quantity_add_6',"#count_6",count_6);
    sub_amount('#quantity_sub_6',"#count_6",count_6);

    add_amount('#quantity_add_7',"#count_7",count_7);
    sub_amount('#quantity_sub_7',"#count_7",count_7);

    add_amount('#quantity_add_8',"#count_8",count_8);
    sub_amount('#quantity_sub_8',"#count_8",count_8);

    add_amount('#quantity_add_9',"#count_9",count_9);
    sub_amount('#quantity_sub_9',"#count_9",count_9);
   
    
  });  
 
  function add_amount(add_btn_id, count,value){ //按鍵加ID  輸入框ID 輸入框顯示值
    $(add_btn_id).click( function()  { //1號餐數量加
      value = parseInt($(count).val(),10) + 1;      
      $(count).val(value);
    });    
  }  
  function sub_amount(sub_btn_id, count,value){
    $(sub_btn_id).click( function()  { //1號餐數量減
      value = parseInt($(count).val(),10) - 1;     
      $(count).val(value);
    });    
  }  
/***********************************************************************
                           
 ***********************************************************************/
                                  