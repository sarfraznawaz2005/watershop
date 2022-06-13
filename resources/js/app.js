require('./bootstrap');

/////////////////////////////////////////////////////////////////////////////
// OUR CUSTOM LIBRARY IMPORTS
/////////////////////////////////////////////////////////////////////////////
require('./libs/listner');

/////////////////////////////////////////////////////////////////////////////
// 3RD PARTY LIBRARY IMPORTS
/////////////////////////////////////////////////////////////////////////////
import buttondisabler from 'buttondisabler';

// disable submit button after clicked once to avoid duplicatation
new buttondisabler({
    timeout: 5000,
    text: 'Wait...'
});

window.swal = require('sweetalert2');
window.Noty = require('noty');
window.mojs = require('mo-js');
window.pulsate = require('my-jquery-pulsate');

// DataTables
require('datatables.net');
require('datatables.net-bs4');
require('datatables.net-responsive');
require('datatables.net-responsive-bs4');

require('datatables.net-buttons');
require('datatables.net-buttons-bs4');
require('datatables.net-buttons/js/buttons.print.js');
require('datatables.net-buttons/js/buttons.colVis.js');
require('datatables.net-buttons/js/buttons.html5.js');
require('datatables.net-buttons/js/buttons.flash.js');

require('select2');
//require('summernote');
//require('bootstrap-validator');

