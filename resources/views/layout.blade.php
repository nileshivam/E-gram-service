<!DOCTYPE html>
<html>
	<head>
		@include('includes.head')
	</head>
	<body class="skin-blue">
		<div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'gu,hi', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, multilanguagePage: true}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
		@include('includes.header')
		@include('includes.main')
		@yield('content')
		@include('includes.script')
	</body>
</html>