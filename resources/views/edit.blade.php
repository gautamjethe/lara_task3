<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    </head>

    <title>
        Edit details
    </title>
    <body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script><br><br>
    
    <form class="row g-3">
  <div class="col-auto">
    
  </div>
  <div class="col-auto">
    
    
  </div>
  <div class="col-auto">
  @if($list->status =='pending')
    <button class="btn btn-primary" id="postBtn">Mark as Done</button>
    @else
    <button class="btn btn-primary" id="postBtn">Mark as Pending</button>
    @endif
  </div>
</form>
@php    
if($list->status== 'pending'){
$get = 'done';
}
else{
$get = 'pending';
}
@endphp


<script>
 $(window).on("load", function(){
  $("#postBtn").on("click", function(){
    const data = {
      task_id: "{{$list->id}}", //$('input'[name="firstname"]').val()
      status: "{{$get}}",
    };
    $.ajax({
      url:"http://localhost:8000/api/todo/status/helloatg",
      type: "POST",
      data,
      success: function (response, status){
        console.log({response, status});
        alert("Record updated successfully");

      },
      error: function (response, status){
        console.log({response, status});
        alert("Failed to update");
      },
    });



  });
});
 
 </script>


    </body>
</html>