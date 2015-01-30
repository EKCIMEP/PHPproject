

</div>

<hr>

<footer>
    <p>&copy; Company 2014</p>
</footer>
</div> <!-- /container -->
<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<script>
 function changeAdmin(box){
     var name = box.name;
     var id = box.id;
     var value = box.value;
     var type = true;
     $.ajax({
         url:"CheckingData.php",
         type:"POST",
         data:  "name="+name+"&value="+value+"&id="+id+"&changeAdmin="+type,
         success:function(e){
             $("#AdminUp").html(e);
         }

     });
 }


</script>


</body></html>