"use strict";

(() => {
	let getFieldValue = (form, id) => {
		let data = new FormData(form);
		let key = `form_fields[${id}]`;
		if (data.has(key)) {
			return data.get(key);
		}
		key = `form_fields[${id}][]`
		if (data.has(key))  {
			return data.getAll(key);
		}
		return "";
	}

	let makeIsFieldActiveFunction = (form) => {
		return (id) => {
			let el = form.getElementsByClassName(`elementor-field-group-${id}`);
			if (! el.length) {
				throw `Field ${id} was not found`;
			}
			// this needs to consider also fields without conditions:
			return el[0].dataset.dceConditionsFieldStatus !== 'inactive';
		};
	}

	let makeGetFieldFunction = (form) => {
		return (id, toFloat=false, defaultValue) => {
			let val = getFieldValue(form, id);
			if (defaultValue !== undefined && val === '') {
				val = defaultValue;
			}
			return toFloat ? parseFloat(val) : val;
		}
	}

	function initializeJsField(wrapper, widget) {
		let input = wrapper.getElementsByTagName('input')[0];
		let form = widget.getElementsByTagName('form')[0];
		let code = input.dataset.fieldCode;
		let realTime = input.dataset.realTime === 'yes';
		if (input.dataset.hide == 'yes') {
			wrapper.style.display = "none";
		}
		let refresherGenerator;
		try {
			refresherGenerator = new Function('getField', 'isFieldActive', 'updateSelf', code);
		} catch (err) {
			console.error(err);
			input.value = jsFieldLocale.syntaxError;
			return;
		}
		let refresher = refresherGenerator(makeGetFieldFunction(form),
										   makeIsFieldActiveFunction(form),
										   (v) => { input.value = v });
		let onChange = () => {
			let newValue = refresher();
			if (newValue !== undefined) {
				input.value = newValue;
			}
			if ("createEvent" in document) {
				var evt = document.createEvent("HTMLEvents");
				evt.initEvent("change", false, true);
				input.dispatchEvent(evt);
			}
			else {
				input.fireEvent("onchange");
			};
		}
		onChange();
		form.addEventListener(realTime ? 'input' : 'change', onChange);
		// isFieldActive results need to be updated fater the conditions are
		// computed:
		jQuery(form).on('conditions-done', onChange);
	}

	function initializeAllJsFieldFields($scope) {
		$scope.find('.elementor-field-type-dce_js_field').each((_, w) => initializeJsField(w, $scope[0]));
	}

	jQuery(window).on('elementor/frontend/init', function() {
		if(elementorFrontend.isEditMode()) {
			return;
		}
		elementorFrontend.hooks.addAction('frontend/element_ready/form.default', initializeAllJsFieldFields);
	});
})();