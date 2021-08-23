<form action="{{route('postForm')}}" method="post">
        @csrf
        <input type="text" name ="name"/>
      
         <input type="submit" value="submit"/>
</form>