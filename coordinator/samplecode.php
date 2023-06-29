
     <?php if(isset($_SESSION['auth_user']))  ?>

    <label for="" hidden="true">user_id</label>
    <input required type="text" hidden name="user_id" value="<?=$_SESSION['auth_user']['user_id']; ?>" class="form-control">