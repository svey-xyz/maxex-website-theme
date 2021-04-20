<?php
//
// Template Name: Archive Template
// 
	$archive_type = get_field('archive_type');
	$template_uri = 'page-templates/projects/archives/archive-' . $archive_type . '.php';
	include( locate_template($template_uri, false, false )); 
?>