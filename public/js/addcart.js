// ajax push cart detail
Storage.prototype.setObj = function(key, value){
	this.setItem(key, JSON.stringify(value));
}

Storage.prototype.getObj = function(key){
	var value = this.getItem(key);
	return value && JSON.parse(value);
}

function loadcartdt(){
			var cartdt = localStorage.getObj('product');
			var ids = [], soluong = [];
			for(var i = 0; i < cartdt.length; i++){
			 	ids.push(cartdt[i].id);
			 	soluong[cartdt[i].id] = cartdt[i].quantity;
			}
			$.ajax({
				url:'ajax/cart_detail_order',
				data: {ids: JSON.stringify(ids)},
				datatype: 'json',
				success:function(data){
					var html ="", tongtien = 0;
					for(var i = 0; i < data.length; i++){
						var itm = data[i];
						console.log(itm);
						var tien = soluong[itm.id] * itm.gia_sach;
						tongtien += tien;
						html += '<tr> <td class="des"> <a href="/pibook/public/chitiet/'+itm.id+'"> <strong class="ng-binding">'+itm.ten_sach+'</strong> </a> <span class="ng-binding"></span> </td> <td class="image"> <a href="/san-pham/son-moi-itachi.html"> <img src="upload/images/'+itm.anh_bia+'" class="img-responsive"></a> </td> <td class="price ng-binding">'+itm.gia_sach+'</td> <td class="quantity"> <input type="number" value="'+soluong[itm.id]+'" idbook="'+itm.id+'" class="text ng-pristine ng-untouched ng-valid soluongitem" ng-model="item.Quantity" ng-change="updateItemCart(item)" min="1"> </td> <td class="amount ng-binding" amount-item="">'+tien+'</td> <td class="remove"> <a idbook="'+itm.id+'" class="delete-cart-detail"> <i class="fas fa-trash-alt"></i> </a> </td> </tr>';
					}
					console.log(tongtien);
					$("#list-item").html(html);	
					$("#tongtien").html(tongtien);

				},
				error:function(err){
					console.log(err);
				},
			})
		}

function update_header_cart(){
	var cartdt = localStorage.getObj('product');
	console.log(cartdt);
	var qty = 0;
	var ids = [], soluong = [];
	if(cartdt != null){
		for(var i = 0; i < cartdt.length; i++){
		 	ids.push(cartdt[i].id);
		 	soluong[cartdt[i].id] = cartdt[i].quantity;
		 	qty += cartdt[i].quantity;
		};
		$('#total_qty').html(qty);
		$.ajax({
			url:'ajax/cart_detail_order',
			data: {ids: JSON.stringify(ids)},
			datatype: 'json',
			success:function(data){
				var html ="", tongtien = 0;
				for(var i = 0; i < data.length; i++){
					var itm = data[i];
					var tien = soluong[itm.id] * itm.gia_sach;
					tongtien += tien;
					html += '<div class="item-cart clearfix"> <div class="nav-bar-item"> <figure class="image-cart "> <a href=""> <img alt="'+itm.ten_sach+'" src="upload/images/'+ itm.anh_bia +'" class="img-responsive"> </a> </figure> <div class="text_cart"> <h4> <a href="">'+ itm.ten_sach +'</a> </h4> <span class="variant"> </span> <div class="price-line"> <div class="down-case"><span class="new-price"> '+ itm.gia_sach +'₫ <span class="down-case"> x '+ soluong[itm.id] +'</span></span></div> </div> </div> <span class="delete-cart-detail remove_link" idbook="'+ itm.id +'"> <a> <i class="fas fa-trash-alt"></i> </a> </span> </div> </div>';
				}
				$("#header-cart-items").html(html);	
				$("#tongtien").html(tongtien);

			},
			error:function(err){
				console.log(err);
			},
		})
	}
};

function event_add_cart(){
	$(document).find('.ajax_add_to_cart_button').on('click',function(){
	var idbook = $(this).attr('idbook');
	var productJSON = {'id': idbook, 'quantity': 1};
	var productarray = [];
	// console.log(typeof productarray);
	if(localStorage.getObj('product') !== null){
		productarray = localStorage.getObj('product');
		var added = false;
		for (var i = 0; i < productarray.length; i++) {
			if(productarray[i].id == idbook){
				productarray[i].quantity += 1;
				localStorage.setObj('product', productarray);
				added = true;
				break;
			}
		}
		if(!added){
			productarray.push(productJSON);
			localStorage.setObj('product', productarray);         					
		}
	}
	else{
		productarray.push(productJSON);
		localStorage.setObj('product', productarray);
	};
	alert("đã thêm giỏ hàng");
	update_header_cart();
});
}

$(document).ready(function(){
	
	update_header_cart();
	event_add_cart();

	$('#header-cart-items').on('click','.delete-cart-detail',function(){
 		var idbook = $(this).attr('idbook');
 		var cartdt = localStorage.getObj('product');
 		for(var i = 0; i < cartdt.length; i++){
 			if (cartdt[i].id == idbook) {
 				cartdt.splice(i,1);
 				break;
 			}
 		}
 		localStorage.setObj('product',cartdt);
 		loadcartdt();
 		update_header_cart();
 	})

	
});

