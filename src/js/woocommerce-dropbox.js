jQuery(function($) {
	var wcdb = {

		// hold a reference to the last selected Dropbox button
		lastSelectedButton: false,

		// options for the file chooser dialog
		options: {
			success: function(files) {
				wcdb.afterFileSelected(files);
			},
			linkType: 'preview',
			multiselect: true
		},

		init: function() {
			if(!this.checkBrowserSupport()) {
				return;
			}

			// add button for simple product
			this.addButtons();
			this.addButtonEventHandler();

			// add buttons when variable product added
			$('#variable_product_options').on('woocommerce_variations_added', function() {
				wcdb.addButtons();
				wcdb.addButtonEventHandler();
			});

			// add buttons when variable products loaded
			$('#woocommerce-product-data').on('woocommerce_variations_loaded', function() {
				wcdb.addButtons();
				wcdb.addButtonEventHandler();
			});
		},

		checkBrowserSupport: function() {
			return Dropbox.isBrowserSupported();
		},

		addButtons: function() {
			var button = $('<a href="#" class="button insert-dropbox">' + woocommerce_dropbox_translation.choose_from_dropbox + '</a>');

			$('.downloadable_files').each(function(index) {

				// we want our button to appear next to the insert button
				var insertButton = $(this).find('a.button.insert');

				// check if dropbox button already exists on element, bail if so
				if($(this).find('a.button.insert-dropbox').length) {
					return;
				}

				// finally clone the button to the right place
				insertButton.after(button.clone());
			});
		},

		/**
		 * Adds the click event to the dropbox buttons
		 * and opens the Dropbox chooser
		 */
		addButtonEventHandler: function() {
			$('a.button.insert-dropbox').on('click', function(e) {
				e.preventDefault();

				// save a reference to clicked button
				wcdb.lastSelectedButton = $(this);

				// open file chooser
				Dropbox.choose(wcdb.options);
			});
		},

		/**
		 * Handle selected files
		 */
		afterFileSelected: function(files) {
			var table = $(wcdb.lastSelectedButton).closest('.downloadable_files').find('tbody');
			var template = $(wcdb.lastSelectedButton).prev('.button.insert').data('row');

			_.each(files, function(file) {

				var fileRow = $(template);
				fileRow.find('.file_name > input').val(file.name).change();
				fileRow.find('.file_url > input').val(file.link.replace('dl=0', 'dl=1'));

				table.append(fileRow);
			});

			// trigger change event so we can save variation
			$(table).find('input').last().change();
		},
	};

	wcdb.init();
});
