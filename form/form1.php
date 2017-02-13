
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<a href="abc.php"></a>
<script type="text/javascript">
    
    $(function(){
        $('#form').submit(function(){
          var name= $('#name').val();
          var email= $('#email').val();
          var website= $('#website').val();
          
        $('#errorname').html('');
        $('#name').css('border','1px solid #000');
        $('#erroremail').html('');
        $('#email').css('border','1px solid #000');
        $('#errorwebsite').html('');
        $('#website').css('border','1px solid #000');
    
        
         $count=0;
        
        
          if(name=="")
          {
            $('#errorname').css('color','red');
            $('#name').css('border','1px solid red');
            $('#errorname').html('required name');
               $count++;
              

          }
          
           if(email=="")
          {
             $('#erroremail').css('color','red');
              $('#email').css('border','1px solid red');
             $('#erroremail').html('required email');
               $count++;

          }
         
           if(website=="")
           {
             
             $('#errorwebsite').css('color','red');
              $('#website').css('border','1px solid red');
              $('#errorwebsite').html('required website');
               $count++;

              
          }
          alert($count);
          if($count>0){
              return false;
          }else{
               var data=$('#form').serialize();
             
        //  }
          $.ajax({
              type:"POST",
              url:"abc.php",
              data:data
          })
                  .done(function(response){


                    arr = $.parseJSON(response); 
                      if(arr['status'] == "Success") {
                        alert(arr['status']);                        
                        $('.listTable').html(arr['datalist']);

                      } else {
                        alert('Something went Wrong!');
                      }
                  });
          
              
          }
          
          
          
        
        //else{
          //    alert("else");
              
             
          
        });
        
    });
    </script>

<form method="POST" onsubmit="return false;" id="form">
    name:<input type="text" name="name" id="name">
    <br><span id="errorname"></span></br>
    
    email:<input type="text" name="email" id="email">
    <br><span id="erroremail"></span></br>
    
    website:<input type="text" name="website" id="website">
    <br><span id="errorwebsite"></span></br>
    gender:
    <input type="radio" name="gender" value="female" checked="checked">female
    <input type="radio" name="gender" value="male">male
    <br>
    <input type="submit" name="submit" value="submit">
</form>
  <div class="listTable"> </div>
    