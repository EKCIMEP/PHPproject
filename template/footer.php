 
 
       </div>

      <hr>
 
		<footer>
			<p>&copy; Company 2014</p>
		</footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
       <script>
           $("#SignIn").click(function(){
               var SignIn = true;
               $.ajax({
                   url:"../CheckingData.php",
                   type:"POST",
                   data:"email="+$("#inputEmail").val()+"&password="+$("#inputPassword").val()+"&SignIn="+SignIn,
                   success:function(e){
                       if(e != "ok"){
                            $("#SignInError").html(e);
                       }else{
                           window.location.href = "../public/global.php";
                       }
                   }
               });
           });
       </script>
       <script>
           $("#Send").click(function(){
               var a = "hello";
               $.ajax({
                   url:"../CheckingData.php",
                   type:"POST",
                   data:"email="+$("#inputEmail").val()+"&name="+$("#inputName").val()+"&last_name="+
                       $("#inputLastName").val()+"&MULO="+a,
                   success:function(e){
                           $("#SendEmail").html(e);
                   }
               });
           });
       </script>
       <script>
            function check(){
                if(document.getElementById('inputPassword1').value.length<8){
                    $("#pass").html("Пароль должен быть больше 8 символов")
                }else{
                    $("#pass").html("");
                }
            }
            function checkPassword(){
                check();
                if(document.getElementById('inputPassword1').value!=document.getElementById('repeatPassword1').value){
                    $("#pass").html('Неправильное подтверждение пароля');
                }else{
                    $("#pass").html("");
                }
            }
           function updatePassword(){
               if(document.getElementById('updatePassword').value.length<8){
                   $("#up").html("Пароль должен быть больше 8 символов")
               }else{
                   $("#up").html("");
               }

           }
            function updatePassword1(){

                updatePassword();
                if(document.getElementById('updatePassword').value!=document.getElementById('updatePassword2').value){
                    $("#up").html('Неправильное подтверждение пароля');
                }else{
                    $("#up").html("");
                }
            }

            function showMe (box) {
                    var vis = (box.checked) ? "block" : "none";
                    document.getElementById('passwordHide').style.display = vis;
            }
       </script>
      <script>
           $("#SignUpStep3").click(function(){
               $.ajax({
                   url:"../CheckingData.php",
                   type:"POST",
                   data:"login="+$("#inputLogin").val()+"&password="+$("#inputPassword1").val()+
                       "&firm="+$("#inputFirm").val()+"&number_firm="+$("#inputNumFirm").val()+("&key=")+$("#Secret").val(),
                   success:function(e){
                       $("#pass").html(e);
                   }
               });
           });
       </script>
       <script>
           $("#SignOut").click(function(){
               var SignOut = true;
               $.ajax({
                   url:"../CheckingData.php",
                   type:"POST",
                   data:"SignOut="+SignOut,
                   success:function(e){
                       window.location.href = "../public/global.php";
                   }
               });
           });
       </script>
       <script>
           $("#Edit").click(function(){
               var update = true;
               $.ajax({
                   url:"../CheckingData.php",
                   type:"POST",
                   data:"updateLogin="+$("#updateLogin").val()+"&updateEmail="+$("#updateEmail").val()+"&updateName="+
                   $("#updateName").val()+"&updateLastName="+"&updateFirm="+$("#updateFirm").val()+"&updateNumFirm="+
                   $("#updateNumFirm").val()+"&updatePassword="+$("#updatePassword")+"$update"+update,
                   success:function(e){
                       $("#up").html(e);
                   }
               });
           });
       </script>

       <script>
            $("#inputPass").blur(function(){
               var check = true
               $.ajax({
                   type: 'POST',
                   url: '../CheckingData.php',
                   data: "checkPass="+$("#inputPass").val()+"&check="+check,
                   success : function(result){
                       $("#up").html(result);
                   }
               });
           });

       </script>
  </body>
</html>