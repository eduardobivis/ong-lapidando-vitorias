/**
 * Return true, if the value is a valid dateBR, also making this formal check dd/mm/yyyy.
 *
 * @example $.validator.methods.dateBR("01/01/1900")
 * @result true
 *
 * @example $.validator.methods.dateBR("01/13/1990")
 * @result false
 *
 * @example $.validator.methods.dateBR("01.01.1900")
 * @result false
 *
 * @example <input name="pippo" class="{dateBR:true}" />
 * @desc Declares an optional input element whose value must be a valid dateBR.
 *
 * @name $.validator.methods.dateBR
 * @type Boolean
 * @cat Plugins/ValidateBR/Methods
 */
 $.validator.addMethod( "dateBR", function( value, element ) {
	var check = false,
		re = /^\d{1,2}\/\d{1,2}\/\d{4}$/,
		adata, gg, mm, aaaa, xdata;
	if ( re.test( value ) ) {
		adata = value.split( "/" );
		gg = parseInt( adata[ 0 ], 10 );
		mm = parseInt( adata[ 1 ], 10 );
		aaaa = parseInt( adata[ 2 ], 10 );
		xdata = new Date( Date.UTC( aaaa, mm - 1, gg, 12, 0, 0, 0 ) );
		if ( ( xdata.getUTCFullYear() === aaaa ) && ( xdata.getUTCMonth() === mm - 1 ) && ( xdata.getUTCDate() === gg ) ) {
			check = true;
		} else {
			check = false;
		}
	} else {
		check = false;
	}
	return this.optional( element ) || check;
}, $.validator.messages.dateBR );