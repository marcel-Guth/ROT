/*global window */

window.rot_admin = {
    createToggledSubform: function (input_id, subform_id, show_values) {
        var input,
            subform,
            placeholder,
            shown = true;

        function hide() {
            if (shown) {
                placeholder.insertAfter(subform)
                subform.detach();
                shown = false;
            }
        }

        function show() {
            if (!shown) {
                subform.insertAfter(placeholder);
                placeholder.detach();
                shown = true;
            }
        }

        function get_value() {
            var undef;

            switch(input.attr('type')) {
                case "checkbox":
                    return input.is(':checked') ? input.val() : undef;
                default:
                    return input.val();
            }
        }

        if (!$.isArray(show_values)) {
            show_values = [show_values];
        }

        input = $('#' + input_id);
        subform = $('#' + subform_id);
        placeholder = $('<div></div>');
        placeholder.attr('style', 'display:none');

        if ($.inArray(get_value(), show_values) === -1) {
            hide();
        }
        input.change(function () {
            $.inArray(get_value(), show_values) !== -1 ? show() : hide();
        });
    }
}

$(document).ready(function () {
	$('.admin-table').dataTable({
        "bLengthChange": false,
        "iDisplayLength": 100,
        "sDom": '<T lfr>t',
        "oTableTools": {
            "sSwfPath": "../../../../bundles/pinanodatatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf",
            "aButtons": [ "copy", "csv", "xls", "pdf" ]
        }
	});
	
	// uses data-method attribute to emulate different HTTP methods
	$('a[data-method]').on('click', function (event) {
        var input, form;

        event.preventDefault();

        if (confirm('Are you sure?')) {
            input = document.createElement('input');
            form = document.createElement('form');

            input.type = 'hidden';
            input.name = '_method';
            input.value = this.getAttribute('data-method');
            form.method = "POST";
            form.action = this.href;
            form.appendChild(input);
            document.body.appendChild(form);
            form.submit();
        }
	});

    $('#admin-filter-toggle').click(function () {
        $('#admin-filter').toggle(250);
        return false;
    });

    $('#admin-filter-select').change(function () {
        var value = this.value;

        if (value !== '') {
            location.href = value;
        }
    });
});