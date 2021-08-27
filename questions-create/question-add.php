    <?php
        $sql="SELECT count(*) as sum FROM courses WHERE deleted < 1";
        $result = runSQL($sql);
        $data=mysqli_fetch_array($result);
        $sum=$data['sum'];
    ?>

    <div class="form-group">
        <label for="course">Course Title:</label>
        <select name="course" class="form-control">
            <option value="">Choose answser</option>
            <?php 
                if($sum > 0){
                $sql="SELECT * FROM courses WHERE deleted < 1";
                $result = runSQL($sql);
                while($row=mysqli_fetch_array($result)){
            ?>
            <option value="<?php echo $row['id'];?>"><?php echo $row['course_code'];?></option>
            <?php 
                }
                }else{
                    echo"<option value=''>You cannot upload a question, no course has been registered yet.</option>";
                }
            ?>
        </select>   
    </div>
    <div class="form-group">
        <label for="question">Question:</label>
        <input type="text" class="form-control" name="question">
    </div>
    <div class="form-group">
        <label for="option1">Option1:</label>
        <input type="text" class="form-control" name="option1">
    </div>
    <div class="form-group">
        <label for="option2">Option 2:</label>
        <input type="text" class="form-control" name="option2">
    </div>
    <div class="form-group">
        <label for="option3">Option3:</label>
        <input type="text" class="form-control" name="option3">
    </div>
    <div class="form-group">
        <label for="option4">Option4:</label>
        <input type="text" class="form-control" name="option4">
    </div>
    <div class="form-group">
        <label for="answer">Answer:</label>
        <select name="answer" class="form-control">
            <option value="">Choose answser</option>
            <option>a</option>
            <option>b</option>
            <option>c</option>
            <option>d</option>
        </select>   
    </div>
    <button class="btn btn-primary" type="submit" id="submit">Post</button>
