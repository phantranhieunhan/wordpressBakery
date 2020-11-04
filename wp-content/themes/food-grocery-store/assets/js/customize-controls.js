( function( api ) {

	// Extends our custom "food-grocery-store" section.
	api.sectionConstructor['food-grocery-store'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );