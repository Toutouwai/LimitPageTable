<?php

class LimitPageTableConfig extends ModuleConfig {

	public function getDefaults() {
		return array(
			'tpl_limit' => 1,
			'table_match' => 'name',
		);
	}

	public function getInputfields() {
		$inputfields = parent::getInputfields();

		$f = $this->modules->get('InputfieldInteger');
		$f->name = 'fieldset_count';
		$f->label = $this->_('Number of limited PageTable fields');
		$f->description = $this->_('Save the module config after changing this field.');
		$f->inputType = 'number';
		$f->min = 0;
		$f->max = 20;
		$f->value = $this->fieldset_count ?: 1;
		$f->columnWidth = 50;
		$inputfields->add($f);

		$f = $this->modules->get('InputfieldText');
		$f->name = 'addnew_text';
		$f->label = $this->_("Text for default 'Add New' button");
		$f->description = $this->_("If you are using translated text for the default PageTable 'Add New' button then enter the translation here.");
		$f->value = 'Add New';
		$f->columnWidth = 50;
		$inputfields->add($f);

		$count = $this->fieldset_count > 0 ? $this->fieldset_count : 1;
		for($i = 1; $i <= $count; $i++) {
			$fieldset = $this->makeFieldset($i);
			$inputfields->add($fieldset);
		}

		return $inputfields;
	}

	/**
	 * Make fieldset
	 */
	public function makeFieldset($identifier = 'x') {
		$fieldset = $this->modules->get("InputfieldFieldset");
		$fieldset->name = "limit_pt_{$identifier}";
		$fieldset->label = $this->_('Limited PageTable') . " $identifier";
		$fieldset->collapsed = Inputfield::collapsedBlank;

		$f = $this->makePageTableFieldSelect($identifier);
		$fieldset->add($f);

		$f = $this->makeTemplateSelect($identifier);
		$fieldset->add($f);

		$f = $this->makeLimitInteger($identifier);
		$fieldset->add($f);

		$f = $this->makeMatchSelect($identifier);
		$fieldset->add($f);

		return $fieldset;
	}

	/**
	 * Make select for PageTable field
	 */
	public function makePageTableFieldSelect($identifier = 'x') {
		$f = $this->modules->get('InputfieldSelect');
		$f->name = "pagetable_{$identifier}";
		$f->label = $this->_('PageTable field');
		$f->columnWidth = 30;
		$select_options = $this->fields->find("type=FieldtypePageTable");
		foreach($select_options as $select_option) {
			$f->addOption($select_option->name, $select_option->label ?: $select_option->name);
		}
		return $f;
	}

	/**
	 * Make select for template
	 */
	public function makeTemplateSelect($identifier = 'x') {
		$f = $this->modules->get('InputfieldSelect');
		$f->name = "tpl_{$identifier}";
		$f->label = $this->_('Template to limit');
		$f->notes = $this->_('For fields that allow more than one template.');
		$f->columnWidth = 30;
		foreach($this->templates as $select_option) {
			$f->addOption($select_option->name, $select_option->label ?: $select_option->name);
		}
		return $f;
	}

	/**
	 * Make integer for limit
	 */
	public function makeLimitInteger($identifier = 'x') {
		$f = $this->modules->get('InputfieldInteger');
		$f->name = "tpl_limit_{$identifier}";
		$f->label = $this->_('Limit');
		$f->inputType = 'number';
		$f->columnWidth = 10;
		$f->value = 1;
		return $f;
	}

	/**
	 * Make radios for table match value
	 */
	public function makeMatchSelect($identifier = 'x') {
		$f = $this->modules->get('InputfieldSelect');
		$f->name = "table_match_{$identifier}";
		$f->label = $this->_('Match field in table');
		$f->description = $this->_('I have set this field to display in the table:');
		$f->notes = $this->_('For fields that allow more than one template.');
		$f->columnWidth = 30;
		$f->addOption('name', 'template (Template name)');
		$f->addOption('label', 'template.label (Template label)');
		return $f;
	}

}