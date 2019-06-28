<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf" content="{{csrf_token()}}">
    <title>Demo Application</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap-notifications.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/modal.css')}}"> 
    <link rel="stylesheet" type="text/css" href="{{asset('/css/editor.min.css')}}"> 
    <link rel="stylesheet" type="text/css" href="{{asset('/css/jquery.toast.min.css')}}">  
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
   <style type="text/css">
     body{
      background: #f1f1f1;
     }
     .bg-primary{
      background: #337ab7;
      color: white;
     }
   </style>
  </head>
  <body>
 
    <div class="container"> 
      
      @auth
      <div class="well">
        <img src="{{Auth::user()->image}}">
        <h3>Welcome,{{Auth::user()->name}}</h3>
        <small>{{Auth::user()->email}}</small>
      </div>
      @endauth
      <div id="alerts"></div>
      <div class="row">
        <div class="col-sm-4">  
          <h1>Task management</h1>     
          <a href="login/facebook">Login in with Facebook</a>
 
        </div>

        <div class="col-sm-4">
      <img src="https://cdn.tirto.id/tirto-front-end-msite-2017/phone/images/dot-loading.gif?v=4.2" id="loading" style="position:absolute;width: 100px;float: left;" class="img img-responsive">
        </div>
      </div>
 <br>
      <div class="row"> 
        <div class="col-sm-12"> 
        {{--   <div class="panel panel-primary">
            <div class="panel-heading">Tasks</div>
            <div class="panel-body">
               --}}
               <div id="test"></div>
          <div class="row">
            <div class="col-sm-6">
            <div class="form-inline">
            <label>Display Task for:</label>
            <select   id="days" class="form-control">
            @foreach($days as $day)
              <option  {{$now->day == $day ? 'selected default ' : '' }} >{{$day}}</option>
              {{-- <option>{{}}</option> --}}
            @endforeach
            </select>

            <select id="month" class="form-control">
              @php
                $month = ['January','February','March','April','May','June','July','August','September','October','November','December'];
              @endphp
              @foreach($month as $key => $month)

                @if($now->format('F') == $month)
                <option selected default  value="{{$key + 1}}">{{$month}}</option>
                @else
                <option value="{{$key + 1}}">{{$month}}</option>                
                @endif
              @endforeach 
            </select> 
            </div>
          </div>
            <div class="col-sm-6">
              
          <button class="btn btn-primary pull-right" id="create">Create</button>
            </div>
            </div> 
            <br>
          <table class="table table-bordered table-condensed" id="tasks">
            <thead class="bg-primary">
              <th><i class="fas fa-bell"></i></th>
              <th>Task</th>
              <th colspan="2">Progress</th>
              <th>Assigned by</th> 
              <th>Status</th>
              <th>Created on</th>
              <th>Action</th>
            </thead>
            <tbody></tbody>
          </table>

            {{-- </div> --}}
          {{-- </div> --}}
        </div> 
      </div>
    </div>

 
  <!-- Modal -->
  <div class="modal right fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
    <div class="modal-dialog" role="document">
      <div class="modal-content" >

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel2">Right Sidebar</h4>
        </div>

        <div class="modal-body">  
            <form>
                <div class="form-group" id="id">
                  <label>Id:</label>
                  <input type="text" name="id" readonly class="form-control">
                </div>

                <div class="form-group" id="task">
                  <label>Task:</label>
                  <input type="text" name="task" class="form-control">
                </div>
    
                <div class="form-group" id="assigned_by">
                  <label>Assigned by:</label>
                  <input type="text" name="assigned_by" class="form-control">
                </div>

              <div class="form-group" id="priority">
                  <label>Priority:</label>
                  <select  name="priority" class="form-control"> 
                    <option default hidden value="">-- Select Priority --</option>
                    <option>High</option>
                    <option>Medium</option>
                    <option>Low</option>
                  </select>
                </div>

         {{--      <div class="form-group" id="status">
                  <label>Status:</label>
                  <select  name="status" class="form-control">
                    <option default hidden value="">-- Select Status --</option>
                      <option>Completed</option>
                      <option>Pending</option>
                  </select> 
                </div>
 --}}
                <div class="form-group" id="description">
                  <label>Description:</label>
                  <textarea type="text" name="description" style="height: 400px" class="form-control textarea"></textarea>
                </div>
 </form>

              <button class="btn btn-success" id="submit"><i class="fas fa-paper-plane"></i> Submit</button>
              <button class="btn btn-info" id="save"><i class="fa fa-save"></i> Save</button>
              <button class="btn btn-default" id="cancel"><i class="fas fa-window-close"></i> Cancel</button> 
        </div>

      </div><!-- modal-content -->
    </div><!-- modal-dialog -->
  </div><!-- modal -->
  


  <!-- Modal -->
  <div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
    <div class="modal-dialog" role="document">
      <div class="modal-content" id="view-task">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel2">Right Sidebar</h4>
        </div>

        <div class="modal-body"> 
      
        </div>

      </div><!-- modal-content -->
    </div><!-- modal-dialog -->
  </div><!-- modal -->
  
  
</div><!-- container -->


    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="//js.pusher.com/3.1/pusher.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/timer.jquery/0.7.0/timer.jquery.js"></script>
    <script type="text/javascript" src="{{asset('js/jquery.toast.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/editor.min.js')}}"></script>

<script type="text/javascript">

  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration. 
    $('.textarea').wysihtml5()
  })
</script>

<script type="text/javascript">
  $('#days , #month').on('change',function(){
    sortTask();
  })

  function sortTask(){
    var days = $('#days').val();
    var month = $('#month').val();
    $.get('crud/sort/'+days+"/"+month,function(response){ 

            var table = $('#tasks').find('tbody');
            table.html(response);
    });
  }

$(document).ready(function(){
      showDataSet()

})

</script>


    <script type="text/javascript">
      var saveButton = $('#save'),
          submitButton = $('#submit'),
          csrfToken = $('meta[name="csrf"]').attr('content'),
          idGroup = $('#id'),
          cancel = $('#cancel'),
          loading = $('#loading'),
          inputTask = $('input[name="task"]'),
          inputPriority = $('select[name="priority"]'),
          inputAssignedBy = $('input[name="assigned_by"]'), 
          inputDescription = $('textarea[name="description"]'),
          inputId = $('input[name="id"]'),
          alerts = $('#alerts');
          heading = $('#heading');
          viewTaskContainer = $('#view-task');
          createTaskContainer = $('#create-task');

          viewTaskContainer.hide(); 
          saveButton.hide();  
          loading.hide();
          idGroup.hide();

      function showDataSet(){
        $.ajax({
          method:"GET",
          url:"{{url('crud')}}",
          success:function(response){ 
            var table = $('#tasks').find('tbody');
            var table_data = ''; 
            // for (var i = response.length - 1; i >= 0; i--) {  
            //     switch(response[i].priority) {
            //       case 'High':
            //     table_data += "<tr class='danger'>";     
            //         break;
            //       case 'Medium':
            //       table_data += "<tr class='warning'>";   
            //         break;
            //       default:
            //     table_data += "<tr>";          
            //     }
            //     table_data += "<td>" + parseInt(i + 1)  + "<div id='timer-0'></div></td>";
            //     table_data += "<td>" + response[i].task + "</td>";
            //     table_data += "<td>" + response[i].description + "</td>";
            //     table_data += "<td>" + response[i].assigned_by + "</td>";
            //     table_data += "<td>" + response[i].priority + "</td>";
            //     table_data += "<td>" + response[i].status + "</td>";
            //     table_data += "<td>" + response[i].created_at + "</td>";
            //     table_data += "<td><button class='btn btn-warning' onclick='edit("+response[i].id+")'>Edit</button> ";
            //     table_data += "<button class='btn btn-success' onclick='view("+response[i].id+")'>Start </button>";
            //     table_data += "<button class='btn btn-danger'  onclick='remove("+response[i].id+")'>Remove</button></td>";
            //     table_data += "</tr>";
            // }
            table.html(response);
          }
        })
      }

      cancel.on('click',function(){
        saveButton.hide();
        submitButton.show();
        inputs = $('.modal-body').find('input,select,textarea');
        inputs.val('') 
        $('#createModal').modal('hide')
      })

      function view(id){

          viewTaskContainer.show(); 
          $.ajax({
          method:"GET",
          url:"/crud/view/" + id,
          success:function(response,success){   
            container = $('#view-task').find('.modal-body');
            $('#myModal2').modal('show');
            container.html(response)

          },

           beforeSend: function(){
               // Handle the beforeSend event
               loading.show();
             },
             complete: function(){
               loading.hide();
               // Handle the complete event
             }

        })
      }

      function edit(id){
 
            submitButton.hide();
            saveButton.show();
            heading.html('Update Task')
        $.ajax({
          method:"GET",
          url:"/crud/edit/" + id,
          success:function(response,success){  
            inputTask.val(response.task);
            inputDescription.val(response.description);
            inputId.val(response.id);
            inputAssignedBy.val(response.assigned_by);
            inputPriority.val(response.priority); 

            $('#createModal').modal({backdrop: 'static', keyboard: false});
          },

           beforeSend: function(){
               // Handle the beforeSend event
               loading.show();
             },
             complete: function(){
               loading.hide();
               // Handle the complete event
             }

        })
      }

      function remove(id){
          $.ajax({
          method:"GET",
          url:"/crud/delete/" + id,
          success:function(response,success){   
              // alerts.html('<div class="alert alert-success"></div');
              createAlert('Data successfully removed','success')
              showDataSet();
          },

           beforeSend: function(){
               // Handle the beforeSend event
               loading.show();
             },
             complete: function(){
               loading.hide();
               // Handle the complete event
             }

        })
      }
      $('#create').on('click',function(){

        inputs = $('.modal-body').find('input,select,textarea');
        inputs.val('') 
            $('#createModal').modal({backdrop: 'static', keyboard: false});
      })
      submitButton.on('click',function(){
        create();
      });

      saveButton.on('click',function(){
        update()
      });

      function update(){
        var task = inputTask.val(),
            id = inputId.val(),
            priority = inputPriority.val(),
            assigned_by = inputAssignedBy.val(), 
            description = inputDescription.val();

           $.ajax({
          method:'PUT',
          url:"/crud/update/" + id,
          data:{
            "task":task,
            "description":description,
            "priority":priority, 
            "assigned_by":assigned_by,
            "_token":csrfToken
          },
          success:function(response, success){
            if (success) {

            $('#createModal').modal('hide');
              createAlert('Data successfully saved','success');
              showDataSet();

            }
          },
           beforeSend: function(){
               // Handle the beforeSend event
               loading.show();
             },
             complete: function(){
               loading.hide();
               // Handle the complete event
             },
          error: function (xhr) {
               $.each(xhr.responseJSON.errors, function(key,value) {
                alerts.html('<div class="alert alert-danger">'+value+'</div');
             }); 
            },

        })
      }
 
      function create(){
        var task = inputTask.val(),
            priority = inputPriority.val(),
            assigned_by = inputAssignedBy.val(), 
            description = inputDescription.val();
        $.ajax({
          method:'POST',
          url:"{{url('crud/create')}}",  
          data:{
            "task":task,
            "description":description,
            "priority":priority, 
            "assigned_by":assigned_by,
            "_token":csrfToken
          },
          success:function(response, success){
            console.log(response)
            if (success) {
              showDataSet(); 

              $('#createModal').modal('hide')
              createAlert('Data successfully saved','success')

            }
          },
           beforeSend: function(){
               // Handle the beforeSend event
               loading.show();
             },
             complete: function(){
               loading.hide();
               // Handle the complete event
             },
          error: function (xhr) {
               $.each(xhr.responseJSON.errors, function(key,value) {
                createAlert(value,'error');
                // alerts.html('<div class="alert alert-danger">'++'</div');
             }); 
            },

        })
      }

    </script>


</script>

<script type="text/javascript"> 
  
function createAlert(message,type){

$.toast({
    text: message, // Text that is to be shown in the toast
    heading: type, // Optional heading to be shown on the toast
    icon: type, // Type of toast icon
    showHideTransition: 'fade', // fade, slide or plain
    allowToastClose: true, // Boolean value true or false
    hideAfter: 5000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
    stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
    position: 'top-left', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
    
    
    
    textAlign: 'left',  // Text alignment i.e. left, right or center
    loader: false,  // Whether to show loader or not. True by default
    loaderBg: '',  // Background color of the toast loader
    beforeShow: function () {}, // will be triggered before the toast is shown
    afterShown: function () {}, // will be triggered after the toat has been shown
    beforeHide: function () {}, // will be triggered before the toast gets hidden
    afterHidden: function () {}  // will be triggered after the toast has been hidden
});
             
}

  </script>
  </body>
</html>