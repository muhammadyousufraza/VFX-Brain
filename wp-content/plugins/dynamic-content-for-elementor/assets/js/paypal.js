"use strict";
(function() {
	let getFieldValue = (form, id) => {
		let data = new FormData(form);
		let key = `form_fields[${id}]`;
		if (data.has(key)) {
			return data.get(key);
		}
		key = `form_fields[${id}][]`
		if (data.has(key)) {
			return data.getAll(key).join(', ');
		}
		return "";
	}

	function initializePayPalButtons(w, $scope) {
		let buttons = w.querySelector(".dce-paypal-buttons")
		if ( typeof paypal === "undefined" ) {
			buttons.textContent = "There was an error loading PayPal. Is the PayPal Client ID valid?";
		} else {
			let orderIDInput =	w.querySelector("input");
			let approvedMsg =	w.querySelector(".dce-paypal-approved")
			let buttonsID =		`#${buttons.getAttribute('id')}`;
			let staticOrderName = buttons.getAttribute('data-name');
			let nameFieldId;
			if (! staticOrderName) {
				nameFieldId = buttons.getAttribute('data-name-field-id');
			}
			let orderCurrency = buttons.getAttribute('data-currency');
			let staticOrderValue =	buttons.getAttribute('data-value');
			let valueFieldId;
			if (! staticOrderValue) {
				valueFieldId = buttons.getAttribute('data-value-field-id');
			}
			let descriptionTemplate =	buttons.getAttribute('data-description');
			let form = $scope.find('form')[0];
			let sku =			buttons.getAttribute('data-sku');
			let height =		parseInt(buttons.getAttribute('data-height'));
			let layout =		buttons.getAttribute('data-layout');
			let color =			buttons.getAttribute('data-color');
			paypal.Buttons({
				style: {
					layout: layout,
					height: height,
					color: color,
				},
				createOrder: function(data, actions) {
					let description = descriptionTemplate.replace(/\[form:([^\]]+)\]/g, (_, fn) => getFieldValue(form, fn));
					let orderValue = staticOrderValue;
					if (! orderValue) {
						let fd = new FormData($scope.find('form')[0]);
						orderValue = fd.get(`form_fields[${valueFieldId}]`);
					}
					let orderName = staticOrderName;
					if (! orderName) {
						let fd = new FormData($scope.find('form')[0]);
						orderName = fd.get(`form_fields[${nameFieldId}]`);
					}

					return actions.order.create({
						purchase_units: [{
							items: [
								{
									name: orderName,
									sku: sku,
									description: description,
									unit_amount: {
										currency_code: orderCurrency,
										value: orderValue
									},
									quantity: '1'
								}
							]
							,
							amount: {
								value: orderValue,
								currency_code: orderCurrency,
								breakdown: { item_total: {
									value: orderValue,
									currency_code: orderCurrency
								} }
							}
						}]
					});
				},
				onApprove: function(data, actions) {
					orderIDInput.value = data.orderID;
					// fire change event so conditions can be updated.
					let evt = document.createEvent("HTMLEvents");
					evt.initEvent("change", false, true);
					orderIDInput.dispatchEvent(evt);
					buttons.style.display = "none";
					approvedMsg.style.display = "block";
				}
			}).render(buttonsID);
		}
	};

	function initializeAllPayPalButtons($scope) {
		$scope.find('.elementor-field-type-dce_form_paypal').each((_, w) => initializePayPalButtons(w, $scope));
	}

	jQuery(window).on('elementor/frontend/init', function() {
		elementorFrontend.hooks.addAction('frontend/element_ready/form.default', initializeAllPayPalButtons);
	});
})();
