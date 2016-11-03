$(document).ready(function() {

    $("#owl-home-slider").owlCarousel({
 
	      navigation : true, // Show next and prev buttons
	      slideSpeed : 400,
	      paginationSpeed : 500,
	      singleItem:true,
	      navigationText:["",""],
	      autoPlay: true,

	      // "singleItem:true" is a shortcut for:
	      // items : 1, 
	      // itemsDesktop : false,
	      // itemsDesktopSmall : false,
	      // itemsTablet: false,
	      // itemsMobile : false
 
  	}); 

  	// $(".h-cart arrow").toggle(function(){
			// $(".icon-up-open-mini").css("display","block");
			// // $(".icon-up-open-mini").css("display","none");
			// // $("i").css("display","none");
			// // $(this).css("display","block !important");
  	// 	},
  	// 	function(){
			// // $(".icon-down-open-mini").css("display","none");
			// // $(".icon-down-open-mini").css("display","none");
			// // $(this).css("display","block !important");
  	// 	});

	// $(".h-cart").click(function(){
	// 	$(this).find(".arrow").toggleClass("icon-down-open-mini icon-up-open-mini");
	// 	$(".widget_shopping_cart").toggleClass("mc-show");
	// }); 


	$(".widget_shopping_cart").on("click",".h-cart",function(){
		$(this).find(".arrow").toggleClass("icon-down-open-mini icon-up-open-mini");
		$(this).parent().find(".minicart-content").toggleClass("mc-show");
	
	}); 


	if( $(window).width() < 480 ){
		 jQuery('.scroll-pane').jScrollPane({
		 	// horizontalGutter:40
		 });
	}

	$('.popup-modal').magnificPopup({
		type: 'inline',
		preloader: false,
		focus: '#username',
		modal: true
	});

	$('.popup-modal_buy').magnificPopup({
		type: 'inline',
		preloader: false,
		modal: true,
	  callbacks: {
	    open: function() {
	    	var magnificPopup = $.magnificPopup.instance;
	      // console.log("fast_buy");

	      var link_cont = this.currItem.el.context.outerHTML;
	      console.log(typeof link_cont);
	      console.log(link_cont);

	      // var str = '<a id="show_fast_buy" rel="nofollow" href="#fast_buy" data-quantity="1" data-product_id="92" data-title="Мужские тапочки ручной работы" class="popup-modal_buy button add_to_cart_button">Быстрая покупка</a>';
	      var title = link_cont.match(/data-title="[^"]+/i);
	      title = title[0];
	      title = title.match(/"[^"]+/i);
	      title = title[0];
	      title = title.substr(1);
	      console.log(title);

	      var price = link_cont.match(/data-price="[^"]+/i);
  	      price = price[0];
	      price = price.match(/"[^"]+/i);
	      price = price[0];
	      price = price.substr(1);

	      // console.log(magnificPopup.content);
	      $("#fast_buy h3").text(title);
	      $("#fast_buy .price").remove();
	      $("#fast_buy form").prepend('<p class="price">'+price+' р.</p>');

	    },
	  }
	});

	$(document).on('click', '.popup-modal-dismiss', function (e) {
		e.preventDefault();
		$.magnificPopup.close();
	});



	$('#send_call_me').click(function(e){
		e.preventDefault();
		var form_data = $('#call_me form').serialize();
		 $.ajax({
			  type: 'post',
			  url: '/wp-content/themes/valenki/mail.php',
			  data: form_data,
			  success: function(data){
			  	var data = JSON.parse(data);
				if(data.res == 'success') { 
					alert("Ваше сообщение успешно отправлено!"); 
					$("#call_me .woocommerce-error").remove();
					$.magnificPopup.close();
				}
				if(data.res == 'error_empty') {
					$("#call_me .woocommerce-error").remove();
					 // $("#call_me form").append("<p class='woocommerce-error'>Вы не заполнили какое-то поле!</p>");
					 $(".wrap_send_call_me").prepend("<p class='woocommerce-error'>Вы не заполнили какое-то поле!</p>");
				}
			  },
			  error:function(){
				alert("error");
			}
		});	
	});	

	$('#send_fast_buy').click(function(e){
		e.preventDefault();
		var form_data = $('#fast_buy form').serialize();
		console.log(form_data);
		var title = $("#fast_buy h3").text();
		var price = $("#fast_buy .price").text();
		form_data = form_data+ "&title="+title + "&price="+price;
		console.log(form_data);

		 $.ajax({
			  type: 'post',
			  url: '/wp-content/themes/valenki/mail2.php',
			  data: form_data,
			  success: function(data){
			  	var data = JSON.parse(data);
				if(data.res == 'success') { 
					alert("Ваше сообщение успешно отправлено!"); 
					$("#fast_buy .woocommerce-error").remove();
					$.magnificPopup.close();
				}
				if(data.res == 'error_empty') {
					$("#fast_buy .woocommerce-error").remove();
					 // $("#call_me form").append("<p class='woocommerce-error'>Вы не заполнили какое-то поле!</p>");
					 $(".wrap_send_fast_buy").prepend("<p class='woocommerce-error'>Вы не заполнили какое-то поле!</p>");
				}
			  },
			  error:function(){
				alert("error");
			}
		});	
	});	






	// $(".add_to_cart_button").click(function(){
	// 	console.log(wc_add_to_cart_params.ajax_url);
	// 	// var ajax_url = 'http://big-wp-test/wp-admin/admin-ajax.php';
	// 	// console.log(ajax_url);
	// 	var data = {
	// 		'action': 'alex_minicart',
	// 		'umc': 1
	// 	};

	// 	$.ajax({
	// 	url:wc_add_to_cart_params.ajax_url, // обработчик
	// 	data:data, // данные
	// 	type:'POST', // тип запроса
	// 	success:function(data){
	// 		console.log("ajax yes!");
	// 		if( data ) { 
	// 			console.log(data);

	// 		} else {
	// 		}
	// 	},
	//     error: function(errorThrown){
 //          alert(errorThrown);
 //      	} 

	// 	 });

	// });


});