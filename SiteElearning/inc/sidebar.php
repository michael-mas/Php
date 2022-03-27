<?php

$gallery = "SELECT * FROM gallery";
$gallery_run = mysqli_query($con,$gallery);
$row_gallery = mysqli_num_rows($gallery_run);

$student = "SELECT * FROM student";
$student_run = mysqli_query($con,$student);
$row_student = mysqli_num_rows($student_run);



$course = "SELECT * FROM courses";
$course_run = mysqli_query($con,$course);
$row_course = mysqli_num_rows($course_run);

$register = "SELECT * FROM register";
$register_run = mysqli_query($con,$register);
$row_register = mysqli_num_rows($register_run);

$fee = "SELECT * FROM fee";
$fee_run = mysqli_query($con,$fee);
$row_fee = mysqli_num_rows($fee_run);



$expenses = "SELECT * FROM expenses";
$expenses_run = mysqli_query($con,$expenses);
$row_expenses = mysqli_num_rows($expenses_run);

$exam = "SELECT * FROM exam";
$exam_run = mysqli_query($con,$exam);
$row_exam = mysqli_num_rows($exam_run);

$msg = "SELECT * FROM msg";
$msg_run = mysqli_query($con,$msg);
$row_msg = mysqli_num_rows($msg_run);

$msgToClasses = "SELECT * FROM msgToClasses";
$msgToClasses_run = mysqli_query($con,$msgToClasses);
$row_msgToClasses = mysqli_num_rows($msgToClasses_run);



?>


<div class="list-group">
    <a href="index.php" class="list-group-item list-group-item-action active">
        <i class="fa fa-tachometer"></i> Tableau de bord
    </a>

    <a href="gallery.php" class="list-group-item list-group-item-action">
        <i class="fa fa-camera"></i> Gallerie 
            <button type="button" class="btn btn-primary pull-right btn-sm">
                <span class="badge bg-light text-danger"><?php echo $row_gallery ; ?></span>
            </button>
    </a>

    <a href="student.php" class="list-group-item list-group-item-action">
        <i class="fa fa-user"></i> Etudiants 
            <button type="button" class="btn btn-primary pull-right btn-sm">
                <span class="badge bg-light text-danger"><?php echo $row_student ; ?></span>
            </button>
    </a>

   

    <a href="course.php" class="list-group-item list-group-item-action">
        <i class="fa fa-leanpub"></i> Cours
            <button type="button" class="btn btn-primary pull-right btn-sm">
                <span class="badge bg-light text-danger"><?php echo $row_course ; ?></span>
            </button>
    </a>

    <a href="register.php" class="list-group-item list-group-item-action">
        <i class="fa fa-lightbulb-o"></i> Inscriptions
            <button type="button" class="btn btn-primary pull-right btn-sm">
                <span class="badge bg-light text-danger"><?php echo $row_register ; ?></span>
            </button>
    </a>

    <a href="fee.php" class="list-group-item list-group-item-action">
        <i class="fa fa-money"></i> Honoraires
            <button type="button" class="btn btn-primary pull-right btn-sm">
                <span class="badge bg-light text-danger"><?php echo $row_fee ; ?></span>
            </button>
    </a>

    

    <a href="expenses.php" class="list-group-item list-group-item-action">
        <i class="fa fa-money"></i> Dépenses
            <button type="button" class="btn btn-primary pull-right btn-sm">
                <span class="badge bg-light text-danger"><?php echo $row_expenses ; ?></span>
            </button>
    </a>

    <a href="exam.php" class="list-group-item list-group-item-action">
        <i class="fa fa-question"></i> Exam
            <button type="button" class="btn btn-primary pull-right btn-sm">
                <span class="badge bg-light text-danger"><?php echo $row_exam ; ?></span>
            </button>
    </a>

    <a href="msg.php" class="list-group-item list-group-item-action">
        <i class="fa fa-envelope"></i> Messages
            <button type="button" class="btn btn-primary pull-right btn-sm">
                <span class="badge bg-light text-danger"><?php echo $row_msg ; ?></span>
            </button>
    </a>

    <a href="msgToClasses.php" class="list-group-item list-group-item-action">
        <i class="fa fa-bullhorn"></i> Réponses
            <button type="button" class="btn btn-primary pull-right btn-sm">
                <span class="badge bg-light text-danger"><?php echo $row_msgToClasses ; ?></span>
            </button>
    </a>

</div>