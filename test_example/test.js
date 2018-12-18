$(document).ready(function()
{
	token_ = null;
	
	var product_id = 0;
	var product_name = 0;
	var product_price = 0;
	
	
	// Get Token for client 
	getProducts(); // Authenticate and show full product list
	
	
	//Search product
	$(".btn_search").on("click",function()
	{
		auth();
		var search_product_name_ = null;
		search_product_name_ = $(".search_product").val();
		
		$.ajax({
				url: "http://localhost/tphp/testwork/public/api/search", 
				type: 'GET',
				data : {'product_name':search_product_name_}, 
				success: function(result)
					{
					    var products__ = JSON.parse(result);
						if(typeof(products__.Message) != "undefined")
							alert(products__.Message);
						
						var table_html_ = null;
						$.each(products__, function(index, value)
						{
								table_html_ += '<tr class="data_node">';
								table_html_ += '<td>'+value.name+'</td>';
								table_html_ += '<td>'+value.price+'</td>';
								table_html_ += '<td><span class="btn mod" prod-price="'+value.price+'" prod-name="'+value.name+'" prod-id="'+value.id+'"> Edit </span> | <span class="btn del" prod-id="'+value.id+'"> Delete </span></td>';
								table_html_ += '</tr>';				
						});
						$('.data_').html(table_html_);
						table_html_ = null;
					}
				}
		);
	});
	
	/*******************************   Authenticate API to gain access ******************************/
	// Fetch Token by Client ID
	function auth()
	{
		$.ajax({
				url: "http://localhost/tphp/testwork/public/api/auth", 
				data : {'client_id':'1'},   // For Testing Purpose Client ID -> 1 or Client ID -> 2
				type: 'GET',
				success: function(result)
				{
					token_ = JSON.parse(result);       
					if(token_[0].token !== undefined)
					{
						token_ = token_[0].token;
						setAccess(token_);
					}
				}
			}
		);
	}
	
	// Validate and Set Token
	
	function setAccess(token_key)
	{
		$.ajax({
			url: "http://localhost/tphp/testwork/public/api/setAccess", 
			data : {'token':token_key},
			type: 'GET',
			success: function(result)
				{
					//getProducts();
				}
			}
		);	
		
	}
	/*******************************************************************************************/
	
	// Fetch all products
	function getProducts()
	{
		auth();
		$.ajax({
			url: "http://localhost/tphp/testwork/public/api/getproducts", 
			type: 'GET',
			async: false,
			success: function(result)
				{
					var products__ = JSON.parse(result);

					if(typeof(products__.Message) != "undefined")
						alert(products__.Message);
					
					var table_html_ = null;
					$.each(products__, function(index, value)
					{
							table_html_ += '<tr class="data_node">';
							table_html_ += '<td>'+value.name+'</td>';
							table_html_ += '<td>'+value.price+'</td>';
							table_html_ += '<td><span class="btn mod" prod-price="'+value.price+'" prod-name="'+value.name+'" prod-id="'+value.id+'"> Edit </span> | <span class="btn del" prod-id="'+value.id+'"> Delete </span></td>';
							table_html_ += '</tr>';				
					});
					$('.data_').html(table_html_);
					table_html_ = null;
				}
			}
		);
	}
	
	$(".click_").on("click",function()
	{
		getProducts();
	});
	
	// Edit Event Handler  
	$('.data_').on('click','.data_node .mod',function()
	{
		$(".product-update-frm").show();
		$(".product-insert-frm").hide();
		$(".product-name").val($(this).attr('prod-name'));
		$(".product-price").val($(this).attr('prod-price'));
		
		product_id = $(this).attr('prod-id');
		product_name = $(this).attr('prod-name');
		product_price = $(this).attr('prod-price');
	
	});
	
	// Delete Event Handler  
	$('.data_').on('click','.data_node .del',function()
	{
		var p_id = $(this).attr('prod-id');		
		auth();
		$.ajax({
				url: "http://localhost/tphp/testwork/public/api/del/"+p_id, 
				type: 'delete',
				async: false,
				success: function(result)
				{
					var message_ = JSON.parse(result);       
					alert(message_.Message);
					getProducts();
				}
			}
		);	
	});
	
	
	// Insert Button to save product
	$(".insert-btn").on("click",function()
	{
		product_name = $(".insert-product-name").val();
		product_price = $(".insert-product-price").val();
		auth();
		$.ajax({
				url: "http://localhost/tphp/testwork/public/api/insert_product", 
				type: 'post',
				data : {"product_id":product_id,"product_name":product_name, "product_price":product_price},
				success: function(result)
				{
					var message_ = JSON.parse(result); 
					alert(message_.Message);	
					getProducts();
					$(".product-name").val(null);
					$(".product-price").val(null);
				}
			}
		);
	});
	
	// Update Button click event
	$(".update-btn").on("click",function()
	{
		product_name = $(".product-name").val();
		product_price = $(".product-price").val();
		auth();
		$.ajax({
				url: "http://localhost/tphp/testwork/public/api/update_product", 
				type: 'put',
				data : {"product_id":product_id,"product_name":product_name, "product_price":product_price},
				success: function(result)
				{
					var message_ = JSON.parse(result); 
					alert(message_.Message);
					$('.data_').html(null);
					getProducts();
					$(".product-name").val(null);
					$(".product-price").val(null);
					$(".product-insert-frm").show();
					$(".product-update-frm").hide();
				}
			}
		);	
		
	});
});