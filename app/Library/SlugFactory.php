<?php
	namespace App\Library;

	class SlugFactory {

		public static function createUrlFriendly($name, $urlFriendly) {
			if (empty($urlFriendly))
				$urlFriendly = $name;

			// Convert all dashes to hyphens
			$urlFriendly = str_replace('—', '-', $urlFriendly);
			$urlFriendly = str_replace('‒', '-', $urlFriendly);
			$urlFriendly = str_replace('―', '-', $urlFriendly);

			// Convert underscores and spaces to hyphens
			$urlFriendly = str_replace('_', '-', $urlFriendly);
			$urlFriendly = str_replace(' ', '-', $urlFriendly);

			// Convert all accented latin-1 supplement characters to their non-accented counterparts
			// Characters are taken from https://en.wikipedia.org/wiki/Latin-1_Supplement_(Unicode_block)
			$accents = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'þ', 'ÿ');
			$noAccents = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'B', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'p', 'y');

			$urlFriendly = str_replace($accents, $noAccents, $urlFriendly);

			// Remove everything except 0-9, a-z, A-Z and hyphens
			$urlFriendly = preg_replace('/[^A-Za-z0-9-]+/', '', $urlFriendly);

			// Make lowercase - no need for this to be multibyte since there are only 0-9, a-z, A-Z and hyphens left in the string
			$urlFriendly = strtolower($urlFriendly);

			// Only allow single hyphens
			do {
				$urlFriendly = str_replace('--', '-', $urlFriendly);
			} while (mb_substr_count($urlFriendly, '--') > 0);

			return $urlFriendly;
		}
	}