// Load Elementor Icons. Needed because we use fa- icons while elementor uses
// eicon- icons, that do not need loading icon libraries.
jQuery(window).on('elementor:init', function () {
	elementor.iconManager.loadIconLibraries();
});

function isJson(str) {
	try {
		JSON.parse(str);
	} catch (e) {
		return false;
	}
	return true;
}

function posts_v2_item_id_to_label(id) {
	return posts_v2_item_label_localization[id];
}

// Add WP_Query args in Context Menu
elementor.hooks.addFilter( 'elements/widget/contextMenuGroups', function ( groups, element ) {
	// Features with collection "dynamic-posts"
	let features = dce_features_collection_dynamic_posts;

	if ( ! features.includes( element.options.model.get('widgetType') ) ) {
		return groups;
	}

	groups.push(
		{
			name: 'dce_dynamic_collection_query_args',
			actions: [
				{
					name: 'dce_dynamic_collection_query_args',
					title: 'Get Query Args for Debug',
					icon: 'icon-dce-logo-dce',
					callback: function() {
						let query_args = jQuery( element.el ).find( '.dce-posts-container' ).data( 'dce-debug-query-args' );
						query_args = JSON.stringify( query_args, null, 2 );

						navigator.clipboard.writeText( query_args ).then( function() {
							elementor.notifications.showToast( {
								message: 'WP_Query Args copied to clipboard',
							} );
						} );
					}
				}
			]
		}
	);
	return groups;
});

// Loading the section items in the widget Dynamic Posts is extremely slow.
// We thus want to give a feedback to the user that the section is actually loading.
jQuery(window).on('elementor:init', function () {
	elementor.hooks.addAction('panel/open_editor/widget/dce-dynamicposts-v2', function (panel, model, view) {
		const callback = () => {
			let $items = panel.$el.find('.elementor-control-section_items');
			if ( $items.length === 0 || $items.attr('data-dce-loader-set') === 'yes' ) {
				return;
			}
			$items.attr('data-dce-loader-set', 'yes');
			let $title = $items.find('.elementor-panel-heading-title');
			let $cc = $items.find('.elementor-control-content');
			// Get elementor original click handler and unbind it. We need
			// it so we can run it by hand after a timeout. Without the
			// timeout it would block page rendering and the loading
			// message wound not appear.
			let handler = jQuery._data( $items[0], 'events').click[0].handler;
			$items.unbind('click');
			$cc.on('click', () => {
				$title.append(' <em style="color: gray;">loading...</em>');
				setTimeout( handler, 5 );
			});
		}
		const config = { childList: true, subtree: true };
		const observer = new MutationObserver(callback);
		observer.observe(panel.$el[0], config);

	});
});

function getUrlVars() {
	var vars = {};
	var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function (m, key, value) {
		vars[key] = value;
	});
	return vars;
}
function getUrlParam(parameter, defaultvalue) {
	var urlparameter = defaultvalue;
	if (window.location.href.indexOf(parameter) > -1) {
		urlparameter = getUrlVars()[parameter];
	}
	return urlparameter;
}

function dce_get_element_id_from_cid(cid) {
	var iFrameDOM = jQuery("iframe#elementor-preview-iframe").contents();
	var eid = iFrameDOM.find('.elementor-element[data-model-cid=' + cid + ']').data('id');
	return eid;
}

function dce_getimageSizes(url, callback) {
	var img = new Image();
	img.crossOrigin = "anonymous";
	img.onload = function () {
		var sizes = {};
		sizes.height = this.height;
		sizes.width = this.width;
		sizes.coef = sizes.height / sizes.width;
		callback(sizes);
	};
	img.src = url;
}

jQuery(function () {
	// Add DCE global settings panel menu item
	if( elementor && (ElementorConfig.settings.dynamicooo ) ) {
		elementor.on('panel:init', function () {
			var menuSettings = ElementorConfig.settings.dynamicooo;
			var groupName = 'style'; // Elementor v3 'Settings' panel group name
			var beforeItem = 'editor-preferences'; // Elementor v3 'User Preferences' panel menu name
			var namespace = 'panel/' + menuSettings.name + '-settings',
				menuItemOptions = {
				icon: 'icon-dce-logo-dce',
				title: menuSettings.panelPage.title,
				type: 'page',
				pageName: menuSettings.name + '_settings',
				callback: function callback() {
				return elementorCommon.api.route("".concat(namespace, "/settings"));
				}
			};
			elementorCommon.api.bc.ensureTab(namespace, 'settings', menuItemOptions.pageName);
			elementor.modules.layouts.panel.pages.menu.Menu.addItem(menuItemOptions, groupName, beforeItem);
		});
	}

	jQuery(document).on('mousedown', '.elementor-control-repeater_shape_path .elementor-repeater-fields, .elementor-control-repeater_shape_polyline .elementor-repeater-fields', function () {
		var repeater_index = jQuery(this).index();
		var eid = dce_get_element_id_from_cid(dce_model_cid);
		var iFrameDOM = jQuery("iframe#elementor-preview-iframe").contents();
		var morphed = iFrameDOM.find('.elementor-element[data-id=' + eid + '] svg.dce-svg-morph');

		if (morphed.attr('data-run') == 'paused')
			morphed.attr('data-morphid', repeater_index);

	});
	jQuery(document).on('change', '.elementor-control-playpause_control', function () {
		var runAnimation = elementorFrontend.config.elements.data[dce_model_cid].attributes['playpause_control'];
		var eid = dce_get_element_id_from_cid(dce_model_cid);
		var iFrameDOM = jQuery("iframe#elementor-preview-iframe").contents();
		var morphed = iFrameDOM.find('.elementor-element[data-id=' + eid + '] #dce-svg-' + eid);
		morphed.attr('data-run', runAnimation);
	});
	//---- global settings -----
	var inputSelector = ".elementor-control-selector_wrapper.elementor-control-type-text input, .elementor-control-selector_header.elementor-control-type-text input";
	var detect_content_frame = function ($content) {

		var iFrameDOM = jQuery("iframe#elementor-preview-iframe").contents();
		var classController = ".elementor-control-dce_smoothtransition_class_controller input, .elementor-control-dce_trackerheader_class_controller input";
		const queryCheck = s => document.createDocumentFragment().querySelector(s);
		const isSelectorValid = selector => {
			try {
				queryCheck(selector);
			} catch (e) {
				return false;
			}
			return true;
		};
		if (isSelectorValid($content) && typeof $content !== "undefined") {

			var sectorList = $content.split(',');
			var sectorListLength = sectorList.length;
			var countSelectorValid = 0;
			sectorList.forEach(selectorIteration);
			function selectorIteration(value) {
				value = value.trim();
				if (iFrameDOM.find(value).length && value.length > 1 && (value.substring(0, 1) == '.' || value.substring(0, 1) == '#')) {
					countSelectorValid++;
				}
			}
			if (countSelectorValid >= sectorListLength) {
				jQuery(".dce-class-debug").text('Detected').addClass('detected');
				jQuery(classController).val('detected').trigger('input');
			} else {
				jQuery(".dce-class-debug").text('No matches').removeClass('detected');
				jQuery(classController).val('').trigger('input');
			}
		}
	};
	var detect_from_text = function ($target) {
		var selectorVal = $target;
		detect_content_frame(selectorVal);
	};
	jQuery(document).on('mousedown', '#elementor-panel-dynamicooo-settings, .elementor-panel-menu-item-undefined', function (e) {
		setTimeout(function () {
			detect_from_text(jQuery(inputSelector).val());
		}, 200);
		detect_from_text(jQuery(inputSelector).val());
	});
	jQuery(document).on("input", inputSelector, function () {
		detect_from_text(jQuery(this).val());
	});
});

(function() {
	const dce_update_query_btn = (ooo) => {
		var setting = jQuery(ooo).data('setting'),
			query_type = jQuery(ooo).attr('data-query_type'),
			object_type = jQuery(ooo).attr('data-object_type');
		jQuery(ooo).siblings('.dce-elementor-control-quick-edit').remove();
		if (jQuery(ooo).val() && (!jQuery.isArray(jQuery(ooo).val()) || (jQuery.isArray(jQuery(ooo).val()) && jQuery(ooo).val().length == 1))) {
			var edit_link = '#';
			switch (query_type) {
			case 'posts':
				if (!object_type || object_type != 'type') {
					edit_link = ElementorConfig.home_url + '/wp-admin/post.php?post=' + jQuery(ooo).val();
					if (object_type == 'elementor_library') {
						edit_link += '&action=elementor';
					} else {
						edit_link += '&action=edit';
					}
				}
				break;
			case 'users':
				if (!object_type || object_type != 'role') {
					edit_link = ElementorConfig.home_url + '/wp-admin/user-edit.php?user_id=' + jQuery(ooo).val();
				}
				break;
			case 'terms':
				if (object_type) {
					edit_link = ElementorConfig.home_url + '/wp-admin/term.php?tag_ID=' + jQuery(ooo).val();
					edit_link += '&taxonomy=' + object_type;
				}
				break;
			}
			if (edit_link != '#') {
				jQuery(ooo).parent().append('<div class="elementor-control-unit-1 tooltip-target dce-elementor-control-quick-edit" data-tooltip="Quick Edit"><a href="' + edit_link + '" target="_blank" class="dce-quick-edit-btn"><i class="eicon-pencil"></i></a></div>');
			}
		} else {
			var new_link = '#';
			switch (query_type) {
			case 'posts':
				if (!object_type || object_type != 'type') {
					new_link = ElementorConfig.home_url + '/wp-admin/post-new.php';
					if (object_type) {
						new_link += '?post_type=' + object_type;
						if (object_type == 'elementor_library') {
							new_link = ElementorConfig.home_url + '/wp-admin/edit.php?post_type=' + object_type + '#add_new';
						}
					}
				}
				break;
			case 'users':
				if (!object_type || object_type != 'role') {
					new_link = ElementorConfig.home_url + '/wp-admin/user-new.php';
				}
				break;
			case 'terms':
				new_link = ElementorConfig.home_url + '/wp-admin/edit-tags.php';
				if (object_type) {
					edit_link += '&taxonomy=' + object_type;
				}
				break;
			}
			if (new_link != '#') {
				jQuery(ooo).parent().prepend('<div class="elementor-control-unit-1 tooltip-target dce-elementor-control-quick-edit" data-tooltip="Add New"><a href="' + new_link + '" target="_blank" class="dce-quick-edit-btn"><i class="eicon-plus"></i></a></div>');
			}
		}
	}
	const editorInit = () => {
		// FILEBROWSER
		elementor.channels.editor.on( 'dceFileBrowser:removeMedia', ( childView ) => {
			tinyMCE.editors[0].setContent('');
		});

		elementor.channels.editor.on( 'dynamicShortcodesWizard::generateShortcode', ( childView ) => {
			wp.ajax
				.post("dce_generate_dynamic_shortcode", {
					settings: childView.container.settings.attributes,
				})
				.done(function (shortcode) {
					childView.container.settings.setExternalChange('shortcode', shortcode);
					childView.container.settings.setExternalChange('status', 'generated');
	
					container = childView.container;
					const tagText = elementor.dynamicTags.tagContainerToTagText( container ),
						commandArgs = {
							container: container.parent,
							settings: {
								[ container.view.options.controlName ]: tagText,
							},
						};
					$e.run( 'document/dynamic/settings', commandArgs );
					elementor.notifications.showToast({
						message: 'Dynamic Shortcode generated.',
					});
				})
				.fail(function (errorThrown) {
					elementor.notifications.showToast({
						message: 'ERROR! Dynamic Shortcode not generated. ' + errorThrown,
					});
					console.log( 'ERROR! Dynamic Shortcode not generated. ' +  errorThrown);
				});
		});
	
		elementor.channels.editor.on( 'dynamicShortcodesWizard::editShortcode', ( childView ) => {
			childView.container.settings.setExternalChange('status', 'edit');
			elementor.notifications.showToast({
				message: 'Dynamic Shortcode edit mode.',
			});
		});

		elementor.channels.editor.on( 'dynamicShortcodesWizard::startShortcode', ( childView ) => {
			childView.container.settings.setExternalChange('status', 'initial');
		});
	
		elementor.channels.editor.on( 'dynamicShortcodesWizard::copyShortcode', ( childView ) => {
			navigator.clipboard.writeText( childView.container.settings.attributes.shortcode ).then( function() {
				elementor.notifications.showToast( {
					message: 'Dynamic Shortcode copied to clipboard',
				} );
			} );
		});
		// Query Control
		var DCEControlQuery = elementor.modules.controls.Select2.extend({

			cache: null,
			isTitlesReceived: false,
			getSelect2Placeholder: function getSelect2Placeholder() {
				var self = this;
				return {
					id: '',
					text: self.model.get('placeholder'), //'All',
				};
			},
			getSelect2DefaultOptions: function getSelect2DefaultOptions() {
				var self = this;
				return jQuery.extend(elementor.modules.controls.Select2.prototype.getSelect2DefaultOptions.apply(this, arguments), {
					ajax: {
						transport: function transport(params, success, failure) {
							var data = {
								q: params.data.q,
								query_type: self.model.get('query_type'),
								object_type: self.model.get('object_type'),
							};
							return elementorCommon.ajax.addRequest('dce_query_control_filter_autocomplete', {
								data: data,
								success: success,
								error: failure,
							});
						},
						data: function data(params) {
							return {
								q: params.term,
								page: params.page,
							};
						},
						cache: true
					},
					escapeMarkup: function escapeMarkup(markup) {
						return markup;
					},
					minimumInputLength: 2
				});
			},
			// translate with an ajax post ids to post titles.
			getValueTitles: function getValueTitles() {
				var self = this;
				var ids = this.getControlValue();
				var queryType = this.model.get('query_type');
				objectType = this.model.get('object_type');
				if (!ids || !queryType)
					return;
				if (!_.isArray(ids)) {
					ids = [ids];
				}
				// no translation needed for these query types:
				if(queryType === 'pods' || queryType === 'acf' || queryType === 'jet' || queryType === 'metabox' || queryType === 'metabox_relationship' || queryType === 'options' ) {
					let t = {}
					for (id of ids) {
						t[id] = id; // Label is the same as the value.
					}
					self.isTitlesReceived = true;
					self.model.set('options', t);
					self.render();
					return;
				}

				elementorCommon.ajax.loadObjects({
					action: 'dce_query_control_value_titles',
					ids: ids,
					data: {
						query_type: queryType,
						object_type: objectType,
						unique_id: '' + self.cid + queryType,
					},
					success: function success(data) {
						self.isTitlesReceived = true;
						self.model.set('options', data);
						self.render();
					},
					before: function before() {
						self.addSpinner();
					},
				});
			},
			addSpinner: function addSpinner() {
				this.ui.select.prop('disabled', true);
				this.$el.find('.elementor-control-title').after('<span class="elementor-control-spinner dce-control-spinner">&nbsp;<i class="fa fa-spinner fa-spin"></i>&nbsp;</span>');
			},
			onReady: function onReady() {
				setTimeout(elementor.modules.controls.Select2.prototype.onReady.bind(this));
				if (this.ui.select) {
					var self = this,
						ids = this.getControlValue(),
						queryType = this.model.get('query_type');
					objectType = this.model.get('object_type');
					jQuery(this.ui.select).attr('data-query_type', queryType);
					if (objectType) {
						jQuery(this.ui.select).attr('data-object_type', objectType);
					}
					dce_update_query_btn(this.ui.select);
				}

				if (!this.isTitlesReceived) {
					this.getValueTitles();
				}
			},
			onBeforeDestroy: function onBeforeDestroy() {
				if (this.ui.select.data('select2')) {
					this.ui.select.select2('destroy');
				}

				this.$el.remove();
			},
		});
		// Add Control Handlers
		elementor.addControlView('ooo_query', DCEControlQuery);
		jQuery(document).on('change', '.elementor-control-type-ooo_query select', function () {
			dce_update_query_btn(this);
		});
	}
	if (typeof elementor !== 'undefined') {
		editorInit();
	} else {
		jQuery(window).on('elementor:init', editorInit);
	}
})();
