# LimitPageTable

A module for ProcessWire CMS/CMF. Allows limits and restrictions to be placed on selected PageTable fields.

## Usage

[Install](http://modules.processwire.com/install-uninstall/) the LimitPageTable module.

For the PageTable field you want to limit, on the "Input" tab include "template" or "template.label" in "Table fields to display in admin". You can skip this step if your PageTable field only allows a single template.
 
In the module config, fill out the fields in the fieldset row:

* PageTable field you want to limit (required)
* Roles that restrictions will apply to (required)
* Template you want to limit (only needed if your PageTable field allows more than one template)
* Field you have included in the "Table fields to display in admin" setting (only needed if your PageTable field allows more than one template)
* Limit
* Option to prevent drag sorting of items (affects all rows regardless of template)
* Option to prevent trashing of items (affects all rows regardless of template)
* Option to disable all "Add" buttons for any template


You can add rows as needed using the "Add another row" button.

If you are using translated text for the default PageTable "Add New" button then enter the translation in "Text for default 'Add New' button".

Please note that limits and restrictions are applied with CSS/JS so should not be considered tamper-proof.

## License

Released under Mozilla Public License v2. See file LICENSE for details.
