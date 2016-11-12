# LimitPageTable

A module for ProcessWire CMS/CMF. Allows "Add New" buttons in a PageTable inputfield to be disabled when a defined limit is reached.

## Usage

[Install](http://modules.processwire.com/install-uninstall/) the LimitPageTable module.

For the PageTable field you want to limit, on the "Input" tab include "template" or "template.label" in "Table fields to display in admin". You can skip this step if your PageTable field only allows a single template.
 
In the module config, fill out the fields in the fieldset row:

* PageTable field you want to limit
* Template you want to limit (only needed if your PageTable field allows more than one template)
* Limit
* Field you have included in the "Table fields to display in admin" setting (only needed if your PageTable field allows more than one template)

You can define up to 20 limited PageTable fields – either different fields or different templates for the same field. Use the "Number of limited PageTable fields" field to add rows as needed.

If you are using translated text for the default PageTable "Add New" button then enter the translation in "Text for default 'Add New' button".

## License

Released under Mozilla Public License v2. See file LICENSE for details.