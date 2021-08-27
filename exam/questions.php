<div class="col-md-9">
    <div class="row">
        <?php
            $num = 1;
            $sql="SELECT * FROM questions";
            $result = runSQL($sql);
            while($row=mysqli_fetch_array($result)){
        ?>
        <div class="col-md-2">
            <h5>Question <?php echo $num++;?></h5>
        </div>
        <div class="col-md-10">
            <p><?php echo $row['questions'];?></p>
            <form>
                <div class="form-check">
                    <label class="form-check-label">
                        <input value="a" type="radio" class="form-check-input" name="o_q1">a) <?php echo $row['option_a'];?>
                    </label>
                </div>  
                <div class="form-check">
                    <label class="form-check-label">
                        <input value="b" type="radio" class="form-check-input" name="o_q1">b) <?php echo $row['option_b'];?>
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input value="c" type="radio" class="form-check-input" name="o_q1">c) <?php echo $row['option_c'];?>
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input value="d" type="radio" class="form-check-input" name="o_q1">d) <?php echo $row['option_d'];?>
                    </label>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
</div>
