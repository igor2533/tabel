
$('#button-quote').on('click', function() {
	$.ajax({
		url: 'index.php?route=checkout/shipping/quote',
		type: 'post',
		data: 'country_id=' + $('select[name=\'country_id\']').val() + '&zone_id=' + $('select[name=\'zone_id\']').val() + '&postcode=' + encodeURIComponent($('input[name=\'postcode\']').val()),
		dataType: 'json',
		beforeSend: function() {
			$('#button-quote').button('loading');
		},
		complete: function() {
			$('#button-quote').button('reset');
		},
		success: function(json) {
			$('.alert, .text-danger').remove();

			if (json['error']) {
				if (json['error']['warning']) {
					$('.breadcrumb').after('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> ' + json['error']['warning'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');

					$('html, body').animate({ scrollTop: 0 }, 'slow');
				}

				if (json['error']['country']) {
					$('select[name=\'country_id\']').after('<div class="text-danger">' + json['error']['country'] + '</div>');
				}

				if (json['error']['zone']) {
					$('select[name=\'zone_id\']').after('<div class="text-danger">' + json['error']['zone'] + '</div>');
				}

				if (json['error']['postcode']) {
					$('input[name=\'postcode\']').after('<div class="text-danger">' + json['error']['postcode'] + '</div>');
				}
			}

			if (json['shipping_method']) {
				$('#modal-shipping').remove();

				html  = '<div id="modal-shipping" class="modal">';
				html += '  <div class="modal-dialog">';
				html += '    <div class="modal-content">';
				html += '      <div class="modal-header">';
				html += '        <h4 class="modal-title">Пожалуйста, выберите предпочтительный способ доставки, для текущего заказа.</h4>';
				html += '      </div>';
				html += '      <div class="modal-body">';

				for (i in json['shipping_method']) {
					

					if (!json['shipping_method'][i]['error']) {
						for (j in json['shipping_method'][i]['quote']) {
							html += '<div class="radio">';
							html += '<p><strong>' + json['shipping_method'][i]['title'] + '</strong></p>';
							html += '  <label>';

							if (json['shipping_method'][i]['quote'][j]['code'] == 'free.free') {
								html += '<input type="radio" name="shipping_method" value="' + json['shipping_method'][i]['quote'][j]['code'] + '" checked="checked" />';
							} else {
								html += '<input type="radio" name="shipping_method" value="' + json['shipping_method'][i]['quote'][j]['code'] + '" />';
							}

							html += json['shipping_method'][i]['quote'][j]['title'] + ' - ' + json['shipping_method'][i]['quote'][j]['text'] + '</label></div>';
						}
					} else {
						html += '<div class="alert alert-danger">' + json['shipping_method'][i]['error'] + '</div>';
					}
				}

				html += '      </div>';
				html += '      <div class="modal-footer">';
				html += '        <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>';

								html += '        <input type="button" value="Применить Доставку" id="button-shipping" data-loading-text="Загрузка..." class="btn button btn-primary" />';
				
				html += '      </div>';
				html += '    </div>';
				html += '  </div>';
				html += '</div> ';

				$('body').append(html);

				$('#modal-shipping').modal('show');

				$('input[name=\'shipping_method\']').on('change', function() {
					$('#button-shipping').prop('disabled', false);
				});
				
				if($('[value = "free.free"]').length>0) {
console.log('lol');
		$('[name = "shipping_method"]').not('[value = "free.free"]').parent().parent().remove();
	}
			}
		}
	});
});

$(document).delegate('#button-shipping', 'click', function() {
	$.ajax({
		url: 'index.php?route=checkout/buy',
		type: 'post',
		data: 'shipping_method=' + encodeURIComponent($('input[name=\'shipping_method\']:checked').val()),
		dataType: 'json',
		beforeSend: function() {
			$('#button-shipping').button('loading');
		},
		complete: function() {
			$('#button-shipping').button('reset');
		},
		success: function(json) {
			$('.alert').remove();

			if (json['error']) {
				$('.breadcrumb').after('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> ' + json['error'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');

				$('html, body').animate({ scrollTop: 0 }, 'slow');
			}

			if (json['redirect']) {
				location.href = 'http://mishurinka.ru/index.php?route=checkout/buy#checkout-f';
			}
		}
	});
});



$(document).delegate('#button-shipping', 'click', function() {
	
	location.href = 'http://mishurinka.ru/index.php?route=checkout/buy#checkout-f';
	
	
});




