function loadproducts(){
	var name = $("#search").val();
	if(name){
		$.ajax({
			type: 'post',
			data: {
				products:name,
			},
			url: '/pcbms/cashier/loadproducts.php',
			success: function (Response){
        if(Response){
				  $('#products').html(Response);
        }else{
          swal("Unknown Product","There is no product like that","warning");
          $('#products').html(Response).clearQueue();
        }
			}
		});
	}
};
function error_code(){
  swal("Warning","Product Code is Empty","warning");
};
function GrandTotal(){
  var TotalValue = 0;
  var TotalPriceArr = $('#tableData tr .totalPrice').get()
  var discount = $('#discount').val();

  $(TotalPriceArr).each(function(){
    TotalValue += parseFloat($(this).text().replace(/,/g, "").replace("₱",""));
  });

  if(discount != null){
    var f_discount = 0;
    var p_discount = 0;
    var t_discount = 0;
    p_discount = discount/100;
    f_discount = TotalValue * parseFloat(p_discount);
    t_discount = TotalValue - f_discount;

    $("#totalValue").text(accounting.formatMoney(t_discount,{symbol:"₱",format: "%s %v"}));
    $("#totalValue1").text(accounting.formatMoney(TotalValue,{format: "%v"}));
    $("#totalValue2").text(accounting.formatMoney(t_discount,{symbol:"₱",format: "%s %v"}));
  }else{
    $("#totalValue").text(accounting.formatMoney(TotalValue,{symbol:"₱",format: "%s %v"}));
    $("#totalValue1").text(accounting.formatMoney(TotalValue,{format: "%v"}));
    $("#totalValue2").text(accounting.formatMoney(t_discount,{symbol:"₱",format: "%s %v"}));
  }
};

$(document).on('change', '#discount', function(){
  GrandTotal();
});

$('body').on('click','.js-add',function(){
			var totalPrice = 0;
   		var target = $(this);
    	var product = target.attr('data-product');
    	var price = target.attr('data-price');
    	var barcode = target.attr('data-barcode');
    	var unit = target.attr('data-unit');   
        var qty = target.attr('data-qty');
        var quant = parseInt(qty);	
    	swal({
        title: "Enter number of items:",
  			content: "input",
		  })
		  .then((value) => {
			  if (value == "") {
				  swal("Error","Entered none!","error");
			  }else{
				  var qtynum = value;
				  if (isNaN(qtynum)){
    				swal("Error","Please enter a valid number!","error");
                }else if(qtynum == null){
                swal("Error","Please enter a number!","error");
            }else if(qtynum > quant){
                swal("Error","Not Enough Stocks, Stock Available:"+quant ,"error");
    		  }else{
    				var total = parseInt(value,10) * parseFloat(price);
    				$('#tableData').append("<tr class='prd'><td class='barcode text-center'><input type='hidden' id='code' name='code[]' value="+barcode+">"+barcode+"</td><td class='product text-center'><input type='hidden' id='name' name='name[]' value="+product+">"+product+"</td><td class='price text-center'><input type='hidden'id='price' name='price[]' value="+accounting.formatMoney(price,{symbol:"₱",format: "%s %v"})+">"+accounting.formatMoney(price,{symbol:"₱",format: "%s %v"})+"</td><td class='text-center'><input type='hidden' id='unit' name='unit[]' value="+unit+">"+unit+"</td><td class='qty text-center'><input type='hidden' id='quantity' name='quantity[]' value="+value+">"+value+"</td><td class='totalPrice text-center'><input type='hidden' id='total' name='total[]' value="+accounting.formatMoney(total,{symbol:"₱",format: "%s %v"})+">"+accounting.formatMoney(total,{symbol:"₱",format: "%s %v"})+"</td><td class='text-center p-1'><button class='btn btn-danger btn-sm' type='button' id='delete-row'><i class='fas fa-times-circle'></i></button><tr>");
	          GrandTotal();
        }
			}
  });
});

$(document).ready(function(){
  	document.getElementById("search").focus();
 });

$("body").on('click','#delete-row', function(){
   	var target = $(this);
   	swal({
  		title: "Remove this item?",
  		icon: "warning",
  		buttons: true,
  		dangerMode: true,
		})
		.then((willDelete) => {
  		if (willDelete) {
  			$(this).parents("tr").remove();
    		swal("Removed Successfully!", {
      		icon: "success",
    		});
    			GrandTotal();
  		}
	});
});

$(document).on('click','.Enter',function(){

  var TotalPriceArr = $('#tableData tr .totalPrice').get();

  if($('#customer').val() == 0){
      swal("Warning","Please Enter Customer Name!","warning");
      return false;
    }

  if (TotalPriceArr == 0){
    swal("Warning","No products ordered!","warning");
    return false; 
  }else{

    var product = [];
    var quantity = [];
    var price = [];
    var employee_id = $('#eid').val();
    var customer = $('#customer').val();
    var discount = $('#discount').val();

    $('.barcode').each(function(){
      product.push($(this).text());
    });
    $('.qty').each(function(){
      quantity.push($(this).text());
    });
    $('.price').each(function(){
      price.push($(this).text().replace(/,/g, "").replace("₱",""));
    });

    swal({
      title: "Enter Cash",
      content: "input",
    })
    .then((value) => {  
      if(value == "") {
        swal("Error","Entered None!","error");
      }else{

        var qtynum = value;
        if(isNaN(qtynum)){
          swal("Error","Please enter a valid number!","error");
        }else if(qtynum == null){
          swal("Error","Entered None!","error");
        }else{

          var change = 0;
          // var TotalPriceArr = $('#tableData tr .totalPrice').get()
          // $(TotalPriceArr).each(function(){
          //   TotalValue += parseFloat($(this).text().replace(/,/g, "").replace("₱",""));
          // });
          var TotalValue = parseFloat($('#totalValue').text().replace(/,/g, "").replace("₱",""));

          if(TotalValue > qtynum){
            swal("Error","Can't process a smaller number","error");
          }else{
            change = parseInt(value,10) - parseFloat(TotalValue);
            $.ajax({
              url:"cashier/addsales.php",
              method:"POST",
              data:{totalvalue:TotalValue, product:product, price:price, employee_id:employee_id, customer:customer, quantity:quantity, discount:discount},
              success: function(data){
                //alert(data);
                if( data == "success"){
                  swal({
                    title: "Change is " + accounting.formatMoney(change,{symbol:"₱",format: "%s %v"}),
                    icon: "success",
                    buttons: "Okay",
                  })
                  .then((okay)=>{
                    if(okay){
                      window.location.href='index.php?page=home';
                    }
                  })
                }else{
                  window.location.href='index.php?page=home'+data;
                }
                
              }
            });
          }
        }
      }
    });
  }
});

$(document).on('click','.cancel',function(e){
  var TotalPriceArr = $('#tableData tr .totalPrice').get();
  if (TotalPriceArr == 0){
    return 0;
  }else{
    swal({
      title: "Cancel orders?",
      text: "By doing this,orders will remove!",
      icon: "warning",
      buttons: ["No","Yes"],
      dangerMode: true,
    })
    .then((reload) => {
      if (reload) {
        location.reload();
      }
    });
  }
});
function out(){
  swal({
      title: "Logout?",
      icon: "warning",
      buttons: ["Cancel","Yes"],
      dangerMode: true,
    })
    .then((value) => {
      if(value){
            $.ajax({
              url: 'ajax.php?action=logout',
              success: function (data){
                window.location.href='login.php';
              }
            });
        }
    })
};
// function del(){
//   var lag = "delete";
//   swal({
//       title: "Delete",
//       text: "Are you Sure",
//       icon: "warning",
//       buttons: ["No","Yes"],
//       dangerMode: true,
//     })
//     .then((value) => {
//       if(value){
//         if(lag){
//             $.ajax({
//               method: 'post',
//               data: {
//                 delete:lag
//               },
//               url: 'index.php?page=delete',
              
//               success: function (data){
//                 alert(data);
//                 window.location.href='index.php?page=accounts';
//               }
//             });
//         }
//       }
//     })
// };
// $('body').on('click','#purprod1', function(){
//   var target = $(this);
//   swal({
//    title: "Remove this User?",
//    text: "Are you sure?",
//    icon: "warning",
//    buttons: true,
//    dangerMode: true,
//  })
//  .then((willDelete) => {
//    if (willDelete) {
//                 $.ajax({
//                   method: 'post',
//                   data: {
//                     delete:lag
//                   },
//                   url: 'index.php?page=delete',
                  
//                   success: function (data){
//                     alert(data);
//                     window.location.href='index.php?page=accounts';
//                   }
//                 });
//      $(this).parents("tr").remove();
//      swal("Removed Successfully!", {
//        icon: "success",
//      });
//    }
// });
// });