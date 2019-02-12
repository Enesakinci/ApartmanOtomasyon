<?php
include "classes/DataBase.php";
session_start();
if(!isset($_SESSION["username"]))
{
    header("Location:pages/login.php");

}
if(isset($_POST["cikis"]))
{

    unset($_SESSION["username"]);
    header("Location:pages/login.php");

}
?>
<?php
include "pages/yTasarim/header.php";
?>

<div class="container">
    <br />
    <br />
    <br />
    <h2 align="center">İsim veya ID arama</h2><br />
    <div class="form-group">
        <div class="input-group">
            <input type="text" name="search_text" id="search_text" placeholder="İsim ve ID arama" class="form-control" />
        </div>
    </div>
    <br />
    <div id="result"></div>
</div>
<div style="clear:both"></div>
<br />

<br />
<br />
<br />
<script>
    $(document).ready(function(){
        load_data();
        function load_data(query)
        {
            $.ajax({
                url:"fetch1.php",
                method:"post",
                data:{query:query},
                success:function(data)
                {
                    $('#result').html(data);
                }
            });
        }

        $('#search_text').keyup(function(){
            var search = $(this).val();
            if(search != '')
            {
                load_data(search);
            }
            else
            {
                load_data();
            }
        });
    });
</script>


<?php
include "pages/yTasarim/footer.php";
?>

