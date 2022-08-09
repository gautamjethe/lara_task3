<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in! {{ Auth::user()->name }}
                </div>
            </div>
        </div>
    </div>
    <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<style>
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin: 4px 2px;
  cursor: pointer;
}

.button1 {font-size: 10px;}
.button2 {font-size: 12px;}
.button3 {font-size: 16px;}
.button4 {font-size: 20px;}
.button5 {font-size: 24px;}
</style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <a href="http://localhost:8000/dashboard/add"><button class="button button2">Add Task</button></a>
                <table>
  <tr>
    <th>ID</th>
    <th>Task Name</th>
    <th>Status</th>
    <th>Created At</th>
    <th>Actions</th>
  </tr>
  @foreach($list as $lists)
  <tr>
    <td>{{$lists->id}}</td>
    <td>{{$lists->task}}</td>
    <td>{{$lists->status}}</td>
    <td>{{$lists->created_at}}</td>
   
    <td><a href="http://localhost:8000/dashboard/edit/{{$lists->id}}"><button class="button button2">Edit</button></a></td>    
    
    
    
  </tr>
  @endforeach
  
</table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
 
$(window).on("load", function(){
  $("#postBtn").on("click", function(){
    const data = {
      task_id: "{{$lists->id}}", //$('input'[name="firstname"]').val()
      status: "{{$lists->status}}",
    };
    $.ajax({
      url:"http://localhost:8000/api/todo/status/helloatg",
      type: "POST",
      data,
      success: function (response, status){
        console.log({response, status});
      },
      error: function (response, status){
        console.log({response, status});
      },
    });



  });
});
</script>

</x-app-layout>
