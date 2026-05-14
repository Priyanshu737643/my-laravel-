<h1> Student Record </h1>
<!-- {{print_r($data)}} -->

<table border= "2" >
    <tr>
    <td> name </td>
    <td> email </td>
    <td> age </td>
    </tr>
@foreach($data as $id=> $user)
<tr>
<td> {{$user-> name}}  </td>
<td> {{$user-> email}} </td>
<td> {{$user-> age}}   </td>
</tr>
@endforeach
</table>