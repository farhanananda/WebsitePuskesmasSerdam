<?
  $pagename = "Profil";
  include "header.php";
  include "menubar.php";
?>


<section class="content">
<div class="container-fluid">


<div class="row">
    <div class="col-12">


        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><b>Profil</b></h3>
            </div>

            <form role="form" action="<?= $master ?>submit" method="POST">
                <div class="card-body">

                <?
                    $query = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM frontend "));
                ?>

                    <div class="form-group">
                        <label for="profil">profil</label>
                        <textarea class="form-control" id="profil" placeholder="Profil" name="profil"><?= $query['profil'] ?></textarea>
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="profil">Simpan</button>
                </div>
            </form>
        </div>


    </div>
</div>



</div>
</div>


<? include "footer.php"; ?>


<script>
$(function () {



});
</script>


</body>
</html>