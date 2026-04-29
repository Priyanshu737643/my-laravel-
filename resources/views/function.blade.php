<!-- <?php
$str = "Sukhwinder Kaur";
$len = strlen($str);
echo "The length of the string is $len", "<br>";
$word = str_word_count($str);
echo "The word length is $word";
?> -->

<!-- 
@php
$colors=["red", "black", "yellow", "white", "pink"];
@endphp
@foreach($colors as $n1)
{{$n1}}
<br>
@endforeach
 -->


<!-- 
 @if($n%2==0)
 <h2>The num is even</h2>
 @else
 <h2>The num is odd</h2>
 @endif
  -->


<!-- 
@for($i=0;$i<10;$i++)
Number:  {{$i}}
@endfor
 -->


<!-- 
{!!"<h1>Hi</h1>"!!}
{!!"<script>alert('Hi')</script>"!!}
 -->

@php
$fruits=["apple","orange","mango"];
@endphp
<ul>
    @foreach($fruits as $n)
    <li>{{$loop->index}}- {{$n}}</li>
    @endforeach
</ul>