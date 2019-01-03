(function() {

	var cardTabs = {
		$tabButtons: $('.content__tab'),
		$tabIcons: $('.content__tab__icon'),
		$tabContents: $('.content__card'),
		activeIconClass: 'content__tab__icon--on',
		activeContentclass: 'content__card--on',

		init: function() {
			this.bindUIAction();
		},

		bindUIAction: function() {
			this.setTabButtonIds();
			this.setTabContentIds();
			this.showTabContent();
		},

		setTabButtonIds: function() {
			$.each(this.$tabButtons, function(i) {
				$(this).attr('id', 'tab_' + i);
				$(this).find('i')
				.attr('id', 'tab_' + i + '_icon');
			});
		},

		setTabContentIds: function() {
			$.each(this.$tabContents, function(i) {
				$(this).attr('id', 'tab_' + i + '_content');
			});
		},

		showTabContent: function() {			
			var _self = this;
			this.$tabButtons.on('click', function() {
				var tabButtonId = '#' + $(this).attr('id');
				var tabIconId = '#' + $(this).attr('id') + '_icon';

				$(tabIconId).toggleClass(_self.activeIconClass);

				$(tabButtonId + '_content')
				.toggleClass(_self.activeContentclass);
			});			
		}
	};

	cardTabs.init();

})();
