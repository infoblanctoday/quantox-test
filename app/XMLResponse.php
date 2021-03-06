<?php

namespace ale\app;

/**
 * Returns XML
 */
class XMLResponse
{
	// Returns XML from array given
	public static function generate($arr)
	{
		$xml = '<?xml version="1.0" encoding="UTF-8"?>';
		$xml .= "<student>";

		foreach ($arr as $key => $value) {
			if (is_array($value)) {
				$xml .= "<$key>";
				foreach ($value as $a) {
					$xml .= "<grade>$a</grade>";
				}
				$xml .= "</$key>";
			}else{
				$xml .= "<$key>$value</$key>";
			}
		}

		$xml .= "</student>";

		// Adding header return display XML response
		header('Content-Type: application/xml; charset=utf-8');
		return $xml;
	}
}