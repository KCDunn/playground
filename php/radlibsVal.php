<?php
//PHP functions for form validation
function validate_noun($field)
{
	if($field == "") return "Noun not entered.<br>";
	else if (preg_match("/[^\w]/", $field))
		return "Only letters, numbers, - and _ in nouns.<br>";
	else if (preg_match("/fuck/i", $field, $match) || preg_match("/shit/i", $field, $match) || preg_match("/ass/i", $field, $match))
		return "No fowl 'noun' language please.<br>";
	else if (strlen($field) > 46)
		return "The longest English word is about 45 letters max. You wrote " . strlen($field) . " letters, for 'noun'!<br>";
}

function validate_verb($field)
{
	if($field == "") return "Verb not entered.<br>";
	else if (preg_match("/[^a-zA-Z]/", $field))
		return "Only letters in verbs.<br>";
	else if (preg_match("/fuck/i", $field, $match) || preg_match("/shit/i", $field, $match) || preg_match("/ass/i", $field, $match))
		return "No fowl 'verb' language please.<br>";
	else if (strlen($field) > 46)
		return "The longest English word is about 45 letters max. You wrote " . strlen($field) . " letters, for 'verb'!<br>";
}


function validate_adjective($field)
{
	if($field == "") return "Adjective not entered.<br>";
	else if (preg_match("/[^a-zA-Z]/", $field))
		return "Only letters in adjectives.<br>";
	else if (preg_match("/fuck/i", $field, $match) || preg_match("/shit/i", $field, $match) || preg_match("/ass/i", $field, $match))
		return "No fowl adjectives please.<br>";
	else if (strlen($field) > 46)
		return "The longest English word is about 45 letters max. You wrote " . strlen($field) . " letters, for 'adjective'!<br>";
}

function validate_pronoun($field)
{
	if($field == "") return "Pronoun not entered.<br>";
	else if (preg_match("/[^a-zA-Z]/", $field))
		return "Only letters in pronouns.<br>";
	else if (preg_match("/fuck/i", $field, $match) || preg_match("/shit/i", $field, $match) || preg_match("/ass/i", $field, $match))
		return "No fowl pronouns please.<br>";
	else if (strlen($field) > 46)
		return "The longest English word is about 45 letters max. You wrote " . strlen($field) . " letters, for 'pronoun'!<br>";
}

function validate_adverb($field)
{
	if($field == "") return "Adverb not entered.<br>";
	else if (preg_match("/[^a-zA-Z]/", $field))
		return "Only letters in adverbs.<br>";
	else if (preg_match("/fuck/i", $field, $match) || preg_match("/shit/i", $field, $match) || preg_match("/ass/i", $field, $match))
		return "No fowl adverbs please.<br>";
	else if (strlen($field) > 46)
		return "The longest English word is about 45 letters max. You wrote " . strlen($field) . " letters, for 'adverb'!<br>";
}

function validate_name($field)
{
	if($field == "") return "Name not entered.<br>";
	else if (preg_match("/[^a-z A-Z]/", $field))
		return "Only letters used in Names.<br>";
	else if (preg_match("/fuck/i", $field, $match) || preg_match("/shit/i", $field, $match) || preg_match("/ass/i", $field, $match))
		return "No fowl names please.<br>";
	else if (strlen($field) > 55)
		return "Names length is set to 55 characters max.<br>";
}
function validate_word($field)
{
	if($field == "") return "Name not entered.<br>";
	else if (preg_match("/[^a-zA-Z]/", $field))
		return "Only letters used in Names.<br>";
	else if (preg_match("/fuck/i", $field, $match) || preg_match("/shit/i", $field, $match) || preg_match("/ass/i", $field, $match))
		return "No fowl names please.<br>";
	else if (strlen($field) > 55)
		return "Names length is set to 55 characters max.<br>";
}

// fix strings on input

function fix_string($string)
{
	if (get_magic_quotes_gpc()) $string = stripslashes($string);
	return htmlentities ($string);
}
?>