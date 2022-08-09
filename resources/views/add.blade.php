<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    </head>

    <title>
        Add Task
    </title>
    <body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script><br><br>
    <form>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Enter Task Name</label>
    <input type="text" class="form-control" id="task" aria-describedby="emailHelp" required>
    
  </div>
  
  
  <button id="postBtn" class="btn btn-primary">Submit</button>
</form>   
<script>
 $(window).on("load", function(){
  $("#postBtn").on("click", function(){
    const data = {
           
      user_id: "{{ Auth::user()->id }}", //$('input'[name="firstname"]').val()
      task: $("#task").val(), 
    };
    $.ajax({
      url:"http://localhost:8000/api/todo/add/helloatg",
      type: "POST",
      data,
      success: function (response, status){
        console.log({response, status});
        alert("Record inserted successfully");

      },
      error: function (response, status){
        console.log({response, status});
        alert("Failed to Insert");
      },
    });



  });
});
 
 </script>

    
    
  
</body>
</html>