<!-- Go Back to job index -->
<a class="btn btn-default" href="/index.php?r=job">Go Back</a>
<h2 class="page-header"><?php echo $job->title; ?> <small>Located in <?php echo $job->city; ?> <?php echo $job->state; ?></small>
    <!-- Check for Ownership of posting before rendering edit/delete buttons -->
    <?php if(Yii::$app->user->identity->id == $job->user_id) : ?>
        <!-- Edit and Delete Buttons -->
        <span class="pull-right">
            <a href="index.php?r=job/edit&id=<?php echo $job->id; ?>" class="btn btn-warning">Edit</a>
            <a href="index.php?r=job/delete&id=<?php echo $job->id; ?>" class="btn btn-danger">Delete</a>
        </span>
    <?php endif; ?>
</h2>
<!-- Display Job Description if one exists -->
<?php if(!empty($job->description)) : ?>
    <div class="well">
        <h4>Job Description</h4>
        <?php echo $job->description; ?>
    </div>
<?php endif; ?>

<ul class="list-group">
    <?php if(!empty($job->create_date)) : ?>
        <?php $phpdate = strtotime($job->create_date); ?>
        <?php $formatted_date = date("F j, Y, g:i a", $phpdate); ?>
        <li class="list-group-item"><strong>Listing Date: </strong><?php echo $job->create_date; ?></li>
    <?php endif; ?>

    <?php if(!empty($job->category->name)) : ?>
        <li class="list-group-item"><strong>Category: </strong><?php echo $job->category->name; ?></li>
    <?php endif; ?>

    <?php if(!empty($job->type)) : ?>
        <li class="list-group-item"><strong>Employment Type: </strong><?php echo $job->type; ?></li>
    <?php endif; ?>

    <?php if(!empty($job->salary_range)) : ?>
        <li class="list-group-item"><strong>Salary Range: </strong><?php echo $job->salary_range; ?></li>
    <?php endif; ?>

    <?php if(!empty($job->contact_email)) : ?>
        <li class="list-group-item"><strong>Contact Email: </strong><?php echo $job->contact_email; ?></li>
    <?php endif; ?>

    <?php if(!empty($job->contact_phone)) : ?>
        <li class="list-group-item"><strong>Contact Phone: </strong><?php echo $job->contact_phone; ?></li>
    <?php endif; ?>
</ul>

<a class="btn btn-success" href="mailto:<?php echo $job->contact_email; ?>?Subject=Job%20Application">Contact Employer</a>
