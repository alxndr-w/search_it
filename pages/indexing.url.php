<?php

$addon = rex_addon::get('search_it');
$form = rex_config_form::factory($addon->name);

$field = $form->addCheckboxField('index_url_addon');
$field->setLabel("");
$field->setNotice($this->i18n('search_it_settings_index_url_addon_notice'));
$field->addOption($this->i18n('search_it_settings_index_url_addon_label'), '1');

$fragment = new rex_fragment();
$fragment->setVar('class', 'edit', false);
$fragment->setVar('title', $addon->i18n('search_it_indexing_urls'), false);
$fragment->setVar('body', $form->get(), false);
echo $fragment->parse('core/page/section.php');

$form_name = $form->getName();
if (rex_post($form_name.'_save')) {
    rex_view::info($this->i18n('search_it_settings_saved'));
}
