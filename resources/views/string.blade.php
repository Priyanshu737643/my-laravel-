<h2>Original: {{ $text }}</h2>

<p>Length: {{ strlen($text) }}</p>
<p>Uppercase: {{ strtoupper($text) }}</p>
<p>Lowercase: {{ strtolower($text) }}</p>
<p>Ucfirst: {{ ucfirst($text) }}</p>
<p>Ucwords: {{ ucwords($text) }}</p>
<p>Replace: {{ str_replace("Laravel", "PHP", $text) }}</p>
<p>Position: {{ strpos($text, "Welcome") }}</p>
<p>Substring: {{ substr($text, 0, 10) }}</p>